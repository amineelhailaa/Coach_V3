<?php
/* this is the pdo database class connected to database witht he config */
class Database
{
    private $host=DB_HOST;
    private $user=DB_USER;
    private $pwd=DB_PWD;
    private $dbname=DB_NAME;
    private $dbh;
    private $stmt;
    private $error;

    //constructor
    public function __construct()
    {
        //set DSN ?
        $dsn= 'pgsql:host='.$this->host.';dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
        );

        //CREATE PDO Instance
        try {
            $this->dbh = new PDO($dsn,$this->user,$this->pwd,$options);
        }catch (PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }

    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type= PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type= PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function excute(){
        return $this->stmt->excute();
    }


    //get results
    public function resultSet(){
        $this->excute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    //get single record
    public function single(){
        $this->excute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }


    //get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}