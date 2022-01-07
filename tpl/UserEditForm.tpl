<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Личные Данные
			</div>
			<div class="panel-body">
				<form action="rednet.php" method="POST" role="form">
					<div class="row">		
							<div class="col-md-6">
									<center><img src="{UserAvatar}" width="50" /></center>
							</div>		
							<div class="col-md-6">
									<label>Ссылка на ваш Аватар</label>
									<input class="form-control" type="text" 			name="UserAvatar" 							placeholder="Your Avatar" 		value="{UserAvatar}" />
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>	
									<input class="form-control" type="email" 			name="UserEmail" 	pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"	placeholder="Your email..." value="{UserEmail}" />
									<label>Password</label>
									<input class="form-control" type="password" 		name="Password" 							placeholder="Your Password..." 			   />
									<label>Nick Name</label>
									<input class="form-control" type="text" 			name="UserNickName" 					 	placeholder="Your Nick..." 		value="{UserNickName}" />
									<label>Страна</label>
									<input class="form-control" type="text" 			name="Country"	 	pattern="^[a-zA-Z]+$"	placeholder="Your Country" 		value="{Country}" />
									<label>Регион</label>
									<input class="form-control" type="text" 			name="Region" 		pattern="^[a-zA-Z]+$" 	placeholder="Your Region State" value="{Region}" />
									<label>Город/Населенный пункт</label>
									<input class="form-control" type="text" 			name="City" 		pattern="^[a-zA-Z]+$" 	placeholder="Your City" 		value="{City}" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Профессия</label>
									<input class="form-control" type="text" 			name="Proffesion" 							placeholder="Proffesion" 		value="{Proffesion}" />
									<label>Хобби (music,move,art...) list separated by commas</label>
									<input class="form-control" type="text" 			name="Hobby" 								placeholder="Hobby" 		 	value="{Hobby}" />
									<label>Социальный Статус</label>	
									<input class="form-control" type="text" 			name="SocialStatus" 						placeholder="SocialStatus" 		value="{SocialStatus}" />
									<label>Образование</label>
									<input class="form-control" type="text" 			name="Education" 							placeholder="Education" 		value="{Education}" />					
									<label>День Рождения</label>
									<input class="form-control" type="data" 			name="DateOfBirth" 	min="1930-01-01" max="2014-12-31" placeholder="Date Of Birth" 	value="{DateOfBirth}" />
									<label>Пол</label>
									<input class="form-control" type="text" 			name="Gender" 								placeholder="Gender" 			value="{Gender}" />					
									
									<input class="form-control" type="hidden" 			name="Page" 		value="SAVEUser">
									<input class="form-control" type="hidden" 			name="UserID" 		value="{UserID}">
								</div>					
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Ваш Манифест и другая информация</label>
								<textarea   class="form-control" name="Manifest" cols="30" rows="7" placeholder="Enter the Your Manifest">{Manifest}</textarea>
								</div>
							</div>	
					</div>
					<div class="row">
							<div class="col-md-12">
									<input type="submit" 	class="btn btn-primary btn-lg btn-block"	value="SAVE!" />
							</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>