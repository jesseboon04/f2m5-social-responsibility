<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class WebsiteController
{

	public function home()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('homepage');
	}
	public function admin()
	{

		echo 'admin';
	}
	public function forms()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('forms');
	}
	public function verwerkenregistratie()
	{
		//echo"form komt aan";
		//$template_engine = get_template_engine();
		//echo $template_engine->render('verwerktregistratie');
		$errors = [];

		$email = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );
		$wachtwoord = trim( $_POST['wachtwoord']);

		if ( $email === false) {
			$errors['email'] = 'Geen geldig email adress ingevuld';
		
		}
		if ( strlen($wachtwoord) < 6){
			$errors['email'] = 'Geen geldig wachtwoord(minmaal 6 tekens)';
			 
		}
		if (count( $errors) === 0 ){
			//oplsaan gebruikrer 

			//checken of de gebruiker al bestaat
			$connection = dbConnect();
			$sql        = "SELCT * FROM `gebruikersz WHERE `email` ";
			$statement = $connection->prepare( $sql);
			$statement->execute( ['email' => $email] );

			// als die er niet is, dan verder met oplsaan
			// anders fout melding tonen 
		}
	}
	public function blog()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('blog');
		
	}public function contact()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('contact');
		
	}
}
