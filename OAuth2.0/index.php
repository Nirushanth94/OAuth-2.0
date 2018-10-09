<?php
require './login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>OAuth IT15079596</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <?php if(isset($_SESSION['access_token'])) : ?>

      <div align="center">
        <h1><?php echo "Hello, ",$user->getField('name'), " you have sucessfully logged in"; ?></h1>
        <button type="button" class="btn btn-outline-secondary" onclick=" login()">
          <a style="text-decoration: none;" href="logout.php">Logout</a>
        </button>
      </div>

    <?php else : ?>

      <div align="center">
        <br/>
        <button type="button" class="btn btn-outline-secondary" onclick=" login()">
          <a style="text-decoration: none;" href="<?php echo $login_url; ?>">Login With Facebook</a>
        </button>
      </div>
      
    <?php endif; ?>
</body>
</html>
