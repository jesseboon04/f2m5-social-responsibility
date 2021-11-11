<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes (alle URL's die je op je website hebt) en welke controller en functie deze pagina afhandelt
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );
	SimpleRouter::get( '/admin', 'WebsiteController@admin' )->name( 'admin' );
	SimpleRouter::get( '/overons', 'WebsiteController@overons' )->name( 'overons' );
	SimpleRouter::get( '/forms', 'WebsiteController@forms' )->name( 'forms' );
	SimpleRouter::post( '/forms/verwerken', 'WebsiteController@verwerkenregistratie' )->name( 'verwerktregistratie' );
	SimpleRouter::get( '/forms/bedankt', 'WebsiteController@bedankpagina' )->name( 'bedanktpage' );
	SimpleRouter::get( '/blog', 'WebsiteController@blog' )->name( 'blog' );
	SimpleRouter::get( '/topics', 'WebsiteController@topics' )->name( 'topics' );
	SimpleRouter::get( '/topics/new', 'WebsiteController@new' )->name( 'new' );
	SimpleRouter::post( '/topics/new', 'WebsiteController@save' )->name( 'save' );
	SimpleRouter::get( '/contact', 'WebsiteController@contact' )->name( 'contact' );
	
	





	// STOP: Tot hier al je eigen URL's zetten, dit stukje laat de 4040 pagina zien als een route/url niet kan worden gevonden.
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );
	
	

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond (die hierboven als route staat ingesteld)
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

