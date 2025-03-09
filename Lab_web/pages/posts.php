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
      $order_by = 'Post.Post_datetime DESC';
      break;
    case 'oldest':
      $order_by = 'Post.Post_datetime ASC';
      break;
    case 'price':
      $order_by = 'Price ASC';
      break;
    case 'rating':
      $order_by = 'Rating DESC';
      break;
    default:
      $order_by = 'Post.Post_datetime DESC';
  }

  // Pagination setup
  $items_per_page = 12;
  $current_page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
  if ($current_page < 1) $current_page = 1;
  $offset = ($current_page - 1) * $items_per_page;

  // Query with sorting and pagination
  $sql = "SELECT * FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID ORDER BY $order_by LIMIT $items_per_page OFFSET $offset";
  $result = mysqli_query($conn, $sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  // Get total number of posts for pagination
  $count_sql = "SELECT COUNT(*) AS total FROM Post";
  $count_result = mysqli_query($conn, $count_sql);
  $total_items = mysqli_fetch_assoc($count_result)['total'];
  $total_pages = ceil($total_items / $items_per_page);
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL ?>style/services2.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>style/cards.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>style/filter.css">
  <!-- <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?= BASE_URL ?>script/services2.js" defer></script>
  <title>Posts</title>
  <style>
    .page-link{
      color: black;
      padding: .5rem 1rem;
      margin: 0rem 1rem;
    }  
    .pagination{
      display: flex;
    align-items: center;
    justify-content: center;
    text-align: center; 
    margin: 20px;
    font-size: 1.5rem;
    max-width: 15rem;
    width: fit-content;
    min-width: 5rem;
    }
  </style>
</head>
<body>

<header>
    <nav class="nav">
      <i class="fa-solid fa-bars navOpenBtn"></i>
      <a href="#" class="logo" id="logo-img"> <img src="<?= BASE_URL ?>/image/output.jpg" alt=""> Gourmet</a>
      <ul class="nav-links">
        <i class="fa-solid fa-circle-xmark navCloseBtn"></i>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=posts">Posts</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Suggests</a></li>
        <li><a href="#">Help</a></li>
      </ul>
      <i class="fa-solid fa-magnifying-glass search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <input type="text" placeholder="Search here...">
      </div>
    </nav>
  </header>

  <main>
    <div class="filter">
    <div class="filter-columns" >
        <label for="sort">Sort by: </label>
        <select id="sort" onchange="applySort()" style="font-size: 1.2rem; width: 8rem; height: max-content; padding: 0.5rem 0rem; text-align: center;margin-left: 1rem;">
          <option value="latest" <?= $sort_option == 'latest' ? 'selected' : '' ?>>Latest</option>
          <option value="oldest" <?= $sort_option == 'oldest' ? 'selected' : '' ?>>Oldest</option>
          <option value="a-z" <?= $sort_option == 'a-z' ? 'selected' : '' ?>>A to Z</option>
          <option value="z-a" <?= $sort_option == 'z-a' ? 'selected' : '' ?>>Z to A</option>
          <option value="price" <?= $sort_option == 'price' ? 'selected' : '' ?>>Price</option>
          <option value="rating" <?= $sort_option == 'rating' ? 'selected' : '' ?>>Rating</option>
        </select>
      </div>
      <div class="filter-options" >
        <label for="sort">Sort by: </label>
        <select id="sort" onchange="applySort()" style="font-size: 1.2rem; width: 8rem; height: max-content; padding: 0.5rem 0rem; text-align: center;margin-left: 1rem;">
          <option value="latest" <?= $sort_option == 'latest' ? 'selected' : '' ?>>Latest</option>
          <option value="oldest" <?= $sort_option == 'oldest' ? 'selected' : '' ?>>Oldest</option>
          <option value="a-z" <?= $sort_option == 'a-z' ? 'selected' : '' ?>>A to Z</option>
          <option value="z-a" <?= $sort_option == 'z-a' ? 'selected' : '' ?>>Z to A</option>
          <option value="price" <?= $sort_option == 'price' ? 'selected' : '' ?>>Price</option>
          <option value="rating" <?= $sort_option == 'rating' ? 'selected' : '' ?>>Rating</option>
        </select>
      </div>
    </div>
  
  <div class="cards">
    <div class="services">
      <?php foreach ($posts as $post) { ?>
        <div class="content content-1">
          <div class="fa-solid">
          <img src="<?= htmlspecialchars($post['Image']); ?>" alt="" />
          </div>
          <h2><?= htmlspecialchars($post['Postname']); ?></h2>
          <p id="type_res">Type: <?= htmlspecialchars($post['Restaurent_type']); ?></p>
          <p id="price">Price: $<?= htmlspecialchars($post['Price']); ?></p>
          <p id="location_res">Location: <?= htmlspecialchars($post['Location']); ?></p>
          <p id="rating">Rating: <?= htmlspecialchars($post['Rating']); ?></p>
          <p id="brief">Description: <?= strlen($post['Description']) > 19 ? substr($post['Description'], 0, 19) . '...' : $post['Description']; ?></p>
          <a href="#">Read More</a>
        </div>
      <?php } ?>
    </div>
  </div>

  <div style="display: flex; justify-content: center; align-items: center;">
  <div class="pagination">
    <?php if ($total_pages > 1) { ?>
      
      <!-- Previous Button -->
      <?php if ($current_page > 1) { ?>
        <a href="index.php?page=posts&sort=<?= $sort_option; ?>&p=<?= $current_page - 1; ?>" class="page-link">Previous</a>
      <?php } ?>

      <!-- Previous Page (if exists) -->
      <?php if ($current_page > 1) { ?>
        <a href="index.php?page=posts&sort=<?= $sort_option; ?>&p=<?= $current_page - 1; ?>" class="page-link"><?= $current_page - 1; ?></a>
      <?php } ?>

      <!-- Current Page -->
      <a href="index.php?page=posts&sort=<?= $sort_option; ?>&p=<?= $current_page; ?>" class="page-link active"><?= $current_page; ?></a>

      <!-- Next Page (if exists) -->
      <?php if ($current_page < $total_pages) { ?>
        <a href="index.php?page=posts&sort=<?= $sort_option; ?>&p=<?= $current_page + 1; ?>" class="page-link"><?= $current_page + 1; ?></a>
      <?php } ?>

      <!-- Next Button -->
      <?php if ($current_page < $total_pages) { ?>
        <a href="index.php?page=posts&sort=<?= $sort_option; ?>&p=<?= $current_page + 1; ?>" class="page-link">Next</a>
      <?php } ?>

    <?php } ?>
  </div>
</div>

<style>
  .pagination {
    gap: 8px;
  }
  .page-link {
    padding: 10px;
    text-decoration: none;
    background: #ddd;
    border-radius: 5px;
    transition: background 0.3s;
  }
  .page-link.active {
    background: #4CAF50;
    color: white;
    font-weight: bold;
  }
  .page-link:hover {
    background: #aaa;
  }
</style>


  </div>


  </main>
  <footer>
    <p>&copy; 2025 My Website. All Rights Reserved.</p>
  </footer>

  <script>
    // function applySort() {
    //   let sortValue = document.getElementById('sort').value;
    //   let urlParams = new URLSearchParams(window.location.search);
    //   urlParams.set('sort', sortValue);
    //   urlParams.set('page', '1'); // Reset to first page on sort change
    //   window.location.search = urlParams.toString();
    // }

    function applySort() {
      let sortValue = document.getElementById('sort').value;
      let urlParams = new URLSearchParams(window.location.search);
      
      urlParams.set('sort', sortValue);
      urlParams.set('p', '1'); // Reset to first page on sort change

      if (!urlParams.has('page')) {
        urlParams.set('page', 'posts'); // Ensure `page=posts` remains in the URL
      }
      console.log(urlParams.toString());
      window.location.search = urlParams.toString();
    }

  </script>
</body>
</html>
