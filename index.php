<!DOCTYPE html>
 <html>
 <head>
 <title>LOAF Website</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
 <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 <link rel="stylesheet" href="hatdognabout.css?v=2">
</head>
 <body>

<?php include('Header.php')?>

<!--<div class="campus-image">
<div class="campus-image-button">
    <button class="overlay-button"><a href="itemlist1.php">Find it!</a></button>
    
</div>
</div>
-->
<div id="carouselStart" class="carousel slide carousel">
  <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img src="imgs/FrontImage.jpg" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item c-item position-relative">
  <img src="imgs/FrontImage2.jpg" class="d-block w-100 c-img" alt="...">
  <video class="carousel-video" controls>
    <source src="tralalero tralala.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselStart" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselStart" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="About">

<div class="ABBTBTN" abt-title="About" abt-content="Our vision is to cultivate the students to driven transparent system that values responsibility and trust, ensuring every lost item is returned to its rightful owner with speed security and simplicity. Through continuous innovation we aspire to lead a new era of efficient accessible, and sustainable solutions for the campus community." onclick="openPopupped(this)">
  <button> Vision </button>
</div>
  <div class="ABBTBTN" abt-title="About" abt-content="Our mission is to transform the lost and found experience by providing a smart, digital platform that simplifies the process of reporting, tracking, and recovering lost items. By prioritizing efficiency, accessibility, and transparency, we aim to create a reliable system that fosters responsibility and community engagement at the University of Makati. Through innovation and technology, we strive to ensure that lost belongings are quickly and securely returned to their rightful owners." onclick="openPopupped(this)">
  <button> Mission </button>
</div>
<div class="ABBTBTN" abt-title="About" abt-content="About the Lost and Found Website
                This website was made by the G12-01 CPG students: Jasper James Docado, Willheime MarieJune Guillermo, Erich Daler Custodio, and Christopher Joseph Musa.
                The primary purpose of the Lost and Found Site is to provide an efficient and organized system for managing and retrieving students' lost items. By streamlining the process, the site aims to ensure that misplaced belongings can be quickly and easily reunited with their rightful owners. Additionally, it seeks to minimize the accumulation of unclaimed items in the university’s lost and found area, reducing clutter and ensuring a more orderly environment. This initiative not only enhances the university's ability to support its students but also promotes a sense of security and responsibility within the campus community, fostering a culture of care and mutual respect.
                " abtt-content='"What’s lost isn’t gone—it’s waiting to be found"' onclick="openPopupped(this)">
  <button> About </button>
</div>
        <div class="AbBtn">
            <details>
                <summary>About</summary>
                <p>About the Lost and Found Website<br><br>
                This website was made by the G12-01 CPG students: Jasper James Docado, Willheime MarieJune Guillermo, Erich Daler Custodio, and Christopher Joseph Musa.<br><br>
                The primary purpose of the Lost and Found Site is to provide an efficient and organized system for managing and retrieving students' lost items. By streamlining the process, the site aims to ensure that misplaced belongings can be quickly and easily reunited with their rightful owners. Additionally, it seeks to minimize the accumulation of unclaimed items in the university’s lost and found area, reducing clutter and ensuring a more orderly environment. This initiative not only enhances the university's ability to support its students but also promotes a sense of security and responsibility within the campus community, fostering a culture of care and mutual respect.<br><br>
                <b>"What’s lost isn’t gone—it’s waiting to be found."</b></p>
            </details>
        </div>

        <div class="AbBtn">
            <details>
                <summary>Vision</summary>
                <p>Our vision is to cultivate the students to driven transparent system that values responsibility and trust, ensuring every lost item is returned to its rightful owner with speed security and simplicity. Through continuous innovation we aspire to lead a new era of efficient accessible, and sustainable solutions for the campus community.</p>
            </details>
        </div>

        <div class="AbBtn">
            <details>
                <summary>Mission</summary>
                <p>Our mission is to transform the lost and found experience by providing a smart, digital platform that simplifies the process of reporting, tracking, and recovering lost items. By prioritizing efficiency, accessibility, and transparency, we aim to create a reliable system that fosters responsibility and community engagement at the University of Makati. Through innovation and technology, we strive to ensure that lost belongings are quickly and securely returned to their rightful owners.</p>
            </details>
        </div>
    </div>
    
    
    <!-- Blurred Background -->
    <div class="backdropp" onclick="closePopupped()"></div>

    <!-- Popup -->
    <div class="popupp">
    <button class="CB" onclick="closePopupped()">X</button>
    <h2 id="popupp-title"></h2>
    <p id="popupp-content"></p>
    <b id="popuppp-content"></b>
