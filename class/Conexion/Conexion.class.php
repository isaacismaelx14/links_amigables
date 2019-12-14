<?php

require '../../config/config.php';

class Concexion extends Mysqli
{
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct()
    {   
        $this->host = CONF_DB_HOST;
        $this->user = CONF_DB_USER;
        $this->pass = CONF_DB_PASS;
        $this->db = CONf_DB_DATABASE;
        parent::__construct($this->host, $this->user, $this->pass, $this->db);
    }

    public setCharset(){
        $this->set_charset(CONF_DB_CHARSET);
    }
}

$conn = new Conexion();

?>