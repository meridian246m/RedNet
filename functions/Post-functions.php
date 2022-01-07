<?PHP
function CreatePostForm()
{
	$CreatePostForm = file_get_contents("tpl/PostCrateForm.tpl");
RETURN $CreatePostForm;
}
function EditPostForm($dbcnx,$PostID)
{
	$post=GetPostFromID($dbcnx,$PostID);
	$EditPostForm = file_get_contents("tpl/PostEditForm.tpl");
	$EditPostForm = 	str_replace("{Title}",			$post['Title'],	 	 $EditPostForm);			
	$EditPostForm = 	str_replace("{Description}",	$post['Description'],$EditPostForm);
	$EditPostForm = 	str_replace("{PostID}",			$PostID,			 $EditPostForm);	
RETURN $EditPostForm;
}
function InsertNewPost($dbcnx,$POST,$UserDataAuth)
{
	$UserID=		$UserDataAuth['UserID'];;
	$Title=			CleanTitle($POST['Title']);
	$Description=	CleanDescription($POST['Description']);
//	$Title=			$POST['Title'];
//	$Description=	$POST['Description'];
	$UpTrust=		0;
	$DownTrust=		0;
	$YES=			0;
	$NO=			0;
	$AtentionStatus=$POST['AtentionStatus'];
	$WorldStatus=	$POST['WorldStatus'];;
	$Country=		$UserDataAuth['Country'];
	$Region=		$UserDataAuth['Region'];
	$City=			$UserDataAuth['City'];	
	$ColvoView=		 0;
	$Publication=	 'OK!';
	$Foto=			CleanDescription($POST['Foto']);
	$Video=			CleanDescription($POST['Video']);
	$Putdate=date("Y-m-d H:i:s");
	$query = "INSERT INTO RN_DBO_POST VALUES (0,
										'".$UserID."',
										'".$Title."',
										'".$Description."',
										'".$UpTrust."',
										'".$DownTrust."',
										'".$YES."',
										'".$NO."',
										'".$AtentionStatus."',
										'".$WorldStatus."',										
										'".$Country."',
										'".$Region."',
										'".$City."',										
										'".$ColvoView."',
										'".$Publication."',
										'".$Putdate."',
										'".$Foto."',
										'".$Video."'
										);";
	if(mysqli_query($dbcnx,$query)) {RETURN "OK-POST-INSERT";}else {RETURN "ERR-NEWS-INSERT";}
}
function DeletePost($dbcnx,$PostID,$UserID)
{
	if($PostID==1){RETURN "This is First Post in this NET! Nowbody Can Delete IT!";EXIT;};
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$new = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($new);
		if($post['UserID']==$UserID)
		{
			$query2 = "DELETE FROM RN_DBO_POST WHERE ID=".$PostID; 
			if(mysqli_query($dbcnx,$query2)) {RETURN "del-post-ok";} else {RETURN "del-post-error";}		
		}
}
function UpdatePost($dbcnx,$POST_ARR,$UserID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$POST_ARR['PostID']; 
	$new = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($new);
		if($post['UserID']==$UserID)
		{
			$query2 = "UPDATE RN_DBO_POST SET
							Title=		'".CleanTitle($POST_ARR['Title'])."',
							Description='".CleanDescription($POST_ARR['Description'])."',
							Status=		'".$POST_ARR['AtentionStatus']."',
							WorldStatus='".$POST_ARR['WorldStatus']."',	
							Publication='OK!',
							Putdate=	'".date("Y-m-d H:i:s")."',
							Foto=		'".$POST_ARR['Foto']."',
							Video=		'".$POST_ARR['Video']."'
					WHERE 	ID=			".$POST_ARR['PostID'];
			echo 	$query2;	
			if(mysqli_query($dbcnx,$query2)) {RETURN "OK-SAVE-POST";} else {RETURN "ERR-SAVE-POST";}
		}
}
function ArhivePost($dbcnx,$PostID)
{
	$query2 = "UPDATE RN_DBO_POST SET Publication='ARH' WHERE ID=".$PostID;
	if(mysqli_query($dbcnx,$query2)) {RETURN "OK-ARHIVE-POST";} else {RETURN "ERR-ARHIVE-POST";}
}
function PublicPost($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
	if($post['Publication']=='OK!')
	{
		$query2 = "UPDATE RN_DBO_POST SET Publication='ARH' WHERE ID=".$PostID;
		echo $query2;
		if(mysqli_query($dbcnx,$query2)) {RETURN "OK-PUBLIC-POST";} else {RETURN "ERR-PUBLIC-POST";}
	}
	if($post['Publication']=='ARH')
	{
		$query2 = "UPDATE RN_DBO_POST SET Publication='OK!' WHERE ID=".$PostID;
		echo $query2;		
		if(mysqli_query($dbcnx,$query2)) {RETURN "OK-PUBLIC-POST";} else {RETURN "ERR-PUBLIC-POST";}
	}
}
function UpTrustPost($dbcnx,$PostID)
{
	$query2 = "UPDATE RN_DBO_POST SET UpTrust=UpTrust+1 WHERE ID=".$PostID;
	if(mysqli_query($dbcnx,$query2)) {RETURN "OK-UpTrust-POST";} else {RETURN "ERR-ARHIVE-POST";}
}
function DownTrustPost($dbcnx,$PostID)
{
	$query2 = "UPDATE RN_DBO_POST SET DownTrust=DownTrust+1 WHERE ID=".$PostID;
	if(mysqli_query($dbcnx,$query2)) {RETURN "OK-DownTrust-POST";} else {RETURN "ERR-ARHIVE-POST";}
}
function YesPost($dbcnx,$PostID)
{
	$query2 = "UPDATE RN_DBO_POST SET YES=YES+1 WHERE ID=".$PostID;
	if(mysqli_query($dbcnx,$query2)) {RETURN "OK-YES-POST";} else {RETURN "ERR-ARHIVE-POST";}
}
function NoPost($dbcnx,$PostID)
{
	$query2 = "UPDATE RN_DBO_POST SET NO=NO+1 WHERE ID=".$PostID;
	if(mysqli_query($dbcnx,$query2)) {RETURN "OK-NO-POST";} else {RETURN "ERR-ARHIVE-POST";}
}
function GenerateUserPost($dbcnx,$FriendID,$UserDataAuth)
{
	$DataArray = GetPostFromUserID($dbcnx,$FriendID);
	while($post = mysqli_fetch_array($DataArray))
		{	
			$PostID=		$post['ID'];
			$UserID=		$post['UserID'];			
			$Title= 		strip_tags($post['Title']);										
			$Description= 	strip_tags($post['Description']);
			$UpTrust=		$post['UpTrust'];
			$DownTrust=		$post['DownTrust'];
			$YES=			$post['YES'];	
			$NO=			$post['NO'];
			$Status=		$post['Status'];
			$WorldStatus=	$post['WorldStatus'];
			$Country=		$post['Country'];
			$Region=		$post['Region'];
			$City=			$post['City'];
			$ColVoView=		$post['ColVoView'];
			$Putdate=		$post['Putdate'];
			$UserName=		GetUserNickFromUserID($dbcnx,$post['UserID']);	
			$UserPost = 	file_get_contents("tpl/UserPostTable.tpl");
			$UserPost = 	str_replace("{PostID}", 	$PostID, 	 $UserPost);		
			$UserPost = 	str_replace("{UserID}", 	$FriendID, 	 $UserPost);		
			$UserPost = 	str_replace("{UserName}", 	$UserName, 	 $UserPost);		
			$UserPost = 	str_replace("{Title}", 		$Title, 	 $UserPost);		
			$UserPost = 	str_replace("{Description}",$Description,$UserPost);			
			$UserPost = 	str_replace("{UpTrust}",	$UpTrust,	 $UserPost);			
			$UserPost = 	str_replace("{DownTrust}",	$DownTrust,	 $UserPost);			
			$UserPost = 	str_replace("{YES}",		$YES,		 $UserPost);			
			$UserPost = 	str_replace("{NO}",			$NO,		 $UserPost);			
			$UserPost = 	str_replace("{Status}",		$Status,	 $UserPost);			
			$UserPost = 	str_replace("{WorldStatus}",$WorldStatus,$UserPost);			
			$UserPost = 	str_replace("{Country}",	$Country,	 $UserPost);			
			$UserPost = 	str_replace("{Region}",		$Region,	 $UserPost);			
			$UserPost = 	str_replace("{City}",		$City,		 $UserPost);			
			$UserPost = 	str_replace("{ColVoView}",	$ColVoView,	 $UserPost);			
			$UserPost = 	str_replace("{Putdate}",	$Putdate,	 $UserPost);
			//////////////////////////////////////////////////////////////////////////////	
			if($post['UserID']==$UserDataAuth['UserID'])
			{
				$PB=TestPublicPost($dbcnx,$PostID);
				if($PB=='ARH'){$PostPublick="glyphicon glyphicon-floppy-save red";}
				if($PB=='OK!'){$PostPublick="glyphicon glyphicon-ok green";}
				$SettingPOST = 	file_get_contents("tpl/SettingPost.tpl");
				$SettingPOST = 	str_replace("{PostID}",		$PostID,		$SettingPOST);
				$SettingPOST = 	str_replace("{PostPublick}",$PostPublick,	$SettingPOST);				
			}else{$SettingPOST="";}			
			//////////////////////////////////////////////////////////////////////////////
			$TrustUD = 		file_get_contents("tpl/TrustUD.tpl");
			$TrustUD = 		str_replace("{PostID}",		$PostID,	$TrustUD);
			$TrustUD = 		str_replace("{UpTrustCV}",	$UpTrust,	$TrustUD);
			$TrustUD = 		str_replace("{DownTrustCV}",$DownTrust,	$TrustUD);
			
			$YES_NO = 		file_get_contents("tpl/YES_NO.tpl");
			$YES_NO = 		str_replace("{PostID}",		$PostID,	$YES_NO);
			$YES_NO = 		str_replace("{YESCV}",		$YES,		$YES_NO);
			$YES_NO = 		str_replace("{NOCV}",		$NO,		$YES_NO);			
			//////////////////////////////////////////////////////////////////			
			$UserPost = 	str_replace("{SettingPOST}",$SettingPOST,$UserPost);
			$UserPost = 	str_replace("{TrustUD}",	$TrustUD,	 $UserPost);
			$UserPost = 	str_replace("{YES_NO}",		$YES_NO,	 $UserPost);
			$COMMENT_CV=	GetColVoComment($dbcnx,$PostID);		
			$UserPost = 	str_replace("{COMMENT_CV}",	$COMMENT_CV, $UserPost);			
			$ResultString.=	$UserPost;
		}	
RETURN $ResultString;
}
function ReturnUsersPosts($dbcnx,$data)
{
	if(mysqli_num_rows($data) <= 0){return "Friends Post Empty!";exit;}
	while($post = mysqli_fetch_array($data))
		{
			$PostID=		$post['ID'];
			$UserID=		$post['UserID'];			
			$Title= 		strip_tags($post['Title']);										
			$Description= 	$post['Description'];
			$UpTrust=		$post['UpTrust'];
			$DownTrust=		$post['DownTrust'];
			$YES=			$post['YES'];	
			$NO=			$post['NO'];
			$Status=		$post['Status'];
			$WorldStatus=	$post['WorldStatus'];
			$Country=		$post['Country'];
			$Region=		$post['Region'];
			$City=			$post['City'];
			$ColVoView=		$post['ColVoView'];
			$Putdate=		$post['Putdate'];
			////////////////////////////////////////////////////////////////////////////////////////////
			if($WorldStatus==1){$WorldStatus="<b>WORLD</b>";}
			if($WorldStatus==2){$WorldStatus="<b>".$Country."</b>";}
			if($WorldStatus==3){$WorldStatus="<b>".$Region."</b>";}
			if($WorldStatus==4){$WorldStatus="<b>".$City."</b>";}			
			if($Status==5){$Status="<span style='color:white;'><b>Regular News</b></span>";}
			if($Status==4){$Status="<span style='color:#8cffbc;'><b>Initiative / Proposal</b></span>";}
			if($Status==3){$Status="<span style='color:yellow;'><b>General meeting!</b></span>";}
			if($Status==2){$Status="<span style='color:#e87a0c;'><b>Very important!</b></span>";}
			if($Status==1){$Status="<span class='blink' style='color:RED;'><b>CATASTROPHE!</b></span>";}		
			////////////////////////////////////////////////////////////////////////////////////////////
			$UserName=		GetUserNickFromUserID($dbcnx,$UserID);	
			$UserPost = 	file_get_contents("tpl/UserPostTable.tpl");
			$UserPost = 	str_replace("{PostID}", 	$PostID, 	 $UserPost);		
			$UserPost = 	str_replace("{UserID}", 	$UserID, 	 $UserPost);		
			$UserPost = 	str_replace("{UserName}", 	$UserName, 	 $UserPost);		
			$UserPost = 	str_replace("{Title}", 		$Title, 	 $UserPost);		
			$UserPost = 	str_replace("{Description}",$Description,$UserPost);			
			$UserPost = 	str_replace("{UpTrust}",	$UpTrust,	 $UserPost);			
			$UserPost = 	str_replace("{DownTrust}",	$DownTrust,	 $UserPost);			
			$UserPost = 	str_replace("{YES}",		$YES,		 $UserPost);			
			$UserPost = 	str_replace("{NO}",			$NO,		 $UserPost);			
			$UserPost = 	str_replace("{Status}",		$Status,	 $UserPost);			
			$UserPost = 	str_replace("{WorldStatus}",$WorldStatus,$UserPost);			
			$UserPost = 	str_replace("{Country}",	$Country,	 $UserPost);			
			$UserPost = 	str_replace("{Region}",		$Region,	 $UserPost);			
			$UserPost = 	str_replace("{City}",		$City,		 $UserPost);			
			$UserPost = 	str_replace("{ColVoView}",	$ColVoView,	 $UserPost);			
			$UserPost = 	str_replace("{Putdate}",	$Putdate,	 $UserPost);
			//////////////////////////////////////////////////////////////////////////////	
			if($post['UserID']==$UserDataAuth['UserID'])
			{
				$PB=TestPublicPost($dbcnx,$PostID);
				if($PB=='ARH'){$PostPublick="glyphicon glyphicon-floppy-save red";}
				if($PB=='OK!'){$PostPublick="glyphicon glyphicon-ok green";}
				$SettingPOST = 	file_get_contents("tpl/SettingPost.tpl");
				$SettingPOST = 	str_replace("{PostID}",		$PostID,		$SettingPOST);
				$SettingPOST = 	str_replace("{PostPublick}",$PostPublick,	$SettingPOST);				
			}else{$SettingPOST="";}			
			//////////////////////////////////////////////////////////////////////////////
			$TrustUD = 		file_get_contents("tpl/TrustUD.tpl");
			$TrustUD = 		str_replace("{PostID}",		$PostID,	$TrustUD);
			$TrustUD = 		str_replace("{UpTrustCV}",	$UpTrust,	$TrustUD);
			$TrustUD = 		str_replace("{DownTrustCV}",$DownTrust,	$TrustUD);
			
			$YES_NO = 		file_get_contents("tpl/YES_NO.tpl");
			$YES_NO = 		str_replace("{PostID}",		$PostID,	$YES_NO);
			$YES_NO = 		str_replace("{YESCV}",		$YES,		$YES_NO);
			$YES_NO = 		str_replace("{NOCV}",		$NO,		$YES_NO);			
			//////////////////////////////////////////////////////////////////			
			$UserPost = 	str_replace("{SettingPOST}",$SettingPOST,$UserPost);
			$UserPost = 	str_replace("{TrustUD}",	$TrustUD,	 $UserPost);
			$UserPost = 	str_replace("{YES_NO}",		$YES_NO,	 $UserPost);
			$COMMENT_CV=	GetColVoComment($dbcnx,$PostID);		
			$UserPost = 	str_replace("{COMMENT_CV}",	$COMMENT_CV, $UserPost);			
			$ResultString.=	$UserPost;
		}
		
	RETURN $ResultString;
}
function GenerateUserSPost($dbcnx,$post,$UserDataAuth)
{
			$PostID=		$post['ID'];
			$UserID=		$post['UserID'];			
			$Title= 		strip_tags($post['Title']);										
			$Description= 	$post['Description'];
			$UpTrust=		$post['UpTrust'];
			$DownTrust=		$post['DownTrust'];
			$YES=			$post['YES'];	
			$NO=			$post['NO'];
			$Status=		$post['Status'];
			$WorldStatus=	$post['WorldStatus'];
			$Country=		$post['Country'];
			$Region=		$post['Region'];
			$City=			$post['City'];
			$ColVoView=		$post['ColVoView'];
			$Putdate=		$post['Putdate'];
			////////////////////////////////////////////////////////////////////////////////////////////
			if($WorldStatus==1){$WorldStatus="<b>WORLD</b>";}
			if($WorldStatus==2){$WorldStatus="<b>".$Country."</b>";}
			if($WorldStatus==3){$WorldStatus="<b>".$Region."</b>";}
			if($WorldStatus==4){$WorldStatus="<b>".$City."</b>";}			
			if($Status==5){$Status="<span style='color:white;'><b>Regular News</b></span>";}
			if($Status==4){$Status="<span style='color:#8cffbc;'><b>Initiative / Proposal</b></span>";}
			if($Status==3){$Status="<span style='color:yellow;'><b>General meeting!</b></span>";}
			if($Status==2){$Status="<span style='color:#e87a0c;'><b>Very important!</b></span>";}
			if($Status==1){$Status="<span class='blink' style='color:RED;'><b>CATASTROPHE!</b></span>";}		
			////////////////////////////////////////////////////////////////////////////////////////////
			$UserNickName = GetUserNickFromUserID($dbcnx,$UserID);
			$UserPost = 	file_get_contents("tpl/UserSinglePost.tpl");
			$UserPost = 	str_replace("{UserNickName}", 	$UserNickName,$UserPost);					
			$UserPost = 	str_replace("{PostID}", 		$PostID, 	 $UserPost);		
			$UserPost = 	str_replace("{UserID}", 		$UserID, 	 $UserPost);		
			$UserPost = 	str_replace("{Title}", 			$Title, 	 $UserPost);		
			$UserPost = 	str_replace("{Description}",	$Description,$UserPost);			
			$UserPost = 	str_replace("{UpTrust}",		$UpTrust,	 $UserPost);			
			$UserPost = 	str_replace("{DownTrust}",		$DownTrust,	 $UserPost);			
			$UserPost = 	str_replace("{YES}",			$YES,		 $UserPost);			
			$UserPost = 	str_replace("{NO}",				$NO,		 $UserPost);			
			$UserPost = 	str_replace("{Status}",			$Status,	 $UserPost);			
			$UserPost = 	str_replace("{WorldStatus}",	$WorldStatus,$UserPost);			
			$UserPost = 	str_replace("{Country}",		$Country,	 $UserPost);			
			$UserPost = 	str_replace("{Region}",			$Region,	 $UserPost);			
			$UserPost = 	str_replace("{City}",			$City,		 $UserPost);			
			$UserPost = 	str_replace("{ColVoView}",		$ColVoView,	 $UserPost);			
			$UserPost = 	str_replace("{Putdate}",		$Putdate,	 $UserPost);	
			//////////////////////////////////////////////////////////////////////////////	
			if($post['UserID']==$UserDataAuth['UserID'])
			{
				$PB=TestPublicPost($dbcnx,$PostID);
				if($PB=='ARH'){$PostPublick="glyphicon glyphicon-floppy-save red";}
				if($PB=='OK!'){$PostPublick="glyphicon glyphicon-ok green";}
				$SettingPOST = 	file_get_contents("tpl/SettingPost.tpl");
				$SettingPOST = 	str_replace("{PostID}",		$PostID,		$SettingPOST);
				$SettingPOST = 	str_replace("{PostPublick}",$PostPublick,	$SettingPOST);				
			}else{$SettingPOST="";}			
			//////////////////////////////////////////////////////////////////////////////
			$TrustUD = 		file_get_contents("tpl/TrustUD.tpl");
			$TrustUD = 		str_replace("{PostID}",		$PostID,	$TrustUD);
			$TrustUD = 		str_replace("{UpTrustCV}",	$UpTrust,	$TrustUD);
			$TrustUD = 		str_replace("{DownTrustCV}",$DownTrust,	$TrustUD);
			
			$YES_NO = 		file_get_contents("tpl/YES_NO.tpl");
			$YES_NO = 		str_replace("{PostID}",		$PostID,	$YES_NO);
			$YES_NO = 		str_replace("{YESCV}",		$YES,		$YES_NO);
			$YES_NO = 		str_replace("{NOCV}",		$NO,		$YES_NO);
			$CommentUserID=	$UserDataAuth['UserID'];
			$Comment = 		file_get_contents("tpl/Comments.tpl");
			$Comment = 		str_replace("{CommentID}",	$CommentID,		$Comment);
			$Comment = 		str_replace("{PostID}",		$PostID,		$Comment);
			$Comment = 		str_replace("{UserID}",		$CommentUserID,	$Comment);
			$Comment = 		str_replace("{TEXT}",		$TEXT,			$Comment);
			$Comment = 		str_replace("{Putdate}",	$CommentPutdate,$Comment);
			///////////////////////////////////////////////////////////////////
			$UserPost = 	str_replace("{SettingPOST}",$SettingPOST,$UserPost);
			$UserPost = 	str_replace("{TrustUD}",	$TrustUD,	 $UserPost);
			$UserPost = 	str_replace("{YES_NO}",		$YES_NO,	 $UserPost);
			$CommentsData=  GetAllCommentFromPostID($dbcnx,$PostID);
			$Comment.=		GenerateCommentShow($dbcnx,$CommentsData,$UserDataAuth);
			$UserPost = 	str_replace("{COMMENT}",	$Comment,	 $UserPost);			
			$ResultString.=	$UserPost;
RETURN $ResultString; 
}

