<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">                  
		<div class="chat-panel panel panel-default chat-boder chat-panel-head" >
			<div class="panel-heading">
                <a href="rednet.php?Page=UserFRPage&FriendID={FriendID}"><i class="fa fa-comments fa-fw"></i> Чат с <span style="color:yellow">{UserNickName}</span></a>
				<div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-chevron-down"></i>
                    </button>
					<ul class="dropdown-menu slidedown">
						<li><a href="#"><i class="fa fa-refresh fa-fw"></i>Refresh</a></li>
                        <li><a href="#"><i class="fa fa-check-circle fa-fw"></i>Available</a></li>
                        <li><a href="#"><i class="fa fa-times fa-fw"></i>Busy</a></li>
                        <li><a href="#"><i class="fa fa-clock-o fa-fw"></i>Away</a></li>
                        <li class="divider"></li><li><a href="#"><i class="fa fa-sign-out fa-fw"></i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
			<div class="panel-body"  >
                <ul class="chat-box" id="chatbox">
                        {ChatSMS}
                </ul>
            </div>
						{SendForm}
        </div>                  
    </div>
</div>   

<script>
function updateRow()
{
/*alert('sdfsdfg');*/
//  chatid = $("#chatid").val(); //hidden field which contains the current chat id. 
    $.ajax({
       type: "POST",
        url: "rednet.php?Page=Get-SMS", 
        data: {"UserID":{UserID},"FriendID":{FriendID}},
        success: function (data) {
             //alert(output); //updates the output to a div
			  $('#chatbox').html(data);
        }
    });
}
setInterval("updateRow()",3000); //call updateRow() function every 3 seconds.
</script>