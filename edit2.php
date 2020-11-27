<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'labdataa.mysql.database.azure.com', 'iyada@labdataa', 'Daoyak171044', 'Lab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$Id = $_GET['Id'];
$row = mysqli_query($conn ,"Select * From guest where Id = $Id");
$result = mysqli_fetch_assoc($row);

if(isset($_POST['submit'])){
 $Id = $_GET['Id'];
 $Name=$_POST['name'];
 $Comment=$_POST['weight'];
 $Link=$_POST['height'];

 $sql = "UPDATE guestbook SET Name='$Name', Comment='$Comment', Link='$Link' WHERE Id='$Id'";

 if(mysqli_query($conn, $sql)){
  header("location:show (2).php");
 }
}

?>
<!DOCTYPE html>
<html>
<head>
 <title>Comment Form</title>
</head>
<body>
  <form action = "" method = "post" id="CommentForm" >
    Name:<br>
    <input type="text" name = "name" id="idName" value="<?=$result['Name']; ?>"> <br>
    Comment:<br>
    <textarea rows="10" cols="20" name = "comment" id="idComment"><?php echo $result['Comment']; ?></textarea><br>
    Link:<br>
    <input type="text" name = "link" id="idLink" value="<?=$result['Link']; ?>"> <br><br>
    <input type="submit" name="submit" id="commentBtn">
  </form>
</body>
</html>
