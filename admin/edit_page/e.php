<?php 
if (!empty($_POST))
{
	$parent = htmlspecialchars($_POST['parent'],ENT_QUOTES);
	$ID = htmlspecialchars($_POST['ID'],ENT_QUOTES);
	$title = htmlspecialchars($_POST['title'],ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'],ENT_QUOTES);
	$metakey = htmlspecialchars($_POST['metakey'],ENT_QUOTES);
	$metadesc = htmlspecialchars($_POST['metadesc'],ENT_QUOTES);
	
	$title2 = htmlspecialchars($_POST['title2'],ENT_QUOTES);
	$message2 = htmlspecialchars($_POST['message2'],ENT_QUOTES);
	$metakey2 = htmlspecialchars($_POST['metakey2'],ENT_QUOTES);
	$metadesc2 = htmlspecialchars($_POST['metadesc2'],ENT_QUOTES);
	
	$title3 = htmlspecialchars($_POST['title3'],ENT_QUOTES);
	$message3 = htmlspecialchars($_POST['message3'],ENT_QUOTES);
	$metakey3 = htmlspecialchars($_POST['metakey3'],ENT_QUOTES);
	$metadesc3 = htmlspecialchars($_POST['metadesc3'],ENT_QUOTES);
		
	if (!empty($title)&&!empty($message))
	{
		if(empty($metakey)) $metakey = join(',',explode(' ',$title));
		if(empty($metadesc)) $metadesc = $title.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';
		$getURL = mysqli_query($CONNECTION,"SELECT `URL` FROM `".DB_PREFIX."pages` WHERE `pageId`='$ID'");
		$insertRU = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET  `pageName`='$title',`Content`='$message',`MetaDescription`='$metadesc',`MetaTags`='$metakey',`MetaTitle`='$metatitle' WHERE `pageId`='$ID'");
		if (!$insertRU) echo mysqli_error($CONNECTION);
		$insertMAP = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."sitemap` SET `Title`='$title',`Parent`='$parent' WHERE `Link`='".$URL['URL']."'");
		if (!$insertMAP) echo mysqli_error($CONNECTION);	else echo '<A href="'.$home_url.$URL['URL'].'">Измененно</a>';
		
		
	} else echo 'Заполните все поля на русском';
	if (!empty($title2)&&!empty($message2)&&$insertRU)
	{
		if(empty($metakey2)) $metakey2 = join(',',explode(' ',$title2));
		if(empty($metadesc2)) $metadesc2 = $title2.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';
		$URLn = 'ro/'.substr($URL['URL'],3);
		$getURL = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='$URLn'");
		if (mysqli_num_rows($getURL)==0){
			$insertRO = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages` (`pageName`,`URL`,`Content`,`Active`,`langAbb`,`MetaDescription`,`MetaTags`,`MetaTitle`) VALUES ('$title2', '$URLn', '$message2','1','ro','$metadesc2','$metakey2','$metatitle2')");
		}
		else{
				$URL = mysqli_fetch_array($getURL);
				$insertRO = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET `pageName`='$title2',`Content`='$message2',`MetaDescription`='$metadesc2',`MetaTags`='$metakey2',`MetaTitle`='$metatitle2' WHERE `pageId`='".$URL['pageId']."'");
			}
		if (!$insertRO) echo mysqli_error($CONNECTION);
	}
	if (!empty($title3)&&!empty($message3)&&$insertRU)
	{
		if(empty($metakey3)) $metakey3 = join(',',explode(' ',$title3));
		if(empty($metadesc3)) $metadesc3 = $title3.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';
		
		$URLn = 'en/'.substr($URL['URL'],3);
		$getURLEN = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='$URLn'");
		if (mysqli_num_rows($getURLEN)==0){
			$insertRO = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages` (`pageName`,`URL`,`Content`,`Active`,`langAbb`,`MetaDescription`,`MetaTags`,`MetaTitle`) VALUES ('$title3', '$URLn', '$message3','1','en','$metadesc3','$metakey3','$metatitle3')");
		}
		else{
				$URLEN = mysqli_fetch_array($getURLEN);
				$insertRO = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET  `pageName`='$title3',`Content`='$message3',`MetaDescription`='$metadesc3',`MetaTags`='$metakey3',`MetaTitle`='$metatitle3' WHERE `pageId`='".$URLEN['pageId']."'");
			}
		if (!$insertRO) echo mysqli_error($CONNECTION);
	}
	
}