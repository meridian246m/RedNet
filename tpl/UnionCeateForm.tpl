<form action="rednet.php" method="POST">
	<input type="text"   name="UnionName" 		 placeholder="Union Name"			required>					
	<input type="text"   name="UnionDescription" placeholder="Union Description"	required>					
	<input type="text"   name="UnionInterest" 	 placeholder="Union Interest"		required>					
	<input type="text"   name="UnionAVATAR" 	 placeholder="Union AVATAR"			required>		
	<input type="text"   name="UnionCreatorID" 	 placeholder="Union CreatorID"	value="{UnionCreatorID}" readonly>			
	<input type="number" name="UnionModeratorID" placeholder="Union ModeratorID"	required>					
	<input type="number" name="UnionRedactorID"  placeholder="Union RedactorID"		required>					
	<input type="text"   name="UnionWorld" 		 placeholder="Union World"			required>					
	<input type="text"   name="UnionCountry" 	 placeholder="Union Country"		required>					
	<input type="text"   name="UnionRegion" 	 placeholder="Union Region"			required>					
	<input type="text"   name="UnionCity" 		 placeholder="Union City"			required>					
	<input type="hidden" name="Page" 									 value="UnionCreate">
	<button class="nav-link" type="submit">Create Union!</button>
</form>