function GenerateUserPostRight($dbcnx,$DataArray,$UserDataAuth)
{
	if(mysqli_num_rows($DataArray) <= 0){return "Data Empty!";exit;}
	while($post = mysqli_fetch_array($DataArray))
		{	
			$PostID=		$post['ID'];
			$UserID=		$post['UserID'];			
			$Title= 		strip_tags($post['Title']);										
			$Description= 	strip_tags($post['Description']);
			$UpTrust=		$post['UpTrust'];
			$DownTrust=		$post['DownTrust'];
			$YES=			$post['YES'];	
			$NO=			$post['NO'];
			$Status=		$post['Status'];
			$WorldStatus=	$post['WorldStatus'];
			$Country=		$post['Country'];
			$Region=		$post['Region'];
			$City=			$post['City'];
			$ColVoView=		$post['ColVoView'];
			$Putdate=		$post['Putdate'];			
			////////////////////////////////////////////////////////////////////////////////////////////
			if($WorldStatus==1){$WorldStatus="<b>WORLD</b>";}
			if($WorldStatus==2){$WorldStatus="<b>".$Country."</b>";}
			if($WorldStatus==3){$WorldStatus="<b>".$Region."</b>";}
			if($WorldStatus==4){$WorldStatus="<b>".$City."</b>";}			
			if($Status==5){$Status="<span style='color:white;'><b>Regular News</b></span>";}
			if($Status==4){$Status="<span style='color:#8cffbc;'><b>Initiative / Proposal</b></span>";}
			if($Status==3){$Status="<span style='color:yellow;'><b>General meeting!</b></span>";}
			if($Status==2){$Status="<span style='color:#e87a0c;'><b>Very important!</b></span>";}
			if($Status==1){$Status="<span class='blink' style='color:RED;'><b>CATASTROPHE!</b></span>";}		
			////////////////////////////////////////////////////////////////////////////////////////////
			$Description=	mb_strimwidth($Description,0,200,"");
			$UserName=		GetUserNickFromUserID($dbcnx,$UserID);	
			$UserPost = 	file_get_contents("tpl/UserPostTable.tpl");
			$UserPost = 	str_replace("{PostID}", 	$PostID, 	 $UserPost);		
			$UserPost = 	str_replace("{UserID}", 	$UserID, 	 $UserPost);		
			$UserPost = 	str_replace("{UserName}", 	$UserName, 	 $UserPost);		
			$UserPost = 	str_replace("{Title}", 		$Title, 	 $UserPost);		
			$UserPost = 	str_replace("{Description}",$Description,$UserPost);			
			$UserPost = 	str_replace("{UpTrust}",	$UpTrust,	 $UserPost);			
			$UserPost = 	str_replace("{DownTrust}",	$DownTrust,	 $UserPost);			
			$UserPost = 	str_replace("{YES}",		$YES,		 $UserPost);			
			$UserPost = 	str_replace("{NO}",			$NO,		 $UserPost);			
			$UserPost = 	str_replace("{Status}",		$Status,	 $UserPost);			
			$UserPost = 	str_replace("{WorldStatus}",$WorldStatus,$UserPost);			
			$UserPost = 	str_replace("{Country}",	$Country,	 $UserPost);			
			$UserPost = 	str_replace("{Region}",		$Region,	 $UserPost);			
			$UserPost = 	str_replace("{City}",		$City,		 $UserPost);			
			$UserPost = 	str_replace("{ColVoView}",	$ColVoView,	 $UserPost);			
			$UserPost = 	str_replace("{Putdate}",	$Putdate,	 $UserPost);			
			//////////////////////////////////////////////////////////////////////////////	
			if($post['UserID']==$UserDataAuth['UserID'])
			{
				$PB=TestPublicPost($dbcnx,$PostID);
				if($PB=='ARH'){$PostPublick="glyphicon glyphicon-floppy-save red";}
				if($PB=='OK!'){$PostPublick="glyphicon glyphicon-ok green";}
				$SettingPOST = 	file_get_contents("tpl/SettingPost.tpl");
				$SettingPOST = 	str_replace("{PostID}",		$PostID,		$SettingPOST);
				$SettingPOST = 	str_replace("{PostPublick}",$PostPublick,	$SettingPOST);				
			}else{$SettingPOST="";}			
			//////////////////////////////////////////////////////////////////////////////
			$TrustUD = 		file_get_contents("tpl/TrustUD.tpl");
			$TrustUD = 		str_replace("{PostID}",		$PostID,	$TrustUD);
			$TrustUD = 		str_replace("{UpTrustCV}",	$UpTrust,	$TrustUD);
			$TrustUD = 		str_replace("{DownTrustCV}",$DownTrust,	$TrustUD);			
			$YES_NO = 		file_get_contents("tpl/YES_NO.tpl");
			$YES_NO = 		str_replace("{PostID}",		$PostID,	$YES_NO);
			$YES_NO = 		str_replace("{YESCV}",		$YES,		$YES_NO);
			$YES_NO = 		str_replace("{NOCV}",		$NO,		$YES_NO);			
			//////////////////////////////////////////////////////////////////			
			$UserPost = 	str_replace("{SettingPOST}",$SettingPOST,$UserPost);
			$UserPost = 	str_replace("{TrustUD}",	$TrustUD,	 $UserPost);
			$UserPost = 	str_replace("{YES_NO}",		$YES_NO,	 $UserPost);
			$COMMENT_CV=	GetColVoComment($dbcnx,$PostID);		
			$UserPost = 	str_replace("{COMMENT_CV}",	$COMMENT_CV, $UserPost);					
			$ResultString.=	$UserPost;
		}	
RETURN $ResultString;
}

function TestPublicPost($dbcnx,$PostID)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE ID=".$PostID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post['Publication'];
}


?>