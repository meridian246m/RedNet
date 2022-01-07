<?PHP
function GenerateCommentShow($dbcnx,$CommentsData,$UserDataAuth)
{
	if(mysqli_num_rows($CommentsData) <= 0){return "Data Empty!";exit;}
	while($Comment = mysqli_fetch_array($CommentsData))
		{			
			if($Comment['UserID']==$UserDataAuth['UserID']){
			$DelButton='<form action="rednet.php" method="GET">
						<input type="hidden" name="Page" value="ShowFullPost">
						<input type="hidden" name="PostID" value="'.$Comment['PostID'].'">
						<input type="hidden" name="CommentID" value="'.$Comment['ID'].'">
						<input type="hidden" name="msg" value="del">						
						<button class="btn btn-default" type="submit">Del</button>
			</form>';} else {$DelButton="";}
			$UserID=GetUserNickFromUserID($dbcnx,$Comment['UserID']);	
			$CommentShow='<h5><strong>'.$UserID.' '.$Comment['Putdate'].'</strong></h5>
						<div  class="col-md-12 col-sm-12">
							<div class="col-md-10 col-sm-10">
								<div class="alert alert-info" style="color:yellow">
									'.$Comment['TEXT'].'
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								'.$DelButton.'							
							</div>							
						</div>
							<br />';						 
//			$DataString.="ID:".$Comment['ID']." PostID:".$Comment['PostID']." UserID:".$Comment['UserID']." TEXT:".$Comment['TEXT']." DATA:".$Comment['Putdate'].$DelButton."<br>";
			$DataString.=$CommentShow;
		}
	RETURN $DataString;
}
function InsertComent($dbcnx,$POST)
{
	$PostID=	$POST['PostID'];
	$UserID=	$POST['UserID'];
	$TEXT=		$POST['TEXT'];
	$Putdate=	date("Y-m-d H:i:s");
	$query = "INSERT INTO RN_DBO_COMMENT VALUES (0,
										'".$PostID."',
										'".$UserID."',
										'".$TEXT."',
										'".$Putdate."'
										);";
	if(mysqli_query($dbcnx,$query)) {RETURN "OK-COMMENT-INSERT";}else {RETURN "ERR-COMMENT-INSERT";}
}
function DeleteComment($dbcnx,$CommentID)
{
	 $query = "DELETE FROM RN_DBO_COMMENT WHERE ID=".$CommentID; if(mysqli_query($dbcnx,$query)) {RETURN "DELETE-COMMENT-OK";} else {RETURN "DELETE-COMMENT-ERR";}	
}

?>