<div id="page-inner">
	<div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
					<div class="row">
						<div class="col-md-9 col-sm-9">
							<a class="navbar-form navbar-left" href="#">Sabj: <b>{Title}</b></a>
						</div>	
						<div class="col-md-3 col-sm-3">
							{SettingPOST}
						</div>	
					</div>
				</div>
                <div class="panel-body">
                    From (User: <a href=rednet.php?Page=UserFRPage&FriendID={UserID}> {UserNickName}</a>)
					to {WorldStatus}) (Status: {Status})
					<p>						
							{Description}
					</p>
                    </div>
                <div class="panel-footer">
                   	<div class="row">
						<div class="col-md-9 col-sm-9">
							{TrustUD}{YES_NO}
						</div>	
					</div>
                </div>
            </div>
        </div>
	</div>	
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default" style="border:none;">
                <div class="panel-heading">
                    Все Комментарии
                </div>
				<div class="panel-body" id="comment_body">
					{COMMENT}					
				</div>
            </div>
        </div>
	</div>
</div>