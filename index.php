<?php
session_start();
require_once("class.user.php");
$login = new USER();
if($login->is_loggedin()!="")
{
	$login->redirect('ogloszenie.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('ogloszenie.php');
	}
	else
	{
		$error = "Ups...";
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INTRANET</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">
	<div class="container">
       <form class="form-signin" method="post" id="login-form">      
        <h2 class="form-signin-heading">Zaloguj się do INTRANET</h2><hr />        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Podaj login" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Podaj hasło" required/>
        </div>
       
     	<hr />        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; Zaloguj się
            </button>
        </div>  
      	<br />
            <label>Nie masz jeszcze konta ! <a href="sign-up.php">Zarejestruj się</a></label>
			<label>Nie pamiętasz hasła ! <a href="fpass.php">Przypomnij Hasło</a></label>
      </form>
    </div>    
</div>
</body>
</html>