<div class="navbar-form navbar-left">
<input type="hidden" name="Page" value="YES">
<input type="hidden" name="PostID" value="{PostID}">						
<button class="btn btn-success glyphicon glyphicon-thumbs-up" onClick="YES({PostID})" type="submit" title="You support it">
<span id="yes_sid_{PostID}">{YESCV}</span></button>
</div>
<div class="navbar-form navbar-left">
<input type="hidden" name="Page" value="NO">
<input type="hidden" name="PostID" value="{PostID}">						
<button class="btn btn-danger glyphicon glyphicon-thumbs-down" onClick="NO({PostID})" type="submit" title="You do not support it">
<span id="no_sid_{PostID}">{NOCV}</span></button>
</div>

<script>
function YES(PostID)
{
//alert('Up Trust');
//  chatid = $("#chatid").val(); //hidden field which contains the current chat id. 
    $.ajax({
       type: "POST",
        url: "rednet.php?Page=YES", 
        data: {"PostID":PostID},
        success: function (data) {
             //alert(output); //updates the output to a div
			  $('#yes_sid_'+PostID).html(data);
        }
    });

}

function NO(PostID)
{
//alert('Down Trust');
//  chatid = $("#chatid").val(); //hidden field which contains the current chat id. 
    $.ajax({
       type: "POST",
        url: "rednet.php?Page=NO", 
        data: {"PostID":PostID},
        success: function (data) {
             //alert(output); //updates the output to a div
			  $('#no_sid_'+PostID).html(data);
        }
    });

}
</script>