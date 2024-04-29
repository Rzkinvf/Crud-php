<?php
$conn = mysqli_connect("localhost", "root", "", "upload");

if(isset($_POST["submit"])){
    if ($_POST["submit"] == "add") {
        add();
    } else if ($_POST["submit"] == "edit") {
        edit();
    } else {
       
        delete();
        
    }
}


function add() {
    global $conn;
    if($_FILES["file"]["error"] == 4){
     echo
     "<script> alert('Image Does Not Exist'); </script>"
    ;
    }
    else{
    $name = $_POST["name"];
    $fileName = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];

    $newFileName = uniqid() . "-" . $fileName;

    move_uploaded_file($tmpName, 'img/' . $newFileName);
    $query = "INSERT INTO tb_upload VALUES('', '$name', '$newFileName')";
    mysqli_query($conn, $query);
    echo
        "
        <script>
          alert('Successfully Added');
          document.location.href = 'index.php';
        </script>
        ";
    }
}

function edit() {
    
    global $conn;

    $id = $_GET["id"];
    $name = $_POST["name"];

    if($_FILES["file"]["error"] != 4){
        $fileName = $_FILES["file"]["name"];     
        $tmpName = $_FILES["file"]["tmp_name"];
        
        $newFileName = uniqid() . "-" . $fileName;

        move_uploaded_file($tmpName, 'img/' . $newFileName);
        $query = "UPDATE tb_upload SET image = '$newFileName' WHERE id = $id";
        mysqli_query($conn, $query);

    }

    $query = "UPDATE tb_upload SET name = '$name' WHERE id = $id";
    mysqli_query($conn, $query);
    echo
    "
    <script>
      alert('Edited Successfully ');
      document.location.href = 'index.php';
    </script>
    ";
}
function delete() {
    global $conn;
    
    

    $id = $_POST["submit"];

    $query = "DELETE FROM tb_upload WHERE id = $id";
    mysqli_query($conn, $query);
    echo
    "
    <script>
      alert('Deleted Successfully ');
      document.location.href = 'index.php';
    </script>
    ";
}






// $name = $_POST["name"];
// if($_FILES["image"]["error"] == 4){
//   echo
//   "<script> alert('Image Does Not Exist'); </script>"
//   ;
// }
// else{
//   $fileName = $_FILES["image"]["name"];
//   $fileSize = $_FILES["image"]["size"];
//   $tmpName = $_FILES["image"]["tmp_name"];

//   $validImageExtension = ['jpg', 'jpeg', 'png'];
//   $imageExtension = explode('.', $fileName);
//   $imageExtension = strtolower(end($imageExtension));
//   if ( !in_array($imageExtension, $validImageExtension) ){
//     echo
//     "
//     <script>
//       alert('Invalid Image Extension');
//     </script>
//     ";
//   }
//   else if($fileSize > 1000000){
//     echo
//     "
//     <script>
//       alert('Image Size Is Too Large');
//     </script>
//     ";
//   }
//   else{
//     $newImageName = uniqid();
//     $newImageName .= '.' . $imageExtension;

//     move_uploaded_file($tmpName, 'img/' . $newImageName);
//     $query = "INSERT INTO tb_upload VALUES('', '$name', '$newImageName')";
//     mysqli_query($conn, $query);
//     echo
//     "
//     <script>
//       alert('Successfully Added');
//       document.location.href = 'data.php';
//     </script>
//     ";
//   }
// }