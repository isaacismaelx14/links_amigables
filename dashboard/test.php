<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/links_amigables/config/config.php';
spl_autoload_register(function ($class){
    if ($class === 'Conexion')
        return include "../class/$class/$class.class.php";
    include "../class/Article/$class.class.php";
});

$article = new Article(new Conexion);
$client = new Client($article);

writeln($client->Operation('insert'));
writeln($client->Operation('update'));
writeln($client->Operation('select'));
writeln($client->Operation('delete'));

function writeln ($value)
{
    print(">$value </br></br>");
}

?>