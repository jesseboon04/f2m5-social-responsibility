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
		echo"form komt aan";
		//$template_engine = get_template_engine();
		//echo $template_engine->render('verwerktregistratie');
	}
	public function blog()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('blog');
		
	}
}
