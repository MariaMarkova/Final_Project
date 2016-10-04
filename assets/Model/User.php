<?php
//namespace assets\Model;

class User 
{    
    private $first_name; 
    private $last_name;
    private $password;
    private $email;
    private $telephone;
    private $username;
    
    public function __construct($fisrtName, $lastName, $pass, $email, $telephone, $username) 
    {        
        $this->first_name = $fisrtName;
        $this->last_name = $lastName;
        $this->password = $pass;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->username = $username;
        
    }
    
}