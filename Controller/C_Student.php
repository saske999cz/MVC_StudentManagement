<?php
include_once("../Model/M_Student.php");
class Ctrl_Student
{
    public function invoke()
    {
        if (isset($_GET['mod1'])) {
            $modelStudent = new Model_Student();
            include_once("../View/StudentAdd.php");
        } else if (isset($_POST['update'])) {
            $modelStudent = new Model_Student();
            $ID = $_REQUEST['ID'];
            $Name = $_REQUEST['HoTen'];
            $Age = $_REQUEST['Tuoi'];
            $University = $_REQUEST['DaiHoc'];
            $modelStudent->addStudent($ID, $Name, $Age, $University);
            include_once("../View/StudentAdd.php");
            
        } else if (isset($_GET['mod3'])) {
            $modelStudent = new Model_Student();
            include_once("../View/StudentDelete.php");
        } else if (isset($_POST['delete'])) {
            $modelStudent = new Model_Student();
            $studentList = $modelStudent->getAllStudent();
            foreach ($studentList as $student) {
                if ($_REQUEST[$student->id]) {
                    $ID = $_REQUEST[$student->id];
                    $modelStudent->deleteStudent($ID);
                }
                header("Location:../View/StudentDelete.php");
            }
        } else if (isset($_GET['stid'])) {
            $modelStudent = new Model_Student();
            $student = $modelStudent->getStudentDetail($_GET['stid']);
            include_once("../View/StudentDetail.php");
        } else {
            $modelStudent = new Model_Student();
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentList.php");
        }
    }
};
$C_Student = new Ctrl_Student();
$C_Student->invoke();
