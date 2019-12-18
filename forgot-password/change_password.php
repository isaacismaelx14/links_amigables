<?php 
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});

 if(isset($_POST['submit2'])){
     $password = $_POST['password'] ?? '';
     $password_repeat = $_POST['repeat_password'] ?? '';
     $id = $_GET['id']  ?? '';
     $codeP = $_GET['emp']  ?? '';
     if(empty($password)){
        header('location: ../?message=Error: el ususario o la clave estan vacias&type=ErrorMessage'); 
     }
 }
echo($id.' '.$password.' '.$password_repeat);

if(strcmp($password,$password_repeat) === 0){
    $password_emcrypted = password_hash($password, PASSWORD_DEFAULT);

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

    $update->checkIsUpdate();
    $updateCode->checkIsUpdate();
    $updateTime->checkIsUpdate();
    
$con = new Conexion();
$update =new Update($con); 
$update->setId($id);
$update->setValue($password_emcrypted);
$update->setColum('password');

    if($update->checkIsUpdate()){
    header('location: ../login/?message=The password has been changed successfully&type=SuccessMessage');
    }else{
    header('location: ../../forget-password/?message=error&type=ErrorMessage');
    }
}else {
    header('location: ../forgot-password/?action=modify&id='.$id.'&emp='.$codeP.'&message=The passwords do not match.&type=ErrorMessage');
}
    

 
 ?>