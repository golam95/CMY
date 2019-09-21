<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
<?php 
class Cart{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}

	public function addToCart($size,$quantity,$id){
		$quantity=$this->fm->validation($quantity);
		$size=mysqli_real_escape_string($this->db->link,$size);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);
		$productId=mysqli_real_escape_string($this->db->link,$id);
		
		if($quantity==""||$size==""){
			$msg="Sorry,Field must not empty!!";
			return $msg;
		}else{
			if($quantity<=0){
			$msg="Sorry,Invalid Quantity!!";
			return $msg;
		}else{
			
		$sId=session_id();
		$query="select * from product where productId='$id'";
		$result=$this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price       = $result['price'];
		$image       = $result['image'];
		$qun         =$result['quantity'];
		$chquery="select * from cart where productId='$id' and sId='$sId'";
		$getPro=$this->db->select($chquery);
		if ($getPro) {
			$msg="Product already added";
			return $msg;
		}else{
			if ($quantity>=$qun) {
				$msg="Available quantity: $qun";
				return $msg;
			}else{
		 $query = "INSERT INTO cart(sId,productId,productName,price,quantity,image,size)
    VALUES('$sId','$productId','$productName','$price','$quantity','$image','$size')";

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
			header("Location: shoping-cart.php");
		}else{
		header("Location: 404.php");
		}
	}
	 }
	 }
		}
		
	
	}
	
	
	
	
	//Add to cart rent
	
       public function addToCart_rentproduct($month,$size,$quantity,$get_rentid){
		
		$quantity=$this->fm->validation($quantity);
		$month=mysqli_real_escape_string($this->db->link,$month);
		$size=mysqli_real_escape_string($this->db->link,$size);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);
		$get_rentid=mysqli_real_escape_string($this->db->link,$get_rentid);
		
		if($month==""||$size==""||$quantity==""){
			$msg="Sorry,Field must not empty!!";
			return $msg;
		}else if($quantity<=0){
			$msg="Sorry,Invalid Quantity!!";
			return $msg;
		}else {
			$sId=session_id();
			$query="select * from rent_product where id='$get_rentid'";
			$result=$this->db->select($query)->fetch_assoc();
			$productName = $result['rent_pname'];
			$price       = $result['rent_sellprice'];
			$image       = $result['rent_image'];
			$qun         =$result['rent_quantity'];
			$chquery="select * from rent_cart where productId='$get_rentid' and sId='$sId'";
			$getPro=$this->db->select($chquery);
			if($getPro){
				$msg="Product already added!!";
				return $msg;
			}else{
				if($quantity>=$qun){
					$msg="Available quantity: $qun";
					return $msg;
				}else{
					 $query = "INSERT INTO rent_cart(sId,productId,productName,price,quantity,image,size,month)
                     VALUES('$sId','$get_rentid','$productName','$price','$quantity','$image','$size','$month')";
                     $productInsert=$this->db->insert($query);
					if ($productInsert) {
						
						header("Location:rent_cart.php");
						
					}else{
						
					   header("Location: 404.php");
					
					}
					
				}
				
				
			}
				
		}
	
	 }
	
	
	//add to cart rent
	
	public function getCartProduct(){
	$sId=session_id();
	$query="select * from cart where sId='$sId'";
 	$result=$this->db->select($query);
 	return $result;
	}
	
	//for rent
	
	public function getCartProduct_rent(){
		$sId=session_id();
		$query="select * from rent_cart where sId='$sId'";
 	    $result=$this->db->select($query);
 	    return $result;
	}
	//for rent
	
	
	public function updateCartQuantity($cartId,$quantity){
		$cartId=mysqli_real_escape_string($this->db->link,$cartId);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);

		$qury="update cart set quantity='$quantity' where cartId='$cartId'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		header("Location: shoping-cart.php");
 	}else{
 		$msg="<span class='error'>Quantity  not updated!</span>";
			return $msg;
 	}

	}
	
	

	public function delProductByCart($delId){
		$delId=mysqli_real_escape_string($this->db->link,$delId);
		$query="delete from cart where cartId='$delId'";
	$deldata=$this->db->delete($query);
	if ($deldata) {	
		echo("<script>window.location='shoping-cart.php';</script>");
		
			
}else{
 		$msg="<span class='error'>Product  not deleted!</span>";
			return $msg;
 	}
	}
	
	
	
	public function delProductByCart_rent($delId){
		$delId=mysqli_real_escape_string($this->db->link,$delId);
		$query="delete from  rent_cart where cartId='$delId'";
	$deldata=$this->db->delete($query);
	if ($deldata) {	
		echo("<script>window.location='rent_cart.php';</script>");
		
			
    }else{
 		$msg="<span class='error'>Product  not deleted!</span>";
			return $msg;
 	}
	}
	
	
	
	
	
	
	
	
	
	public function checkCartTable(){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
	//
	public function checkcartRentTable(){
		$sId=session_id();
		$query="select * from rent_cart where sId='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
	//
	
	
	public function delUserCart(){
		$sId=session_id();
		$query="delete from cart where sId='$sId'";
		$this->db->delete($query);
	}
	
	
	
	public function orderProduct($uid){
		$sId=session_id();
		
		$productId="";
		$productName="";
		$quantity="";
		$price="";
		$image="";
		$vat="";
		$total="";
		$count_quantity=0;
		
		 $query="select * from cart where sId='$sId'";
				$result=$this->db->select($query);
				while ($re=$result->fetch_assoc()) {
				
				
		        $productId=$re['productId'];
				$productName=$re['productName'];
				$quantity=$re['quantity'];
				   
				$price=$re['price']*$re['quantity'];
				$image=$re['image'];
				
				$count_quantity=$count_quantity+$re['quantity'];
                $total=$total+$price;
				 
			}
				
			    $vat    =$total * .1;
                $gtotal =$total + $vat;
		
		
				$query="select * from product where productId='$productId'";
				$getProduct=$this->db->select($query);
				while ($result=$getProduct->fetch_assoc()) {
				$qty = $result['quantity'];
			}
				$uqty=$qty-$quantity;
				$qury="update product set quantity='$uqty' where productId='$productId'";
 	            $update_row=$this->db->update($qury);

 	            $query="SELECT * FROM customerinfo WHERE role='1'";
				$result=$this->db->select($query);
				while ($re=$result->fetch_assoc()) {
				$fromadminEmail=$re['cus_email'];
				 
			}
				
				//return $fromadminEmail;
                $query="select * from customerinfo where cus_id='$uid' and role='1' limit 1";
				$result=$this->db->select($query)->fetch_assoc();
				$name=$result['cus_name'];
				$to=$result['cus_email'];
				
				
	include 'mailSender.php';		
				
	$mail->setFrom('', 'CMY Online AC Shop & Services');
    $mail->addAddress($to,'Nafina');     // Add a recipient
                   // Name is optional
    $mail->addReplyTo('hasan@gmail.com', 'CMY Online AC Shop & Services');
  
    $message="Welcome to visit our website & thankyou for purchasing";
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Purchased Details';
    $mail->Body    = 'Dear '.$name.','.$message.'.Your total payable amount(including vat) : '.$gtotal.' We will contact you as soon as possible with delivery details. Thank You.';
    
	if(!$mail->send()){
    echo("<script>alert('Message has not  sent');</script>");
                 
   
}else{
     echo("<script>alert('Check your Email');</script>");
}
              $query = "INSERT INTO payment( userId ,productId,quantity,total_amount)
                VALUES('$uid','$productId','$count_quantity','$gtotal')";
                 $insertorde=$this->db->insert($query);

				$query = "INSERT INTO cus_order( userId ,productId,productName,quantity,price,image)
              VALUES('$uid','$productId','$productName','$count_quantity','$gtotal','$image')";
              $insertorde=$this->db->insert($query);

              	$sId=session_id();
				$query="delete from cart where sId='$sId'";
				$delcart=$this->db->delete($query);

				 $query="SELECT MAX(orderId) AS id FROM cus_order";
				$result=$this->db->select($query)->fetch_assoc();
				$orderId=$result['id'];
				if ($insertorde) {
            	echo("<script>window.location='success.php?smid=$uid & orderId=$orderId';</script>");
            //}
          }
		
	}
	
	
	
	
	
	//Order rent
	
	
	public function orderProduct_rent($uid){
		$sId=session_id();
		
		$productId="";
		$productName="";
		$quantity="";
		$price="";
		$image="";
		$vat="";
		$total="";
		$month="";
		$count_quantity=0;
		
		 $query="select * from rent_cart where sId='$sId'";
				$result=$this->db->select($query);
				while ($re=$result->fetch_assoc()) {
				
				
		        $productId=$re['productId'];
				$productName=$re['productName'];
				$quantity=$re['quantity'];
				$month=$re['month'];
				
				
				$price=$re['price']*$re['quantity']*$month;
				$image=$re['image'];
				$count_quantity=$count_quantity+$re['quantity'];
                $total=$total+$price;
				 
			}
				
			    $vat    =$total * .1;
                $gtotal =$total + $vat;
		        $date = date('Y-m-d');
				
		
				$query="select * from rent_product where id='$productId'";
				$getProduct=$this->db->select($query);
				while ($result=$getProduct->fetch_assoc()) {
				$qty = $result['rent_quantity'];
			}
				$uqty=$qty-$quantity;
				$qury="update rent_product set rent_quantity='$uqty' where id='$productId'";
 	            $update_row=$this->db->update($qury);

 	            $query="SELECT * FROM customerinfo WHERE role='1'";
				$result=$this->db->select($query);
				while ($re=$result->fetch_assoc()) {
				$fromadminEmail=$re['cus_email'];
				 
			}
				
				//return $fromadminEmail;
                $query="select * from customerinfo where cus_id='$uid' and role='1' limit 1";
				$result=$this->db->select($query)->fetch_assoc();
				$name=$result['cus_name'];
				$to=$result['cus_email'];
				
				
	include 'mailSender.php';		
				
	$mail->setFrom('', 'CMY Online AC Shop & Services');
    $mail->addAddress($to,'Nafina');     // Add a recipient
                   // Name is optional
    $mail->addReplyTo('hasan@gmail.com', 'CMY Online AC Shop & Services');
  
    $message="Welcome to visit our website & thankyou for purchasing";
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Purchased Details';
    $mail->Body    = 'Dear '.$name.','.$message.'.Your total payable amount(including vat) : '.$gtotal.' We will contact you as soon as possible with delivery details. Thank You.';
    
	if(!$mail->send()){
    echo("<script>alert('Message has not  sent');</script>");
                 
   
}else{
	
     echo("<script>alert('Check your Email');</script>");
	 
}
              $query = "INSERT INTO rent_payment( userId ,productId,quantity,total_amount,month,date,rent_status)
                VALUES('$uid','$productId','$count_quantity','$gtotal','$month','$date','0')";
                 $insertorde=$this->db->insert($query);

			   $query = "INSERT INTO cus_orderent( userId ,productId,productName,quantity,price,image,date,status,month)
              VALUES('$uid','$productId','$productName','$count_quantity','$gtotal','$image','$date','0','$month')";
			  
              $insertorde=$this->db->insert($query);

              	$sId=session_id();
				$query="delete from rent_cart where sId='$sId'";
				$delcart=$this->db->delete($query);

				 $query="SELECT MAX(orderId) AS id FROM cus_orderent";
				$result=$this->db->select($query)->fetch_assoc();
				$orderId=$result['id'];
				if ($insertorde) {
            	echo("<script>window.location='succesrent_amount.php?smid=$uid & orderId=$orderId';</script>");
            //}
          }
		
	}
	
	
	
	
	

	
	//order rent
	
	
	
	
	
	
	
	
	

	public function payableAmount($smid,$orderId){
		$sId=session_id();
		$query="select price from cus_order where userId='$smid' and orderId='$orderId'";
 	$result=$this->db->select($query);
 	return $result;
	}
	
	
	public function payableAmount_rent($smid,$orderId){
		$sId=session_id();
		$query="select price from cus_orderent where userId='$smid' and orderId='$orderId'";
 	$result=$this->db->select($query);
 	return $result;
	}
	
	
	
	public function getOrderProduct($uid){
		$query="select * from cus_order where userId='$uid' order by date desc";
 	$result=$this->db->select($query);
 	return $result;

	}
	
	public function getOrderProduct_rent($uid){
		$query="select * from cus_orderent where userId='$uid' order by date desc";
 	$result=$this->db->select($query);
 	return $result;

	}
	
	
	
	
	
	
	public function checkOrder($uid){
	
		$query="select * from cus_order where userId='$uid'";
		$result=$this->db->select($query);
		return $result;
	}
	public function getAllProduct(){
		$query="select * from cus_order order by date desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getDeliveryProduct(){
		$query="select * from pro_delivery";
		$result=$this->db->select($query);
		return $result;
	}
	public function getSpecificProduct($id,$time){
		$query="select * from cus_order where userId='$id' and date='$time'";
		$result=$this->db->select($query);
		return $result;
	}
	public function productShift($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='1' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function delShiftedOrder($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$query="delete from cus_order where userId ='$id' and date ='$time' and price ='$price'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$msg="<span class='success'>data deleted successful</span>";
			return $msg;
}else{
 		$msg="<span class='error'>data  not deleted!</span>";
			return $msg;
 	}
	}
	public function productShiftConfirm($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='2' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function insertService($orderId,$productName,$quantity,$price,$serviceman,$delivery){
		$orderId=$this->fm->validation($orderId);
		$productName=$this->fm->validation($productName);
		$quantity=$this->fm->validation($quantity);
		$price=$this->fm->validation($price);
		$serviceman=$this->fm->validation($serviceman);
		$delivery=$this->fm->validation($delivery);
		$orderId=mysqli_real_escape_string($this->db->link,$orderId);
		$productName=mysqli_real_escape_string($this->db->link,$productName);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);
        $price=mysqli_real_escape_string($this->db->link,$price);
        $serviceman=mysqli_real_escape_string($this->db->link,$serviceman);
        $delivery=mysqli_real_escape_string($this->db->link,$delivery);
        $amount=$quantity*$price;

		if (empty($delivery)) {
			$msg="<span class='error'> Date Field must not be empty!</span>";
			return $msg;
		}elseif (empty($serviceman)) {
			$msg="<span class='error'>Service & Date Field must not be empty!</span>";
			return $msg;
		}else{

		 $query = "INSERT INTO pro_delivery(orderId,productName,quantity,price, 	total_amount,serviceman,delivery_date)
       VALUES('$orderId','$productName','$quantity','$price','$amount', '$serviceman','$delivery')";

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
 		$msg="<span class='success'> Insert successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  Not Insert!</span>";
			return $msg;
 	}
	 }
	}
	
}
 ?>