<?php 

class WarningMessage extends Message
{
     public function getMessage ($message){
        return '<div class="alert alert-warning" role="alert"> $message </div>';
    }
}


?>