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
     * Database close connexion
     *
     * @return void
     */
    public function close()
    {
        $this->db = null;
    }



    /**
     * Execute select query 
     *
     * @param string $table table name
     * @param array $where fields array(name=>value)
     * @param string $orderby
     * @param int $limit
     * @param int $offset
     * @return mixed statement fetch
     */
    public function select($table, $where, $orderby='', $limit='', $offset='')
    {        

        $query = 'SELECT * FROM '.$table.' WHERE ';
        foreach($where as $key=>$val){
            $query .= $key.' = :'.$key.' AND ';
        }
        $query = substr($query,0,-4).' AND deleted_at IS NULL';

        if( !empty($orderby) ){
            $query .= ' ORDER BY '.$orderby;
        }

        if( !empty($limit) ){
            $query .= ' LIMIT '.$limit;
            if( !empty($offset) ){
                $query .= ', '.$offset;
            }
        }
        
       
        $statement = $this->db->prepare($query);
        foreach($where as $key=>$val){
            $statement->bindValue(':'.$key, $val);
        } 
        
        
        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statement->fetchAll();      
    }



    /**
     * Execute insert query 
     *
     * @param string $table table name
     * @param array $fields array(name => value)
     * @return int statement affected row
     */
    public function insert(string $table, array $fields)
    {        
        
        $query = 'INSERT INTO '.$table.' (created_at, modified_at, ';

        foreach($fields as $key=>$val){
            $query .= $key.', ';
        }
        $query = substr($query,0,-2);

        $query .= ') VALUES (UTC_TIMESTAMP(), UTC_TIMESTAMP(), ';

        foreach($fields as $key=>$val){
            $query .= ':'.$key.', ';
        }
        $query = substr($query,0,-2);

        $statement = $this->db->prepare($query);
       

        foreach($fields as $key=>$val){
            $statement->bindValue(':'.$key, $val);
        }  
        

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statement->lastInsertId();  
    }




    /**
     * Execute update query by id 
     *
     * @param string $table table name
     * @param int $id record id
     * @param array $fields array(name => value)
     * @return int statement affected row
     */
    public function update(string $table, int $id, array $fields)
    {        
        
        $query = 'UPDATE '.$table.' SET updated_at = UTC_TIMESTAMP(), ';

        foreach($fields as $key=>$val){
            $query .= $key.' = :'.$key.', ';
        }
        $query = substr($query,0,-2);

        $query .= ' WHERE id = '.$id;

        $statement = $this->db->prepare($query);
       

        foreach($fields as $key=>$val){
            $statement->bindValue(':'.$key, $val);
        }  
        

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statement->rowCount();   
    }




    /**
     * Delete record by id
     *
     * @param mixed $table table name
     * @param mixed $id record id
     * @param mixed $mode soft or hard
     * @return int statement affected row
     */
    public function delete($table, $id, $mode="soft")
    {        
        if( $mode == "soft" ){
            $query = 'UPDATE '.$table.' SET deleted_at = UTC_TIMESTAMP()  WHERE id="'.$id.'"'; 
        }

        if( $mode == "hard" ){
            $query = 'DELETE FROM '.$table.' WHERE id="'.$id.'"'; 
        }

        $statement = $this->db->prepare($query);


        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statement->rowCount();          
    }



    /**
     * query
     *
     * @param mixed $query
     * @return int statement object
     */
    public function query($query)
    {        
        $statement = $this->db->prepare($query);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statement;          
    }





}