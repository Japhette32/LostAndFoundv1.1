<?php include 'AdminConnect.php';

if(isset($_POST['VerifyItem'])){
    $VerifyItemId = $_POST['VerifyItemId'];
    
    // Fetch existing item details from lost_items
    $fetchQuery = mysqli_query($conn, "SELECT * FROM `lost_items` WHERE id = $VerifyItemId");
    if(mysqli_num_rows($fetchQuery) == 0) {
        $Message = "Item not found.";
    } else {
        $itemData = mysqli_fetch_assoc($fetchQuery);
        
        // Get values directly from database (VARCHAR format)
        $VerifyItemName = $itemData['item_name'];
        $VerifyItemTime = $itemData['time_found']; // As VARCHAR
        $VerifyItemPlace = $itemData['place_found'];
        $VerifyItemImage = $itemData['image_path'];

        // Insert into verified_items (identical structure)
        $insertQuery = "INSERT INTO `verified_items` 
                        (item_name, time_found, place_found, image_path) 
                        VALUES 
                        ('$VerifyItemName', '$VerifyItemTime', '$VerifyItemPlace', '$VerifyItemImage')";
        
        $VerifyItem = mysqli_query($conn, $insertQuery);

        if($VerifyItem){
            // Delete from lost_items after successful verification
            mysqli_query($conn, "DELETE FROM `lost_items` WHERE id = $VerifyItemId");
            header('location:ItemsVerification.php');
            exit();
        } else {
            $Message = "Error verifying item: " . mysqli_error($conn);
        }
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Item Verification</title>

    <!--CSS Admin file-->
    <link rel="stylesheet" href="CSS/AdminStyleC.css">
    
    <!--Font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include('AdminHeader.php')?>
    <?php
    if(isset($Message)){
       echo "<div class='Message'>
       <span>$Message</span> 
       <i class='fas fa-times' onclick='this.parentElement.style.display=`none`'></i>
    </div>";
    }
    ?>
    <section class="container"> 
    <!--Php for getting info from db-->
    <?php
    if(isset($_GET['edit'])){
        $EditId=$_GET['edit'];
        $EditQuery=mysqli_query($conn, "SELECT * FROM `lost_items` where id=$EditId");
        if(mysqli_num_rows($EditQuery)>0){
            $FetchData=mysqli_fetch_assoc($EditQuery);
    ?>
    <!--Form for Verifying-->
    <form action=""method="post" enctype="multipart/form-data" class="CheckProduct CheckProductBox" >
            <img src="<?php echo $FetchData['image_path']?>" alt="">
            <input type="hidden" value="<?php echo $FetchData['id']?>" 
            name="VerifyItemId">
            <input type="text" class="input_textbox textbox" required value ="<?php echo $FetchData['item_name']?>" 
            name="VerifyItemName">
            <input type="file" class="input_textbox textbox" required accept="image/jpg, image/png, image/jpeg"
            name="VerifyItemImage">
            <div class="btns">
                <input type="submit" class="edit_btn" value="Verify Item" name="VerifyItem">
                <input type="button"  id="close-edit" value="cancel" class="cancel_btn" name="CancelVerify" 
       onclick="if(confirm('Are you sure you want to cancel? Changes will not be saved.')) window.location.href='ItemsVerification.php';">
            </div>
        </form>
    <?php
        }
    } 
?>
</section>
</body>
</html>