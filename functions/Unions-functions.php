<?PHP
/*
function CreateUnionInsertToDB($dbcnx,$post)
function GetUnionFromCreatorID($dbcnx,$CreatorID)
function GetUnionFromUnionID($dbcnx,$UnionID)
function UnionsSelfPage($dbcnx,$UnionID)
function GetUnionsPOST($dbcnx,$UnionID,$SORT,$LIMIT)
function ShowUnionPostList($dbcnx,$UserDataAuth,$UnionID,$SORT,$LIMIT)
function UnionsListPage($ConfArray,$UserDataAuth,$TitlePage)
function UnionDelete($dbcnx,$UnionID)
function UnionUserDelete($dbcnx,$UserID,$UnionID)
function UnionPostDelete($dbcnx,$PostID)
function GetUnionSearch($dbcnx,$post)
function CreateUnionPost($dbcnx,$post)
function CreateUnionUsers($dbcnx,$post)
*/
function CreateUnionInsertToDB($dbcnx,$post)
{
	$UnionName=			$post['UnionName'];
	$UnionDescription=	$post['UnionDescription'];
	$UnionInterest=		$post['UnionInterest'];
	$UnionAVATAR=		$post['UnionAVATAR'];
	$UnionCreatorID=	$post['UnionCreatorID'];
	$UnionModeratorID=	$post['UnionModeratorID'];
	$UnionRedactorID=	$post['UnionRedactorID'];
	$UnionWorld=		$post['WorldStatus'];
	$UnionCountry=		$post['UnionCountry'];
	$UnionRegion=		$post['UnionRegion'];
	$UnionCity=			$post['UnionCity'];
	$UnionPublic=		"new";
	$Putdate=			date("Y-m-d H:i:s");	
	$query = "INSERT INTO RN_DBO_UNION VALUES (0,
	'".$UnionName."',
	'".$UnionDescription."',
	'".$UnionInterest."',
	'".$UnionAVATAR."',
	'".$UnionCreatorID."',
	'".$UnionModeratorID."',
	'".$UnionRedactorID."',
	'".$UnionWorld."',
	'".$UnionCountry."',
	'".$UnionRegion."',
	'".$UnionCity."',	
	'".$UnionPublic."',
	'".$Putdate."'
	);";
	if(mysqli_query($dbcnx,$query)) {RETURN "OK-UNION-CREATE";}else {RETURN "ERR-UNION-CREATE";}
}
function GetUnionFromCreatorID($dbcnx,$CreatorID)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE CreatorID=".$CreatorID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post;
}
function GetUnionFromUnionID($dbcnx,$UnionID)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE UnionID=".$UnionID; 
	$data = mysqli_query($dbcnx,$query);
	$post = mysqli_fetch_array($data);
RETURN $post;
} 
function UnionsSelfPage($dbcnx,$UnionID)
{
	$DataUnionArray=GetUnionsPOST($dbcnx,$UnionID,$SORT,$LIMIT);
	$UNIONPOST=ShowUnionPostList($dbcnx,$UserDataAuth,$DataUnionArray);
	$UnionsSelfPage = file_get_contents("tpl/UnionsSelfPage.tpl");
	$UnionsListPage = 		str_replace("{UnionID}",			$UnionID, 			$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionName}",			$UnionName, 		$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionDescription}",	$UnionDescription, 	$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionInterest}",		$UnionInterest, 	$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionAVATAR}",		$UnionAVATAR, 		$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionCreatorID}",		$UnionCreatorID, 	$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionModeratorID}",	$UnionModeratorID, 	$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionRedactorID}",	$UnionRedactorID, 	$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionWorld}",			$UnionWorld, 		$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionCountry}",		$UnionCountry, 		$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionRegion}",		$UnionRegion, 		$UnionsListPage);
	$UnionsListPage = 		str_replace("{UnionCity}",			$UnionCity, 		$UnionsListPage);
	$UnionsListPage = 		str_replace("{Public}",				$Public, 			$UnionsListPage);
	$UnionsListPage = 		str_replace("{Putdate}",			$Putdate, 			$UnionsListPage);
	$UnionsListPage = 		str_replace("{UNIONPOST}",			$UNIONPOST, 		$UnionsListPage);
