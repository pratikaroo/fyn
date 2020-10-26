<?php
        $base = "localhost/shop";
	class Fyn
	{
		public $db;
		function __construct()
		{
			$hostname = "localhost";
			$dbname = "shop";       //Database name
			$username = "root";     //Username            
			$password = "root";     //Password
			$this->db = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
		}
		
		public function validateUser($username,$password){
			if(empty($username) || empty($password)){
				return "Please provide Username and Password";
			}else{
				$pass = sha1($password);
				$chksql = "SELECT username FROM users WHERE username = :username AND password = :pass";
				$stmt = $this->db->prepare($chksql);
				$stmt->bindParam(':username', $username);  
				$stmt->bindParam(':pass', $pass);
				$stmt->execute();
				if($stmt->rowCount() > 0){
				    $dtt = date("Y-m-d H:i:s");
        			$dsql = "UPDATE `users` SET `login_datetime`= '$dtt' WHERE username=".$username;
        			$dstmt = $this->db->prepare($dsql);
        			$dstmt->execute();
					session_start();
					$_SESSION['username'] = $username;
					header("Location: index.php");
				}else{
					return "Invalid Username and/or Password";
				}
			}
			
		}
                
                public function registerUser($username, $password) {
                    if(empty($username) || empty($password)){
				return "Please provide Username and Password";
			}else{				
				$chksql = "SELECT username FROM users WHERE username = :username";
				$stmt = $this->db->prepare($chksql);
				$stmt->bindParam(':username', $username);
				$stmt->execute();
				if($stmt->rowCount() > 0){
                                    return "Username/Email already exits";
                                }else{
                                    $dtt = date("Y-m-d H:i:s");
                                    $password = sha1($password);
                                    $dsql = "INSERT INTO `users`(`username`,`password`,`login_datetime`) VALUES(:username, :password, :dt)";
                                    $dstmt = $this->db->prepare($dsql);
                                    $dstmt->bindValue(':username', $username);
                                    $dstmt->bindValue(':password', $password);
                                    $dstmt->bindValue(':dt', $dtt);
                                    $res = $dstmt->execute();
                                        if($res){
                                                session_start();
                                                $_SESSION['username'] = $username;
                                                header("Location: index.php");
                                        }
				}
			}
                    
                }
		
		public function getLastOrderID(){
			$sql = "SELECT LAST_INSERT_ID(`order_id`) as oid From orders";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
                
                public function getOrderDetails($email){
			$sql = "SELECT order_id, GROUP_CONCAT(order_items) as items From orders WHERE user_name='".$email."' GROUP BY order_id";
                        //var_dump($sql);
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
                
                public function addOrder($oid,$email,$itemid){
                        $datetime = date("Y-m-d H:i:s");
                        $sql = "INSERT INTO `orders`(`order_id`, `user_name`, `order_items`, `created_date`)  VALUES  (:oid,:email,:iid,:created_date)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindValue(':oid', $oid);
                        $stmt->bindValue(':email', $email);
                        $stmt->bindValue(':iid', $itemid);
                        $stmt->bindValue(':created_date', $datetime);
                        $result = $stmt->execute();
			return $result;
		}
                
                public function addUserDetails($username,$fname,$lname,$phone,$add,$country,$apt,$city,$district,$pincode,$note){
                    $datetime = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO `user_address`(`user_name`, `first_name`, `last_name`, `phone_number`, `address`, `country`, `apt`, `city`, `district`, `pincode`, `note`, `created_date`) VALUES  (:uname,:fname,:lname,:phone,:add,:country,:apt,:city,:district,:pincode,:note,:created_date)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindValue(':uname', $username);
                    $stmt->bindValue(':fname', $fname);
                    $stmt->bindValue(':lname', $lname);
                    $stmt->bindValue(':phone', $phone);
                    $stmt->bindValue(':add',$add);
                    $stmt->bindValue(':country', $country);
                    $stmt->bindValue(':apt', $apt);
                    $stmt->bindValue(':city', $city);
                    $stmt->bindValue(':district', $district);
                    $stmt->bindValue(':pincode', $pincode);
                    $stmt->bindValue(':note', $note);
                    $stmt->bindValue(':created_date', $datetime);
                    $result = $stmt->execute();
                    return $result;
                }
                
                
		
		public function checkSession(){
			session_start();
			if(empty($_SESSION['username'])){
				header("Location: login.php");
			}
		}
		
		public function logout(){
			session_start();
			session_destroy();
			header("Location: login.php");
		}
		
	}
