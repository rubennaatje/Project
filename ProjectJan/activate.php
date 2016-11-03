<?php
	require_once("./classes/Registration.php");
	
	if (isset($_GET['user_name']))
	{		
		if (Registration::check_if_activated($_GET['user_name']))
		{
			$action = "http://localhost/2016-2017/Projectimplementatie/index.php?&user_name=".$_GET['user_name'];
            Registration::activate_account_by_user_name($_GET['user_name']);
            echo "Activeren votooid";
			
			}
			else
			{
				echo "<h2>U heeft geen rechten op deze pagina. Uw account is al geactiveerd.</h2><br>";
			}
		}
		else
		{
			echo "<h2>Uw account is all geactiveerd of uw email/password combi is niet correct u heeft daarom geen rechten op deze pagina. U wordt doorgestuurd naar de registratiepagina</h2><br>";
			header("refresh:4;url=index.php?content=register_form");
		}

?>
