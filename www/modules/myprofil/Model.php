<?php

class MyProfilModel extends RoseBub\Model{

    public function __construct()
    {
        parent::__construct();
		parent::getConnection();
    }

    public function getContactConnected()
    {
        $sth = $this->db->prepare("SELECT first_name, last_name, email, phone_mobile, 
                                            address_street, address_postalcode, address_city, address_country,  
                                            birthdate, lang FROM contacts WHERE id = :id AND deleted = 0 LIMIT 1");
        $sth->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch(); 
    }

    public function setContactConnected($data)
    {
        $sth = $this->db->prepare("UPDATE contacts SET
                                     first_name = :first_name , 
                                     last_name = :last_name , 
                                     email = :email , 
                                     phone_mobile = :phone_mobile , 
                                     address_street = :address_street , 
                                     address_postalcode = :address_postalcode , 
                                     address_city = :address_city , 
                                     address_country = :address_country , 
                                     birthdate = :birthdate , 
                                     lang = :lang
                                     WHERE id = :id ");

        $sth->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR);
        $sth->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR);
        $sth->bindParam(':last_name', $data['last_name'], PDO::PARAM_STR);
        $sth->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $sth->bindParam(':phone_mobile', $data['phone_mobile'], PDO::PARAM_STR);
        $sth->bindParam(':address_street', $data['address_street'], PDO::PARAM_STR);
        $sth->bindParam(':address_postalcode', $data['address_postalcode'], PDO::PARAM_STR);
        $sth->bindParam(':address_city', $data['address_city'], PDO::PARAM_STR);
        $sth->bindParam(':address_country', $data['address_country'], PDO::PARAM_STR);
        $sth->bindParam(':birthdate', $data['birthdate'], PDO::PARAM_STR);
        $sth->bindParam(':lang', $data['lang'], PDO::PARAM_STR);

        $sth->execute();
        return $sth->fetch(); 
    }

}

?>