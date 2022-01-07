<?PHP
	session_start(); 
	if(!isset($_SESSION['UserDataAuth'])){$Page="AuthUser";}
//////////////////////////////////////////////////////
	INCLUDE "config/db-config.php";	
	INCLUDE "functions/Get-functions.php";	
	INCLUDE "functions/Site-init-functions.php";	
	INCLUDE "functions/Users-functions.php";	
	INCLUDE "functions/Post-functions.php";	
	INCLUDE "functions/Coment-functions.php";	
	INCLUDE "functions/Friends-functions.php";	
	INCLUDE "functions/Sms-functions.php";	
	INCLUDE "functions/Unions-functions.php";	
//////////////////////////////////////////////////////		
	$UserDataAuth	=	$_SESSION['UserDataAuth'];
	$ConfArray		=	InitSite($dbcnx);
	if($_GET['Page']<>'') {$Page=$_GET['Page'];} 
	if($_POST['Page']<>''){$Page=$_POST['Page'];}
	LastEnterDataUpdate($dbcnx,$UserDataAuth['UserID']);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////							
///////////////////////****PAGE ЗАПРОСЫ****//////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($Page=="CityUnions")
		{
			$UserDataAuth=	$_SESSION['UserDataAuth'];
			$HEADER		=	HeaderSite($ConfArray,"");
			$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
			$TitleRight	=	"YOR POST";			
			$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
			$RightData	=	UnionsListFR($dbcnx,$UserDataAuth,$_POST['UnionWorld'],$_POST['UnionCountry'],$_POST['UnionRegion'],$_POST['UnionCity']);
			$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
		}
	if($Page=="RegionUnions")
		{
			$UserDataAuth=	$_SESSION['UserDataAuth'];
			$HEADER		=	HeaderSite($ConfArray,"");
			$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
			$TitleRight	=	"YOR POST";			
			$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
			$RightData	=	UnionsListFR($dbcnx,	$UserDataAuth,	$_POST['UnionWorld'],  $_POST['UnionCountry'],$_POST['UnionRegion'],$_POST['UnionCity']);
			//				UnionsListFR($dbcnx,	$UserDataAuth,	$UnionWorld,		   $UnionCountry,		  $UnionRegion,			$UnionCity);
			$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
		}
	if($Page=="ContryUnions")
		{
			$UserDataAuth=	$_SESSION['UserDataAuth'];
			$HEADER		=	HeaderSite($ConfArray,"");
			$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
			$TitleRight	=	"YOR POST";			
			$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
			$RightData	=	UnionsListFR($dbcnx,$UserDataAuth,$_POST['UnionWorld'],$_POST['UnionCountry'],$_POST['UnionRegion'],$_POST['UnionCity']);
			$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
		}
	if($Page=="WorldUnions")
		{
			$UserDataAuth=	$_SESSION['UserDataAuth'];
			$HEADER		=	HeaderSite($ConfArray,"");
			$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
			$TitleRight	=	"YOR POST";			
			$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
			$RightData	=	UnionsListFR($dbcnx,$UserDataAuth,$_POST['UnionWorld'],$_POST['UnionCountry'],$_POST['UnionRegion'],$_POST['UnionCity']);
			$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
		}
		
	
	if($Page=="Get-SMS")
		{
			$FriendID=$_POST['FriendID'];
			$UserID=$UserDataAuth['UserID'];			
			echo ShowSMSListFromUSERS_ajax($dbcnx,$UserDataAuth,$UserID,$FriendID);exit;
		}

	if($Page=="User-Page")
		{ echo $Page;
			$TEST=AutchUser($dbcnx,$_POST);
			if($TEST<>'TEST_ERR!')
			{
				session_start();			
				$_SESSION['UserDataAuth']=$TEST;
				echo 	 '<script>location.replace("rednet.php");</script>'; exit;
			} else {echo '<script>location.replace("rednet.php?Page=UserNotFound");</script>'; exit;}
			$HEADER		=	HeaderSite($ConfArray,"");
		}
	if($Page=='')
		{
			echo '<script>location.replace("rednet.php?Page=UserPage");</script>';
		}
	if($Page=='UserPage')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitleRight	=	"YOR POST";
		$DataPost	=	GetPostFromUserID($dbcnx,$UserDataAuth['UserID']);
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	=	GenerateUserPostRight($dbcnx,$DataPost,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}	
		
	if($Page=='WORLD_POST')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitleRight	=	"WORLD POST";
		$DataPost	=	GetPostONStatus($dbcnx,1,$UserDataAuth," ID DESC");
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	=	GenerateUserPostRight($dbcnx,$DataPost,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
	if($Page=='COUNTRY_POST')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"COUNTRY POST";
		$DataPost	=	GetPostONStatus($dbcnx,2,$UserDataAuth," ID DESC");
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	=	GenerateUserPostRight($dbcnx,$DataPost,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
	if($Page=='REGION_POST')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"REGION POST";
		$DataPost	=	GetPostONStatus($dbcnx,3,$UserDataAuth," ID DESC");
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	=	GenerateUserPostRight($dbcnx,$DataPost,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
	if($Page=='CITY_POST')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"CITY POST";
		$DataPost	=	GetPostONStatus($dbcnx,4,$UserDataAuth," ID DESC");
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	=	GenerateUserPostRight($dbcnx,$DataPost,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
	if($Page=='FriendsPost')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"FRIEND POST LIST";		
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	=	FriendPostList($dbcnx,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
	if($Page=='AllMyFriends')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"FRIEND LIST";		
		if($_POST['msg']=='SerchFriend')
			{
				$SearchFRArray=	GetSearchFriend($dbcnx,$_POST,"ORDER BY UserID DESC");
				$FriendList=	SearchFriendList($dbcnx,$UserDataAuth,$SearchFRArray);		
				$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).SearchFriendForm($dbcnx);
				$RightData	=	$FriendList;
				$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);			
			}
			else
			{
				$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).SearchFriendForm($dbcnx);
				$RightData	=	FriendList($dbcnx,$UserDataAuth);
				$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
			}
	}
	if($Page=='ADDFriend')
	{
		echo "Friend Setting Update!";
		$MSG= 	InsertAddFriend($dbcnx,$_POST,$UserDataAuth);
		echo "<br>".$MSG;
		echo "<script>window.location.href='javascript:history.back(-1);'</script>";
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if($Page=='FriendsSMS')
	{				
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$UserID=		$UserDataAuth['UserID'];
		if($_POST['FriendID']>0){$FriendID=$_POST['FriendID'];}
		if($FriendID>0)
		{
			if($_POST['NewSMS']<>'') 
				{
					$FromUserID=	$_POST['UserID'];
					$ToFriendID=	$_POST['FriendID'];
					$SMS=			$_POST['NewSMS'];
					AddNewSMSFromUser($dbcnx,$SMS,$FromUserID,$ToFriendID);
				}		
		}	
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitleRight	=	"FRIENDS SMS";		
		if($_POST['FriendID']>0)
		{
			$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ShortFriendListForSMS($dbcnx,$UserDataAuth);
			$RightData	=	ShowSMSListFromUSERS($dbcnx,$UserDataAuth,$UserID,$FriendID);
			$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
		} 
		else
		{
			//ShortFriendList($dbcnx,$UserDataAuth)
	//		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).FriendListForSMS($dbcnx,$UserDataAuth);
			$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ShortFriendListForSMS($dbcnx,$UserDataAuth);


			$RightData	= 	"";
			$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
		}
		
	}
		if($Page=='AddComment')
	{
		$MSG=	InsertComent($dbcnx,$_POST);		
	}
	if($Page=='UpTrust')
	{
		$MSG = UpTrustPost($dbcnx,$_POST['PostID']);
		echo  GetUpTrust($dbcnx,$_POST['PostID']); exit;
	}
	if($Page=='DownTrust')
	{
		$MSG=DownTrustPost($dbcnx,$_POST['PostID']);
		echo  GetDownTrust($dbcnx,$_POST['PostID']);exit;
	}
	if($Page=='YES')
	{
		$MSG=YesPost($dbcnx,$_POST['PostID']);
		echo  GetYES($dbcnx,$_POST['PostID']);exit;
	}
	if($Page=='NO')
	{
		$MSG=NoPost($dbcnx,$_POST['PostID']);
		echo  GetNO($dbcnx,$_POST['PostID']);exit;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if($Page=='EditUserForm')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"EDIT YOUR INFO";		
		
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	= 	EditFormUser($dbcnx,$UserDataAuth['UserID']);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);		
	}
	if($Page=='SAVEUser')
	{
		echo UpdateUserInfo($dbcnx,$_POST);
		echo '<script>location.replace("rednet.php?Page=EditUserForm");</script>';
	}
	if($Page=='UserFRPage')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitleRight	=	"FRIEND USER PAGE";		
		$UserFriendPage=GenerateUserFrindPage($dbcnx,$_GET['FriendID'],$UserDataAuth);
		$UserFriendPost=GenerateUserPost($dbcnx,$_GET['FriendID'],$UserDataAuth);		
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ShortFriendList($dbcnx,$UserDataAuth);//FriendListForSMS($dbcnx,$UserDataAuth);
		$RightData	= 	$UserFriendPage.$UserFriendPost;
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);		
	}
	if($Page=='AddPostForm')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"NEW POST";
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	= 	CreatePostForm();
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
		
	}
		if($Page=='PostEditForm')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"EDIT YOR POST";
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	= 	EditPostForm($dbcnx,$_POST['PostID']);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
	if($Page=='PostDelete')
	{
		$MSG=DeletePost($dbcnx,$_POST['PostID'],$UserDataAuth['UserID']);
		echo $MSG; 
		echo "<script>window.location.href='javascript:history.back(-1);'</script>";
	}
	if($Page=='UpdatePost')
	{
		$MSG=UpdatePost($dbcnx,$_POST,$UserDataAuth['UserID']);
		//echo $MSG;
		echo '<script>location.replace("rednet.php?Page=UserPage");</script>';
	}
	if($Page=='PostArhive')
	{
		$MSG=ArhivePost($dbcnx,$_POST['PostID']);
		echo $MSG;
		echo "<script>window.location.href='javascript:history.back(-1);'</script>";
	}
	if($Page=='PostPublick')
	{
		$MSG=PublicPost($dbcnx,$_POST['PostID']);
		echo $MSG;
		echo "<script>window.location.href='javascript:history.back(-1);'</script>";
	}
	if($Page=='InsertNewPost')
	{
		$MSG	=	InsertNewPost($dbcnx,$_POST,$UserDataAuth);
		echo '<script>location.replace("rednet.php?Page=UserPage");</script>';
	}

	if($Page=='ShowFullPost')
	{
		if($_GET['msg']=='del'){DeleteComment($dbcnx,$_GET['CommentID']);}
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,""); 
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitlePage	=	"YOR POST Detail";
		$DataArray	=	GetPostFromID($dbcnx,$_GET['PostID']);
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	= 	GenerateUserSPost($dbcnx,$DataArray,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}

	if($Page=="AuthUser")
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$BodyString.=	RegisterAuthForm($ConfArray);
		$HEADER		=	HeaderSite($ConfArray,"");
	}
	if($Page=="Add-User")
	{
		$RESULT=InsertNewUser($dbcnx,$_POST);
		if($RESULT=='ok-user-insert')		{EmailToUserSend($_POST['Email'],$_POST['Password']); echo '<script>location.replace("rednet.php?Page=RegisterOK!");</script>';}
		if($RESULT=='err-user-insert')		{echo '<script>location.replace("rednet.php?Page=ERROR");</script>';}		
		if($RESULT=='dublicat-user-insert')	{echo '<script>location.replace("rednet.php?Page=DUBLICAT");</script>';}					
	}
	if($Page=="RegisterOK!")
	{
		echo "<center><h1>OK Registration!"."<br>"."<a href=index.php#Login>Back and Enter</a><br>Check your inbox!</center></h1>";exit;
	}
	if($Page=="ERROR")
	{
		echo  "<center>ERROR Registration!"."<br><a href=index.php#Login>Back and Enter</a></center>";	exit;	
	}
	if($Page=="UserNotFound")
	{
		echo "<center><h1>User Not Found!<br><a href=index.php#Login>Back and Enter</a></h1></center>";	exit;	
	}
	if($Page=="DUBLICAT")
	{
		echo "<center>DUBLICAT USER REGISTRATION!"."<br><a href=index.php#Login>Back and Enter</a></center>";	exit;					
	}
	if($Page=='SearchInfoTEXT')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$DataArray=		GetSearchPostInfo($dbcnx,$_POST['SearchTEXT']);
		$TitlePage	=	"Search Page TEXT";		
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth);
		$RightData	= 	GenerateUserPostRight($dbcnx,$DataArray,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
	if($Page=='EXIT')
	{
		session_start();
		session_unset();
		$UserDataAuth=$_SESSION['UserDataAuth'];
		$BodyString.=	RegisterAuthForm($ConfArray);
		$HEADER		=	HeaderSite($ConfArray,"");
		echo '<script>location.replace("index.php");</script>'; exit;
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if($Page=='Unions')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitleRight	=	"Unions";		
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
		$RightData	= 	UnionsSearchPage($dbcnx,$UserDataAuth);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
		if($Page=='CreateUnionForm')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
		$RightData	= 	CreateUnionForm($dbcnx,$UserDataAuth);
		$TitleRight = 	"СОЗДАНИЕ НОВОГО СОЮЗА";
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}
		if($Page=='CreateUnions')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$MSG=CreateUnionInsertToDB($dbcnx,$_POST);
		echo $SMG;
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitleRight	=	"Create YOUR Union";		
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
		$RightData	= 	"Congratulation!<br>Your Union was Created!<br><a href='rednet.php?Page=Unions'>Back to Unions</a>";
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}

		if($Page=='UnionPage')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		if($_POST['msg']=='JoinUnion')	{$MSG=JoinUnion($dbcnx,$_POST);}
		if($_POST['msg']=='NewPost')  	{$MSG=CreateUnionPost($dbcnx,$_POST);}
		if($_POST['msg']=='UpdateUnion')  	
		{
			$MSG=UpdateUnion($dbcnx,$_POST);
		}		
