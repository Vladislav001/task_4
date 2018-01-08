<?
	mysql_connect("localhost","root","");
	if (!mysql_select_db("countries")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");
?>

<html>
 <head>
   <title>Countries</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="author" content="Vladislav Guriev" >
   <link href="index.css" type="text/css" rel="stylesheet" />
 </head>
 <body>

  <h2 align='center'>Add to Database</h2>

  <!-- Добавление страны НАЧАЛО -->
    <form action="addCountry.php" method="post">
        <h3>Adding a country</h3>
        <table width='100%'>

          <tr>
            <td>Enter the name of the new country</td>
            <td>
              <input type='text' name='name' required>
            </td>
            </tr>

          <tr>
            <td>Select continent</td>
          <td>
          <select name='continent' required>
            <option>Eurasia</option>
            <option>Africa</option>
            <option>North America</option>
            <option>South America</option>
            <option>Australia</option>
            <option>Antarctica</option>
          </select>
          </td>
          </tr>

          <tr>
            <td>Enter the size of population</td>
            <td>
              <input type='number' name='population' required>
            </td>
          </tr>

          <tr>
              <td>Select religion</td>
          <td>
          <select name='religion' required>
            <option>Christianity</option>
            <option>Islam</option>
            <option>Buddhism</option>
            <option>Judaism</option>
          </select>
          </td>
          </tr>

          <tr>
            <td>Enter the official language</td>
            <td>
              <input type='text' name='official_language' required>
            </td>
          </tr>

          <tr>
            <td>Enter the official currency</td>
            <td>
              <input type='text' name='currency' required>
            </td>
          </tr>

        </table>
        <input type='hidden' name='func' value='add_country'>
        <input type='submit' value='Add' class='button'>
      </form>
    <!-- Добавление страны Конец -->

      <!-- Получение информации о странах -->
        <h3>Informations about countries</h3>
        <table width = '100%' cellpadding = '2' cellspacing = '2' border = '1'>
          <tr style = 'font-weight:bold;'><td>Country</td><td>Continent</td><td>Population</td><td>Religion</td><td>Language</td><td>Currency</td></tr>
        <?
          $query = "Select * FROM country";
          $result = mysql_query(htmlspecialchars($query));
          for ($i = 0; $i < mysql_num_rows($result); $i++){
            $row = mysql_fetch_array($result);
            echo "<tr><td>".$row['name']."</td><td>".$row['continent']."</td><td>".$row['population']."</td><td>".$row['religion']."</td><td>".$row['official_language']."</td><td>".$row['currency']."</td><tr>";
          }
        ?>
        </table>

 </body>
</html>
