<?php
        $conn = mysqli_init();
            mysqli_real_connect($conn, 'labdataa.mysql.database.azure.com', 'iyada@labdataa', 'Daoyak171044', 'Lab', 3306);
            if (mysqli_connect_errno($conn))
            {
                die('Failed to connect to MySQL: '.mysqli_connect_error());
            }

        $name = $_POST['name'];
        $weight = $_GET['weight'];
        $height = $_GET['height'];
        $bmi = $weight/(($height)/100)**2;
        $sql = "INSERT INTO guest (ชื่อ ,น้ำหนัก ,ส่วนสูง , bmi) VALUES ('$weight', '$height', '$bmi')";

        if (mysqli_query($conn, $sql)) {
    header("location:show2.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


        mysqli_close($conn);

?>
