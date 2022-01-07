<div class="jumbotron text-center">
  <h1>REGISTER OR ENTER</h1>
  <div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
				<h1>Register Form</h1>
				<form action="{Domen}rednet.php" method="POST">
					<input type="email" 		name="Email" 	  	pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"	placeholder="Your email..." 	required />
					<input type="password" 		name="Password" 						placeholder="Your Password..." 	required />
					<input type="text" 			name="UserNickName" pattern="^[a-zA-Z]+$" placeholder="Your Nick..." 	required />
					<input type="text" 			name="Country"	 	pattern="^[a-zA-Z]+$"	placeholder="Your Country" 		required />
					<input type="text" 			name="Region" 		pattern="^[a-zA-Z]+$" placeholder="Your Region State" required />
					<input type="text" 			name="City" 		pattern="^[a-zA-Z]+$" placeholder="Your City" 		required />
					<input type="text" 			name="UserAvatar" 	placeholder="Your Avatar" 	required />
					<input type="hidden" 		name="Page" 		value="Add-User">
					<input type="submit" 		value="Register" />					
				</form>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
				<h1>Auth Form</h1>
				<form action="{Domen}rednet.php" method="POST">
					<input type="email" 	 	name="Email" 	placeholder="Email"    required />
					<input type="password" 	 	name="Password" placeholder="Password" required />
					<input type="hidden" 		name = "Page" value="User-Page">

					<input type="submit" 	 	value="Enter" />
				</form>
		</div>
	</div>
</div>
</div>


