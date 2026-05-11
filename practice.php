<!DOCTYPE html>
<html>
<head>
    <style>
        /* Blurred background */
        .backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
            z-index: 100;
            pointer-events: none;
        }

        .backdrop.active {
            opacity: 1;
            visibility: visible;
            pointer-events: all;
        }

        /* Popup styling */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            z-index: 101;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            min-width: 300px;
        }

        .popup.active {
            opacity: 1;
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
        }

        /* Close button */
        .CB {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-weight: bold;
            background: none;
            border: none;
            font-size: 1.2em;
        }

        /* Trigger buttons */
        .content-btn {
            margin: 10px;
            padding: 10px 20px;
            cursor: pointer;
            position: relative;
            top: 100px;
        }
    </style>
</head>
<body>
    <button class="content-btn" data-title="First Popup" data-content="Content from button 1" onclick="openPopup(this)">
        Button 1
    </button>
    <button class="content-btn" data-title="Second Popup" data-content="Different content from button 2" onclick="openPopup(this)">
        Button 2
    </button>

    <!-- Blurred Background -->
    <div class="backdrop" onclick="closePopup()"></div>

    <!-- Popup -->
    <div class="popup">
        <button class="CB" onclick="closePopup()">CB</button>
        <h2 id="popup-title"></h2>
        <p id="popup-content"></p>
    </div>
    
    <script>
        function openPopup(btn) {
            // Get data attributes
            const title = btn.getAttribute('data-title');
            const content = btn.getAttribute('data-content');
            
            // Update popup content
            document.getElementById('popup-title').textContent = title;
            document.getElementById('popup-content').textContent = content;
            
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
</body>
</html>