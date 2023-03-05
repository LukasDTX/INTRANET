<?php
include_once 'dbconfigu.php';
include_once 'profil.class.php';
$profil = new profil();

//update
if(isset($_POST['btn-update']))
{
	$id = $_POST['user_id'];
	$name = $_POST['user_name'];
	$email = $_POST['user_email'];	
	
	if($profil->update($name,$email))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
	 
     <?php $profil->formularz(); ?>
     
     
</div>

<?php include_once 'footer.php'; ?>