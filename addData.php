<?php require 'function.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Image File</title>
  </head>
  <body>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" required value=""> <br>
      <label for="file">Image : </label>
      <input type="file" name="file" id = "file" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <button type = "submit" name = "submit" value="add">Submit</button>
    </form>
    <br>
    <a href="index.php">Data</a>
  </body>
</html>
