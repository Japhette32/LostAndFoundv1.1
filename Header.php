<!DOCTYPE html>
 <html>
 <head>
 <title>LOAF Website</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="headers.css?v=2">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 </head>
 <body>

 <div class="navbar">

  <div class="logo">
        <img src="semajs navbar logo\Untitled1_20250216124439.png" alt="OHSO LOGO">
        <img src="semajs navbar logo\474624537_9423890574297549_3931946910166465960_n-removebg-preview.png" alt="FOUND IT LOGO">
        </div>

    
 <!--<div class="dropdown">-->
    
    <!-- <div class="dropdown-content"> 
        <a href="#aboot">About LOAF</a>
        <a href="#uhsu">About OHSO</a>
    </div>-->
<!-- </div> -->

  <div class = "sidebar">    
    <a href="#" onclick=hideSidebar()><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e3e3e3"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
    <a href="index.php" class="dropbtn"><strong>HOME PAGE</strong></a>
    <a href="itemlist1.php"><strong>LOST ITEMS</strong></a>
    <a href="upload.php"><strong>UPLOAD</strong></a>
</div>
    <a href="#" onclick=showSidebar()><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e3e3e3"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
</div>
<script>
  function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
  }
    function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
  }
  </script>