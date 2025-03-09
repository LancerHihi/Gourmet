<?php
  // Connect to DB
  $conn = mysqli_connect('localhost', 'thanh', 'bavui4444', 'GOURMET');

  if (!$conn) {
    die('Connection error: ' . mysqli_connect_error());
  }

  // Default sorting
  $sort_option = isset($_GET['sort']) ? $_GET['sort'] : 'latest';
  $order_by = '';

  switch ($sort_option) {
    case 'a-z':
      $order_by = 'Postname ASC';
      break;
    case 'z-a':
      $order_by = 'Postname DESC';
      break;
    case 'latest':
      $order_by = 'Post_datetime DESC';
      break;
    case 'oldest':
      $order_by = 'Post_datetime ASC';
      break;
    default:
      $order_by = 'Post_datetime DESC';
  }

  // Pagination setup
  $items_per_page = 12;
  $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $offset = ($current_page - 1) * $items_per_page;

  // Query with sorting and pagination
  $sql = "SELECT * 
          FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID 
          ORDER BY $order_by 
          LIMIT $items_per_page OFFSET $offset";
  $result = mysqli_query($conn, $sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  // Get total items count
  $count_sql = "SELECT COUNT(*) as total FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID";
  $count_result = mysqli_query($conn, $count_sql);
  $total_items = mysqli_fetch_assoc($count_result)['total'];
  mysqli_free_result($count_result);

  $total_pages = ceil($total_items / $items_per_page);
  mysqli_close($conn);
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
  <!-- <style>
    .pagination {
      text-align: center;
      margin-top: 20px;
    }
    .pagination a {
      margin: 0 5px;
      padding: 8px 12px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }
    .pagination a.active {
      background-color: #0056b3;
    }
  </style> -->
</head>
<body>
<header>
    <nav class="nav" style="padding: 0 200px;">
      <i class="fa-solid fa-bars navOpenBtn"></i>
      
      <a href="#" class="logo" id = "logo-img"> <img src="../image/output.jpg" alt=""> Gourmet</a>
      <ul class="nav-links">
        <i class="fa-solid fa-circle-xmark navCloseBtn"></i>
        <li><a href="#">Home</a></li>
        <li><a href="#">Restaurants</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Suggests</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Sign in</a></li>
      </ul>
      <i class="fa-solid fa-magnifying-glass search-icon" id = "searchIcon"></i>
      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <input type="text" placeholder="Search here..." name="" id="">
      </div>
    </nav>
  </header>

 <div class="filter-options" style="padding: 0 200px; font-size: 1.5rem;">
    <label for="sort">Sort by: </label>
    <select id="sort" onchange="applySort()" style="font-size: 1.2rem; width: 8rem; height: max-content; padding: 0.5rem 0rem; text-align: center;margin-left: 1rem;">
      <option value="latest" <?= $sort_option == 'latest' ? 'selected' : '' ?>>Latest</option>
      <option value="oldest" <?= $sort_option == 'oldest' ? 'selected' : '' ?>>Oldest</option>
      <option value="a-z" <?= $sort_option == 'a-z' ? 'selected' : '' ?>>A to Z</option>
      <option value="z-a" <?= $sort_option == 'z-a' ? 'selected' : '' ?>>Z to A</option>
    </select>
  </div>

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

  <div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <a href="index.php?page=posts/<?= $i ?>&sort=<?= $sort_option ?>" class="<?= ($i == $current_page) ? 'active' : '' ?>"> <?= $i ?> </a>
    <?php endfor; ?>
  </div>

  <footer>
    <p>&copy; 2025 My Website. All Rights Reserved.</p>
  </footer>

  <script>
    function applySort() {
      let sortValue = document.getElementById('sort').value;
      let urlParams = new URLSearchParams(window.location.search);
      urlParams.set('sort', sortValue);
      urlParams.set('page', 'posts/1'); // Reset to first page when sorting
      console.log(urlParams.toString());
      window.location.search = urlParams.toString();
    }
  </script>
</body>
</html>
