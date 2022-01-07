<form class="navbar-form navbar-left" action="rednet.php" method="POST">
<input type="hidden" name="Page" value="PostEditForm">
<input type="hidden" name="PostID" value="{PostID}">						
<button class="glyphicon glyphicon-pencil" style="background-color:black;" type="submit" title="Edit Post"></button>
</form>
<form class="navbar-form navbar-left" action="rednet.php" method="POST">
<input type="hidden" name="Page" value="PostPublick">
<input type="hidden" name="PostID" value="{PostID}">						
<button class="{PostPublick}" style="background-color:black;" type="submit" title="Arhive or Public Post"></button>
</form>
<form class="navbar-form navbar-left" action="rednet.php" method="POST">
<input  type="hidden" name="Page" value="PostDelete">
<input type="hidden" name="PostID" value="{PostID}">						
<button class="glyphicon glyphicon-trash" style="background-color:black;" type="submit" title="Delete Post"></button>
</form>

