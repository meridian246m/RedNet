<div style="display: {AddVisibleSMS};">
<form action="rednet.php" method="POST">
<input type="text" 	 name="NewSMS" placeholder="New SMS" required>	
<input type="hidden" name="UserID" 		value="{UserID}">			
<input type="hidden" name="FriendID" 	value="{FriendID}">			
<input type="hidden" name="Page" 		value="FriendsSMS">
<button class="nav-link" type="submit">Отправить</button>
</form>
