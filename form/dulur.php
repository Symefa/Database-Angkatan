<?php
/*
 *	DB angkatan Project
 */
class dulur
{
    protected $conf;
    protected $dbjob;

    public function __construct()
    {
    	$this->conf = require 'conf.php';
    	$this->dbjob = new PDO("mysql:host={$this->conf['dbHost']};dbname={$this->conf['dbName']}",
            $this->conf['dbUser'],
            $this->conf['dbPass']
        );
    }

    public function modif($Id, $Name, $Nick, $Hometown, $Birthday, $Phone, $Email, $Adress, $Homeaddress, $Line, $Instagram, $Status = 0)
    {
    	try{
        $stmt = $this->dbjob->prepare("UPDATE tc_member SET 
    		name = :name, 
                nick = :nick,
    		hometown = :hometown,
    		birthday = :birthday,
    		phone = :phone,
    		email = :email,
    		adress = :adress,
    		homeaddress = :homeaddress,
    		idline = :idline,
    		instagram = :instagram,
    		status = :status
            WHERE id = :id");
    	$stmt->bindparam(':id', $Id);
    	$stmt->bindparam(':name', $Name);
    	$stmt->bindparam(':nick', $Nick);
    	$stmt->bindparam(':hometown', $Hometown);
    	$stmt->bindparam(':birthday', $Birthday);
    	$stmt->bindparam(':phone', $Phone);
    	$stmt->bindparam(':email', $Email);
    	$stmt->bindparam(':adress', $Adress);
    	$stmt->bindparam(':homeaddress', $Homeaddress);
    	$stmt->bindparam(':idline', $Line);
    	$stmt->bindparam(':instagram', $Instagram);
    	$stmt->bindparam(':status', $Status);
    	$stmt->execute();
        
    }
        catch (PDOException $e)
        {
            echo $e;
        }
    }
}