<?php
/**
* 
*/
class user 
{
	protected $db;
 	protected $conf;
    function __construct()
    {
      $this->conf = require 'conf.php';
    	$this->db = new PDO("mysql:host={$this->conf['dbHost']};dbname={$this->conf['dbName']}",
            $this->conf['dbUser'],
            $this->conf['dbPass']
        );
    }
 
    public function doLogin($uname, $upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM tc_member WHERE id=:uname LIMIT 1");
          $stmt->bindparam(':uname', $uname);
          $stmt->execute();
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if($upass == $userRow['id'])
             {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           //echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>