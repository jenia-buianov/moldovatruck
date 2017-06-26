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
		$insertRU = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages`(`pageName`,`URL`,`Content`,`Active`,`langAbb`,`MetaDescription`,`MetaTags`,`MetaTitle`) VALUES ('$title', '$URL', '$message', '1','ru','$metadesc','$metakey','$metatitle')");
		
		
	} else echo 'Заполните все поля на русском';
	if (!empty($title2)&&!empty($message2)&&$insertRU)
	{
		if(empty($metakey2)) $metakey2 = join(',',explode(' ',$title2));
		if(empty($metadesc2)) $metadesc2 = $title2.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';
		$URL = 'ro/'.strtolower(translit($title));
		$insertRO = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages`(`pageName`,`URL`,`Content`,`Active`,`langAbb`,`MetaDescription`,`MetaTags`,`MetaTitle`) VALUES ('$title2', '$URL', '$message2', '1','ro','$metadesc2','$metakey2','$metatitle2')");
	}
	if (!empty($title3)&&!empty($message3)&&$insertRU)
	{
		if(empty($metakey3)) $metakey3 = join(',',explode(' ',$title3));
		if(empty($metadesc3)) $metadesc3 = $title3.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';
		
		$URL = 'en/'.strtolower(translit($title));
	}
	
}