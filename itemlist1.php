<!DOCTYPE html>
 <html>
 <head>
 <title> Lost and Found </title>
 <link rel="stylesheet" href="itemlist1S.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 
 <script>
    // Function to filter items based on search query
    function searchItems() {
      let input = document.getElementById('searchBar').value.toLowerCase();
      let items = document.getElementsByClassName('item');

      for (let i = 0; i < items.length; i++) {
        let title = items[i].getElementsByTagName('h3')[0].innerText.toLowerCase();
        if (title.indexOf(input) > -1) {
          items[i].style.display = '';  // Show item
        } else {
          items[i].style.display = 'none';  // Hide item
        }
      }
    }
  </script>
 </head>
 <body>

 <?php include('Header.php')?>

<!--
 <div class = "colps"> <details><summary>Building Filters</summary>

 <!-FILTERS->
 <form action="/action_page.php">

 <!-BUILDING FILTERS->
 <div class="filt">
 <select id="bldg" name="bldg" size="1">
 <option value="sel">Select a Building</option>
 <option value="Acad1">Academic Bldg. 1</option>
 <option value="Acad3">Academic Bldg. 3</option>
 <option value="ADMIN BLDG.">Admin Bldg.</option>
 <option value="HPSB">HPSB</option>
 </select>

 <!-LOCATION FILTERS->
 <select id="loc" name="loc" size="1">
 <option value="sel">Select a Location</option>
 <option value="oval">Oval</option>
 <option value="bsmnt">Basement</option>
 <option value="1st">1st Floor</option>
 <option value="2nd">2nd Floor</option>
 <option value="3rd">3rd Floor</option>
 <option value="4th">4th Floor</option>
 </select>

 <!-TIME FILTERS->
 <select id="time" name="time" size="1">
 <option value="sel">Select a Time</option>
 <option value="morning">Morning</option>
 <option value="afternoon">Afternoon</option>
 <option value="evening">Evening</option>
 </select>

 <!-DAY FILTERS->
 <input type="date" id="day" name="day">
</div>

 <br>
 <input type="submit" id="sub" value="Submit">
 </form>
 </details>
 </div>

  -->
<!--SEARCH BAR-->
 <div class="search-container">
    <input type="text" id="searchBar" onkeyup="searchItems()" placeholder="Search for items...">
    <img src="imgs/filter.png" alt="filter" class="fflt" onclick="openFilterPopup(this)"></img>

<!-- Popup -->
<div class="popupp">
</div>
<script>
  function openFilterPopup() {
    document.querySelector('.filter-popup').classList.add('active');
    document.querySelector('.popup-backdrop').classList.add('active');
  }

  function closeFilterPopup() {
    document.querySelector('.filter-popup').classList.remove('active');
    document.querySelector('.popup-backdrop').classList.remove('active');
  }

  // Optional: ESC to close filter popup
  document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") {
      closeFilterPopup();
    }
  });
