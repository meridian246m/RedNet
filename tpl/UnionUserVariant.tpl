
	                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Вступайте в новые СОЮЗЫ, следите за новостями!
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Городские</a>
                                </li>
                                <li class=""><a href="#profile" data-toggle="tab">Региональные</a>
                                </li>
                                <li class=""><a href="#messages" data-toggle="tab">Государственные</a>
                                </li>
                                <li class=""><a href="#settings" data-toggle="tab">Международные</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <h4>Городские - СОЮЗЫ</h4>
                                    <p>Городские созы - это союзы городского, местного значения для общения по интересам, публикации местных новостей. Новсти и публикацииданных
союзов(групп) не выходят за рамки местного значения. Такие союзы могут быть следующими местными обьединениями 
(профсоюзы, кружки по итересам, клубы общения и обмена информацией и много другое). 
									<form name='form2' enctype='multipart/form-data' action='rednet.php' method='post'>
										<input type='hidden' name='UnionWorld' value='4'>
										<input type='hidden' name='Page' value='CityUnions'>
										<input type='hidden' name='UserID' value='{UserID}'>
										<a href='javascript:void(0)' class="btn btn-primary" OnClick='document.form2.submit();'>Городские - СОЮЗЫ</a>
									</form>
									</p>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Региональные - Союзы</h4>
                                    <p>Региональны союзы - это союзы, обьединения уже регионального масштаба. Здесь публикуются новости, публикации которые имеют отношение ужек отдельно взятому региону,
но не выходят за его рамки по значению. Для того что бы создать регионального масштаба, уже необходимо подать заявку и обрисовать идею, иметь понимае того зачем вам это нужно,
и как это может быть полезно другим.
									<form name='form3' enctype='multipart/form-data' action='rednet.php' method='post'>
										<input type='hidden' name='UnionWorld' value='3'>
										<input type='hidden' name='Page' value='RegionUnions'>
										<input type='hidden' name='UserID' value='{UserID}'>
										<a href='javascript:void(0)' class="btn btn-primary" OnClick='document.form3.submit();'>Региональные союзы</a>
									</form>
									</p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Государственные - Союзы</h4>
                                    <p>Государственные союзы - это союзы уже выходящие за рамки отдельно взятых регионов и имеющие значение и вес в рамка отдельно взятого государства или страны. Принципы 
такие же это может быть профсоюзная группа, клуб по интересам, и так далее, но уже в более крупном масштабе.
Прежде чем организовать союз государственного значения, необходимо подать заявку с описанием цели, задач. Описать насколько это необходимо, какая от этого польза для других.
Помните, красная сеть это не коммерческая сеть.
									<form name='form4' enctype='multipart/form-data' action='rednet.php' method='post'>
										<input type='hidden' name='UnionWorld' value='2'>
										<input type='hidden' name='Page' value='ContryUnions'>
										<input type='hidden' name='UserID' value='{UserID}'>
										<a href='javascript:void(0)' class="btn btn-primary"  OnClick='document.form4.submit();'>Государственные союзы</a>
									</form>
									</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Международные - Союзы</h4>
                                    <p>Мировые союзы - для этих союзов справедливо все тоже самое что и для других, но степень ответственности в таких формированиях уже гораздо выше, попасть в бан, лишиться права
публикаций, все это здесь происходит гораздо проще, требования к качеству публикуемой информации в группах повышается прямо пропорционально.
Если в городских союзах требования к публикациям не очень высоки, то чем выше уровень Город->Регион->Страна->МИР тем выше ответственность.
									<form name='form5' enctype='multipart/form-data' action='rednet.php' method='post'>
										<input type='hidden' name='UnionWorld' value='1'>
										<input type='hidden' name='Page' value='WorldUnions'>
										<input type='hidden' name='UserID' value='{UserID}'>
										<a href='javascript:void(0)' class="btn btn-primary" OnClick='document.form5.submit();'>Международные союзы</a>
									</form>
									</p>
                                </div>
                            </div>
                        </div>
                    </div>