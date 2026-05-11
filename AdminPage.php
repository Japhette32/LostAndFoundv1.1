
<?php 
$Message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $location = $_POST['location'];
    $time_found = $_POST['time_found'];

    // Define ID mappings
    $location_ids = [
        "Oval" => 0,
        "Academic Bldg. 1" => 1,
        "Academic Bldg. 2" => 2,
        "Academic Bldg. 3" => 3,
        "HPSB" => 4,
        "Admin Bldg." => 5
    ];

    $time_found_ids = [
        "Morning" => 10,
        "Afternoon" => 11,
        "Evening" => 12
    ];

    // Get IDs from mappings
    $location_id = $location_ids[$location] ?? null;
    $time_found_id = $time_found_ids[$time_found] ?? null;

    // Handle image upload
    $image_path = '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $image_name = basename($image['name']);
        $image_tmp = $image['tmp_name'];
        $image_path = 'uploads/' . uniqid() . '_' . $image_name; // Add unique ID to prevent overwrites

        // Create uploads directory if needed
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }
    } else {
        $Message = "Please upload a valid image file";
    }

    include 'AdminConnect.php';
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO lost_items (image_path, item_name, place_found, place_id, time_found, time_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiss", $image_path, $name, $location, $location_id, $time_found, $time_found_id);

    // First try to insert into database
    if ($stmt->execute()) {
        // If database insert successful, move the file
        if (move_uploaded_file($image_tmp, $image_path)) {
            $Message = "Item added successfully!";
        } else {
            $Message = "Database entry created but image upload failed!";
            // You might want to delete the database entry here if image upload fails
        }
    } else {
        $Message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loaf Admin Website</title>

    <!--CSS Admin file-->
    <link rel="stylesheet" href="CSS/AdminStyleC.css">
    
    <!--Font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<!--Include Files-->
<?php include('AdminHeader.php')?>

<!--Form Add missing item-->
<div class="container">
    <!--Message for submiting an item-->
    <?php
   if (isset($_SESSION['message']) && !isset($_COOKIE['hideMessage'])) {
    echo "<div class='Message' id='messageBox'>
        <span>{$_SESSION['message']}</span> 
        <i class='fas fa-times' onclick='dismissMessage()'></i>
    </div>";
}
    ?>
    <section>
        <h3 class="HeaderForm">Add Missing Item</h3>
        <form action="AdminPage.php" method="post" enctype="multipart/form-data" class="upload-form">
        <fieldset>
            <legend>Item Information</legend>
            
            <label for="name">Item Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Enter item name" required>
            <br>
            <label for="location">Location:</label><br>
            <select id="location" name="location" size="1" placeholder="Enter time of day found" required>
             <option value="Oval">Oval</option>
             <option value="Academic Bldg. 1">Academic Bldg. 1</option>
             <option value="Academic Bldg. 2">Academic Bldg. 2</option>
             <option value="Academic Bldg. 3">Academic Bldg. 3</option>
             <option value="HPSB">HPSB</option>
             <option value="Admin Bldg.">Admin Bldg.</option>
            </select>
            <br>
            <label for="time_found">Time Found:</label><br>
            <select id="time" name="time_found" size="1" placeholder="Enter time of day found" required>
             <option value="Morning">Morning</option>
             <option value="Afternoon">Afternoon</option>
             <option value="Evening">Evening</option>
            </select>
            <br>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </fieldset>

<button type="submit" class="button">Upload Item</button>
    </form>
</main>
<!--JS Admin file-->
<script src="JS/AdminPageJS.js"></script>
<script>
function dismissMessage() {
    const box = document.getElementById('messageBox');
    box.style.display = 'none';
    document.cookie = "hideMessage=true; path=/; max-age=3600"; // 1 hour
}
</script>
</body>    
</html>