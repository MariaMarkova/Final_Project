<?php
namespace Model;

use Dao\AdminDao;

class Admin 
{    
	private $id_admin;
    private $first_name; 
    private $last_name;
    private $password;
    private $email;
    private $telephone;
    private $username;
    
    public function __construct($username, $pass) 
    {        
    	$userData = AdminDao::getUser($username);    	
    	$md5Pass = md5($pass);
    	
    	if (!empty($userData[0]) && $userData[0]['password'] == $md5Pass) {
    		
    		$this->first_name = $userData[0]['first_name'];
    		$this->last_name = $userData[0]['last_name'];
    		$this->password = $userData[0]['password'];
    		$this->email = $userData[0]['email'];
    		$this->telephone = $userData[0]['telephone'];
    		$this->username = $userData[0]['username'];
    		$this->id_admin = $userData[0]['id_admin'];
    	}
    }
        
    public function getFirstName(){
    	return $this->first_name;
    }
    
    public function setFirstName($firstName){
    	$this->first_name = $firstName;
    }
    
    public function getLastName(){
    	return $this->last_name;
    }
    
    public function setLastName($lastName){
    	$this->last_name = $lastName;
    }
    
    public function getEmail(){
    	return $this->email;
    }
    
    public function setEmail($email){
    	$this->email = $email;
    }
    
    public function getTelephone(){
    	return $this->telephone;
    }
    
    public function setTelephone($tel){
    	$this->telephone = $tel;
    }
    
    public function getUsername(){
    	return $this->username;
    }
    
    public function setUsername($username){
    	$this->username = $username;
    }
    
    public function getIdAdmin(){
    	return $this->id_admin;
    }
    
    public function setIdAdmin($id_admin){
    	$this->id_admin = $id_admin;
    }
    
    public function checkPass()
    {
    	return isset($this->username);
    }
    
    public function updateDB($firstName, $lastName, $username, $email, $telephone, $idAdmin){
    	
    	AdminDao::updateAdminInfo($firstName, $lastName, $username, $email, $telephone, $idAdmin);
    }
    
    public function search($params){
    	return AdminDao::search($params);
    }
    
    public function newSearch($brand, $model, $color, $km, $kmTo, $hp, $hpTo, $year, $yearTo, $price, $priceTo){
    	return AdminDao::newSearch($brand, $model, $color, $km, $kmTo, $hp, $hpTo, $year, $yearTo, $price, $priceTo);
    }
}