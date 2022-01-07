<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<b>Заполните Форму для создания нового СОЮЗА</b>
			</div>
			<div class="panel-body">
					<div class="row">		
							<div class="col-md-12">	
								<div class="row">	
									<div class="col-md-12">							
										<form action="rednet.php" method="POST">
										<label 	  class="form-check-label">BANNER IMG URL</label>
										<input 	  class="form-control" type="text" 	name="UnionAVATAR" 		placeholder="Banner" 			required>
										<label 	  class="form-check-label">Название</label>
										<input 	  class="form-control" type="text" 	name="UnionName" 		placeholder="Union Title" 		required>
										<label 	  class="form-check-label">Описание</label>
										<textarea class="form-control" type="text" 	name="UnionDescription" placeholder="Union Description" required></textarea>
										<label 	  class="form-check-label">Сфера интересов союза, ключевые слова</label>
										<input 	  class="form-control" type="text" 	name="UnionInterest" 	placeholder="socialism, books, sport, music ect." 	required>
									</div>
									<div class="col-md-6">	
										<label 	  class="form-check-label">Страна</label>
										<input 	  class="form-control" type="text" 	name="UnionCountry" 	placeholder="Country" 			required>
										<label 	  class="form-check-label">Регион</label>
										<input 	  class="form-control" type="text" 	name="UnionRegion" 		placeholder="Region" 			required>
										<label 	  class="form-check-label">Город/Населенный пунтк</label>								
										<input 	  class="form-control" type="text" 	name="UnionCity" 		placeholder="City" 				required>										

									</div>
									<div class="col-md-6">					
										<label 	  class="form-check-label">ID Создателя</label>								
										<input 	  class="form-control" style="color:blue;" type="text" 	name="UnionCreatorID" 	value="Your ID:{UnionCreatorID}"readonly>
										<label 	  class="form-check-label">ID Модератора</label>
										<input 	  class="form-control" type="text" 	name="UnionModeratorID" placeholder="Moderator ID" 		required>
										<label 	  class="form-check-label">ID Редактора</label>
										<input 	  class="form-control" type="text" 	name="UnionRedactorID" 	placeholder="Redactor ID" 		required>									
									</div>
								</div>
								<br>
								<div class="row">	
											<div   class="alert alert-info">
												<div class="form-check">														
												  <label class="form-check-label">
													<span style="color:white;font-size:14px;">
														<b>Помните!</b> <span style="color:red">Красная Сеть</span> это не коммерческая сеть. Не создавайте союзы необдуманно!
														Союзы с террористическим уклоном, экстримистским уклоном, содержащие порнографию будут удаляться,
														а пользователи их создавшие будут баниться на уровне IP адресов.
													</span>
												  </label>
												</div>
												
											Какого уровня Союз вы хотите создать?<br>

												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="1">
												  <label class="form-check-label">
													МИР <span style="color:white;font-size:12px;">(В такой союз смогут вступить вне зависимости от страны проживания)</span>
												  </label>
												</div>
												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="2">
												  <label class="form-check-label">
													Ваша Страна <span style="color:white;font-size:12px;">(Только для страны вашего проживания)</span>
												  </label>
												</div>
												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="3">
												  <label class="form-check-label">
													Ваш Регион <span style="color:white;font-size:12px;">(Только для вашего региона)</span>
												  </label>
												</div>
												<div class="form-check">
												  <input class="form-check-input" type="radio" name="WorldStatus" value="4" checked>
												  <label class="form-check-label">
													Ваш город <span style="color:white;font-size:12px;">(Только для вашего города)</span>
												  </label>
												</div>
											</div>
								</div>					
								<input type="hidden" 	name="Page" 		value="CreateUnions">
								<button  class="btn btn-success" type="submit">Создать новый СОЮЗ!</button>
								</form>
							</div>
					</div>						
			</div>
		</div>
	</div>
</div>