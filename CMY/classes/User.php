<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
 <style>
 .success{color:green;}
 .error{color:red;}
 </style>
<?php 
class User{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function userRegtration($data){
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$country=mysqli_real_escape_string($this->db->link,$data['country']);
		$zip=mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$password=mysqli_real_escape_string($this->db->link,$data['password']);
		$typeofuser="General";
		if ($name==""||$address==""||$city==""||$country==""||$zip==""||$phone==""||$email==""||$password=="") {
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;

             }
             $mailquery="select * from users where email='$email' limit 1";
             $mailcheck=$this->db->select($mailquery);
             if ($mailcheck <> false) {
             	$msg="<span class='error'>Email already exist !</span>";
             	return $msg;
             }else{
             	$query = "INSERT INTO users(name,address,city,country,zip,phone,email,password,typeofuser)
                VALUES('$name','$address','$city','$country','$zip', '$phone','$email','$password','$typeofuser')";

             $UserInsert=$this->db->insert($query);
		if ($UserInsert) {
			$msg="<span class='success'>user data insert successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>user data  not insert .</span>";
			return $msg;
		}
             }


	}
	
	
	//
	public function admin_userRegistation($data){
		// $pdata=$this->fm->validation($data);
		
		$name=mysqli_real_escape_string($this->db->link,$data['inputUserName']);
		$address=mysqli_real_escape_string($this->db->link,$data['inputAddress']);
		$city=mysqli_real_escape_string($this->db->link,$data['inputCity']);
		$country=mysqli_real_escape_string($this->db->link,$data['inputCountry']);
		$zip=mysqli_real_escape_string($this->db->link,$data['inputZipcode']);
		$phone=mysqli_real_escape_string($this->db->link,$data['inputContactno']);
		$email=mysqli_real_escape_string($this->db->link,$data['inputEmail']);
		$password=mysqli_real_escape_string($this->db->link,$data['inputPasword']);
		$selectType=mysqli_real_escape_string($this->db->link,$data['selecttype']);
		
		$role=0;
		 if($selectType == "Admin"){
				$role=3;
			}else{
				$role=2;
			}

		if ($name==""||$address==""||$city==""||$country==""||$zip==""||$phone==""||$email==""||$password=="") {
			
			$msg="<span class='error'> field must not be empty</span>";
			return $msg;
			
		}
		 $mailquery="select * from users where email='$email' limit 1";
             $mailcheck=$this->db->select($mailquery);
             if ($mailcheck <> false) {
             	$msg="<span class='error'>Email already exist !</span>";
             	return $msg;
             }else{
             	$query = "INSERT INTO users(name,address,city,country,zip,phone,email,password,typeofuser,role)
                VALUES('$name','$address','$city','$country','$zip', '$phone','$email','$password','$selectType',$role)";
			
			 $userreg=$this->db->insert($query);
		if ($userreg) {
			$msg="<span class='success'>Add User successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>User  not Added .</span>";
			return $msg;
		}

      }

	}
	

	public function userLogin($ldata){
		$email=mysqli_real_escape_string($this->db->link,$ldata['email']);
		$password=mysqli_real_escape_string($this->db->link,$ldata['password']);
		if (empty($email)||empty($password)){
			$msg= "<span class='error'> field must not be empty </span>";
			header("Location: errorlogin.php");
		}
		
		
	  $query="select * from customerinfo where cus_email ='$email' and cus_deliverylocation ='$password' and role='1'";
		
		$result=$this->db->select($query);
		if ($result!=false) {
			$value=$result->fetch_assoc();
			Session::set("userlogin",true);
			Session::set("userId",$value['cus_id']);
			Session::set("userName",$value['cus_name']);
			 
			echo("<script>alert('Session::set(\"cus_id\"');</script>");
			header("Location: shoping-cart.php");
		}else{
			header("Location: errorlogin.php");
		}

	}
	public function getUserData($id){
		$query="select * from customerinfo where cus_id='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	public function updateUserData($data,$id){
		
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$country=mysqli_real_escape_string($this->db->link,$data['country']);
		
		if ($name==""||$email==""||$phone==""||$address==""||$city==""||$country=="") {
			$msg= "<span class='error'> Field must not be empty!!!</span>";
			return $msg;

            }else{

             $qury="update customerinfo 
             set 
             cus_name='$name', 
             cus_email='$email',
             cus_contactno='$phone',
             cus_address='$address',
             cus_city='$city',
             cus_country='$country'
             where cus_id='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'>Profile updated successfully!!!</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>Sorry,Something wrong!!!</span>";
			return $msg;
 	}
             }


	}
}
 ?>