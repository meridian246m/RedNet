<li class="text-center" style="color:white;">
<a href="?Page=UserPage"><img width="120" src="{UserAvatar}"></a></li>
<li class="text-center" style="color:white;">{UserNickName}</li>
<!--li class="text-center">Email: {UserEmail}</li-->
<!--li class="text-center">Pass: {UserPassword}</li-->
<!--li class="text-center">Avatar: {UserAvatar}</li-->
<!--li class="text-center">Status: {UserRole}</li-->
<li class="text-center" style="color:white;">Country: {Country}</li>
<li class="text-center" style="color:white;">Region: {Region}</li>
<li class="text-center" style="color:white;">City: {City}</li>
<li class="text-center" style="color:white;">UpTrust: {UpTrust} DownTrust: {DownTrust}</li>
<!--li class="text-center">Status: {Putdate}</li-->
<li class="text-center" style="color:white;">
<form action="rednet.php" method="POST">
	<input type="hidden" name="Page" value="EditUserForm">
	<input type="hidden" name="UserID" value="{UserID}">						
	<button class="btn btn-warning navbar-btn glyphicon glyphicon-pencil" type="submit"></button>
</form>
<form action="rednet.php" method="POST">
	<input type="hidden" name="Page" value="AddPostForm">
	<button class="btn btn-success navbar-btn" type="submit">+New POST!</button>
</form>

<form 	action="rednet.php" method="POST">
<input 	type="hidden" name="Page" value="CreateUnionForm">
<button class="btn btn-success navbar-btn" type="submit">Create Union</button>
</form>
</li>



<!--Your ID: {UserID}-->