RETURN $UnionsSelfPage;  		
}
function GetUnionsPOST($dbcnx,$UnionID,$SORT,$LIMIT)
{
	$query = "SELECT * FROM RN_DBO_UNION_POST WHERE UnionID=".$UnionID." ".$SORT." ".$LIMIT; 
	$data = mysqli_query($dbcnx,$query);
RETURN $data;
}
function ShowUnionPostList($dbcnx,$UserDataAuth,$UnionID,$SORT,$LIMIT)
{
	$data=GetUnionsPOST($dbcnx,$UnionID,$SORT,$LIMIT);
	if(mysqli_num_rows($data) <= 0){return "Friends Post Empty!";exit;}
	while($post = mysqli_fetch_array($data))
		{
			$UnionsPostList = file_get_contents("tpl/UnionsPostList.tpl");
			$UnionsPostList = 		str_replace("{ID}",				 $post['ID'],				$UnionsPostList);
			$UnionsPostList = 		str_replace("{UnionID}",		 $post['UnionID'],			$UnionsPostList);
			$UnionsPostList = 		str_replace("{UCraterID}",		 $post['UCraterID'],		$UnionsPostList);
			$UnionsPostList = 		str_replace("{UPostName}",		 $post['UPostName'],		$UnionsPostList);
			$UnionsPostList = 		str_replace("{UPostDescription}",$post['UPostDescription'],	$UnionsPostList);
			$UnionsPostList = 		str_replace("{Publication}",	 $post['Publication'],		$UnionsPostList);
			$UnionsPostList = 		str_replace("{Putdate}",		 $post['Putdate'],			$UnionsPostList);			
			$DataString.=$UnionsPostList;
		}
RETURN $DataString;		
}
function UnionsListPage($ConfArray,$UserDataAuth,$TitlePage)
{	
	$UserUnions	="";
	$DataPage	="";
	$UnionsListPage = file_get_contents("tpl/UnionsListPage.tpl");
	$UnionsListPage = 		str_replace("{TitlePage}",	$TitlePage, $UnionsListPage);
	$UnionsListPage = 		str_replace("{UserUnions}",	$UserUnions,$UnionsListPage);
	$UnionsListPage = 		str_replace("{DataPage}",	$DataPage,  $UnionsListPage);
RETURN $UnionsListPage;  
}
function UnionDelete($dbcnx,$UnionID)
{
	$query1 = "DELETE FROM RN_DBO_UNION 	  WHERE UnionID=".$UnionID; if(mysqli_query($dbcnx,$query1)) {ECHO "UNION-del-ok";} 	  else {ECHO "UNION-del-error";}	
	$query2 = "DELETE FROM RN_DBO_UNION_USERS WHERE UnionID=".$UnionID; if(mysqli_query($dbcnx,$query2)) {ECHO "UNION-USERS-del-ok";} else {ECHO "UNION-USERS-del-error";}	
	$query3 = "DELETE FROM RN_DBO_UNION_POST  WHERE UnionID=".$UnionID; if(mysqli_query($dbcnx,$query3)) {ECHO "UNION-POST-del-ok";}  else {ECHO "UNION-POST-del-error";}	
}
function UnionUserDelete($dbcnx,$UserID,$UnionID)
{
	$query1 = "DELETE FROM RN_DBO_UNION_USERS WHERE UnionID=".$UnionID." AND UserID=".$UserID;   if(mysqli_query($dbcnx,$query1)) {ECHO "UNION-USERS-del-ok";} else {ECHO "UNION-USERS-del-error";}	
}
function UnionPostDelete($dbcnx,$PostID)
{
	$query1 = "DELETE FROM RN_DBO_UNION_POST  WHERE UPostID=".$PostID; if(mysqli_query($dbcnx,$query1)) {ECHO "UNION-POST-del-ok";}  else {ECHO "UNION-POST-del-error";}	
}
function GetUnionSearch($dbcnx,$post)
{
	$query = "SELECT * FROM RN_DBO_UNION WHERE"; 
	$data = mysqli_query($dbcnx,$query);
RETURN $data;
}
function SearchUnionForm($dbcnx)
{
	$SearchUniomForm = file_get_contents("tpl/SearchUnionForm.tpl");
RETURN $SearchUniomForm;
}
function UnionUserVariant($dbcnx)
{
	$UnionUserVariant = file_get_contents("tpl/UnionUserVariant.tpl");
RETURN $UnionUserVariant;	
}
function SearchUnion($dbcnx,$SearchText,$WHERE)
{
	$query = "SELECT * FROM RN_DBO_POST WHERE MATCH(Title,Description) AGAINST('".$Sapros."') ORDER BY ID DESC"; 
	$data = mysqli_query($dbcnx,$query);
RETURN 	$data;
}
function CreateUnionForm($dbcnx,$UserDataAuth)
{
		$CreateUnionForm = file_get_contents("tpl/CreateUnionForm.tpl");
		$CreateUnionForm = 		str_replace("{UnionCreatorID}",$UserDataAuth['UserID'],$CreateUnionForm);
RETURN  $CreateUnionForm;
}

