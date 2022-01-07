<div class="navbar-form navbar-left">
<input type="hidden" name="Page" value="UpTrust">
<input type="hidden" name="PostID" value="{PostID}">						
<button class="btn btn-success glyphicon glyphicon-arrow-up" onClick="UpTrust({PostID})" type="submit" title="You trust this information">Up Trust
<span id="up_sid_{PostID}">{UpTrustCV}</span></button>
</div>
<div class="navbar-form navbar-left">
<input type="hidden" name="Page" value="DownTrust">
<input type="hidden" name="PostID" value="{PostID}">						
<button class="btn btn-danger glyphicon glyphicon-arrow-down" onClick="DownTrust({PostID})" type="submit" title="You do not trust this information">Down Trust
<span id="down_sid_{PostID}">{DownTrustCV}</span></button>
</div>

<script>
function UpTrust(PostID)
{
//alert('Up Trust');
//  chatid = $("#chatid").val(); //hidden field which contains the current chat id. 
    $.ajax({
       type: "POST",
        url: "rednet.php?Page=UpTrust", 
        data: {"PostID":PostID},
        success: function (data) {
             //alert(output); //updates the output to a div
			  $('#up_sid_'+PostID).html(data);
        }
    });

}

function DownTrust(PostID)
{
//alert('Down Trust');
//  chatid = $("#chatid").val(); //hidden field which contains the current chat id. 
    $.ajax({
       type: "POST",
        url: "rednet.php?Page=DownTrust", 
        data: {"PostID":PostID},
        success: function (data) {
             //alert(output); //updates the output to a div
			  $('#down_sid_'+PostID).html(data);
        }
    });

}
</script>