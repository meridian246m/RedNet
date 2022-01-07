<?PHP
function RegisterAuthForm($ConfArray)
{	
	$RegisterAuthForm = file_get_contents("tpl/User-Reg-Form.tpl");
	$RegisterAuthForm = str_replace("{Domen}", 	  	  $ConfArray['Domen'], 		$RegisterAuthForm);
RETURN $RegisterAuthForm;  
}
function InsertNewUser($dbcnx,$post)
{
$test = AuthTest($dbcnx,$post);
if($test=='DUBLICAT!'){RETURN "dublicat-user-insert";}
$prefix=explode("@", $post['Email']);
$UserNickName=	$post['UserNickName']."@".$prefix[0];
$UserEmail=		$post['Email'];
$UserAvatar=	$post['UserAvatar'];
$UserRole=		"user";
$Country=		$post['Country'];
$Region=		$post['Region'];
$City=			$post['City'];
$UpTrust=		0;
$DownTrust=		0;
$Putdate=		date("Y-m-d H:i:s");
$DateOfBirth=	$post['DateOfBirth'];;
$Proffesion=	$post['Proffesion'];;
$Hobby=			$post['Hobby'];;
$SocialStatus=	$post['SocialStatus'];;
$Education=		$post['Education'];;
$LastEnterData=	"";
$Manifest=		"";
$UserPassword=	password_hash($post['Password'], PASSWORD_BCRYPT);
$query = "INSERT INTO RN_DBO_Users VALUES (0,
	'".$UserNickName."',
	'".$UserEmail."',
	'".$UserPassword."',
	'".$UserAvatar."',
	'".$UserRole."',
	'".$Country."',
	'".$Region."',
	'".$City."',
	'".$UpTrust."',										
	'".$DownTrust."',
	'".$Putdate."',
	'".$DateOfBirth."',
	'".$Proffesion."',
	'".$Hobby."',
	'".$SocialStatus."',
	'".$Education."',
	'".$LastEnterData."',
	'".$Manifest."'	
	);";
	if(mysqli_query($dbcnx,$query)) {RETURN "ok-user-insert";}else {RETURN "err-user-insert";}
}
function AutchUser($dbcnx,$post)
{
		$query = "SELECT * FROM RN_DBO_Users WHERE UserEmail='".$post['Email']."'";
		$data = mysqli_query($dbcnx,$query);
		$User = mysqli_fetch_array($data);
	$hash = 	$User['UserPassword'];
	$password = $post['Password'];
	if(password_verify($password, $hash))
	{
		$UserDataAuth=array();
		$UserDataAuth['UserID']			= $User['UserID'];
		$UserDataAuth['UserNickName']	= $User['UserNickName'];
		$UserDataAuth['UserEmail']		= $User['UserEmail'];
		$UserDataAuth['UserPassword']	= $User['UserPassword'];
		$UserDataAuth['UserAvatar']		= $User['UserAvatar'];
		$UserDataAuth['UserRole']		= $User['UserRole'];
		$UserDataAuth['Country']		= $User['Country'];
		$UserDataAuth['Region']			= $User['Region'];
		$UserDataAuth['City']			= $User['City'];
		$UserDataAuth['UpTrust']		= $User['UpTrust'];
		$UserDataAuth['DownTrust']		= $User['DownTrust'];
		$UserDataAuth['Putdate']		= $User['Putdate'];
		RETURN $UserDataAuth;
	}  else {RETURN 'TEST_ERR!';}								
}
function AuthTest($dbcnx,$post)
{
$query = "SELECT * FROM RN_DBO_Users WHERE UserEmail='".$post['Email']."'";
		$data = mysqli_query($dbcnx,$query);
		$User = mysqli_fetch_array($data);
		if($User['UserEmail']==$post['Email']) {RETURN "DUBLICAT!";exit;} else {RETURN "OK!";exit;}
}
function EmailToUserSend($email,$password)
	{				
		$to  = "<".$email.">"; 
		$subject 	= "Register on REDNET!"; 
		$message 	= "LOGIN: <b>".$email."</b><br>PASSWORD: <b>".$password."</b><br>";
		$message	= $message."<a href=rednet.md246.com>CLICK AND ENTER IN YOR <b>ACCOUNT!</a>";
		$headers  	= "Content-type: text/html; charset=windows-1251 \r\n"; 
		$headers.= "From:<noreply@rednet.md246.com>\r\n"; 
		$headers.= "Reply-To:".$email."\r\n"; 
		mail($to, $subject, $message, $headers); 				
	}


