<?php
require_once(__DIR__.'/common.php');

/*
 This 'account' class deals with the login and signup function
*/
class account {
	protected $user_table = "muser";
	private $loginErrEmail = "";
	private $loginErrPass = "";
	private $loginErrCount = 0;
	private $attempt = 0;
	private $email = "";
	private $pass = "";
	private $signupError;

	public function __construct() {
		common::getSession();
	}
	public function alert($msg) {
		return '<h1><i class="fa fa-exclamation-circle"></i> '.$msg.'</h1>';
	} // << End isLogged()   -----------------------------------------------------

	public function login() {
		if(isset($_POST['lnSub']) && $_POST['lnSub']=="submit") {
			$this->email = $_POST['lnEmail'];
			$this->pass = $_POST['lnPass'];
			$vald =  $this->validate();
			// Further Login Request if ,there is no error
			if($vald==0) {
				return $this->submit();
			}
		}
	} // << End login()   -----------------------------------------------------

		private function validate() {
				// Validating Input Data
				if(empty($this->email)) {
					echo '<div class="alert alert-danger" role="alert">* Please Enter Your Email</div>';
					$this->loginErrCount+=1;
				 }
				else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
					echo '<div class="alert alert-danger" role="alert">* Invalid Email !</div>';
					$this->loginErrCount+=1;
				 }