</div>
    <script>
        function openPopupped(btn) {
            // Get data attributes
            const abttitle = btn.getAttribute('abt-title');
            const abtcontent = btn.getAttribute('abt-content');
            const abttcontent = btn.getAttribute('abtt-content');
            
            // Update popup content
            document.getElementById('popupp-title').textContent = abttitle;
            document.getElementById('popupp-content').textContent = abtcontent;
            document.getElementById('popuppp-content').textContent = abttcontent;
            
            // Show elements
            document.querySelector('.backdropp').classList.add('active');
            document.querySelector('.popupp').classList.add('active');
        }

        function closePopupped() {
            document.querySelector('.backdropp').classList.remove('active');
            document.querySelector('.popupp').classList.remove('active');
        }

        // ESC key listener
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closePopupped();
        });
    </script>
    
 <!-- Carousel -->
 <div class = "section">
  <h1 id = "rturned" > Recently Returned Items </h1>
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/7b/75/3a/7b753a376b78e1c5e6575cadd5ff8ecb.jpg" alt="lostitem"></div>
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/e5/6c/e0/e56ce08e54cd80a35f0bae685cdf50b5.jpg" alt="lostitem"></div>
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/6b/8a/7a/6b8a7ac41f1983b87f0cb0c1a5bed8ba.jpg" alt="lostitem"></div>
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/a4/a1/3e/a4a13e8393240509e8a88f708f7ffbbd.jpg" alt="lostitem"></div>
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/e2/8b/71/e28b71fb700889b1f6207fb3390ea3e7.jpg" alt="lostitem"></div>
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/65/7b/2f/657b2fa4aae07dc3820839e787782405.jpg" alt="lostitem"></div>
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/c7/1e/0f/c71e0fa855ab96cc001fe7514ba9a4dd.jpg" alt="lostitem"></div>
    <div class="swiper-slide"><img src="https://i.pinimg.com/736x/2f/ab/4e/2fab4e10c9979b64d3dc3462687678f0.jpg" alt="lostitem"></div>
  </div>
</div>
</div>

<script>
 document.addEventListener('DOMContentLoaded', function() {
  var swiper = new Swiper(".swiper-container", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    effect: "coverflow",
    centeredSlides: true,
    initialSlide: 1,
    speed: 600,
    preventClicks: true,
    coverflowEffect: {
      rotate: 10,
      stretch: 80,
      depth: 250,
      modifier: 1,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 50
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 10
      }
    }
  });
});
</script> 

 <!-- Where to Find Us Section-->
<div class="CampusImage">
    <i class="fa-solid fa-location-dot HPSB-btn" data-title="HPSB BUILDING" data-content="Greetings Herons! Have you lost or found something in this area?" data-image="imgs/hpsb.jpg" onclick="openPopup(this)">
    </i>
    <i class="fa-solid fa-location-dot ADMIN-btn" data-title="ADMIN BUILDING" data-content="Greetings Herons! Have you lost or found something in this area?" data-image="imgs/admin.jpg" onclick="openPopup(this)"> 
    </i>
    <i class="fa-solid fa-location-dot B3-btn" data-title="BUILDING 3" data-content="Greetings Herons! Have you lost or found something in this area?" data-image="imgs/acadbldg3.jpg" onclick="openPopup(this)">
    </i>
    <i class="fa-solid fa-location-dot B1-btn" data-title="BUILDING 1" data-content="Greetings Herons! Have you lost or found something in this area?" data-image="imgs/acadbldg1.jpg" onclick="openPopup(this)">
    </i>
    <i class="fa-solid fa-location-dot STADIUM-btn" data-title="STADIUM" data-content="Greetings Herons! Have you lost or found something in this area?" data-image="imgs/stadium.jpg" onclick="openPopup(this)">
    </i>
    <i class="fa-solid fa-location-dot BW-btn" data-title="BRIDGE WAY" data-content="Greetings Herons! Have you lost or found something in this area?" data-image="imgs/bridgeway.jpeg" onclick="openPopup(this)">
    </i>
    <i class="fa-solid fa-location-dot B2-btn" data-title="BUILDING 2" data-content="Greetings Herons! Have you lost or found something in this area?" data-image="imgs/acadbldg2.jpg" onclick="openPopup(this)">
    </i>
    <!-- Blurred Background -->
    <div class="backdrop" onclick="closePopup()"></div>

    <!-- Popup -->
    <div class="popup">
        <button class="CB" onclick="closePopup()">X</button>
        <button class="OB" onclick="closePopup()"><a href="upload.php">Found it?</a></button>
        <button class="IB" onclick="closePopup()"><a href="itemlist1.php">Find it?</a></button>
        <h2 id="popup-title"></h2>
        <img id="popup-image" class="popup-image">
        <p id="popup-content"></p>
    </div>
    <script>
        function openPopup(btn) {
            // Get data attributes  
            const title = btn.getAttribute('data-title');
            const content = btn.getAttribute('data-content');
            const image = btn.dataset.image;
            
            // Update popup content
            document.getElementById('popup-title').textContent = title;
            document.getElementById('popup-content').textContent = content;
            
            const popupImage = document.getElementById('popup-image');
    if (image) {
        popupImage.src = image;
        popupImage.style.display = 'block';
    } else {
        popupImage.style.display = 'none';
    }
            // Show elements
            document.querySelector('.backdrop').classList.add('active');
            document.querySelector('.popup').classList.add('active');
        }

        function closePopup() {
            document.querySelector('.backdrop').classList.remove('active');
            document.querySelector('.popup').classList.remove('active');
        }

        // ESC key listener
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closePopup();
        });
    </script>
<!--
 <div class="HPSB-Button">
    <button class="overlay-button"><a href="hpsb.php">.</a></button>
</div>
<div class="ADMIN-Button">
    <button class="overlay-button"><a href="ADMIN.php">.</a></button>
</div>
<div class="B1-Button">
    <button class="overlay-button"><a href="B1.php">.</a></button>
</div>
<div class="B3-Button">
    <button class="overlay-button"><a href="B3.php">.</a></button>
</div>
<div class="BW-Button">
    <button class="overlay-button"><a href="BW.php">.</a></button>
</div>
<div class="B2-Button">
    <button class="overlay-button"><a href="B2.php">.</a></button>
</div>
<div class="STADIUM-Button">
    <button class="overlay-button"><a href="STADIUM.php">.</a></button>
</div>
-->
</div>
 <!-- About Section-->

 <?php include('Footer.php')?>
 
 </body>
 </html>