<?php

if(isset($_GET['view'])){

    $views=explode("/", $_GET['view']);
    include 'views/'.$views[0].'-view.php';
}else{
    include 'views/index-view.php';
}
?>
