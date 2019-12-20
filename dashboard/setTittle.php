<?php 
class head {
    public $tittle = '';
     public function setName(string $name)
    {
        $this->tittle = $name;
    }

    public function getName():string
    {
        $til = $this->tittle;
       return $til;
    }
}
$head = new head();
?>

