<?php 

class SuccessMessage extends Message
{
    public function getMessage ($message){
        return '<div class="alert alert-success" role="alert"> $message </div>';
    }
}


?>