function ListUnions($dbcnx,$UserDataAuth)
{
	$String =	file_get_contents("tpl/CollapsUnions.tpl");
	$String = 	str_replace("{LIST_1}",ListUserUnions($dbcnx,$UserDataAuth),			  	$String);
	$String = 	str_replace("{LIST_2}",ListUserHimSelfCreateUnions($dbcnx,$UserDataAuth),	$String);
	$String = 	str_replace("{LIST_3}",ListUserModeratorUnions($dbcnx,$UserDataAuth),		$String);
	$String = 	str_replace("{LIST_4}",ListUserRedactorUnions($dbcnx,$UserDataAuth),		$String);
RETURN $String;
}
function ListUserHimSelfCreateUnions($dbcnx,$UserDataAuth)
{
	$data=GetUnionsFromCreaterID($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "Your Unions is Empty!";exit;}
	$i=0;
	while($post = mysqli_fetch_array($data))
		{
			$i++;
			$DataString.="
			<form name='formUHS".$i."' enctype='multipart/form-data' action='rednet.php' method='post'>
			<input type='hidden' name='Page' value='UnionPage'>
			<input type='hidden' name='UnionID' value='".$post['UnionID']."'>
			<a href='javascript:void(0)' OnClick='document.formUHS".$i.".submit();'>".$post['UnionName']."</a>
			</form>";
		}
RETURN $DataString;		
}

