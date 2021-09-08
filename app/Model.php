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

 

    public function __construct(){ 
        global $app_config; 

        $this->db_hostname = $app_config['db_hostname'];
        $this->db_username = $app_config['db_username'];
        $this->db_password = $app_config['db_password'];
        $this->db_name = $app_config['db_name'];
        $this->db_dsn = $app_config['db_dsn'];    
    }
    

    /**
     * Database connexion set
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


    /**
     * Database connexion get
     *
     * @return db object
     */
    public function getConnection(){
        if($this->db == null){
            $this->setConnection();
        }
        else{
            return($this->db);
        }
    }







    /**
     * Execute select query by id 
     *
     * @param mixed $table table name
     * @param mixed $id record id
     * @return mixed statement fetch
     */
    public function selectById($table, $id)
    {        
        $query = 'SELECT * FROM :table WHERE id = :id AND deleted_at IS NULL LIMIT 1';

        $statement = $this->db->prepare($query);

        $statement->bindParam(':table', $table, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        return $statement->fetch();      
    }




    /**
     * Delete record by id
     *
     * @param mixed $table table name
     * @param mixed $id record id
     * @param mixed $mode soft or hard
     * @return fetchAll
     */
    public function delete($table, $id, $mode="soft")
    {        
        if( $mode=="soft" ){
            $query = 'UPDATE '.$table.' SET deleted_at = UTC_TIMESTAMP()  WHERE id="'.$id.'"'; 
        }

        if( $mode=="hard" ){
            $query = 'DELETE FROM '.$table.' WHERE id="'.$id.'"'; 
        }

        $statement = $this->db->prepare($query);

        if ($statement->execute()) {
            return $statement->rowCount();
        }
        else{
            return false;
        }      
    }




    /**
     * Execute query 
     *
     * @param string $query sqlquery
     * @return mixed statement fetchAll
     */
    public function query($query)
    {
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();      
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