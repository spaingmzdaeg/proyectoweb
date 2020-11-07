<?php
class Database
{
    private $dbServer = 'localhost';
    private $dbUser = 'root';
    private $dbPassword = '';
    private $dbName = 'soccerleague';
    protected $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->dbServer}; dbname={$this->dbName}; charset=utf8";
            $options = array(PDO::ATTR_PERSISTENT);
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword, $options);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

    }

    function getConn(){
        $mysqli = mysqli_connect('localhost', 'root', '', "soccerleague");
        if (mysqli_connect_errno($mysqli))
          echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
        $mysqli->set_charset('utf8');
        return $mysqli;
      }

    
}
