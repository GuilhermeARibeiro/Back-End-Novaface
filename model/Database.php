<?php

class Database {

    private $host = __HOSTNAME__;

    //private $port = __DB_PORT__;

    private $dbname = __DB_NAME__;

    private $username = __DB_USERNAME__;

    private $password = __DB_PASSWORD__;

    private $conexao = NULL;

    public function __construct() {

		$connectionString = 'mysql:';
		$connectionString .= 'host=' . $this->host . ';';
		//$connectionString .= 'port=' . $this->port . ';';
		$connectionString .= 'dbname=' . $this->dbname . '';

		$this->conexao = new PDO($connectionString, $this->username, $this->password);
    }
	
    public function prepare($query) {
        
		return  $this->conexao->prepare($query);
        
    }
 
	
}

?>