function ListUserModeratorUnions($dbcnx,$UserDataAuth)
{	
	$data=GetUnionsFromModeratorID($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "Your Unions is Empty!";exit;}
	$i=0;
	while($post = mysqli_fetch_array($data))
		{
			$i++;
			$DataString.="
			<form name='formUM".$i."' enctype='multipart/form-data' action='rednet.php' method='post'>
			<input type='hidden' name='Page' value='UnionPage'>
			<input type='hidden' name='UnionID' value='".$post['UnionID']."'>
			<a href='javascript:void(0)' OnClick='document.formUM".$i.".submit();'>".$post['UnionName']."</a>
			</form>";
		}
RETURN $DataString;
}
function ListUserRedactorUnions($dbcnx,$UserDataAuth)
{
$data=GetUnionsFromRedactorID($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "Your Unions is Empty!";exit;}
	$i=0;
	while($post = mysqli_fetch_array($data))
		{
			$i++;
			$DataString.="
			<form name='formUC".$i."' enctype='multipart/form-data' action='rednet.php' method='post'>
			<input type='hidden' name='Page' value='UnionPage'>
			<input type='hidden' name='UnionID' value='".$post['UnionID']."'>
			<a href='javascript:void(0)' OnClick='document.formUC".$i.".submit();'>".$post['UnionName']."</a>
			</form>";
		}
RETURN $DataString;
}
function ListUserUnions($dbcnx,$UserDataAuth)
{
	$data=GetUnionsJoinedUserID($dbcnx,$UserDataAuth['UserID']);
	if(mysqli_num_rows($data) <= 0){return "Your Unions is Empty!<br>";exit;}
	$i=0;
	while($post = mysqli_fetch_array($data))
		{
			$i++;
			$UnionName=GetUnionName($dbcnx,$post['UnionID']);
			$DataString.="
			<form name='formUU".$i."' enctype='multipart/form-data' action='rednet.php' method='post'>
			<input type='hidden' name='Page' value='UnionPage'>
			<input type='hidden' name='UnionID' value='".$post['UnionID']."'>
			<a href='javascript:void(0)' OnClick='document.formUU".$i.".submit();'>".$UnionName."</a>
			</form>";
		}
RETURN $DataString;
}
function GenerateUnionPage($dbcnx,$UnionID,$UserDataAuth)
{	
	$count=TestJoinUnion($dbcnx,$UnionID,$UserDataAuth['UserID']);
	if($count==0){$button="Присоедениться к союзу";	$style="btn btn-danger navbar-btn glyphicon glyphicon-plus";}	
	if($count>0){$button="Покинуть Союз";	$style="btn btn-success  navbar-btn glyphicon glyphicon-ok";}	
	$JOIN.=  		'<div  style="float: left;"><form action="rednet.php" method="POST">
					<input type="hidden" name="Page" 	value="UnionPage">
					<input type="hidden" name="msg" 	value="JoinUnion">
					<input type="hidden" name="UnionID" value="'.$UnionID.'">						
					<input type="hidden" name="UserID" 	value="'.$UserDataAuth['UserID'].'">						
					<button class="'.$style.'" type="submit" title="'.$button.'"></button>
					</form></div>';	
	$MSG.=  		'<div style="float: left;"><form action="rednet.php" method="POST">
					<input type="hidden" name="Page" 	value="UnionPage">
					<input type="hidden" name="msg" 	value="MsgToUnion">
					<input type="hidden" name="UnionID" value="'.$UnionID.'">						
					<input type="hidden" name="UserID" 	value="'.$UserDataAuth['UserID'].'">						
					<button class="btn btn-warning navbar-btn glyphicon glyphicon-comment" type="submit"></button>
					</form></div>';
	$TestUser= TestJoinUnion($dbcnx,$UnionID,$UserDataAuth['UserID']);
	$Union=	   GetUnionFromUnionID($dbcnx,$UnionID); 	
	if($TestUser==1){$UnionPostAddForm=UnionNewPostForm($dbcnx,$UserDataAuth,$UnionID);}
	if($TestUser==0){$UnionPostAddForm="Что бы создавать посты в этом Союзе, необходимо в него вступить!";}
	if($UserDataAuth['UserID']==$Union['UnionCreatorID'])
	{
	$EDIT.=  		'<div style="float: left;"><form action="rednet.php" method="POST">
					<input type="hidden" name="Page" 	value="EditUnionForm">
					<input type="hidden" name="msg" 	value="EditUnion">
					<input type="hidden" name="UnionID" value="'.$UnionID.'">						
					<input type="hidden" name="UserID" 	value="'.$UserDataAuth['UserID'].'">						
					<button class="btn btn-warning navbar-btn glyphicon glyphicon-pencil" type="submit"></button>
					</form></div>';
	} else {$EDIT="";}
	$post=GetUnionUnionID($dbcnx,$UnionID);	
	$UnionPage = file_get_contents("tpl/UnionsSelfPage.tpl");
	$UnionPage = str_replace("{UnionID}",			$post['UnionID'],			$UnionPage);
	$UnionPage = str_replace("{UnionName}",			$post['UnionName'],			$UnionPage);
	$UnionPage = str_replace("{UnionDescription}",	$post['UnionDescription'],	$UnionPage);
	$UnionPage = str_replace("{UnionInterest}",		$post['UnionInterest'],		$UnionPage);
	$UnionPage = str_replace("{UnionAVATAR}",		$post['UnionAVATAR'],		$UnionPage);
	$UnionPage = str_replace("{UnionCreatorID}",	$post['UnionCreatorID'],	$UnionPage);
	$UnionPage = str_replace("{UnionModeratorID}",	$post['UnionModeratorID'],	$UnionPage);
	$UnionPage = str_replace("{UnionRedactorID}",	$post['UnionRedactorID'],	$UnionPage);
	$UnionPage = str_replace("{UnionWorld}",		$post['UnionWorld'],		$UnionPage);
	$UnionPage = str_replace("{UnionCountry}",		$post['UnionCountry'],		$UnionPage);
	$UnionPage = str_replace("{UnionRegion}",		$post['UnionRegion'],		$UnionPage);
	$UnionPage = str_replace("{UnionCity}",			$post['UnionCity'],			$UnionPage);
	$UnionPage = str_replace("{Putdate}",			$post['Putdate'],			$UnionPage);
	$UnionPage = str_replace("{JOIN}",				$JOIN,						$UnionPage);
	$UnionPage = str_replace("{EDIT}",				$EDIT,						$UnionPage);
	$UnionPage = str_replace("{MSG}",				$MSG,						$UnionPage);
	$UnionPage = str_replace("{UnionPostAddForm}",	$UnionPostAddForm,			$UnionPage);	
RETURN $UnionPage;
}
function EditUnionForm($dbcnx,$UnionID,$UserDataAuth)
{
	$UnionData=GetUnionUnionID($dbcnx,$UnionID);
	$EditUnionForm = file_get_contents("tpl/EditUnionForm.tpl");
	$EditUnionForm = str_replace("{UnionID}",			$UnionData['UnionID'],			$EditUnionForm);
	$EditUnionForm = str_replace("{UnionName}",			$UnionData['UnionName'],		$EditUnionForm);
	$EditUnionForm = str_replace("{UnionDescription}",	$UnionData['UnionDescription'],	$EditUnionForm);
	$EditUnionForm = str_replace("{UnionInterest}",		$UnionData['UnionInterest'],	$EditUnionForm);
	$EditUnionForm = str_replace("{UnionAVATAR}",		$UnionData['UnionAVATAR'],		$EditUnionForm);
	$EditUnionForm = str_replace("{UnionCreatorID}",	$UnionData['UnionCreatorID'],	$EditUnionForm);
	$EditUnionForm = str_replace("{UnionModeratorID}",	$UnionData['UnionModeratorID'],	$EditUnionForm);
	$EditUnionForm = str_replace("{UnionRedactorID}",	$UnionData['UnionRedactorID'],	$EditUnionForm);
	$EditUnionForm = str_replace("{UnionWorld}",		$UnionData['UnionWorld'],		$EditUnionForm);
	$EditUnionForm = str_replace("{UnionCountry}",		$UnionData['UnionCountry'],		$EditUnionForm);
	$EditUnionForm = str_replace("{UnionRegion}",		$UnionData['UnionRegion'],		$EditUnionForm);
	$EditUnionForm = str_replace("{UnionCity}",			$UnionData['UnionCity'],		$EditUnionForm);
	$EditUnionForm = str_replace("{Public}",			$UnionData['Public'],			$EditUnionForm);
	$EditUnionForm = str_replace("{Putdate}",			$UnionData['Putdate'],			$EditUnionForm);
	if($UnionData['UnionWorld']==1){$checked1="checked";}
	if($UnionData['UnionWorld']==2){$checked2="checked";}
	if($UnionData['UnionWorld']==3){$checked3="checked";}
	if($UnionData['UnionWorld']==4){$checked4="checked";}
	$EditUnionForm = str_replace("{checked1}",			$checked1,						$EditUnionForm);
	$EditUnionForm = str_replace("{checked2}",			$checked2,						$EditUnionForm);
	$EditUnionForm = str_replace("{checked3}",			$checked3,						$EditUnionForm);
	$EditUnionForm = str_replace("{checked4}",			$checked4,						$EditUnionForm);	
RETURN  $EditUnionForm;
}
function UpdateUnion($dbcnx,$post)
{
$query = 	"UPDATE RN_DBO_UNION SET
			UnionName=			'".$post['UnionName']."',
			UnionDescription=	'".$post['UnionDescription']."',
			UnionInterest=		'".$post['UnionInterest']."',
			UnionAVATAR=		'".$post['UnionAVATAR']."',	
			UnionCreatorID=		".$post['UnionCreatorID'].",	
			UnionModeratorID=	".$post['UnionModeratorID'].",	
			UnionRedactorID	=	".$post['UnionRedactorID'].",	
			UnionWorld=			'".$post['WorldStatus']."',	
			UnionCountry=		'".$post['UnionCountry']."',	
			UnionRegion=		'".$post['UnionRegion']."',	
			UnionCity=			'".$post['UnionCity']."'
			WHERE 	UnionID=".$post['UnionID'];
			if(mysqli_query($dbcnx,$query)) {RETURN "OK-SAVE-UNION-INFO";} else {RETURN "ERR-SAVE-UNION-INFO";}
}
function TestJoinUnion($dbcnx,$UnionID,$UserID)
{
	$query = "SELECT COUNT(*) FROM RN_DBO_UNION_USERS WHERE UnionID=".$UnionID." AND UserID=".$UserID;
		$total = mysqli_query($dbcnx,$query);
		$count = mysqli_fetch_row($total)[0];
RETURN 	$count;	
}
function JoinUnion($dbcnx,$post)
{	
	$count=TestJoinUnion($dbcnx,$post['UnionID'],$post['UserID']);
	if($count==0)
	{	
		$UnionID=			$post['UnionID'];
		$UserID=			$post['UserID'];
		$Putdate=			date("Y-m-d H:i:s");
		$query2 = "INSERT INTO `RN_DBO_UNION_USERS`(`ID`, `UnionID`, `UserID`, `Putdate`) VALUES (0,".$UnionID.",".$UserID.",'".$Putdate."')";
		if(mysqli_query($dbcnx,$query2)) {RETURN "OK-UNION-USER-JOIN";}else {RETURN "ERR-UNION-USER-JOIN";}	
	}
	if($count>0)
	{
		$query2 = "DELETE FROM RN_DBO_UNION_USERS WHERE UnionID=".$post['UnionID']." AND UserID=".$post['UserID'];
		if(mysqli_query($dbcnx,$query2)) {RETURN "UNJOIN-UNION-OK";} else {RETURN "UNJOIN-UNION-ERR";}	
	}
}
function CreateUnionPost($dbcnx,$post)
{
	$UnionID=			$post['UnionID'];
	$UCraterID=			$post['UPCraterID'];
	$UPostName=			CleanTitle($post['UPostName']);
	$UPostDescription=	CleanDescription($post['UPostDescription']);
	$Publication=		'ok!';
	$Putdate=	date("Y-m-d H:i:s");
	$query = "INSERT INTO RN_DBO_UNION_POST VALUES (0,
	'".$UnionID."',
	'".$UCraterID."',
	'".$UPostName."',
	'".$UPostDescription."',
	'".$Publication."',
	'".$Putdate."'
	);";
	if(mysqli_query($dbcnx,$query)) {RETURN "OK-UNION-POST-CREATE";}else {RETURN "ERR-UNION-POST-CREATE";}	
}

