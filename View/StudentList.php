<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach sinh vien</title>
</head>
<body>
    <h2>Danh sach sinh vien</h2>
    <?php 
    $i = 1;
    foreach($studentList as $student)
    {
        echo "<p>" .$i++ .". <a href = '?stid=" .$student->id ."'>" .$student->name ."</a></p>";


    } ?>
    <br>
    <p><a href ="../index.php">HomePage</a></p>
</body>
</html>