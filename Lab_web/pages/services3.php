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
  <title>Services 3</title>
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
      <div class="services">
        <?php foreach ($posts as $post){ ?>
          <div class="content content-1">
            <div class="fa-solid">
              <!-- <img src="../image/home1.jpg" alt=""> -->
              <img src="data:image/jpeg;base64,<?php echo base64_encode($post['Image']); ?>" />
            </div>
            <h2>
              <?php echo $post['Postname']; ?>
            </h2>
            <p id = "type_res">
              <?php echo 'Type: ' . $post['Restaurent_type']; ?>
            </p>
            <p id = "price">
              <?php echo 'Price: $' . $post['Price']; ?>
            </p>
            <p id = "location_res">
              <?php echo 'Location: ' . $post['Location']; ?>
            </p>
            <p id = "rating">
              <?php echo 'Rating: ' . $post['Rating']; ?>
            </p>
            <p id = "brief">
              <!-- <php echo $post['Description']; ?>             -->
              <?php 
                $max_length=19;
                $description = $post['Description'];
                echo  (strlen($description) > $max_length) ? 'Description: ' . substr($description, 0, $max_length) . "..." : 'Description: ' . $description;
                // echo strlen($post['Description']); 
              ?>
            </p>
            <a href="#">Read More</a>
          </div>
        <?php } ?>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 My Website. All Rights Reserved.</p>
  </footer>

</body>
</html>
