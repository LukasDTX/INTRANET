<?php
include_once 'dbconfigu.php';
include_once 'header.php'; 
include_once 'class.crud.php';
$crud = new crud();
?>


<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Dodaj aktualizacje</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
     <th>GPZ</th>
     <th>Miasto</th>
     <th>Plik</th>
     <th>Data aktualizacji</th>
     </tr>
     <?php
		$query = "SELECT * FROM kkz";   
		$records_per_page=5;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr> 
</table>      
</div>

<?php include_once 'footer.php'; ?>