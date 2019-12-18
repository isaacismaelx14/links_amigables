<?php   
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});

$message = $_GET['message'] ?? '';
$id = $_GET['id'] ?? '';

$con = new Conexion();
$update =new Update($con); 
$update->setId($id);
$update->setValue('0');
$update->setColum('password_modify');

 
$updateTime =new Update($con); 
$updateTime->setId($id);
$updateTime->setValue('0');
$updateTime->setColum('time_limit_pm');

$updateCode =new Update($con); 
$updateCode->setId($id);
$updateCode->setValue('NONE');
$updateCode->setColum('code_pm');


   if ($update->checkIsUpdate() & $updateTime->checkIsUpdate() & $updateCode->checkIsUpdate()) {
      // header('location: ../forgot-password/?action=acepted&email='.$email);
      header('location: ../../forgot-password/?message='.$message.'&type=ErrorMessage');

   }else{
       header('location:  ../../forgot-password/?message=Ha ocurrido un error de servidor&type=ErrorMessage');
   }
?>