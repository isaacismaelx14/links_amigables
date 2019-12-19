<?php 

class Crud  
{
    protected $insert;
    protected $select;
    protected $update;
    protected $delete;

    public function __construct(
         InsertCommand $insertC,
         UpdateCommand $updateC,
         SelectCommand $selectC,
         DeleteCommand $deleteC)
    {
        $this->insert = $insertC;
        $this->select = $selectC;
        $this->update = $updateC;
        $this->deleete = $deleteC;
    }

    public function insert()
    {   
        $this->insert->exec();
    }

    public function select()
    {   
        $this->select->exec();
    }

    public function update()
    {   
        $this->update->exec();
    }

    public function delete()
    {   
        $this->delete->exec();
    }
}


?> 