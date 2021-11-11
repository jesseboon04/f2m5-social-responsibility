<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}
function getallTopics(){
	$connection = dbConnect();
	$sql 		= "SELECT * FROM `topics` ORDER BY `id` DESC";
	$statement = $connection->query($sql);

	return $statement->fetchAll();
}

function createTopic($title,$desc){
	$connection = dbConnect();
	$sql 		= "INSERT INTO `topics`(`title`, `desc`) VALUES (:title, :desc)";
	$statement = $connection->prepare($sql);
	$params = [
		'title' =>$title,
		'desc' => $desc
	];
	$statement->execute($params);
	

}
