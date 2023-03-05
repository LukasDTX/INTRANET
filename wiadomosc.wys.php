<?php
include_once 'dbconfigu.php';
include_once 'header.php'; 
include_once 'wiadomosc.class.php';
$wiadomosc = new wiadomosc();
?>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>

     <?php
		//$query = "SELECT * FROM wiadomosc";   
		//wiadomosc INNER JOIN users ON users.user_id = wiadomosc.autor INNER JOIN poczta ON poczta.odbiorcy = users.user_id
		$query = "SELECT users.user_name, poczta.odbiorcy,wiadomosc.temat, wiadomosc.tresc, wiadomosc.data_utw FROM 	
		wiadomosc INNER JOIN poczta ON wiadomosc.id=poczta.wiadomosc INNER JOIN users ON poczta.odbiorcy = users.user_id		
		WHERE wiadomosc.autor = ".$_SESSION['user_session'];
		$records_per_page=5;
		$newquery = $wiadomosc->paging($query,$records_per_page);
		$wiadomosc->dataview($newquery,1);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $wiadomosc->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr> 
</table>      
</div>

<?php include_once 'footer.php'; ?>