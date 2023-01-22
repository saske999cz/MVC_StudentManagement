<?php 
$link = mysqli_connect('localhost', 'root', '') or die('Could not connect: '.mysqli_error($link));
$db_selected = mysqli_select_db($link,'DULIEU');
$rs = mysqli_query($link, "SELECT * FROM sinhvien");

echo '<form method ="post" action ="C_Student.php">';
echo '<table border ="1" width = "100%">';
echo '<caption>Du lieu bang nhan vien</caption>';
echo '<TR><TH>Ma Sinh Vien</TH><TH>Ten Sinh Vien</TH><TH>Tuoi</TH><TH>Dai Hoc</TH></TR>';
while($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
    echo '<tr><td>'.$row['ID'].'</td><td>'.$row['Name'].'</td><td>'.$row['Age'].'</td><td>'.$row['University'].'</td><td><input type ="CHECKBOX"
    name = "'.$row['ID'].'" value ="'.$row['ID'].'"></td></tr>';
}
echo '<tr><td align ="right" colspan ="4"><input type ="submit" value ="Xoa cac nhan vien" name ="delete"></td></tr>';
echo '</table>';
echo '</form>';
echo '<p><a href ="../index.php">HomePage</a></p>';
mysqli_free_result($rs);
mysqli_close($link);
?>
