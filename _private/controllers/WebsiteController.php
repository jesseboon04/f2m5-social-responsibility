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
			$errors['wachtwoord'] = 'Geen geldig wachtwoord(minmaal 6 tekens)';
			 
		}
		if (count( $errors) === 0 ){
			//oplsaan gebruikrer 

			//checken of de gebruiker al bestaat
			$connection = dbConnect();
			$sql        = "SELECT * FROM `gebruikers` WHERE `email` =:email";
			$statement = $connection->prepare( $sql);
			$statement->execute( ['email' => $email] );

			if ($statement->rowCount() ===0){
				//als die erniet is dan verder met opslaan
				$sql 		= "INSERT INTO `gebruikers` (`email` , `wachtwoord`) VALUES (:email, :wachtwoord)";
				$statement  = $connection->prepare( $sql);
				$safe_password = password_hash( $wachtwoord, PASSWORD_DEFAULT);
				$params 	=[
					'email' 	=> $email,
					'wachtwoord' => $safe_password
				];
				$statement->execute ($params);
				// doorstuern naar bedankt pagina
				$bedanktUrl = url('bedanktpage');
				redirect($bedanktUrl);
				// alles hierna wordt niet meer uitgevoerd

			}else {
				//anders fout melding tonen
				$errors['email'] = 'Dit account bestaat al';
			}
			

			

			// als die er niet is, dan verder met oplsaan
			// anders fout melding tonen 
		}
		$template_engine = get_template_engine();
		echo $template_engine->render( 'forms',['errors' => $errors]);
	}
	public function bedankpagina(){
		$template_engine = get_template_engine();
		echo $template_engine->render("bedankt");
	}
	public function overons(){
		$template_engine = get_template_engine();
		echo $template_engine->render("overons");
		
	}
	public function blog()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('blog');
		
	
	}
	public function topics()
	{
		
		$topics = getallTopics();
		$template_engine = get_template_engine();
		echo $template_engine->render('topics',['topics' =>$topics]);
	}
	
	public function contact()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('contact');
		
	}
	public function new()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('new');
		
	}
	public function save()
	{
		$result = validateTopicdata($_POST);
		if (count($result['errors'])=== 0 ){
			// oplsaan topic
			createTopic($result['data']['title'], $result['data']['desc']);
			redirect(url('topics'));
		}
		$template_engine = get_template_engine();
		echo $template_engine->render('topics/new', ['errors' => $result['errors'] ]); 
		
	}
	
	
}
