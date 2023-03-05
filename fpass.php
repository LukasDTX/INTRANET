<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT user_id FROM users WHERE user_email=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	 
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['user_id']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE users SET tokenCode=:token WHERE user_email=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Hello , $email
				   <br /><br />
				   Dostaliśmy prośbę o zresetowanie hasła , kliknij na poniższy link w celu zresetowania hasła , jeśli to nie Ty wysłałeś tą prosbę po prostu zignoruj ten e-mail ,
				   <br /><br />
				   
				   <a href='http://localhost/updkkz/resetpass.php?id=$id&code=$code'>klinkij aby zresetować hasło</a>
				   <br /><br />
				   Dziękujemy :)
				   ";
		$subject = "Password Reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Wysłaliśmy maila na adres: $email.
                    Proszę kliknąć na link resetujący hasło w mailu , aby utworzyć nowe hasło.
					
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>UPS...!</strong>  Podanego emaila nie ma w bazie.
			    </div>";
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>przypomnienie hasła</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Przypomnienie hasła</h2><hr />
        
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Prosimy podaj swój adres email. Wyślemy Ci link do wygenerowania nowego hasła na maila.!
				</div>  
                <?php
			}
			?>
        
        <input type="email" class="input-block-level" placeholder="Podaj adres email" name="txtemail" required />
     	<hr />
        <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Generuj nowe hasło</button>
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>