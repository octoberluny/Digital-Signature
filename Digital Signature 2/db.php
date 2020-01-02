<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digital Signature</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
    	* {box-sizing: border-box;}
		body{margin: 0;}
		div {padding: 30px 0}
		form {
		  position: relative;
		  width: 300px;
		  margin: 0 auto;
		}
		.container{
			padding-bottom: 0px;
		}
		.body-container {
		    font-family: 'Exo 2', sans-serif;
		    padding-top: 0px;
		}
    </style>
</head>
<body>
<div class="body-container">
<!--клас для створення верхньої частини сайту-->
    
	<nav class="nav nav-pills nav-justified">
        <p class="nav-item nav-link smooth-scroll">
		    <?php
		    // Соединиться с сервером БД
		    mysql_connect("localhost", "admin", "admin") or die (mysql_error ());
		    // Выбрать БД
		    mysql_select_db("digitalsignature") or die(mysql_error());
		    // SQL-запрос
		    $strSQL = "SELECT openkey FROM digitalsignature ORDER BY openkey;";
		    // Выполнить запрос (набор данных $rs содержит результат)
		    $rs = mysql_query($strSQL);
		    // Цикл по recordset $rs
		    // Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array
		    while($row = mysql_fetch_array($rs)) {
		       // Записать значение столбца FirstName (который является теперь массивом $row)
		      echo $row['openkey']. '<br>';

		      }
		    // Закрыть соединение с БД
		   // mysql_close();
		    ?>
    	</p>
        <p class="nav-item nav-link smooth-scroll">
        	<?php
		    mysql_select_db("digitalsignature") or die(mysql_error());
		    $strSQL = "SELECT surname FROM digitalsignature";
		    $rs = mysql_query($strSQL);
		    while($row = mysql_fetch_array($rs)) {
		      echo $row['surname']. '<br>';
		      }
		    ?>
        </p>
        <p class="nav-item nav-link smooth-scroll">
		    <?php
		    mysql_select_db("digitalsignature") or die(mysql_error());
		    $strSQL = "SELECT name FROM digitalsignature";
		    $rs = mysql_query($strSQL);
		    while($row = mysql_fetch_array($rs)) {
		      echo $row['name']. '<br>';
		      }
		    ?>
        </p>
        <p class="nav-item nav-link smooth-scroll">
        	<?php
		    mysql_select_db("digitalsignature") or die(mysql_error());
		    $strSQL = "SELECT fathername FROM digitalsignature";
		    $rs = mysql_query($strSQL);
		    while($row = mysql_fetch_array($rs)) {
		      echo $row['fathername']. '<br>';
		      }
		    ?>
        </p>
        <p class="nav-item nav-link smooth-scroll">
        	<?php
		    mysql_select_db("digitalsignature") or die(mysql_error());
		    $strSQL = "SELECT post FROM digitalsignature";
		    $rs = mysql_query($strSQL);
		    while($row = mysql_fetch_array($rs)) {
		      echo $row['post']. '<br>';
		      }
		    ?>
        </p>
        <p class="nav-item nav-link smooth-scroll">
        	<?php
		    mysql_select_db("digitalsignature") or die(mysql_error());
		    $strSQL = "SELECT book FROM digitalsignature";
		    $rs = mysql_query($strSQL);
		    while($row = mysql_fetch_array($rs)) {
		      echo $row['book']. '<br>';
		      }
		      //mysql_close();
		    ?>
        </p>
	</nav>
   
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</body>
</html>
