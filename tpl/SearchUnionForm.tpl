    
	<div class="col-md-12">
		<div class="panel panel-default">
			<form action="rednet.php" method="POST">
			<div class="panel-body">
					<div class="row">		
							<div class="col-md-12">
								<div class="form-group" style="display: {AddVisibleSearchFriend};">	
									<input class="form-control" name="SearchText" type="text" placeholder="Search"><br>							
									<input type="checkbox"  name="World" 		value="World"><label> Всемирные</label><br>
									<input type="checkbox"  name="World" 		value="World"><label> Государственные</label><br>
									<input type="checkbox"  name="World" 		value="World"><label> Региональные</label><br>
									<input type="checkbox"  name="World" 		value="World"><label> Городские</label><br>
									<input type="hidden" 	name="Page" 		value="Unions">
									<input type="hidden" 	name="msg" 			value="SearchUnions">
								</div>
							</div>
					</div>
					<div class="row">
							<div class="col-md-12">
									<input type="submit" 	class="btn btn-primary"	value="Найти Союз" />
							</div>
					</div>	
			</form>
			</div>
		</div>
	</div>
