



                    <?php
if($_FILES['photo']['error'] == ''){
    $allowedExts = array("gif", "jpeg", "jpg", "png");
      $temp = explode(".", $_FILES["photo"]["name"]);
      $extension = end($temp);
      if ((($_FILES["photo"]["type"] == "img/gif")
      || ($_FILES["photo"]["type"] == "img/jpeg")
      || ($_FILES["photo"]["type"] == "img/jpg")
      || ($_FILES["photo"]["type"] == "img/pjpeg")
      || ($_FILES["photo"]["type"] == "img/x-png")
      || ($_FILES["photo"]["type"] == "img/png"))
      && ($_FILES["photo"]["size"] > 200000)
      && in_array($extension, $allowedExts))
        {
        if ($_FILES["photo"]["error"] > 0)
                    echo "Return Code: " . $_FILES["photo"]["error"] . "<br>";
          }
        else 
          {

            $fileName = $temp[0].".".$temp[1];
            $temp[0] = $_GET['id']; //Set to random number
            $fileName;

          if (file_exists("img/" . $_FILES["photo"]["name"]))
            {
            echo $_FILES["photo"]["name"] . " already exists. ";

            }
          else
            {
            $temp = explode(".", $_FILES["photo"]["name"]);
            $newfilename = $_GET['id'] . '.' . end($temp);
            move_uploaded_file($_FILES["photo"]["tmp_name"], "img/" . $newfilename);
            
             header('Location: comment.php?id='.$_GET['id']);
              
            //echo "Stored in: " . "images/" . $_FILES["photo"]["name"];
            
            }      
        } }
?>
<form method="post" action="image.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data" >
                        <input type="file" name="photo" required>
                        <input type="submit" name="submit">
                        
                    </form>        