<?php 
    require 'function.php';
    $id = $_GET["id"];
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_upload WHERE id = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" value= "<?php echo $data["name"]; ?>" required > <br>
      <label for="file">Image : </label>
      <input type="file" name="file" id = "file" accept=".jpg, .jpeg, .png" > <br> <br>
      <button type = "submit" name = "submit" value="edit">Edit</button>
    </form>
    <br>
    <a href="index.php">Data</a>
</body>
</html>