<?php
include_once 'header.php';
include_once 'wiadomosc.class.php';
$wiadomosc = new wiadomosc();
include_once 'dbconfigu.php';
if(isset($_POST['btn-save']))
{
// $plik = "/updkkz/pliki/$temat/$tresc/$soft_date/".$_FILES['plik']['name'];
	$tresc = $_POST['tresc'];
	$temat = $_POST['temat'];
	$autor = $_SESSION['user_session'];
	$data = date("Y-m-d H:i:s",time());	
	$odbiorcy = $_POST['odbiorcy'];
	if($wiadomosc->create($temat,$tresc,$autor,$data,$odbiorcy))
	{
        echo("<script>location.href ='wiadomosc.add.php?inserted';</script>");
		
	}
	else
	{
		//header("location: wiadomosc.add.php?failure");
        echo("<script>location.href ='wiadomosc.add.php?failure';</script>");
	}
}

?>



<?php


if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Sukces</strong> Wiadomośc została wysłana.<a href="index.php">Powrót</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>Nie udało się</strong> Błąd podczas wysyłania wiadomości !
	</div>
	</div>
    <?php
}

?>
<div class="clearfix"></div><br />
<div class="container">
	<div class="panel panel-default ">
		<div class="panel-body">Wysyłanie wiadomości</div>
	</div>
  <form action="wiadomosc.add.php" method="POST" >	
	<label for="temat">Temat:</label>
	<input type="text" class="form-control" id="temat" name="temat" required>
	<label for="tresc">Tresc:</label>	
	<textarea class="form-control" rows="5" id="tresc" name="tresc" required></textarea>
	<label for="odbiorcy">Odbiorcy:</label>
	<select class="form-control" id="odbiorcy" name="odbiorcy" required>
	<?php $wiadomosc->odbiorcy(); ?>
    </select>
	<br />
	<!--
	<label for="autor">Autor:</label>
	<input type="text" class="form-control" id="autor" name="autor" required>
	<br />
	
	<input id="plik" class="btn btn-large btn-success" type="file" name="plik"/><br/>
	-->
	<input class="btn btn-large btn-primary" type="submit" value="Wyślij wiadomość" name="btn-save"/>
	<a href="wiadomosc.wys.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Powrót</a>
  </form>

</div>
 <br /><!-- /container -->
<div class="clearfix"></div>



<?php include_once 'footer.php'; ?>