<?php 
  // MySQLi where i stands for improve 
  // PDO stands for PHP data objects  
  // connect to database 

  define("PI","3.14");

  $age = 30;

  $list[] =[1,2,3];
  $tmp = array_pop($list); // delete origin list
  // print_r($tmp );
  // echo 'my name is thah';

  $errors = array('email' => '', 'title' => '', 'ingredients' => '');

  $email = $title = $ingre = '';

  if (isset($_POST['submit'])){
    if (empty($_POST['email'])){
      $errors['email'] = 'An email is required <br/>';
    } 
    else {
      $email = $_POST['email'];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email must be a valid email! <br/>';
      }
    }

    if (empty($_POST['title'])){
      $errors['title'] = 'An title is required <br/>';
    } 
    else {
      // echo htmlspecialchars($_POST['title']);
      $title = htmlspecialchars($_POST['title']);
      if (!preg_match('/^[a-zA-Z\s]+$/', $title)){
        $errors['title'] = 'Title must be letters and spaces only <br/>';
      }
    }

    if (empty($_POST['ingredients'])){
      $errors['ingredients'] = 'An ingredient is required <br/>';
    } 
    else {
      // echo htmlspecialchars($_POST['ingredients']);
      $ingre = htmlspecialchars($_POST['ingredients']);
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingre)){
        $errors['ingredients'] = 'Ingredient is require at least one and must have correct grammarly: a comma separated list <br/>';
      }
    }

    if (array_filter($errors)){
      echo 'Form is invalid!';
    } else {
      header('Location: index.html');
    }
  }

  // print_r($errors); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <section class="container grey-text">
    <h4 class="center">
      Add a pizza
    </h4>   
    <form action="first.php" class="white" method="POST">
      <label for="">Your Email: </label>
      <input type="text" name="email" value="<?php echo $email ?>">
      <div class="red-text"><?php echo $errors['email'] ?></php></div>
      <label for="">Pizza Title: </label>
      <input type="text" name="title" id="" value="<?php echo $title ?>">
      <div class="red-text"><?php echo $errors['title'] ?></php></div>
      <label for="">Ingredients: </label>
      <input type="text" name="ingredients" id="" value="<?php echo $ingre ?>">
      <div class="red-text"><?php echo $errors['ingredients'] ?></php></div>
      <div class="center">
        <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>
</body>
</html>