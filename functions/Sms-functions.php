<?PHP
function AddNewSMSFromUser($dbcnx,$SMS,$FromUserID,$ToFriendID)
{	
	$Putdate=date("Y-m-d H:i:s");
	$query = "INSERT INTO RN_DBO_SMS VALUES (0,
										'".$FromUserID."',
										'".$ToFriendID."',
										'".$SMS."',
										'".$Putdate."'
										);";
	if(mysqli_query($dbcnx,$query)) {RETURN "OK-SMS-INSERT";}else {RETURN "ERR-SMS-INSERT";}
}
function FriendListForSMS($dbcnx,$UserDataAuth)
{
	$data=GetFriendList($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "User List Empty!";exit;}
$Result="<ul>";
	$i=0;
	while($post = mysqli_fetch_array($data))
		{
			$i++;
			$Name=		GetUserNickFromUserID($dbcnx,$post['FriendID']);
			$FriendID=	$post['FriendID'];
			$Result.="
			<li>
				<form name='form".$i."' enctype='multipart/form-data' action='rednet.php' method='post'>
				<input type='hidden' name='Page' value='FriendsSMS'>
				<input type='hidden' name='FriendID' value='".$FriendID."'>
				<a style='color:yellow' href='javascript:void(0)' OnClick='document.form".$i.".submit();'>".$Name."</a>
				</form>
			</li>";			
		}
$Result.="</ul>";
	$DataString = file_get_contents("tpl/FriendListForSMS.tpl");
	$DataString = str_replace("{FriendList}",	$Result,	$DataString);	
RETURN $DataString;
}

function ShortFriendListForSMS($dbcnx,$UserDataAuth)
{
	$data=GetFriendList($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "User List Empty!";exit;}
$Result='<div class="col-md-12"><div class="table-responsive"><table class="table  table-hover" id="dataTables-example">
                                    <tbody>';
	while($post = mysqli_fetch_array($data))
		{
			$i++;
			$User =	GetUserFromUserID($dbcnx,$post['FriendID']);
			$UserAvatar = GetUserAvatarFromUserID($dbcnx,$post['FriendID']);
			if(!file_exists($UserAvatar)){$UserAvatar="/img/chegevara.jpg";}
			$Name=		  GetUserNickFromUserID($dbcnx,$post['FriendID']);
			$FriendID=	$post['FriendID'];
			$Result.="<tr><td><img src='".$UserAvatar."' width='30'></td>
			<td>
			
				<form name='form".$i."' enctype='multipart/form-data' action='rednet.php' method='post'>
				<input type='hidden' name='Page' value='FriendsSMS'>
				<input type='hidden' name='FriendID' value='".$FriendID."'>
				<a style='color:yellow' href='javascript:void(0)' OnClick='document.form".$i.".submit();'>".$Name."</a>
				</form>
			
			</td>
			</tr>";
		}
$Result.="</tbody></table></div></div>";
RETURN $Result;
}






function ShowSMSListFromUSERS($dbcnx,$UserDataAuth,$UserID,$FriendID)
{
	$DataSMSArray=GetLastSMSFromUser($dbcnx,$UserID,$FriendID);
	//if(mysqli_num_rows($DataSMSArray) <= 0){return "Friends SMS Empty!";}
	while($post = mysqli_fetch_array($DataSMSArray))
		{
//		if($UserID==$post['FriendID']){$position="left";} else {$position="right";}
			
			if(GetUserAvatar($dbcnx,$post['UserID'])<>'')
			{$Avatar='<img width=30 src="'.GetUserAvatar($dbcnx,$post['UserID']).'" alt="User" class="img-circle" />';}
			else
			{$Avatar='<i class="glyphicon glyphicon-sunglasses"></i>';}
			$position="left";
			
			if($post['UserID']==$FriendID){$color="yellow";}else{$color="white";}

			$ChatString.='<li class="'.$position.' clearfix">
                <span class="chat-img pull-'.$position.'">'.$Avatar.'</span>
                <div class="chat-body clearfix">                                       
                    <strong><span style="color:'.$color.';">'.GetUserNickFromUserID($dbcnx,$post['UserID']).'</span></strong>
					<small class="pull-right text-muted"><i class="fa fa-clock-o fa-fw"></i>'.$post['Putdate'].'</small>                                       
                    <p>'.$post['SMS'].'</p>
                </div>
            </li>';									
		}
		$UserNickName=GetUserNickFromUserID($dbcnx,$FriendID);
	$SendForm	= SMSSendForm($dbcnx,$UserDataAuth,$FriendID);	
	$DataString = file_get_contents("tpl/ChatBox.tpl");
	$DataString = str_replace("{ChatSMS}",		$ChatString,	$DataString);
	$DataString = str_replace("{SendForm}",		$SendForm,		$DataString);
	$DataString = str_replace("{FriendID}",		$FriendID,		$DataString);
	$DataString = str_replace("{UserNickName}",	$UserNickName,	$DataString);	
	$DataString = str_replace("{UserID}",		$UserID,		$DataString);
	

RETURN $DataString;
}


function ShowSMSListFromUSERS_ajax($dbcnx,$UserDataAuth,$UserID,$FriendID)
{
	$DataSMSArray=GetLastSMSFromUser($dbcnx,$UserID,$FriendID);
	if(mysqli_num_rows($DataSMSArray) <= 0){return "Friends SMS Empty!";exit;}
	while($post = mysqli_fetch_array($DataSMSArray))
		{
//		if($UserID==$post['FriendID']){$position="left";} else {$position="right";}
			
			if(GetUserAvatar($dbcnx,$post['UserID'])<>'')
			{$Avatar='<img width=30 src="'.GetUserAvatar($dbcnx,$post['UserID']).'" alt="User" class="img-circle" />';}
			else
			{$Avatar='<i class="glyphicon glyphicon-sunglasses"></i>';}
			$position="left";
						
						if($post['UserID']==$FriendID){$color="yellow";}else{$color="white";}

			$ChatString.='<li class="'.$position.' clearfix">
                <span class="chat-img pull-'.$position.'">'.$Avatar.'</span>
                <div class="chat-body clearfix">                                       
                    <strong><span style="color:'.$color.';">'.GetUserNickFromUserID($dbcnx,$post['UserID']).'</span></strong>
					<small class="pull-right text-muted"><i class="fa fa-clock-o fa-fw"></i>'.$post['Putdate'].'</small>                                       
                    <p>'.$post['SMS'].'</p>
                </div>
            </li>';									
		}

	

RETURN $ChatString;
}




function SMSSendForm($dbcnx,$UserDataAuth,$FriendID)
{	
	$SMSSendForm = file_get_contents("tpl/SMSSendForm.tpl");
	$SMSSendForm = str_replace("{UserID}",			$UserDataAuth['UserID'],$SMSSendForm);
	$SMSSendForm = str_replace("{FriendID}",		$FriendID,				$SMSSendForm);
	if($FriendID>0){$VisibleBlock="block";}	else	{$VisibleBlock="none";}
	$SMSSendForm = str_replace("{AddVisibleSMS}",	$VisibleBlock,			$SMSSendForm);
RETURN $SMSSendForm;  
}
































?>