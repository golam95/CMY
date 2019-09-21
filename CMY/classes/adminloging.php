<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 

 ?>
<?php 
class adminloging extends Session{
	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function adminLogin($email,$password,$type){
		$email=$this->fm->validation($email);
		$password=$this->fm->validation($password);
		$type=$this->fm->validation($type);
		$email=mysqli_real_escape_string($this->db->link,$email);
		$type=mysqli_real_escape_string($this->db->link,$type);
		$password=mysqli_real_escape_string($this->db->link,($password));
		if (empty($email)||empty($password)) {
			$logmsg="Field must not empty!!";
			return $logmsg;
		}else{
			$query="select * from customerinfo where cus_email ='$email' and cus_deliverylocation ='$password' and role='$type'";
			$result=$this->db->select($query);
			if ($result!=false) {
				$value=$result->fetch_assoc();
				Session::set("adminlogin",true);
				Session::set("adminId",$value['cus_id']);
				Session::set("adminUser",$value['cus_name']);
				Session::set("adminName",$value['cus_name']);
				Session::set("adminRole",$value['role']);
				header("Location: index.php");
			}else{
				$loginmsg="Sorry,username and password not match!";
				return $loginmsg;
			}

		   }
        }
}
 ?>