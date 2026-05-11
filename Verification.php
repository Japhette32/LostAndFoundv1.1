<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection setup
$conn = mysqli_connect("localhost","root","","lost_and_found");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle item verification submission
    if(isset($_POST['verification_submit'])) {
        // Get item ID from URL
        $item_id = isset($_GET['add']) ? intval($_GET['add']) : 0;
        
        // Validate item_id
        if($item_id <= 0) {
            die("Invalid item ID");
        }

        // Get form data directly (prepared statements handle security)
        $itemYours = $_POST['is_yours'];
        try {
            // Update the query based on actual fields you want to store
            $stmt = $conn->prepare("INSERT INTO person_verification (item_id, is_yours) VALUES (?, ?)");

            if (!$stmt) {
                throw new Exception("Prepare failed: " . $conn->error);
            }

            // Bind parameters (5 form fields + item_id from URL)
            $bindResult = $stmt->bind_param("is", $item_id, $itemYours);

            if (!$bindResult) {
                throw new Exception("Bind failed: " . $stmt->error);
            }

            // Execute statement
            if ($stmt->execute()) {
                header("Location: itemlist1.php?success=1");
                exit();
            } else {
                throw new Exception("Execute failed: " . $stmt->error);
            }
            
            $stmt->close();
        } catch (Exception $e) {
            $error = "Database error: " . $e->getMessage();
            error_log($error);
            die($error);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lost and Found</title>
    <link rel="stylesheet" href="VerificationC.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>

<?php include('Header.php')?>

<!-- Error display section -->
<?php if(isset($error)): ?>
    <div class="error-message" style="color: red; padding: 20px; border: 1px solid red; margin: 20px;">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<div class="IDetails">
    <?php
    if(isset($_GET['add'])){
        $EditId = intval($_GET['add']);
        $EditQuery = $conn->prepare("SELECT * FROM verified_items WHERE id = ?");
        $EditQuery->bind_param("i", $EditId);
        $EditQuery->execute();
        $result = $EditQuery->get_result();
        
        if($result->num_rows > 0){
            $FetchData = $result->fetch_assoc();
    ?>
    <div class="left-section">
        <input type="hidden" value="<?php echo $FetchData['id']; ?>">
        <button class="back-btn" onclick="window.history.back()"><i class='fas fa-angle-left'></i>BACK</button>
        <h3><?php echo htmlspecialchars($FetchData['item_name']); ?></h3>
        <div class="det">
            <p><b>Place Found at:</b> <?php echo htmlspecialchars($FetchData['place_found']); ?></p>
            <p><b>Time Found:</b> <?php echo htmlspecialchars($FetchData['time_found']); ?></p>
        </div>
        <?php echo '<img src="' . htmlspecialchars($FetchData['image_path']) . '" alt="lostitem">'; ?>
    </div>
    <div class="right-section">
    <h1 class="section-title">Is this item yours?</h1>

    <form method="POST" action="" id="verificationForm">
        <input type="hidden" name="verification_submit" value="1">

        <div class="radio-buttons">
            <input type="radio" id="yes" name="is_yours" value="Yes" required>
            <label for="yes">Yes</label>

            <input type="radio" id="no" name="is_yours" value="No" required>
            <label for="no">No</label>
        </div>
    </form>
    </div>

    <!-- Modal for "Yes" confirmation -->
    <div id="confirmationModalYes" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Thank you for confirming that the item belongs to you!
            To complete the verification process, please bring a valid ID or a copy of your Certificate of Registration (COR) to the Lost and Found area, which is located behind the stadium. This will help us ensure that the item is rightfully returned to its owner.</p>
        </div>
    </div>

    <!-- Modal for "No" confirmation -->
    <div id="confirmationModalNo" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Thank you for your honesty!
We truly appreciate your effort in helping us keep track of lost items. To assist you further, please try using the available filters on our website to help narrow down your search and locate your lost item more easily.
</p>
        </div>
    </div>

    <script>
        // Handle Yes/No actions
        document.querySelectorAll('input[name="is_yours"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                if (this.value === "Yes") {
                    // Show the "Yes" confirmation modal
                    document.getElementById("confirmationModalYes").style.display = "block";

                } else if (this.value === "No") {
                    // Show the "No" confirmation modal
                    document.getElementById("confirmationModalNo").style.display = "block";
                }
            });
        });

        // Modal close functionality
        var modalYes = document.getElementById("confirmationModalYes");
        var modalNo = document.getElementById("confirmationModalNo");
        var closeBtnYes = modalYes.getElementsByClassName("close")[0];
        var closeBtnNo = modalNo.getElementsByClassName("close")[0];

        closeBtnYes.onclick = function() {
            modalYes.style.display = "none";
            window.location.href = "itemlist1.php"; // Go back to the item list
        }

        closeBtnNo.onclick = function() {
            modalNo.style.display = "none";
            window.location.href = "itemlist1.php"; // Go back to the item list
        }

        // Close the modal if clicked outside
        window.onclick = function(event) {
            if (event.target == modalYes) {
                modalYes.style.display = "none";
                window.location.href = "itemlist1.php"; // Go back to the item list
            } else if (event.target == modalNo) {
                modalNo.style.display = "none";
                window.location.href = "itemlist1.php"; // Go back to the item list
            }
        }
    </script>

    <?php
        }
        $EditQuery->close();
    }
    ?>
</div>

<?php
// Close the database connection
$conn->close();
?>
<?php include('Footer.php')?>

</body>
</html>
