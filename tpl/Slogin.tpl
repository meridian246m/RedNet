						<div class="portfolio-block" id="Login">
                            <div class="portfolio-title">
                            <h1>LOGIN</h1>
                            <h2>Join our fight!</h2>
                            </div>
                            <div class="row-fluid">

							<form action="rednet.php" method="POST">
								<div class="controls">
									<input type="text" 	 	name="Email" 	placeholder="Email"    required />
									<input type="password" 	 	name="Password" placeholder="Password" required />
									<input type="hidden" 		name = "Page" value="User-Page">
								</div>
								<div class="controls">
									<button id="contact-submit" type="submit" class="btn">LOGIN!</button>
								</div>
							</form>

                            </div>
                        </div>
                        <div class="portfolio-block">
                            <div class="portfolio-title">
                            <h1>REGISTER</h1>
                            <h2>Join our fight!</h2>
                            </div>
                            <div class="row-fluid">

							<form action="rednet.php" method="POST">
							<div class="controls">
								<input type="text" 			name="Email" 	  	pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"	placeholder="Your email..." 	required />
								<input type="password" 		name="Password" 						placeholder="Your Password..." 	required />
							</div>
							<div class="controls">		
								<input type="text" 			name="UserNickName" pattern="^[a-zA-Z]+$" placeholder="Your Nick..." 	required />
								<input type="text" 			name="Country"	 	pattern="^[a-zA-Z]+$"	placeholder="Your Country" 		required />
							</div>	
							<div class="controls">
								<input type="text" 			name="Region" 		pattern="^[a-zA-Z]+$" placeholder="Your Region State" required />
								<input type="text" 			name="City" 		pattern="^[a-zA-Z]+$" placeholder="Your City" 		required />
							</div>
							<div class="controls">							
								<input type="text" 			name="UserAvatar" 	placeholder="Your Avatar" 	required />
								<input type="hidden" 		name="Page" 		value="Add-User">
							</div>	
							<div class="controls">
								<input type="submit" 		value="Register" class="btn"/>	
							</div>			
							</form>

                            </div>
                        </div>