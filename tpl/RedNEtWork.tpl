<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    {Header}
</head>
<body>
<nav class="navbar navbar-inverse navbar-cls-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		<a class="navbar-brand" href="rednet.php"><span style="color:#ff2400">RED</span> NET</a> 
		</div>
		<div class="menu-collapse">		
			<ul class="nav navbar-nav">
				<li><a href="?Page=WORLD_POST">МИР</a></li>
				<li><a href="?Page=COUNTRY_POST">Страна</a></li>
				<li><a href="?Page=REGION_POST">Регион</a></li>
				<li><a href="?Page=CITY_POST">Город</a></li>
				<li><a href="?Page=FriendsPost">Посты Дурзей</a></li>
				<li><a href="?Page=AllMyFriends">Мои Друзья</a></li>
				<li><a href="?Page=Unions">СОЮЗЫ</a></li>
				<li><a href="?Page=FriendsSMS"><i class="glyphicon glyphicon-comment"></i></a></li>		  
			</ul>
		</div>		
		<ul class="nav navbar-nav">
		<li>	
			<form  action="rednet.php" method="POST" class="navbar-form navbar-left">
				<div class="form-group">
					<input class="form-control" name="SearchTEXT" type="text" placeholder="Search"  required>
				</div>
				<input type="hidden" name="Page" 	value="SearchInfoTEXT">
				<button class="btn btn-primary" type="submit">Поиск</button>
			</form>
		</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">		
			<li>
				<form action="rednet.php" method="POST">
					<input type="hidden" name="Page" value="EXIT">	  				
					<button type="submit" class="btn  navbar-btn" style="border-color:black;">
						<span class="glyphicon glyphicon-log-in fa-1x"></span> 
					</button>
				</form>	
			</li>
		</ul>
	</div>
</nav>
<div id="wrapper">	
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="">
			<ul class="nav list-group" id="main-menu">
					{LeftData}								
            </ul>
        </div>
    </nav>  
    <div id="page-wrapper" >
		<div id="page-inner">
                {RightData}
		</div>
    </div>
</div>
    
	{Footer}
    {Jquery}
   
</body>
</html>