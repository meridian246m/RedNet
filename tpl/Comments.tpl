	<div class="row">
        <div class="col-md-10 col-sm-10">
			<textarea id="TEXT"  class="form-control" name="TEXT" cols="10" rows="2"></textarea>
			<input type="hidden" name="Page" value="AddComment">
			<input type="hidden" name="PostID" value="{PostID}">
			<input type="hidden" name="UserID" value="{UserID}">
		</div>		
        <div class="col-md-2 col-sm-2">
			<button type="submit" onClick="AddPost({PostID},{UserID})" class="btn btn-default">ADD Coment</button>
		</div>
	</div>		

<script>
function AddPost(PostID,UserID)
{
//alert('ADD');
var TEXT = $("#TEXT").val();
//  chatid = $("#chatid").val(); //hidden field which contains the current chat id. 
    $.ajax({
       type: "POST",
        url: "rednet.php?Page=AddComment", 
        data: {"PostID":PostID,"UserID":UserID,"TEXT":TEXT},
        success: function (data) {
             //alert(output); //updates the output to a div
			  //$('#comment_body').html(data);
			  location.reload();
        }
    });
}
</script>