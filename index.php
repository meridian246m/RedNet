<?PHP
$Page=$_GET['Page'];
if($Page=='Manifest')
{
$HEAD=		file_get_contents("tpl/SHead.tpl");
$MAINMENU=	file_get_contents("tpl/SMainMenu.tpl");
$BANNER=	file_get_contents("tpl/SManifest.tpl");
$FOOTER=	file_get_contents("tpl/SFooter.tpl");
$JQYRE=		file_get_contents("tpl/SJqure.tpl");
}

if($Page=='')
{
$HEAD=		file_get_contents("tpl/SHead.tpl");
$MAINMENU=	file_get_contents("tpl/SMainMenu.tpl");
$BANNER=	file_get_contents("tpl/SBanner.tpl");
$BODY=		file_get_contents("tpl/SBody.tpl");
$LOGIN=		file_get_contents("tpl/Slogin.tpl");
$CONTACT=	file_get_contents("tpl/SContact.tpl");
$FOOTER=	file_get_contents("tpl/SFooter.tpl");
$JQYRE=		file_get_contents("tpl/SJqure.tpl");
}



$INDEX = file_get_contents("tpl/Sindex.tpl");
$INDEX = str_replace("{HEAD}", 			$HEAD, 		$INDEX);
$INDEX = str_replace("{MAINMENU}", 		$MAINMENU, 	$INDEX);
$INDEX = str_replace("{BANNER}", 		$BANNER, 	$INDEX);
$INDEX = str_replace("{BODY}", 			$BODY, 		$INDEX);
$INDEX = str_replace("{LOGIN}", 		$LOGIN, 	$INDEX);
$INDEX = str_replace("{CONTACT}", 		$CONTACT, 	$INDEX);
$INDEX = str_replace("{FOOTER}", 		$FOOTER, 	$INDEX);
$INDEX = str_replace("{JQYRE}", 		$JQYRE, 	$INDEX);
ECHO $INDEX;

?>