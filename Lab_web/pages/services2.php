<?php
  // connect to DB
  $conn = mysqli_connect('localhost','thanh','bavui4444','GOURMET');

  // if (mysqli_connect_errno()) 
  if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
  }

  // write query for all data rows
  // $sql = 'SELECT * FROM Post ORDER BY Post_datetime DESC';
  $sql = 'SELECT * 
  FROM Post JOIN Restaurent 
  ON Post.Restaurent_ID = Restaurent.ID
  ORDER BY Post.Post_datetime DESC';

  // make query & get result
  $result = mysqli_query($conn,$sql);

  // fetch the resulting rows as an array
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free result from memory
  mysqli_free_result($result);

  // close connection
  mysqli_close($conn);

  // print_r($posts);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/services2.css">
  <link rel="stylesheet" href="../style/cards.css">
  <!-- <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../script/services2.js" defer></script>
  <title>Services</title>
</head>
<body>

  <header>
    <nav class="nav">
      <i class="fa-solid fa-bars navOpenBtn"></i>
      
      <a href="#" class="logo" id = "logo-img"> <img src="../image/output.jpg" alt=""> Gourmet</a>
      <ul class="nav-links">
        <i class="fa-solid fa-circle-xmark navCloseBtn"></i>
        <li><a href="#">Home</a></li>
        <li><a href="#">Restaurants</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Suggests</a></li>
        <li><a href="#">Help</a></li>
      </ul>
      <i class="fa-solid fa-magnifying-glass search-icon" id = "searchIcon"></i>
      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <input type="text" placeholder="Search here..." name="" id="">
      </div>
    </nav>
  </header>

  <main>
    <div class="cards">
      <h1>Responsice Cards CSS</h1>
      <div class="services" style="display: flex; flex-wrap: wrap; width:100vh;margin:0; align-items:center;justify-content:center;">
      <!-- <div class="services"> -->
        <?php foreach ($posts as $post){ ?>
          <div class="content content-1" style = "height: 30rem; width: 80rem;">
            <div class="fa-solid fa-bowl-food"></i>"></div>
            <!-- <div class="fa-solid fa-bowl-food"></div> -->
            <h2>
              <!-- Name of Restaurants -->
              <?php echo $post['Postname']; ?>
              
            </h2>
            <p id = "type_res">
              <!-- Type: Fine dining -->
              <?php echo $post['Restaurent_type']; ?>
            </p>
            <p id = "price">
              <!-- Price: 100,000$ - 300,000$ -->
              <?php echo $post['Restaurent_type']; ?>
            </p>
            <p id = "location_res">
              <!-- Location: District 8 -->
              <?php echo $post['Location']; ?>
            </p>
            <p id = "rating">
              <!-- Rating: 5* -->
              <?php echo $post['Rating']; ?>

            </p>
            <p id = "brief">
              <!-- Brief: This restaurant has ... -->
              <?php echo $post['Description']; ?>
            </p>
            <!-- End loop at here -->

            <a href="#">Read More</a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 My Website. All Rights Reserved.</p>
  </footer>

</body>
</html>

<!-- <php echo '<img src="data:image/jpeg;base64,' . base64_encode($post['Image']) . '" alt="Post Image" />' ?>; -->

<!-- <div class="content content-2">
          <div class="fa-solid fa-bowl-food"></i>"></div>
          <h2>Name of Restaurants</h2>
          <p id = "type_res">
            Type: Fine dining
          </p>
          <p id = "price">
            Price: 100,000$ - 300,000$
          </p>
          <p id = "location_res">
            Location: District 8
          </p>
          <p id = "rating">
            Rating: 5*
          </p>
          <p id = "brief">
            Brief: This restaurant has ...
          </p>          <a href="#">Read More</a>
        </div>

        <div class="content content-3">
          <div class="fa-solid fa-bowl-food"></i>"></div>
          <h2>Name of Restaurants</h2>
          <p id = "type_res">
            Type: Fine dining
          </p>
          <p id = "price">
            Price: 100,000$ - 300,000$
          </p>
          <p id = "location_res">
            Location: District 8
          </p>
          <p id = "rating">
            Rating: 5*
          </p>
          <p id = "brief">
            Brief: This restaurant has ...
          </p>          <a href="#">Read More</a>
        </div> -->
