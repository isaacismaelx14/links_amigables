<?php 

class ErrorMessage extends Message
{
     public function getMessage ($message){
        return "<div class='alert alert-danger' role='alert'> $message </div>";
    }
}


?>