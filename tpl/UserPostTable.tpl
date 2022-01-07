<div class="panel panel-default">
    <div class="panel-heading" style="background-color:black;">
		<div class="row">
		<div class="col-md-9 col-sm-9">
			<a class="navbar-form navbar-left" style="font-size:16px;color:white" href="rednet.php?Page=ShowFullPost&PostID={PostID}"><b>Sabj: {Title}</b></a>
		</div>	
		<div class="col-md-3 col-sm-3">
			{SettingPOST}
		</div>	
    </div>
    </div>
	<div class="panel-body">
	From: <a href=rednet.php?Page=UserFRPage&FriendID={UserID}> {UserName}</a> - 
	<span style="color:#d9f0a5;">Страна:</span> <B>{Country}</B> 
	<span style="color:#d9f0a5;">Регион:</span> <B>{Region}</B>  
	<span style="color:#d9f0a5;">Город/Населенный пункт:</span> <B>{City}</B>	<br>
	To:  {WorldStatus}<br> 
	Status: {Status}
		<p>{Description}<br><a href="rednet.php?Page=ShowFullPost&PostID={PostID}">...Читать все</a></p>
		<!--b>UserID:</b>{UserID} -->	
		<!--b>UserName:</b-->
	<b>{Putdate}</b> <!--b>View: {ColVoView}</b-->	
    </div>
    <div class="panel-footer">
	<div class="row">
		<div class="col-md-9 col-sm-9">
			{TrustUD}{YES_NO}
		</div>	
		<div class="col-md-3 col-sm-3">
			<form class="navbar-form navbar-left" action="rednet.php" method="GET">
				<input type="hidden" name="Page" value="ShowFullPost">
				<input type="hidden" name="PostID" value="{PostID}">
				<button class="btn btn-default glyphicon glyphicon-comment"> Comments:({COMMENT_CV})</button>
			</form>	
		</div>	
    </div>
	</div>
</div>

<!--
	   Up Trust({UpTrust}) Down Trust({DownTrust})		
		{YES}			
		{NO}		
-->