</script>
  </div>
 <!-- items -->
 <div class = "dets">
 <div class = "left">
      <!-- <div class = "itemlists">
        
        <div class = "item" >
        <a href="p1.php"> <img
        src="https://i.pinimg.com/736x/28/37/32/2837325bceb62591347e8cd9bfed691a.jpg" alt =
        "lostitem"> </a>
        <h3>Bluetooth Wireless Earphones</h3>
        <p>Place Found at: Oval</p>
        <p>Time Found: 12:00 PM</p>
        </div>

        <div class = "item">
        <a href="p2.php">
        <img src="https://i.pinimg.com/736x/be/d7/aa/bed7aa9020b7adbe01940ec45001c203.jpg"
        alt = "lostitem"> </a>
        <h3>White Pouch</h3>
        <p>Place Found at: HPSB</p>
        <p>Time Found: 8:00 PM</p>
        </div>

        <div class = "item">
        <a href="p3.php">
        <img src="https://i.pinimg.com/736x/6b/8a/7a/6b8a7ac41f1983b87f0cb0c1a5bed8ba.jpg"
        alt = "lostitem"> </a>
        <h3>Cat Keychain</h3>
        <p>Place Found at: Academic Bldg. 3</p>
        <p>Time Found: 6:35 PM</p>
        </div>
    </div>
    <div class = "itemlists">
        <div class = "item">
        <a href="p4.php">
        <img src="https://i.pinimg.com/736x/4c/45/6b/4c456b0063475aa673b324a0766374ce.jpg"
        alt = "lostitem"> </a>
        <h3>Cat Bread Plushie</h3>
        <p>Place Found at: Admin Bldg.</p>
        <p>Time Found: 9:28 AM</p>
        </div>
 
        <div class = "item">
        <a href="p5.php">
        <img src="https://i.pinimg.com/736x/bb/9f/d2/bb9fd2eac3baec9bce6a6a25f725dc56.jpg" alt
        = "lostitem"> </a>
        <h3>Kuromi Headband</h3>
        <p>Place Found at: HPSB</p>
        <p>Time Found: 3:16 PM</p>
        </div>

        <div class = "item">
        <a href="p6.php">
        <img src="https://i.pinimg.com/736x/e2/8b/71/e28b71fb700889b1f6207fb3390ea3e7.jpg"
        alt = "lostitem"> </a>
        <h3>Black Hello Kitty Bag</h3>
        <p>Place Found at: Oval</p>
        <p>Time Found: 5:15 PM</p>
        </div>

    </div> --> 


 <div class="itemlists">
    <?php
   $conn = mysqli_connect("localhost","root","","lost_and_found");
 
    if (isset($_GET['filt']) || isset($_GET['time'])) {
      $query = "SELECT * FROM verified_items WHERE 1=1";
  
      // LOCATION FILTER
      if (isset($_GET['filt'])) {
          $filtchecked = $_GET['filt'];
          $locationNames = [];
          foreach ($filtchecked as $id) {
              $res = mysqli_query($conn, "SELECT filt FROM locfilter WHERE id = " . intval($id));
              if ($row = mysqli_fetch_assoc($res)) {
                  $locationNames[] = "'" . mysqli_real_escape_string($conn, $row['filt']) . "'";
              }
          }
          if (!empty($locationNames)) {
              $query .= " AND place_found IN (" . implode(",", $locationNames) . ")";
          }
      }
  
      // TIME FILTER
      if (isset($_GET['time'])) {
          $timechecked = $_GET['time'];
          $timeValues = [];
          foreach ($timechecked as $id) {
              $res = mysqli_query($conn, "SELECT time FROM timefilter WHERE id = " . intval($id));
              if ($row = mysqli_fetch_assoc($res)) {
                  $timeValues[] = "'" . mysqli_real_escape_string($conn, $row['time']) . "'";
              }
          }
          if (!empty($timeValues)) {
              $query .= " AND time_found IN (" . implode(",", $timeValues) . ")";
          }
      }
  
      // Run query and check for errors
      $items_run = mysqli_query($conn, $query);
      if (!$items_run) {
          echo "<div class='Empty'>Query Error: " . mysqli_error($conn) . "</div>";
      } elseif (mysqli_num_rows($items_run) > 0) {
          foreach ($items_run as $row) {
              echo '<div class="item">';
              echo '<a href="Verification.php?add=' . $row['id'] . '">';
              echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="lostitem">';
              echo '<h3>' . htmlspecialchars($row['item_name']) . '</h3>';
              echo '<p>Place Found at: ' . htmlspecialchars($row['place_found']) . '</p>';
              echo '<p>Time Found: ' . htmlspecialchars($row['time_found']) . '</p>';
              echo '</a>'; 
              echo '</div>';
          }
      } else {
          echo "<div class='Empty'>Nothing to verify</div>";
      }
  }else {
      // Default query if no filters applied
      $sql = "SELECT id ,image_path, item_name, place_found, time_found FROM verified_items";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="item">';
              echo '<a href="Verification.php?add=' . $row['id'] . '">';
              echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="lostitem">';
              echo '<div class="title"><b><h3>' . htmlspecialchars($row['item_name']) . '</div></b></h3>';
              echo '<b><p>Place Found: ' . htmlspecialchars($row['place_found']) . '</b></p>';
              echo '<b><p>Time Found: ' . htmlspecialchars($row['time_found']) . '</b></p>';
              echo '</a>'; 
              echo '</div>';
          }
      }
  }
    $conn->close();
    ?>
    
</div>
  </div>
<div class = "right">
  <form action = "" method = "GET">
