<?php 


class Database {


    protected $pdo ;
    /**
     * Summary of __construct
     * @param mixed $config database configration 
     */
    public function  __construct($config)
    {   
       
        $username = $config['username'];
        $password = $config['password']; 
        $dsn =  $config['drivier'] .":" . http_build_query($config['dsn'] , '' , ';');
        $this->pdo = new PDO($dsn, $username , $password);
    }

    /**
     * method call spific qeury for database 
     * @param $statment  query statmet which will exicute in databse 
     * @param $param    query parameters value used it when execute query
     * @return  $data from database query
     */
    public function query($statment , $param = [])
    {


        $statment = $this->pdo->prepare($statment);
        return   $statment->execute($param);
         
    }

   
}
