<div class="panel-footer" style="display: {AddVisibleSMS};">
	<form action="rednet.php" method="POST">
		<div class="input-group">
			<input id="btn-input" name="NewSMS" type="text" class="form-control input-sm" placeholder="Type your message to send..." required/>
			<input type="hidden" name="UserID" 		value="{UserID}">			
			<input type="hidden" name="FriendID" 	value="{FriendID}">			
			<input type="hidden" name="Page" 		value="FriendsSMS">
				<span class="input-group-btn">
					<button class="btn btn-warning btn-sm" type="submit" id="btn-chat">Отправить</button>
				</span>
		</div>
	</form>	
</div>