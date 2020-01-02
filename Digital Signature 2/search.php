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

        .d7:after {content:""; clear:both; display:table}
        .d7 form {
          width: auto;
          float: right;
          margin-right: 30px;
        }
        .d7 input {
          width: 250px;
          height: 42px;
          padding-left: 15px;
          border-radius: 42px;
          border: 2px solid #324b4e;
          background: #F9F0DA;
          outline: none;
          position: relative;
          transition: .3s linear;
        }
        .d7 input:focus {
          width: 300px;
        }
        .d7 button:focus {
            outline: none;
        }
        .d7 button {
          width: 42px;
          height: 42px;
          background: none;
          border: none;
          position: absolute;
          top: -2px;
          right: 0;
        }
        .d7 button:before{
          content: "\f002";
          font-family: FontAwesome;
          color: #324b4e;
        }
        .d7 button:hover {
        cursor: pointer;
        }
        .d7 {
            padding-top: 10px;
            padding-bottom: 0px;
        }
        .container{
            padding-bottom: 0px;
        }
        #homepage{
            font-family: 'Lobster', cursive;
            font-size: 60px;
            text-align: center;
        }
        #homepage button:hover {
        cursor: pointer;
        }
        .body-container {
            font-family: 'Exo 2', sans-serif;
            padding-top: 0px;
        }
        #goHome button {
        right: 70px !important;
        }

        #homepage button {
          outline: none; /* Для синий ободки */
          border: 0;
          background: transparent;
          color: #F9F0DA;
        }
        #navdb{
          height: 24px;
        }
    </style>
</head>
<body>
<div class="body-container">
<!--клас для створення верхньої частини сайту-->
    <div id="home" class="jumbotron jumbotron-fluid">
        <div class="container">
            <div id="homepage">
            <a class="mainpage" href="index.php"><button>Цифровий підпис</button></a>
            </div>

            <div class="d7">
                <form action="search.php" method="post">
                  <input type="text" name="term" placeholder="Пошук...">
                  <button type="submit" name="submit"></button>
                </form>
            </div>
        </div>
    </div>

    <!--створення горизонтального меню-->
    <nav class="nav nav-pills nav-justified">
        <p class="nav-item nav-link smooth-scroll">Відкритий ключ</p>
        <p class="nav-item nav-link smooth-scroll">Фамілія</p>
        <p class="nav-item nav-link smooth-scroll">Ім'я</p>
        <p class="nav-item nav-link smooth-scroll">По батькові</p>
        <p class="nav-item nav-link smooth-scroll">Посада</p>
        <p class="nav-item nav-link smooth-scroll">Залікова книжка</p>
    </nav>

<?php
$db_hostname = 'localhost';
$db_username = 'admin';
$db_password = 'admin';
$db_database = 'digitalsignature';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);

if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$sql = "SELECT openkey, surname, name, fathername, post, book FROM digitalsignature WHERE openkey LIKE '%".$term."%' OR surname LIKE '%".$term."%' OR name LIKE '%".$term."%' OR fathername LIKE '%".$term."%' OR post LIKE '%".$term."%' OR book LIKE '%".$term."%' ORDER BY openkey";
$r_query = mysql_query($sql); 

while ($row = mysql_fetch_array($r_query)){  
  echo "<nav class='nav nav-pills nav-justified' id='navdb'>
          <p class='nav-item nav-link smooth-scroll'>" .  $row['openkey']. "</p>
          <p class='nav-item nav-link smooth-scroll'>" . $row['surname'] . "</p>
          <p class='nav-item nav-link smooth-scroll'>" . $row['name'] . "</p>
          <p class='nav-item nav-link smooth-scroll'>" . $row['fathername'] . "</p>
          <p class='nav-item nav-link smooth-scroll'>" .$row['post'] . "</p>
          <p class='nav-item nav-link smooth-scroll'>" . $row['book'] .  "</p>
        </nav>";    
}  
}
else
{
require "db.php";
}
?>

<!--створення кнопки для переміщення в початок-->
    <div id="goHome">
            <a class="smooth-scroll" href="#home"><button>Вгору</button></a>
    </div>
   
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</body>
</html>
