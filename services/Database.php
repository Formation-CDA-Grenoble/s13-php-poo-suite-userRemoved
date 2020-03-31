<?php

$_ENV = parse_ini_file('../.env');

class Database extends PDO {
    static private $instance;

    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    static public function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
   
    private function __construct(){
        $this->engine = $_ENV['PDO_ENGINE'];
        $this->host = $_ENV['PDO_HOST'];
        $this->database = $_ENV['PDO_DATABASE'];
        $this->user = $_ENV['PDO_USER'];
        $this->pass = $_ENV['PDO_PASS'];
        $dns = $this->engine . ':dbname=' . $this->database . ";host=" . $this->host;
        parent::__construct( $dns, $this->user, $this->pass );
    }
}

?>
