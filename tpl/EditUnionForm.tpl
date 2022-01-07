<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Заполните Форму для создания UNIONS
			</div>
			<div class="panel-body">
					<div class="row">		
							<div class="col-md-12">	
								<div class="row">	
									<div class="col-md-12">							
										<form action="rednet.php" method="POST">
										<label 	  class="form-check-label">BANNER IMG URL</label>
										<input 	  class="form-control" type="text" 	name="UnionAVATAR" 	 value="{UnionAVATAR}"		placeholder="AVATAR" 			required>
										<label 	  class="form-check-label">Union Title</label>
										<input 	  class="form-control" type="text" 	name="UnionName" 		 value="{UnionName}"	placeholder="Union Title" 		required>
										<label 	  class="form-check-label">Union Description</label>
										<textarea class="form-control" type="text" 	name="UnionDescription"   placeholder="Union Description" required>{UnionDescription}</textarea>
									</div>
									<div class="col-md-6">	
										<label 	  class="form-check-label">Union Interest</label>
										<input 	  class="form-control" type="text" 	name="UnionInterest" value="{UnionInterest}"	placeholder="Union Interest" 	required>
										<label 	  class="form-check-label">Country</label>
										<input 	  class="form-control" type="text" 	name="UnionCountry"  value="{UnionCountry}"		placeholder="Country" 			required>
										<label 	  class="form-check-label">Region</label>
										<input 	  class="form-control" type="text" 	name="UnionRegion" 	 value="{UnionRegion}"		placeholder="Region" 			required>
										<label 	  class="form-check-label">City</label>								
										<input 	  class="form-control" type="text" 	name="UnionCity" 	 value="{UnionCity}"		placeholder="City" 				required>
									</div>
									<div class="col-md-6">							
										<label 	  class="form-check-label">Creator ID</label>								
										<input 	  class="form-control" type="text" 	name="UnionCreatorID" 	value="{UnionCreatorID}"readonly>
										<label 	  class="form-check-label">Moderator ID</label>
										<input 	  class="form-control" type="text" 	name="UnionModeratorID" placeholder="Moderator ID" value="{UnionModeratorID}"	required>
										<label 	  class="form-check-label">Redactor ID</label>
										<input 	  class="form-control" type="text" 	name="UnionRedactorID" 	placeholder="Redactor ID"  value="{UnionRedactorID}"	required>
									</div>
								</div>
								<br>
								<div class="row">	
											<div   class="alert alert-info">At what level do you want to publish your UNION?<br>
												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="1" {checked1}>
												  <label class="form-check-label">
													World
												  </label>
												</div>
												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="2" {checked2}>
												  <label class="form-check-label">
													Country(In Your Country)
												  </label>
												</div>
												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="3" {checked3}>
												  <label class="form-check-label">
													Region(In Your Region)
												  </label>
												</div>
												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="4" {checked4}>
												  <label class="form-check-label">
													City(In Your City)
												  </label>
												</div>
											</div>
								</div>					
								<input type="hidden" 	name="Page" 	value="UnionPage">
								<input type="hidden" 	name="msg" 		value="UpdateUnion">								
								<input type="hidden" 	name="UnionID" 		value="{UnionID}">
								<button class="nav-link" class="btn btn-success btn-lg btn-block" type="submit">Update YOUR Union!</button>
								</form>
							</div>
					</div>						
			</div>
		</div>
	</div>
</div>