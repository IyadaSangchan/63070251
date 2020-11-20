<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'labdataa.mysql.database.azure.com', 'iyada@labdataa', 'Daoyak171044', 'ITFLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$ID = $_GET['ID'];
$row = mysqli_query($conn ,"Select * From guestbook where ID = $ID");
$result = mysqli_fetch_assoc($row);

if(isset($_POST['submit'])){
 $ID = $_GET['ID'];
 $Name=$_POST['name'];
 $Comment=$_POST['comment'];
 $Link=$_POST['link'];

 $sql = "UPDATE guestbook SET Name='$Name', Comment='$Comment', Link='$Link' WHERE ID='$ID'";

 if(mysqli_query($conn, $sql)){
  header("location:show.php");
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