				if(empty($this->pass)) {
					echo '<div class="alert alert-danger" role="alert">*'." Password can't be empty</div>";
					$this->loginErrCount+=1;
				 }
				else if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,16}$/',$this->pass)) {
					echo '<div class="alert alert-danger" role="alert">* Special character not allowed</div>';
					$this->loginErrCount+=1;
				 }
			return $this->loginErrCount;
		} // << End validate()   -----------------------------------------------------

		private function submit() {
				global $_db;
				$result = $_db->select($this->user_table,"Email,Pass","Email='".$_db->esc_str($this->email)."' and Pass='".$_db->esc_str($this->pass)."'");

				if(@strtolower($result["Email"])==strtolower($this->email) && $result["Pass"]==$this->pass)
				{
					$_SESSION['login_user']=$this->email;
					return true;
				}
				else {
					if(isset($_COOKIE['lgn_attempt']))
						$this->attempt = $_COOKIE['lgn_attempt'];

					setcookie("lgn_attempt", $this->attempt+1, time() + (600), "/");
					echo '<div class="alert alert-danger" role="alert">Your Login Name or Password is invalid</div>';
					return false;
				}
		} // << End submit()   -----------------------------------------------------

	public function signUp() {
		  global $_db;
		   // Start Validation ----
		  if(isset($_POST['snSub']) && $_POST['snSub']=="submit") {
			  $error_count = $this->validateSignup();
				foreach($this->signupError as $errorMsg) {
					if($errorMsg !=NULL) {
						echo '<div class="alert alert-danger" role="alert">'.$errorMsg.'</div>';
					}
				}
		  }
		  else {
			  return;
		  }
		  if($error_count==0) {
				 @$name = $_db->esc_str($_POST['snName']);
				 @$email = $_db->esc_str($_POST['snEmail']);
				 @$pass = $_db->esc_str($_POST['snPass']);
				 @$gender = $_db->esc_str($_POST['snGen']);
				 @$phone = $_db->esc_str($_POST['snPh']);
				 @$age = $_db->esc_str($_POST['snAge']);
				 @$date_of_reg = common::ist_time();

				  $res = $_db->select($this->user_table,"*","Email='".$email."'");
				  if(count($res)<1) {
						 $new_user_id = "MU".common::keygen(8);
						$io = $_db->insert('muser',
							   array($new_user_id, $name, $email, $pass, $gender, $phone, $age, $date_of_reg),
							   "UserID, Name, Email, Pass, Gender, Phone, Age, Date_Of_Reg"
						);

						if($io)
							  echo '<div class="alert alert-success" role="alert">Registered Successfully.</div>';
						else
							  echo '<div class="alert alert-danger" role="alert">Error in Regisrtation'.$_db->error() .'</div>';
					}
				  else
							echo '<div class="alert alert-primary" role="alert">SORRY...YOU ARE ALREADY REGISTERED USER</div>';
		  }
	} // << End signup()   -----------------------------------------------------

		protected function valFName($fname, &$ec=0) {
			if(empty($fname)) {
				$ec++;
				return "* First Name is Required";
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$fname)) {
				$ec++;
				return "* Special character not allowed";
			}
		}

		protected function valLName($lname, &$ec=0) {
			if(empty($lname)) {
				$ec++;
				return "* Last Name is Required";
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$lname)) {
				$ec++;
				return "* Special character not allowed";
			}
		}

		protected function valEmail($email, &$ec=0) {
			if(empty($email)) {
				$ec++;
				return "* Email is Required";
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$ec++;
				return "* Invalid Email !";
			}
		}

		protected function valPass($pass, &$ec=0) {
			if(empty($pass)) {
				$ec++;
				return "* Password can't be empty";
			}
			else if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,16}$/',$pass)) {
				$ec++;
				return "* These special character not allowed";
			}
		}

		protected function valGen($gen, &$ec=0) {
			if(empty($gen)) {
				$ec++;
				return "* Please select a Gender";
			}
			else if($gen!='F' && $gen!='M' && $gen!='O') {
				$ec++;
				return "* Gender not Accepted !";
			}
		}

		protected function valCon($country, &$ec=0) {
			if(empty($country)) {
				$ec++;
				return "* Please Select a Country";
			}
			else if(!preg_match("/^[a-zA-Z ]*$/",$country) || strlen($country)!=2) {
				$ec++;
				return "* Invalid Country Selection !";
			}
		}

		protected function valPh($ph, &$ec=0) {
			if(empty($ph)) {
				$ec++;
				return "* Phone Number can't be empty";
			}
			else if(!is_numeric($ph) || !(strlen($ph)>9 && strlen($ph)<16)) {
				$ec++;
				return "* Invalid Phone Number !";
			}
		}

		protected function valDb($dd, $dm, $dy, &$ec=0) {
			if(empty($dd) || empty($dm) || empty($dy)) {
				$ec++;
				return "* Incomplete Date of Birth !";
			}
			else if(!checkdate($dm, $dd, $dy)) {
				$ec++;
				return "* Invalid Date of Birth !";
			}
		}

		private function validateSignup() {
					$ec=0; // No. of Error found
					$error_msg = array('fn'=>'','ln'=>'','em'=>'','gn'=>'','ps'=>'','cn'=>'','db'=>'','ph'=>'');

					$error_msg['nm'] = $this->valFName($_POST['snName'],$ec);
					$error_msg['em'] = $this->valEmail($_POST['snEmail'],$ec);
					$error_msg['gn'] = $this->valGen($_POST['snGen'],$ec);
					$error_msg['ps'] = $this->valPass($_POST['snPass'],$ec);
					$error_msg['ph'] = $this->valPh($_POST['snPh'],$ec);

					$this->signupError = $error_msg;
					return $ec;

		} // << End validateSignup()   -----------------------------------------------------

}



/*
 * It handles the user data retrieval,
 * updation and other changes.
 */
class user extends account
{
	protected $user;
	protected $userID;
	protected $shop_table = "shopping_cart";
	protected $cat1 = "category";
	protected $cat2 = "subcat";
	protected $cat3 = "subsubcat";
	protected $prod_table = "product";
	protected $spec_table = "prod_specs";
	protected $seller_table = "seller";
	protected $order_table = "orders";
	protected $orderItem_table = "order_item";
	protected $addr_table = "saved_address";
	protected $delTrack_table = "orderdeltrack";

	public function __construct() {
		parent::__construct();

		if($this->isLogged()) {
			$userInfo = $this->getInfo();
			$this->user = $userInfo;
			$this->userID = $userInfo['UserID'];
		}
	}