//		if($_POST['msg']=='MsgToUnion')  	{$MSG="Сообщение Организаторам Союза";}		
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$TitleRight	=	"Union Page";		
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
		$RightData	= 	GenerateUnionPage($dbcnx,$_POST['UnionID'],$UserDataAuth).ShowUnionPostList($dbcnx,$UserDataAuth,$_POST['UnionID']," ORDER BY UPostID DESC limit",20);
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}

	if($Page=='EditUnionForm')
	{
		$UserDataAuth=	$_SESSION['UserDataAuth'];
		$HEADER		=	HeaderSite($ConfArray,"");
		$NAVBAR		=	NavBar($ConfArray,$UserDataAuth);
		$LeftData	=	GenerateUserInfoLeft($dbcnx,$UserDataAuth).ListUnions($dbcnx,$UserDataAuth).SearchUnionForm($dbcnx);
		$RightData	= 	EditUnionForm($dbcnx,$_POST['UnionID'],$UserDataAuth);
		$TitleRight = 	"СОЗДАНИЕ НОВОГО СОЮЗА";
		$BodyString.=	WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData);
	}	
		

	

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////****PAGE Аутентификация/РЕГИСТРАЦИЯ****///////////////////////////////////////////////////////////////////////////////////////////////				
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$INDEX = file_get_contents("tpl/RedNEtWork.tpl");
		$INDEX = str_replace("{Header}", 		  	$HEADER, 	 $INDEX);
		$INDEX = str_replace("{LeftData}", 			$LeftData, $INDEX);
		$INDEX = str_replace("{RightData}", 		$RightData, $INDEX);
		$INDEX = str_replace("{Footer}", 		  	Footer(), 	 $INDEX);
		$INDEX = str_replace("{Jquery}", 		  	Jquery(), 	 $INDEX);
ECHO $INDEX;
?>