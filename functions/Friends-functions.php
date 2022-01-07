<?PHP
function GenerateUserFrindPage($dbcnx,$FriendID,$UserDataAuth)
{
	$post	=	GetUserFromUserID($dbcnx,$FriendID);
		$UserID=		$post['UserID'];	
		$UserNickName=	$post['UserNickName'];
		$UserEmail=		$post['UserEmail'];
		$UserAvatar=	$post['UserAvatar'];
		$UserRole=		$post['UserRole'];
		$Country=		$post['Country'];
		$Region=		$post['Region'];
		$City=			$post['City'];
		$UpTrust=		$post['UpTrust'];
		$DownTrust=		$post['DownTrust'];
		$Putdate=		$post['Putdate'];
		
		$Proffesion=	$post['Proffesion'];
		$Hobby=			$post['Hobby'];
		$SocialStatus=	$post['SocialStatus'];
		$Education=		$post['Education'];
		$Manifest=		$post['Manifest'];
		$DateOfBirth=	$post['DateOfBirth'];
		$Gender=		$post['Gender'];
		$LastEnterData=	$post['LastEnterData'];
		if(!file_exists($UserAvatar)){$UserAvatar="/img/chegevara.jpg";}
		$DataString = 		file_get_contents("tpl/FriendPage.tpl");
		$DataString = 		str_replace("{UserID}",			$UserID,		$DataString);
		$DataString = 		str_replace("{UserNickName}",	$UserNickName,	$DataString);
		$DataString = 		str_replace("{UserEmail}",		$UserEmail,		$DataString);
		$DataString = 		str_replace("{UserAvatar}",		$UserAvatar,	$DataString);
		$DataString = 		str_replace("{UserRole}",		$UserRole,		$DataString);
		$DataString = 		str_replace("{Country}",		$Country,		$DataString);
		$DataString = 		str_replace("{Region}",			$Region,		$DataString);
		$DataString = 		str_replace("{City}",			$City,			$DataString);
		$DataString = 		str_replace("{UpTrust}",		$UpTrust,		$DataString);
		$DataString = 		str_replace("{DownTrust}",		$DownTrust,		$DataString);

		$DataString = 		str_replace("{Proffesion}",		$Proffesion,	$DataString);
		$DataString = 		str_replace("{Hobby}",			$Hobby,			$DataString);
		$DataString = 		str_replace("{SocialStatus}",	$SocialStatus,	$DataString);
		$DataString = 		str_replace("{Education}",		$Education,		$DataString);
		$DataString = 		str_replace("{Manifest}",		$Manifest,		$DataString);
		$DataString = 		str_replace("{DateOfBirth}",	$DateOfBirth,	$DataString);
		$DataString = 		str_replace("{Gender}",			$Gender,		$DataString);
		$DataString = 		str_replace("{LastEnterData}",	$LastEnterData,		$DataString);


		$DataString = 		str_replace("{Putdate}",		$Putdate,		$DataString);
		
		$Status	= TestOnFriend($dbcnx,$UserDataAuth['UserID'],$FriendID);
		if($Status=='new')		{$ButtonFriend = 		"Add Friend";$ButtonColor="btn btn-success";}
		if($Status=='ban')		{$ButtonFriend = 		"Add Friend";$ButtonColor="btn btn-success";}
		if($Status=='friend')	{$ButtonFriend = 		"Ban Friend";$ButtonColor="btn btn-danger";}

		$DataString = 		str_replace("{ButtonFriend}",	$ButtonFriend,	$DataString);
		$DataString = 		str_replace("{ButtonColor}",	$ButtonColor,	$DataString);
		
		

RETURN $DataString;		
}
function InsertAddFriend($dbcnx,$post,$UserDataAuth)
{
	$UserID=	$UserDataAuth['UserID'];
	$FriendID=	$post['FriendID'];
	$Status=	"friend";
	$Putdate=	date("Y-m-d H:i:s");
	$TEST=TestOnFriend($dbcnx,$UserID,$FriendID);
	echo $TEST;
	if($TEST=='new'){
		$query = "INSERT INTO RN_DBO_FRIENDS VALUES (0,
											'".$UserID."',
											'".$FriendID."',
											'".$Status."',
											'".$Putdate."'
											);";
	if(mysqli_query($dbcnx,$query)) 	 {RETURN "OK-FRIEND-ADD";}else {RETURN "ERR-FRIEND-ADD";}
	}
	
	if($TEST=='ban'){
		$query1 = "UPDATE  RN_DBO_FRIENDS SET Status='friend' WHERE UserID=".$UserID." AND FriendID=".$FriendID;
		if(mysqli_query($dbcnx,$query1)) {RETURN "OK-FRIEND-UPDATE";}else {RETURN "ERR-FRIEND-UPDATE";}
	}
	
	if($TEST=='friend'){
		$query2 = "UPDATE  RN_DBO_FRIENDS SET Status='ban' 	 WHERE UserID=".$UserID." AND FriendID=".$FriendID;
		if(mysqli_query($dbcnx,$query2)) {RETURN "OK-BAN-FRIEND";}else {RETURN "ERR-BAN-FRIEND";}
	}
}
function FriendList($dbcnx,$UserDataAuth)
{
	$data=GetFriendList($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "User List Empty!";exit;}
$Result='<div class="table-responsive"><table class="table  table-hover" id="dataTables-example">
									<thead>
                                        <tr>
                                            <th>Аватар</th>
                                            <th>Ник</th>
                                            <th>Страна</th>
                                            <th>Регион</th>
                                            <th>Город/Населенный пункт</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
	while($post = mysqli_fetch_array($data))
		{
			$User =	GetUserFromUserID($dbcnx,$post['FriendID']);
			$UserAvatar = GetUserAvatarFromUserID($dbcnx,$post['FriendID']);
			if(!file_exists($UserAvatar)){$UserAvatar="/img/chegevara.jpg";}
			$Name=		  GetUserNickFromUserID($dbcnx,$post['FriendID']);
			$FriendID=	$post['FriendID'];
			$Result.="<tr><td><img src='".$UserAvatar."' width='30'></td>
			<td><a href='rednet.php?Page=UserFRPage&FriendID=".$FriendID."'>".$Name."</a></td>
			<td style='color:#455917'>".$User['Country']."</td>
			<td style='color:#455917'>".$User['Region']."</td>
			<td style='color:#455917'>".$User['City']."</td>
			
			</tr>";
		}
$Result.="</tbody></table></div>";
RETURN $Result;
}


