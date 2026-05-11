<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Getting form data
    $name = $_POST['name'];
    $location = $_POST['location'];
    $time_found = $_POST['time_found'];

    // Define mappings for location and time_found
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

    // Get the corresponding IDs
    $location_id = $location_ids[$location] ?? null; // Default to null if not found
    $time_found_id = $time_found_ids[$time_found] ?? null;

    // Handle image upload
    $image = $_FILES['image'];
    $image_name = basename($image['name']); // Sanitize the image name
    $image_tmp = $image['tmp_name'];
    $image_path = 'uploads/' . $image_name;

    // Ensure the uploads folder exists
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true); // Create the folder if it doesn't exist
    }

    // Move the uploaded image to the uploads folder
    move_uploaded_file($image_tmp, $image_path);

    // Insert data into the database
    $conn = new mysqli('localhost', 'root', '', 'lost_and_found');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to insert the new record into the lost_items table
    $sql = "INSERT INTO lost_items (image_path, item_name, place_found, place_id, time_found, time_id) 
            VALUES ('$image_path', '$name', '$location', '$location_id', '$time_found', '$time_found_id')";

if ($conn->query($sql) === TRUE) {
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('thankyouModal'));
            myModal.show();
            history.replaceState(null, '', location.href); // Prevent modal from showing again on refresh
        });
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    $conn->close();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="uploadS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include('Header.php')?>
    <main>
    <h2>UPLOAD FOUND ITEM</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
        <fieldset>
            <legend>Item Information</legend>
            
            <label for="name">Item Name:</label>
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
<div class="modal fade" id="thankyouModal" tabindex="-1" aria-labelledby="thankyouModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="thankyouModalLabel"><b>Thank you for your honesty!</b></h5>
        <button type="button" class="btn-close" aria-label="Close" onclick="window.location.href='upload.php'"></button>
      </div>
      <div class="modal-body">
        Your item has been uploaded successfully! Please submit the item to the lost and found area located behind the stadium!
        Your found item will show in the website once it has been fully verified.
      </div>
      <div class="modal-footer justify-content-center">
      </div>
    </div>
  </div>
</div>
</body>
<?php include('Footer.php')?>
</html>
