
<?php include 'AdminConnect.php'?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Verification</title>

    <!--CSS Admin file-->

    
    <!--Font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--Include Files-->
    <?php include('AdminHeader.php')?>

        <section class="DisplayItems">
                    <?php $DisplayItem=mysqli_query($conn,"Select * from `verified_items`");
                    $num=1;
                    if(mysqli_num_rows($DisplayItem)>0){
                        echo"<table>
                            <thead>
                            <th>id</th>
                            <th>image</th>
                            <th>item name</th>
                            <th>time found</th>
                            <th>place found</th>
                            <th>Verification</th>
                        </thead>
                        <tbody>";  
                        //Get Data
                        while($row=mysqli_fetch_assoc($DisplayItem)){
                    ?>
                    <tr>
                    <!--Item Table--> 
                        <td><?php echo $num?></td>
                        <td><?php echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="lostitem">'; ?></td>
                        <td><?php echo $row['item_name']?></td>
                        <td><?php echo $row['time_found']?></td>
                        <td><?php echo $row['place_found']?></td>
                        <td>
                            <a href="DelVi.php?delete=<?php echo $row['id']?>"
                             class="DeleteBtn" onclick="return confirm('Are you sure you want to delete this item?');">
                             <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    $num++;
                    }
                    }else{
                        echo"<div class='Empty'> Nothing to verify</div>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
</body>
</html>