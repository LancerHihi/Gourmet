<?php
define('BASE_URL', '/Lab_web//'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="/Lab_web/style/services2.css"> -->
  <!-- <link rel="stylesheet" href="/Lab_web/style/cards.css"> -->
  <!-- <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="/Lab_web/script/services2.js" defer></script> -->

  <title>Whyyy</title>
</head>
<body>
<?php
// index.php - Main Entry Point

// Get the requested page from the URL, default to 'home'
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        require_once __DIR__ . '/pages/home.php';
        break;
    case 'posts':
        require_once __DIR__ . '/pages/posts.php';
        break;
    default:
        echo "404 Page Not Found";
        break;
}
?>
</body>
</html>

