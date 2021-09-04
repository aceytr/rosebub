<?php

namespace App;
use \PDO;
use \PDOException;

abstract class Model{

    private $db_hostname;
    private $db_username;
    private $db_password;
    private $db_name;
    private $db_dsn;

    protected $db = null;

    public $table;
    public $id;


    public function __construct(){ 
        global $app_config; 

        $this->db_hostname = $app_config['db_hostname'];
        $this->db_username = $app_config['db_username'];
        $this->db_password = $app_config['db_password'];
        $this->db_name = $app_config['db_name'];
        $this->db_dsn = $app_config['db_dsn'];    
    }
    

    /**
     * Database connexion
     *
     * @return object
     */
    private function setConnection(){ 
        $dsn = $this->db_dsn.":dbname=".$this->db_name.";host=".$this->db_hostname.";charset=utf8";

        try {
            $this->db = new PDO($dsn, $this->db_username, $this->db_password);	
            		
        }
        catch(PDOException $e){
            die('Database Connect: '.$this->db_hostname.' Name: '.$this->db_name.' ERROR '.$e->getMessage());
            return;
        }
        
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec('SET NAMES utf8');
    }


    public function getConnection(){
        if($this->db == null){
            $this->setConnection();
        }
        else{
            return($this->db);
        }
    }




    /**
     * Get one record filter by id
     *
     * @return void
     */
    public function getOne()
    {
        $sth = $this->db->prepare('SELECT * FROM :table WHERE id = :id LIMIT 1');
        $sth->bindParam(':table', $this->table, PDO::PARAM_STR);
        $sth->bindParam(':id', $this->id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch();      
    }

    /**
     * Get all record 
     *
     * @return void
     */
    public function getAll()
    {
        $sth = $this->db->prepare('SELECT * FROM :table ');
        $sth->bindParam(':table', $this->table, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchAll();     
    }

    /**
     * Database close connexion
     *
     * @return void
     */
    public function close()
    {
        $this->db = null;
    }

}