function UnionNewPostForm($dbcnx,$UserDataAuth,$UnionID)
{
	$UnionPostForm = file_get_contents("tpl/UnionNewPostForm.tpl");
	$UnionPostForm = str_replace("{UnionID}",$UnionID,				 $UnionPostForm);
	$UnionPostForm = str_replace("{UserID}", $UserDataAuth['UserID'],$UnionPostForm);
RETURN $UnionPostForm;
}


function UnionsSearchPage($dbcnx,$UserDataAuth)
{
	$UnionPostForm = file_get_contents("tpl/UnionsSearchPage.tpl");
	$UnionPostForm = str_replace("{UnionUserVariant}",UnionUserVariant($dbcnx),	$UnionPostForm);
	$UnionPostForm = str_replace("{SearchUnionForm}", SearchUnionForm($dbcnx),	$UnionPostForm);
	$UnionPostForm = str_replace("{UserID}",		  $UserDataAuth['UserID'],	$UnionPostForm);	
RETURN $UnionPostForm;
}


function UnionsListFR($dbcnx,$UserDataAuth,$UnionWorld,$UnionCountry,$UnionRegion,$UnionCity)
{
	$data=GetUnionFromWorld($dbcnx,$UnionWorld);
	if(mysqli_num_rows($data) <= 0){return "Union List Empty!";exit;}
	$Result='<div class="table-responsive"><table class="table  table-hover" id="dataTables-example">
				<thead>
                    <tr>
						<th>Фото</th>
                        <th>Название</th>
                        <th>Страна</th>
                        <th>Регион</th>
                        <th>Город/Населенный пункт</th>
                    </tr>
                </thead>
             <tbody>';
			 
	while($post = mysqli_fetch_array($data))
		{
			$i++;
			$UnionAvatar=	$post['UnionAVATAR'];
			$UnionName=		$post['UnionName'];	  			
			if(!file_exists($UnionAVATAR)){$UnionAvatar="/img/NoImage.png";}
			$Result.="<tr><td><img src='".$UnionAvatar."' width='50'></td>
			<td>			
			<form name='formUNI".$i."' enctype='multipart/form-data' action='rednet.php' method='post'>
			<input type='hidden' name='Page' value='UnionPage'>
			<input type='hidden' name='UnionID' value='".$post['UnionID']."'>
			<a href='javascript:void(0)' OnClick='document.formUNI".$i.".submit();'>Марксистский Кружок</a>
			</form>			
			</td>
			<td style='color:#455917'>".$post['UnionCountry']."</td>
			<td style='color:#455917'>".$post['UnionRegion']."</td>
			<td style='color:#455917'>".$post['UnionCity']."</td>			
			</tr>";
		}
$Result.="</tbody></table></div>";
RETURN $Result;
}





?>