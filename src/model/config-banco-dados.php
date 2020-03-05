<?php

/*
* É recomendado que as configurações de conexão com o Banco de Dados seja nesse arquivo.
* Veja o exemplo:
*/

define("DB_HOST", "localhost");
define("DB_NAME", "teste_fc");
define("DB_USER", "root");
define("DB_PASS", "");

class Database 
{
    
  private static $conn  = null;
     
    public function __construct() {
        
    }
     
    public static function connect()
    {
       if ( null == self::$conn )
       {     
        try
        {
          self::$conn =  new PDO( "mysql:host=". DB_HOST .";"."dbname=". DB_NAME, DB_USER, DB_PASS); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$conn;
    }
     
    public static function disconnect()
    {
        self::$conn = null;
    }
}

?>