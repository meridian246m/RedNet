<?PHP
function GetPostFromID($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data); 
RETURN $post;	
}
function GetPostFromUserID($dbcnx,$UserID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE UserID=".$UserID." ORDER BY ID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN $data;
}
function GetUserNickFromUserID($dbcnx,$UserID)
{
	$query = "SELECT * FROM RN_DBO_Users WHERE UserID=".$UserID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post['UserNickName'];
}
function GetUserAvatarFromUserID($dbcnx,$UserID)
{
	$query = "SELECT * FROM RN_DBO_Users WHERE UserID=".$UserID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post['UserAvatar'];
}

function GetUserFromUserID($dbcnx,$UserID)
{
	$query = "SELECT * FROM RN_DBO_Users WHERE UserID=".$UserID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post;
}
function GetPostONStatus($dbcnx,$WS,$UserDataAuth,$SortParam)
{	
if($WS==1){$Uslovie="WorldStatus=	".$WS;}
if($WS==2){$Uslovie="Country=		'".$UserDataAuth['Country']."' AND WorldStatus=2";}
if($WS==3){$Uslovie="Region=		'".$UserDataAuth['Region']."' AND WorldStatus=3";}
if($WS==4){$Uslovie="City=			'".$UserDataAuth['City']."' AND WorldStatus=4";}
	$query = "SELECT * FROM RN_DBO_POST WHERE ".$Uslovie." AND Publication='ok!' ORDER BY ".$SortParam; 
	$data = mysqli_query($dbcnx,$query);
RETURN $data;
}
function GetColVoComment($dbcnx,$PostID)
{
	$query = "SELECT COUNT(*) FROM RN_DBO_COMMENT WHERE PostID=".$PostID; 
		$total = mysqli_query($dbcnx,$query);
		$count = mysqli_fetch_row($total)[0];
RETURN $count;
}
function GetAllCommentFromPostID($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_COMMENT WHERE PostID=".$PostID." ORDER BY ID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function GetFriendList($dbcnx,$UserID)
{
	$query = "SELECT * FROM RN_DBO_FRIENDS WHERE UserID=".$UserID." ORDER BY ID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}

function GetInfoFromSAPROS($dbcnx,$query)
{
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function GetLastSMSFromUser($dbcnx,$UserID,$FriendID)
{	
$WHERE=	"WHERE  UserID =".$UserID." AND FriendID=".$FriendID." OR UserID=".$FriendID." AND FriendID=".$UserID." ORDER BY Putdate DESC LIMIT 10";
	$query = "SELECT * FROM RN_DBO_SMS ".$WHERE;
	$data = mysqli_query($dbcnx,$query);
RETURN $data;
}
function GetSearchFriend($dbcnx,$post,$ORDER)
{
if($post['Country']<>'')		{$SAP.=" AND MATCH(Country) 			AGAINST('".$post['Country']."')";}
if($post['Region']<>'')			{$SAP.=" AND MATCH(Region) 				AGAINST('".$post['Region']."')";}	
if($post['City']<>'')			{$SAP.=" AND MATCH(City) 				AGAINST('".$post['City']."')";}				
if($post['NickName']<>'')		{$SAP.=" AND MATCH(UserNickName) 		AGAINST('".$post['NickName']."')";}	
if($post['Hobby']<>'')			{$SAP.=" AND MATCH(Hobby) 				AGAINST('".$post['Hobby']."')";}			
if($post['Profession']<>'')		{$SAP.=" AND MATCH(Profession) 			AGAINST('".$post['Profession']."')";}			
if($post['SocialStatus']<>'')	{$SAP.=" AND MATCH(SocialStatus) 		AGAINST('".$post['SocialStatus']."')";}
if($post['Education']<>'')		{$SAP.=" AND MATCH(Education) 			AGAINST('".$post['Education']."')";}
if($post['DataOfBirth']<>'')	{$SAP.=" AND MATCH(DataOfBirth) 		AGAINST('".$post['DataOfBirth']."')";}
$SAP=substr($SAP, 4);
	$query = "SELECT * FROM RN_DBO_Users WHERE". $SAP." ".$ORDER; 
	$data = mysqli_query($dbcnx,$query);
	echo $query;
RETURN 	$data;
}
function GetSearchPostInfo($dbcnx,$Sapros)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE MATCH(Title,Description) AGAINST('".$Sapros."') ORDER BY ID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function GetUnionsFromCreaterID($dbcnx,$UnionCreatorID)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE  UnionCreatorID=".$UnionCreatorID." ORDER BY UnionID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function GetUnionsFromModeratorID($dbcnx,$UnionModeratorID)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE  UnionModeratorID=".$UnionModeratorID." ORDER BY UnionID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function GetUnionsFromRedactorID($dbcnx,$UnionRedactorID)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE  UnionRedactorID=".$UnionRedactorID." ORDER BY UnionID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function GetUnionsJoinedUserID($dbcnx,$UserID)
{
	$query = "SELECT * FROM RN_DBO_UNION_USERS WHERE  UserID=".$UserID." ORDER BY UnionID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function GetUnionUnionID($dbcnx,$UnionID)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE UnionID=".$UnionID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post;
}
function GetUnionName($dbcnx,$UnionID)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE UnionID=".$UnionID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post['UnionName'];
}

function GetUnionFromWorld($dbcnx,$UnionWorld)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE UnionWorld=".$UnionWorld; 
	$data = mysqli_query($dbcnx,$query);
RETURN $data;
}


function GetUserAvatar($dbcnx,$UserID)
{
$query = "SELECT * FROM RN_DBO_Users WHERE UserID=".$UserID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post['UserAvatar'];	
}

function GetUpTrust($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data); 
RETURN $post['UpTrust'];	
}

function GetDownTrust($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data); 
RETURN $post['DownTrust'];	
}

function GetYES($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data); 
RETURN $post['YES'];	
}

function GetNO($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data); 
RETURN $post['NO'];	
}





















?>