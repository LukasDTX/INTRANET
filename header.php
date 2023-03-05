<?php
	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INTRANET</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
</head>

<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="ogloszenie.php" title='INTRANET'>INTRANET</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
<!-- menu //<img src="img/logo.png">
			profil osoby 
			<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>     -->

			<li><a href="ogloszenie.php"><span class="glyphicon glyphicon-blackboard"></span>&nbsp;Tablica ogłoszeń</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-envelope"></span>&nbsp;Wiadomości <span class="caret"></span></a>
              <ul class="dropdown-menu">               
                <li><a href="wiadomosc.odb.php"><span class="glyphicon glyphicon-download"></span>&nbsp;Odebrane</a></li>
				<li><a href="wiadomosc.wys.php"><span class="glyphicon glyphicon-upload"></span>&nbsp;Wysłane</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-pencil"></span>&nbsp;Napisz wiadomość <span class="caret"></span></a>
              <ul class="dropdown-menu">               
                <li><a href="wiadomosc.add.php"><span class="glyphicon"></span>&nbsp;Do osoby</a></li>
				<li><a href="wiadomosc.php"><span class="glyphicon"></span>&nbsp;Do działu</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-folder-open"></span>&nbsp;Dokumenty <span class="caret"></span></a>
              <ul class="dropdown-menu">               
                <li><a href="katalog.php"><span class="glyphicon"></span>&nbsp;Katalogi</a></li>
				<li><a href="iso.php"><span class="glyphicon"></span>&nbsp;ISO</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profil.php"><span class="glyphicon glyphicon-cog"></span>&nbsp;Ustawienia</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Witaj <?php //echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-off"></span>&nbsp;WYLOGUJ SIĘ</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<br /><br /><br />

    <div class="clearfix"></div>