<fieldset class="sidebarr">
    <legend>Filter Items</legend>
    <?php
      $con = mysqli_connect("localhost","root","","lost_and_found");
      $fil_query = "SELECT * FROM locfilter";
      $fil_query_run = mysqli_query($con, $fil_query);
      $timefil_query = "SELECT * FROM timefilter";
      $timefil_query_run = mysqli_query($con, $timefil_query);

      echo "<div class ='HeadFilt'><h1>Locations</h1></div>";

      if(mysqli_num_rows($fil_query_run) > 0)
      {
        foreach($fil_query_run as $fillist)
        {
          $checked = [];
          if(isset($_GET['filt'])) 
          {
             $checked = $_GET['filt'];
          }
          ?>
              <div class = "filt">
                <br>
                <input type= "checkbox" name= "filt[]" value="<?= $fillist['id']; ?>" 
                  <?php if(in_array($fillist['id'],$checked)){ echo "checked"; } ?>
                /> 
                <?= $fillist['filt']; ?>
        </div>
        <?php
        }
        } echo "<div class='HeadFilt'><h1>Time</h1></div>";
        if(mysqli_num_rows($timefil_query_run) > 0)
      {
        foreach($timefil_query_run as $timelist)
        {
          $checked = [];
          if(isset($_GET['time'])) 
          {
             $checked = $_GET['time'];
          }
          ?>
              <div class = "filt">
                <br>
                <input type= "checkbox" name= "time[]" value="<?= $timelist['id']; ?>" 
                  <?php if(in_array($timelist['id'], $checked)){ echo "checked"; } ?>
                /> 
                <?= $timelist['time']; ?>
        </div>
        <?php
      }
    }

      
      else
      {
        echo "No Filters Found";
      }
    ?>
    <br><br>
    <div class="btn-container">
    <button type ="submit" class="btn">Apply</button>
    </div>
  </fieldset>
</div>
  </div>
</form>

<!-- Right Sidebar Filter (Make this a popup) -->
<div class="filter-popup">
  <div class="popup-content">
    <button class="close-btn" onclick="closeFilterPopup()">X</button>
    <form action="" method="GET">
      <fieldset class="sidebarr">
        <legend>Filter Items</legend>

        <?php
      $con = mysqli_connect("localhost","root","","lost_and_found");
      $fil_query = "SELECT * FROM locfilter";
      $fil_query_run = mysqli_query($con, $fil_query);
      $timefil_query = "SELECT * FROM timefilter";
      $timefil_query_run = mysqli_query($con, $timefil_query);

      echo "<div class ='HeadFilt'><h1>Locations</h1></div>";

      if(mysqli_num_rows($fil_query_run) > 0)
      {
        foreach($fil_query_run as $fillist)
        {
          $checked = [];
          if(isset($_GET['filt'])) 
          {
             $checked = $_GET['filt'];
          }
          ?>
              <div class = "filt">
                <br>
                <input type= "checkbox" name= "filt[]" value="<?= $fillist['id']; ?>" 
                  <?php if(in_array($fillist['id'],$checked)){ echo "checked"; } ?>
                /> 
                <?= $fillist['filt']; ?>
        </div>
        <?php
        }
        } echo "<div class='HeadFilt'><h1>Time</h1></div>";
        if(mysqli_num_rows($timefil_query_run) > 0)
      {
        foreach($timefil_query_run as $timelist)
        {
          $checked = [];
          if(isset($_GET['time'])) 
          {
             $checked = $_GET['time'];
          }
          ?>
              <div class = "filt">
                <br>
                <input type= "checkbox" name= "time[]" value="<?= $timelist['id']; ?>" 
                  <?php if(in_array($timelist['id'], $checked)){ echo "checked"; } ?>
                /> 
                <?= $timelist['time']; ?>
        </div>
        <?php
      }
    }

      
      else
      {
        echo "No Filters Found";
      }
    ?>
    <br><br>

        <div class="btn-container">
          <button type="submit" class="btn">Apply</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<div class="popup-backdrop" onclick="closeFilterPopup()"></div>




 <!-- <div class = "bar-center">
 <div class = "bar-page">
 <a href = "p1.php"><p> 1 </p></a>
 <a href = "p2.php"><p> 2 </p></a>
 <a href = "p3.php"><p> 3 </p></a>
 <a href = "p4.php"><p> 4 </p></a>
 <a href = "p5.php"><p> 5 </p></a>
 </div>
 </div>
  -->
  <?php include('Footer.php')?>
 </body>
 </html>