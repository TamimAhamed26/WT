<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>
<body>
    <div align="right">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo '<a href="user_dashboard.php">Back</a>';
        } else {
            echo '<a href="login.php">Back</a>';
        }
        ?>
    </div>
    <select id="languageSelect">
        <option value="en">English</option>
        <option value="bn">Bangla</option>
    </select>
    <div class="header-text">
        <p class="welcomeMessage"></p>
    </div>
    <script>
        window.onload = function() {
            var languageSelect = document.getElementById('languageSelect');
            var welcomeMessage = document.querySelector('.welcomeMessage');

      
            loadLanguageContent('en', welcomeMessage);

            languageSelect.addEventListener('change', function() {
                var selectedLanguage = this.value;
                loadLanguageContent(selectedLanguage, welcomeMessage);
            });
        }

        function loadLanguageContent(language, element) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../JS/about_us_' + language + '.json', true);
            xhr.onload = function() {
                if (this.status == 200) {
                    var languageData = JSON.parse(this.responseText);
                    element.textContent = languageData.welcomeMessage;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>