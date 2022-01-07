<?PHP
function InitSite($dbcnx) //return $ConfArray;
{
  $query = "SELECT * FROM RN_DBO_Config WHERE ID=1";
  $new = mysqli_query($dbcnx,$query);
  if(!$new) {echo "Ошибка запроса к таблице конфигурирования..."; exit;}
  $row = mysqli_fetch_array($new); 
  $ConfArray=array();
  $ConfArray['SiteTitle'] = 		$row['SiteTitle'];
  $ConfArray['SiteDescription'] = 	$row['SiteDescription'];
  $ConfArray['SiteKeywords'] = 		$row['SiteKeywords'];
  $ConfArray['Domen'] = 			$row['Domen'];
  $ConfArray['SiteLogoImg'] = 		$row['SiteLogoImg'];
  $ConfArray['SiteFavicon'] = 		$row['SiteFavicon']; 
  $ConfArray['Email'] = 			$row['Email'];
RETURN $ConfArray;
}
function StartSite()
{
	$StartSite = file_get_contents("tpl/StartSite.tpl");
RETURN $StartSite;  	
}
function EndSite()
{
	$EndSite = file_get_contents("tpl/EndSite.tpl");
RETURN $EndSite;  	
}
function HeaderSite($ConfArray,$PageImage) //return HTML header;
{
	$HeaderSite = file_get_contents("tpl/Header.tpl");
	$HeaderSite = str_replace("{Domen}", 	  	  $ConfArray['Domen'], 		$HeaderSite);
	$HeaderSite = str_replace("{SiteTitle}", 	  $ConfArray['SiteTitle'], 		$HeaderSite);
	$HeaderSite = str_replace("{SiteDescription}",$ConfArray['SiteDescription'],$HeaderSite);
	$HeaderSite = str_replace("{SiteKeywords}",   $ConfArray['SiteKeywords'],	$HeaderSite);
	$HeaderSite = str_replace("{SiteFavicon}", 	  $ConfArray['SiteFavicon'], 	$HeaderSite);
	$HeaderSite = str_replace("{SiteLogoImg}", 	  $ConfArray['SiteLogoImg'], 	$HeaderSite);
	$HeaderSite = str_replace("{UrlPage}", 		  $ConfArray['UrlPage'], 		$HeaderSite);				  
	$HeaderSite = str_replace("{PageImage}",	  $PageImage, 					$HeaderSite);				  
RETURN $HeaderSite;  
}
function Footer()  //return HTML Footer;
{
	$footer = file_get_contents("tpl/Footer.tpl");
RETURN $footer;  
}
function Jquery()    //return HTML JQuerry;
{
	$jquery = file_get_contents("tpl/Jquery.tpl");
RETURN $jquery;  
}
function WorkPlace($ConfArray,$TitleRight,$LeftData,$RightData)
{	
	$RedNEtWork = file_get_contents("tpl/RedNEtWork.tpl");
	$RedNEtWork = str_replace("{LeftData}",	 	$LeftData,	 	$RedNEtWork);
	$RedNEtWork = str_replace("{RightData}", 	$RightData, 	$RedNEtWork);
	$RedNEtWork = str_replace("{TitleRight}",	$TitleRight,	$RedNEtWork);
	$RedNEtWork = str_replace("{Instructions}",	$Instructions,	$RedNEtWork);
RETURN $RedNEtWork;  
}
function NavBar($ConfArray,$UserDataAuth)
{	
	$NavBar = file_get_contents("tpl/NavBar.tpl");
	$NavBar = str_replace("{UserID}",		$UserDataAuth['UserID'],	$NavBar);
	$NavBar = str_replace("{UserEmail}",	$UserDataAuth['UserEmail'],	$NavBar);
	$NavBar = str_replace("{UserRole}",		$UserDataAuth['UserRole'],	$NavBar);
RETURN $NavBar;  
}
function CleanTitle($n_name)
{
	$n_name=trim($n_name);	
	$n_name=stripslashes($n_name);
	$n_name=strip_tags($n_name);
	$n_name=htmlspecialchars($n_name);
	return $n_name;
}


function CleanDescription($n_description)
{
	$n_description=trim($n_description);
	$n_description=stripslashes($n_description);
	$n_description=strip_tags($n_description,'<iframe><p><a><img><b><br><ul><li><h2><h3><h4><h5>');
//	$n_description=htmlspecialchars($n_description);
	return $n_description;
}
function Translit($s) 
{
  $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
  RETURN $s; // возвращаем результат
}
function EmailSend($email,$password)
{				
	$to  = "<".$email.">"; 
	$subject 	= "Реєстрація на порталі agov.com.ua"; 
	$message 	= "LOGIN: <b>".$email."</b><br>PASSWORD: <b>".$password."</b><br>";
	$message	= $message."<a href=agov.com.ua/users.php>CLICK AND ENTER IN YOR <b>ACCOUNT!</a>";
	$headers  	= "Content-type: text/html; charset=windows-1251 \r\n"; 
	$headers.= "From:<noreply@agov.com.ua>\r\n"; 
	$headers.= "Reply-To:".$email."\r\n"; 
	mail($to, $subject, $message, $headers); 		
}
?>



























