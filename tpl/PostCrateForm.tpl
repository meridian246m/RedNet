<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Форма создания Публикации - Ознакомьтесь перед тем как начать <a href="?Page=PublickRulls" style="font-size:14px;"> Правила и возможности оформления публикации</a>
			</div>
			<div class="panel-body">
					<div class="row">		
							<div class="col-md-12">
								<form  enctype="multipart/form-data" action="rednet.php" id="PostAddForm" method="post" role="form">   
									<label for="Foto" class="col-sm-5 control-label">Ссылка  на Фотография/Картинка</label>
									<input type="text" class="form-control" name="Foto"  placeholder="не обязательно">
									<label for="Video" class="col-sm-5 control-label">Ссылка  на YouTube видео</label>
									<input type="text" class="form-control" name="Video"  placeholder="не обязательно">


									<label for="country" class="col-sm-3 control-label">Заголовок</label>
									<input type="text" class="form-control" name="Title"  placeholder="" required>
									<label for="country" class="col-sm-12 control-label">Текст Публикации <span style="font-size:12px;color:yellow;"> допускается использование HTML для оформления публикации. Список разрешенных тегов можно узнать в</span><a href="?Page=PublickRulls"> FAQ</a></label>
									<textarea   class="form-control" name="Description" cols="30" rows="7" placeholder="" required></textarea>
									<br>
									<div class="col-md-6">
									<div   class="alert alert-info">Отнеситесь к статусу своей публикации серьезно! Иначе вы можете потерять право публикации. Внимательно прочтите правила <a href="?Page=PublickRulls"> FAQ</a><br>
									<ul>
									<li><input class="form-check-input" type="radio" name="AtentionStatus" value="5" checked>
									<label class="form-check-label" style="color:white;">Обычная Новость</label>
									</li>
									<li><input class="form-check-input" type="radio" name="AtentionStatus" value="4">
									<label class="form-check-label" style="color:#8cffbc;">Инициатива предложение</label>
									</li>
									<li><input class="form-check-input" type="radio" name="AtentionStatus" value="3">
									<label class="form-check-label" style="color:yellow;">Общий сбор, Митинг, Событие</label>
									</li>
									<li><input class="form-check-input" type="radio" name="AtentionStatus" value="2">
									<label class="form-check-label" style="color:#e87a0c;">Очень Важно!</label>
									</li>
									<li><input class="form-check-input" type="radio" name="AtentionStatus" value="1">
									<label class="form-check-label blink" style="color:red;">КАТАСТРОФА!</label>
									</li>
									</ul>
									</div>
									</div>
									<div class="col-md-6">
									<div   class="alert alert-info">Подумайте насколько важна ваша публикация!<a href="?Page=PublickRulls"> FAQ</a><br>
									<ul>
									<li><input class="form-check-input" type="radio" name="WorldStatus" value="4" checked>
									<label class="form-check-label" style="color:white;">City</label>
									</li>
									<li><input class="form-check-input" type="radio" name="WorldStatus" value="3">
									<label class="form-check-label" style="color:#8cffbc;">Region</label>
									</li>
									<li><input class="form-check-input" type="radio" name="WorldStatus" value="2">
									<label class="form-check-label" style="color:yellow;">Country</label>
									</li>
									<li><input class="form-check-input" type="radio" name="WorldStatus" value="1">
									<label class="form-check-label" style="color:red;">World</label> <span style="font-size:12px;">(только на Английском языке или Эсперанто)</span>
									</li>
									</ul>
									</div>
									</div>
									<input type="hidden" name="Page" value="InsertNewPost">
									<input type="submit" value="Create POST!" form="PostAddForm"  class="btn btn-success btn-lg btn-block">
								</form>
							</div>
					</div>						
			</div>
		</div>
	</div>
</div>