<?php
include_once 'class.crud.php';
$crud = new crud();
	/**
	 * @param string $sText  Text to filter.
	 * @return string
	 */
	function clearPL($sText)
	{
		$aReplacePL = array(
			'ą' => 'a', 'ę' => 'e', 'ś' => 's', 'Ś' => 'S', 'ć' => 'c',
			'ó' => 'o', 'ń' => 'n', 'ż' => 'z', 'ź' => 'z', 'ł' => 'l'
			);
 
		return str_replace(array_keys($aReplacePL), array_values($aReplacePL), $sText);
	}

include_once 'dbconfigu.php';
$max_rozmiar = 1024*1024*200;
if(isset($_POST['btn-save']))
{
	//***tworzenie folderów ****///
	if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
        echo 'Błąd! Plik jest za duży!';
    } else {
        echo 'Odebrano plik. <br />Początkowa nazwa: '.$_FILES['plik']['name'];
        echo '<br/>';
        /*if (isset($_FILES['plik']['type'])) {
            echo 'Typ: '.$_FILES['plik']['type'].'<br/>';
        }*/
		$soft_date = "";
		$soft_date =+ date("Ymd", time())."_".date("Gis", time());
		echo $soft_date;
		$miasto_pl = $_POST['miasto'];
		$gpz_pl = $_POST['gpz'];
		$miasto = clearPL($_POST['miasto']);
		$gpz = clearPL($_POST['gpz']);
		if (is_dir("pliki/$miasto")) {
			if (is_dir("pliki/$miasto/$gpz")){
				mkdir("pliki/$miasto/$gpz/$soft_date", 0777);
			}
			else {
				mkdir("pliki/$miasto/$gpz");
				mkdir("pliki/$miasto/$gpz/$soft_date", 0777);
			}
		}
		else{
			mkdir("pliki/$miasto"); 
			if (is_dir("pliki/$miasto/$gpz")){
				mkdir("pliki/$miasto/$gpz/$soft_date", 0777);
			}
			else {
				mkdir("pliki/$miasto/$gpz");
				mkdir("pliki/$miasto/$gpz/$soft_date", 0777);
			}
		}

        move_uploaded_file($_FILES['plik']['tmp_name'],
                $_SERVER['DOCUMENT_ROOT']."/intranet/pliki/$miasto/$gpz/$soft_date/".$_FILES['plik']['name']);
    }
} else {
   echo 'Błąd przy przesyłaniu danych!';
}

	//$gpz = $_POST['gpz'];
	//$miasto = $_POST['miasto'];
	$plik = "/intranet/pliki/$miasto/$gpz/$soft_date/".$_FILES['plik']['name'];
	$data = date("Y-m-d H:i:s",time());	
	if($crud->create($gpz_pl,$miasto_pl,$plik,$data))
	{
		header("location: add-data.php?inserted");
	}
	else
	{
		header("location: add-data.php?failure");
	}
}
include_once 'header.php';
?>
<div class="clearfix"></div><br />

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Sukces</strong> Dodano nową aktualizacje.<a href="index.php">Powrót</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>Nie udało się</strong> Błąd podczas wprowadzania danych !
	</div>
	</div>
    <?php
}

?>
<div class="clearfix"></div><br />
<div class="container">
<div>Dodawanie aktualizacji softu KKZ<br/><br/></div>
  <form action="add-data.php" method="POST" ENCTYPE="multipart/form-data">	
	<label for="miasto">Miasto:</label>
	<input type="text" class="form-control" id="miasto" name="miasto" required>
	<label for="gpz">GPZ:</label>
	<input type="text" class="form-control" id="gpz" name="gpz" required>
	<br />
	<input id="plik" class="btn btn-large btn-success" type="file" name="plik"/><br/>
	<input class="btn btn-large btn-primary" type="submit" value="Wyślij plik" name="btn-save"/>
	<a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Powrót</a>
  </form>
</div> <!-- /container -->
<div class="clearfix"></div>



<?php include_once 'footer.php'; ?>