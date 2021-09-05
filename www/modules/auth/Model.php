<?php

use App\Model;
 
class AuthModel extends Model
{

	public function __construct()
	{
        parent::__construct();
		parent::getConnection();
    }


    public function getContactByEmail(string $email)
	{		
        $sth = $this->db->prepare("SELECT * FROM contacts WHERE email LIKE :email AND deleted_at IS NULL LIMIT 1");
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch(); 
    }

    public function setNewPassword(int $userId, string $userPassword)
    {
        $sth = $this->db->prepare('UPDATE contacts SET password = :password WHERE id = :id');
        $sth->bindParam(':password', $userPassword);
        $sth->bindParam(':id', $userId, PDO::PARAM_INT);
        $sth->execute();
    }



}