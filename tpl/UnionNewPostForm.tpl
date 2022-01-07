<form action="rednet.php" method="POST">
<input type="hidden" name="Page"    	value="UnionPage">
<input type="hidden" name="msg" 		value="NewPost">
<input type="hidden" name="UnionID" 	value="{UnionID}">
<input type="hidden" name="UPCraterID"  value="{UserID}">
<div class="form-group">
	<input type="text" 	 name="UPostName" class="form-control"	 placeholder="Post Title"	 	required>
</div>
<div class="form-group">	
    <textarea class="form-control" rows="3" name="UPostDescription" placeholder="Post Description" required></textarea>
</div>
<div class="form-group">
	<button class="nav-link" type="submit">Send Post!</button>
</div>
</form>