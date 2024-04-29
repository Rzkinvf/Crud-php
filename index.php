<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data</title>
  </head>
  <body>
    <table border = 1 cellspacing = 0 cellpadding = 10>
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Image</td>
        <td>Action</td>
      </tr>
      <?php
      $i = 1;
      $data = mysqli_query($conn, "SELECT * FROM tb_upload")
      ?>

      <?php foreach ($data as $data) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $data["name"]; ?></td>
        <td> <img src="img/<?php echo $data["image"]; ?>" width = 200 title="<?php echo $data['image']; ?>"> </td>
        <td>
          <a href="editData.php?id=<?php echo $data['id']; ?>">Edit</a>
          <form action="" method="post">
            <button type="submit" name="submit" value= <?php echo $data['id']; ?> >Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="addData.php">Upload Image File</a>
  </body>
</html>
