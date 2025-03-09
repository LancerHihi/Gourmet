<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/index.css">
  <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script>

  <title>Home</title>
</head>
<body>
  <header>
    <nav>
      <div class="navbar">
        <div class="logo">
          <img src="image/output.jpg" alt="" class="logo_img" />
          <a href="#">Gourmet</a>
        </div>
        <ul class="links">
          <li><a href="index.php" class="">Home</a></li>
          <li><a href="#" class="">About</a></li>
          <li><a href="index.php?page=posts" class="">Posts</a></li>
          <li><a href="#" class="">Contact</a></li>
        </ul>
        <a href="#" class="action_btn">Sign in</a>
        <div class="toggle_btn">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
      <div class="dropdown_menu">
          <li><a href="#" class="">Home</a></li>
          <li><a href="#" class="">About</a></li>
          <li><a href="/Lab_web/pages/services3.php" class="">Services</a></li>
          <li><a href="#" class="">Contact</a></li>
          <li><a href="#" class="action_btn">Sign in</a></li>
      </div>
    </nav>
  </header>

  <main>
    <div class="content">
      <section id="hero">
        <h1>Welcome</h1>
        <div class="text-content">
          <p>
            
          </p>
        </div>

      </section>
    </div>
    
  </main>

  <footer>
    <p>&copy; 2025 My Website. All Rights Reserved.</p>
  </footer>

  <script>
    const toggleBtn = document.querySelector('.toggle_btn');
    const toggleBtnIcon = document.querySelector('.toggle_btn i')
    const dropdownMenu = document.querySelector('.dropdown_menu')

    toggleBtn.onclick = function() {
      dropdownMenu.classList.toggle('open')
      const isOpen = dropdownMenu.classList.contains('open')

      toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'
    }
  </script>
</body>
</html>
