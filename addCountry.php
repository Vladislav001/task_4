<?

	mysql_connect("localhost","root","");
	if (!mysql_select_db("countries")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");

	//добавление новой страны
	if ($_POST['func']=='add_country'){
		$name = mysql_real_escape_string(htmlspecialchars($_POST['name'])); //название страны
		$continent = mysql_real_escape_string(htmlspecialchars($_POST['continent'])); //выбранный континент
		$population = mysql_real_escape_string(htmlspecialchars($_POST['population'])); //численность населения
		$religion = mysql_real_escape_string(htmlspecialchars($_POST['religion'])); //выбранная религия
		$official_language = mysql_real_escape_string(htmlspecialchars($_POST['official_language'])); //название языка
		$currency = mysql_real_escape_string(htmlspecialchars($_POST['currency'])); //название валюты

		// посылает запрос БД
		$query = "INSERT INTO country (name, continent, population, religion, official_language, currency)
		VALUES ('$name', '$continent', '$population', '$religion', '$official_language', '$currency')";
		// возвращение данных результата запроса
		$result = mysql_query($query);
		header('Location: index.php');
}

?>
