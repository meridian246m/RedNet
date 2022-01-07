				<div style="color: white;padding: 15px 50px 5px 50px;float: right; font-size: 16px;">
						<div style="display: table;">						
								<div style="display: table-cell;">
									<form action="rednet.php" method="POST">
									<input type="hidden" name="Page" value="AddPostForm">
									<button class="btn btn-danger square-btn-adjust" type="submit">+</button>
									</form>
								</div>
								<div style="display: table-cell;">						
									<form  action="rednet.php" method="POST" role="form">
									<input class="form-control" name="SearchTEXT" type="search" placeholder="Search" aria-label="Search" required>
									<input type="hidden" name="Page" 	value="SearchInfoTEXT">
								</div>
								<div style="display: table-cell;">
									<span class="form-group input-group-btn">
									<button class="btn btn-danger square-btn-adjust" type="submit">Search</button>
									</span>
									</form>
								</div>
								<div style="display: table-cell;">
									<form action="rednet.php" method="POST">
									<input type="hidden" name="Page" value="EXIT">
									<button class="btn square-btn-adjust" style="border-color:black;" type="submit">EXIT</button>
									</form>
								</div>	
					</div>
				</div>

						