	public function isLogged() {

		if(isset($_SESSION['login_user']))
		    return true;
		else
		    return false;
	} // << End isLogged()   -----------------------------------------------------

	public function getInfo() { # Return details about current logged user
		global $_db;
		$User = array();

		if(isset($_SESSION['login_user'])) {
			$email = $_db->esc_str($_SESSION['login_user']);
			$res = $_db->select($this->user_table,"*","Email='".$email."'");

			if(count($res)>1) {
				foreach($res as $key=>$val) {
					$User[$key] = $val;
				}
				return $User;
			}
			else
				return false;
		}
		else
			return false;
	} // << End getInfo()   -----------------------------------------------------

	public function updateProfile() {
		global $_db;
		$errMsg = '';
		$attr = '';
		$ec = 0;
		$fData = explode(":", $_POST['FormDat']);
		$key = $fData[0];
		$i=1;
		$val = '';
		while(isset($fData[$i])) {
			$val.= $fData[$i];
			if(isset($fData[$i+1]))
			   $val.= ':';
			$i++;
		}

		if($key == "nm") {
			$val = explode(':',$val);
			$fn = $val[0];
			@$ln = $val[1];
			$errMsg.= parent::valFName($fn, $ec);
			$errMsg.= parent::valLName($ln, $ec);
			if($ec==0) {
				$update = $_db->update($this->user_table,array('Fname'=>$fn), array('UserID', $this->user['UserID']));
				$update = $_db->update($this->user_table,array('Lname'=>$ln), array('UserID', $this->user['UserID']));
				$ec=2; // Encountering Mannual error to prevent ReUpdation
				echo 200;
			}
		}
		else if($key == "em") {
			$errMsg = parent::valEmail($val, $ec);
			$attr = 'Email';
		}
		else if($key == "ph") {
			$errMsg = parent::valPh($val, $ec);
			$attr = 'Phone';
		}
		else if($key == "dob") {
			$v = explode('-',$val);
			$dy = $v[0];
			@$dm = $v[1];
			@$dd = $v[2];
			$errMsg = parent::valDb($dd, $dm, $dy, $ec);
			$attr = 'DateOfBirth';
		}
		else if($key == "gn") {
			$errMsg = parent::valGen($val, $ec);
			$attr = 'Gender';
		}
		else if($key == "ab") {
			if(empty($val)) {
				$errMsg = "* Cannot update to Empty text";
				$ec++;
			}
			$attr = 'about';
		}
		else if($key == "CountryCode") {
			$errMsg = parent::valCon($val, $ec);
			$attr = 'Country';
		}
		if($ec==0) {
			$update = $_db->update($this->user_table,array($attr=>$val), array('UserID', $this->userID));

			if($update) {
			   echo 200;
			   if($attr == 'Email')
			      $_SESSION['login_user']=$val;
			}
			else
			   echo 401;
		}
		else
		    echo $errMsg;
	}

	public function logoutLink() {
		global $_g;
		if($this->isLogged()) {
			return '<a href="/logout"><i class="fa fa-sign-out"></i> Logout</a>';
		}
		else {
			return '';
		}
	} // << End accountLink()   -----------------------------------------------------

	public function logout() {
		global $_g;
		session_unset(); // remove all session variables
		session_destroy(); // destroy the session
		header("Location: /index.php");
		exit();
	} // << End logout()   -----------------------------------------------------

	public function lockPage() {  // Lock a page to prevent unauthorized access
		global $_g;
	  if(!$this->isLogged()) {
		header("Location: /login?ref=Notlogged");
		exit();
		$refferer='http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		setcookie("client_refferer", $refferer, time()+300, '/', 'localhost' );
	  }
	} // << End lockPage()   -----------------------------------------------------

	public function unlockPage() {  // Prevent logged user to access this page
		global $_g;
	  if($this->isLogged())
		header("Location: /index.php");
	} // << End unlockPage()   -----------------------------------------------------

} // << End class defination

$_ac = new account();
$_user = new user();
?>