function EditFormUser($dbcnx,$UserID)
{
	$post=GetUserFromUserID($dbcnx,$UserID);
	$EditRormUser = 		file_get_contents("tpl/UserEditForm.tpl");
	$EditRormUser = 		str_replace("{UserID}",			$post['UserID'],		$EditRormUser);
	$EditRormUser = 		str_replace("{UserNickName}",	$post['UserNickName'],	$EditRormUser);
	$EditRormUser = 		str_replace("{UserEmail}",		$post['UserEmail'],		$EditRormUser);
	$EditRormUser = 		str_replace("{UserAvatar}",		$post['UserAvatar'],	$EditRormUser);
	$EditRormUser = 		str_replace("{Country}",		$post['Country'],		$EditRormUser);
	$EditRormUser = 		str_replace("{Region}",			$post['Region'],		$EditRormUser);
	$EditRormUser = 		str_replace("{City}",			$post['City'],			$EditRormUser);
	$EditRormUser = 		str_replace("{DateOfBirth}",	$post['DateOfBirth'],	$EditRormUser);
	$EditRormUser = 		str_replace("{Proffesion}",		$post['Proffesion'],	$EditRormUser);
	$EditRormUser = 		str_replace("{Hobby}",			$post['Hobby'],			$EditRormUser);
	$EditRormUser = 		str_replace("{SocialStatus}",	$post['SocialStatus'],	$EditRormUser);
	$EditRormUser = 		str_replace("{Education}",		$post['Education'],		$EditRormUser);	
	$EditRormUser = 		str_replace("{Manifest}",		$post['Manifest'],		$EditRormUser);	
	$EditRormUser = 		str_replace("{Gender}",		$post['Gender'],		$EditRormUser);	

RETURN 	$EditRormUser;
}
function UpdateUserInfo($dbcnx,$post)
{
			$query = "UPDATE RN_DBO_Users SET
							UserNickName='".$post['UserNickName']."',
							UserEmail='".$post['UserEmail']."',
							UserAvatar='".$post['UserAvatar']."',
							Country='".$post['Country']."',	
							Region='".$post['Region']."',	
							City='".$post['City']."',	
							DateOfBirth='".$post['DateOfBirth']."',	
							Proffesion='".$post['Proffesion']."',	
							Hobby='".$post['Hobby']."',	
							SocialStatus='".$post['SocialStatus']."',	
							Education='".$post['Education']."',	
							LastEnterData='".date("Y-m-d H:i:s")."',	
							Manifest='".$post['Manifest']."',	
							Gender='".$post['Gender']."'	
					WHERE 	UserID=".$post['UserID'];
//			ECHO $query;
			if(mysqli_query($dbcnx,$query)) {RETURN "OK-SAVE-USER-INFO";} else {RETURN "ERR-SAVE-USER-INFO";}
}
function GenerateUserInfoLeft($dbcnx,$UserDataAuth)
{
	$UserInfoLeft = 		file_get_contents("tpl/UserInfoLeft.tpl");
	$UserInfoLeft = str_replace("{UserID}",			$UserDataAuth['UserID'],		$UserInfoLeft);
	$UserInfoLeft = str_replace("{UserNickName}",	$UserDataAuth['UserNickName'],	$UserInfoLeft);
	$UserInfoLeft = str_replace("{UserEmail}",		$UserDataAuth['UserEmail'],		$UserInfoLeft);
	$UserInfoLeft = str_replace("{UserPassword}",	$UserDataAuth['UserPassword'],	$UserInfoLeft);
	$UserInfoLeft = str_replace("{UserAvatar}",		$UserDataAuth['UserAvatar'],	$UserInfoLeft);
	$UserInfoLeft = str_replace("{UserRole}",		$UserDataAuth['UserRole'],		$UserInfoLeft);
	$UserInfoLeft = str_replace("{Country}",		$UserDataAuth['Country'],		$UserInfoLeft);
	$UserInfoLeft = str_replace("{Region}",			$UserDataAuth['Region'],		$UserInfoLeft);
	$UserInfoLeft = str_replace("{City}",			$UserDataAuth['City'],			$UserInfoLeft);
	$UserInfoLeft = str_replace("{UpTrust}",		$UserDataAuth['UpTrust'],		$UserInfoLeft);
	$UserInfoLeft = str_replace("{DownTrust}",		$UserDataAuth['DownTrust'],		$UserInfoLeft);
	$UserInfoLeft = str_replace("{Putdate}",		$UserDataAuth['Putdate'],		$UserInfoLeft);
RETURN $UserInfoLeft;
}
function LastEnterDataUpdate($dbcnx,$UserID)
{
	$query = "UPDATE RN_DBO_Users SET LastEnterData='".date("Y-m-d H:i:s")."'	WHERE 	UserID=".$UserID;
			if(mysqli_query($dbcnx,$query)) {RETURN "OK-UPDATE-USER-ENTER-DATA";} else {RETURN "ERR-UPDATE-USER-ENTER-DATA";}
}

?>