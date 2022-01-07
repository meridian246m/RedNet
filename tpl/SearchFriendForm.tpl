    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Искать Друзей
			</div>
			<div class="panel-body">
				<form action="rednet.php" method="POST" role="form">
					<div class="row">		
							<div class="col-md-12">
								<div class="form-group" style="display: {AddVisibleSearchFriend};">									
									<input class="form-control" type="text" name="Country" 		placeholder="Country">	
									<input class="form-control" type="text" name="Region" 		placeholder="Region">	
									<input class="form-control" type="text" name="City" 		placeholder="City">					
									<input class="form-control" type="text" name="NickName" 	placeholder="Nick Name">	
									<input class="form-control" type="text"	name="Hobby" 		placeholder="Hobby">			
									<input class="form-control" type="text" name="Profession" 	placeholder="Profession">			
									<input class="form-control" type="text" name="SocialStatus" placeholder="Social Status">
									<input class="form-control" type="text" name="Education" 	placeholder="Education">
									<label>Дата Рождения</label>
									<input class="form-control" type="date" name="DataOfBirth" min="1920-01-01" max="2018-12-31">
									<input type="hidden" name="Page" value="AllMyFriends"   placeholder="AllMyFriends">
									<input type="hidden" name="msg"  value="SerchFriend"	placeholder="AllMyFriends">
								</div>
							</div>
					</div>
					<div class="row">
							<div class="col-md-12">
									<input type="submit" 	class="btn btn-primary"	value="Поиск" />
							</div>
					</div>	
				</form>
			</div>
		</div>
	</div>