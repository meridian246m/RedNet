    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-white">
                    <!--i class="fa fa-warning"></i-->
					<img src="{UserAvatar}" width=50/>
                </span>
                <div class="text-box" >
                    <p class="main-text">{UserNickName} </p>
					<hr/>
					<div style="display: inline-block;">
					<form action="rednet.php" method="POST">
						<input type="hidden" name="Page" value="ADDFriend">
						<input type="hidden" name="FriendID" value="{UserID}">						
						<button class="{ButtonColor}" type="submit">{ButtonFriend}</button>
					</form>
					</div>
					<div style="display: inline-block;">
					<form action="rednet.php" method="POST">
						<input type="hidden" name="Page" value="FriendsSMS">
						<input type="hidden" name="FriendID" value="{UserID}">						
						<button class="btn btn-info" type="submit">SMS</button>
					</form>
					</div>
					<hr/>
				<ul>
                    <li class="text-muted">Email: <b>{UserEmail}</b></li>
                    <li class="text-muted">Proffesion: <b>{Proffesion}</b></li>
                    <li class="text-muted">Hobby: <b>{Hobby}</b></li>
                    <li class="text-muted">Social Status: <b>{SocialStatus}</b></li>
                    <li class="text-muted">Education: <b>{Education}</b></li>					
                    <li class="text-muted">Gender: <b>{Gender}</b></li>
                    <li class="text-muted">LastEnterData: <b>{LastEnterData}</b></li>
				</ul>			
                    <hr/>
                    <p class="text-muted">
                        <span class="text-muted color-bottom-txt">
                            Country: <b>{Country}</b>
							Region:  <b>{Region}</b>
							City: <b>{City}</b>							
                        </span>
                    </p>
                </div>
            </div>
		</div>
        <div class="col-md-6 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <div class="text-box" >
                    <center><p class="main-text">My Manifest</p></center>
                    <p class="text-muted">{Manifest}</p>
                </div>
            </div>
		</div>                                       
	</div>
	<h2>My POST</h2>