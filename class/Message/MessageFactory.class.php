<?php 

class MessageFactory  
{
    public static function CreateMessage ($type)
    {
        switch ($type) {
            case 'SuccessMessage':
                return new SuccessMessage();
            break;
            
            case 'WarningMessage':
                 return new WarningMessage();
            break;
                 
            case 'ErrorMessage':
                return new ErrorMessage();
            break;
                
            default:
                return false;
                break;
        }
    }
}


?>