function ShortFriendList($dbcnx,$UserDataAuth)
{
	$data=GetFriendList($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "User List Empty!";exit;}
$Result='<div class="col-md-12"><div class="table-responsive"><table class="table  table-hover" id="dataTables-example">
                                    <tbody>';
	while($post = mysqli_fetch_array($data))
		{
			$User =	GetUserFromUserID($dbcnx,$post['FriendID']);
			$UserAvatar = GetUserAvatarFromUserID($dbcnx,$post['FriendID']);
			if(!file_exists($UserAvatar)){$UserAvatar="/img/chegevara.jpg";}
			$Name=		  GetUserNickFromUserID($dbcnx,$post['FriendID']);
			$FriendID=	$post['FriendID'];
			$Result.="<tr><td><img src='".$UserAvatar."' width='30'></td>
			<td><a href='rednet.php?Page=UserFRPage&FriendID=".$FriendID."'>".$Name."</a></td>
			</tr>";
		}
$Result.="</tbody></table></div></div>";
RETURN $Result;
}

function FriendPostList($dbcnx,$UserDataAuth)
{
	$data=GetFriendList($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "Friends Post Empty!";exit;}
	$FriendArray=Array();
	while($post = mysqli_fetch_array($data))
		{
			array_push ($FriendArray,$post['FriendID']);
		}

		foreach ($FriendArray as $value) 
			{
				$DataSap.="'".$value."',";	
			}
	$DataSap=  substr($DataSap,0,-1);		
	$Sap1=  "SELECT * FROM RN_DBO_POST WHERE Publication='ok!' AND UserID IN (".$DataSap.")";
	$Sap2=  $Sap1." ORDER BY ID DESC";
	$DataArray=GetInfoFromSAPROS($dbcnx,$Sap2);
	$DataString=ReturnUsersPosts($dbcnx,$DataArray);	
RETURN $DataString;
}

function SearchFriendForm($dbcnx)
{
	$SearchFriendForm = file_get_contents("tpl/SearchFriendForm.tpl");
	$SearchFriendForm = str_replace("{AddVisibleSearchFriend}",		"block",	$SearchFriendForm);
RETURN $SearchFriendForm;  
}
function SearchFriendList($dbcnx,$UserDataAuth,$data)
{
	if(mysqli_num_rows($data) <= 0){return "User List Empty!";exit;}
$Result="<ul>";
	while($post = mysqli_fetch_array($data))
		{
			$Name=		$post['UserNickName'];
			$UserID=	$post['UserID'];
			$Result.="<li><a href='rednet.php?Page=UserFRPage&FriendID=".$UserID."'>".$Name."</a></li>";
		}
$Result.="</ul>";
RETURN $Result;
}
function TestOnFriend($dbcnx,$UserID,$FriendID)
{
	$query = "SELECT * FROM RN_DBO_FRIENDS WHERE UserID=".$UserID." AND FriendID=".$FriendID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);	
		if($post['ID']==''){RETURN "new";}
		if($post['ID']>0)
		{
			if($post['Status']=='ban'){		RETURN "ban";}
			if($post['Status']=='friend'){	RETURN "friend";}			
		}
RETURN $Result;
}



?>