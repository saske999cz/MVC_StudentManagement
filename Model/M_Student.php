<?php
include_once("../Model/E_Student.php");
class Model_Student
{
    public function __construct()
    {
    }
    public function getAllStudent()
    {
        $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
        mysqli_select_db($link, 'DULIEU');
        $rs = mysqli_query($link, "SELECT * FROM sinhvien");
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['ID'];
            $name = $row['Name'];
            $age = $row['Age'];
            $university = $row['University'];
            while($i!=$id) $i++;
            $students[$i++] = new Entity_Student($id, $name, $age, $university);}
            return $students;

        }
    public function getStudentDetail($stid){
        $allStudent = $this->getAllStudent();
        return $allStudent[$stid];
    }

    public function addStudent($ID, $Name, $Age, $University){
        $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
        mysqli_select_db($link, 'DULIEU');
        $rs = mysqli_query($link, "INSERT INTO sinhvien (ID, Name, Age, University)
        VALUES ('$ID','$Name','$Age','$University')");
        
    }

    public function deleteStudent($stid){
        $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: '.mysqli_error($link));
        $db_selected = mysqli_select_db($link,'DULIEU');
        $rs = mysqli_query($link, "SELECT ID FROM sinhvien");
        while($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
        $rs1 = mysqli_query($link, "DELETE FROM sinhvien WHERE ID = '$stid'");
        }
    }

    public function searchStudent($search){
            $link = mysqli_connect("localhost", "root", "") or die('Could not connect: '.mysqli_error($link));
            mysqli_select_db($link, "DULIEU");
            if ($search == "") {
                header("Location:timkiem.php");
            }
            if ($search == "ID") {
                $value = $_REQUEST['value'];
                $rs = mysqli_query($link, "SELECT * FROM sinhvien where IDPB = '$value'");
                $i = 0;
            while ($row = mysqli_fetch_array($rs)) {
            $id = $row['ID'];
            $name = $row['Name'];
            $age = $row['Age'];
            $university = $row['University'];
            while($i!=$id) $i++;
            $students[$i++] = new Entity_Student($id, $name, $age, $university);}
            return $students;
            }
            if ($search == "HoTen") {
                $value = $_REQUEST['value'];
                $rs = mysqli_query($link, "SELECT * FROM sinhvien where Name like '%$value%'");
                $i = 0;
            while ($row = mysqli_fetch_array($rs)) {
            $id = $row['ID'];
            $name = $row['Name'];
            $age = $row['Age'];
            $university = $row['University'];
            while($i!=$id) $i++;
            $students[$i++] = new Entity_Student($id, $name, $age, $university);}
            return $students;
            }
            if ($search == "DaiHoc") {
                $value = $_REQUEST['value'];
                $rs = mysqli_query($link, "SELECT * FROM sinhvien where University like '%$value%'");
                $i = 0;
            while ($row = mysqli_fetch_array($rs)) {
            $id = $row['ID'];
            $name = $row['Name'];
            $age = $row['Age'];
            $university = $row['University'];
            while($i!=$id) $i++;
            $students[$i++] = new Entity_Student($id, $name, $age, $university);}
            return $students;
            }
           
            
    }

    }

