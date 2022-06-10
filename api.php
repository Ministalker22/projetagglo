<?php
	header('Content-Type: application/json');
	
	// Connexion à la BDD
	
	try
	{
		$connexion = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
		$retour["success"] = true;  // Afficher 'true' quand connexion à la BDD réussie
		$retour["message"] = "Connexion à la base de données réussie";
	}
	catch(Exception $ex)
	{
		$retour["success"] = false;  // Afficher 'false' quand connexion à la BDD échouée
		$retour["message"] = "Erreur de connexion à la base de données";
	}
	
	$request = $connexion->prepare("SELECT * FROM gps");  // Sélection des informations de la table "gps"
	$request->execute();  // Exécution de la requête

	$resultat = $request->fetchAll(PDO::FETCH_CLASS);

	$retour["infos train"] = "Voici les informations sur la position du train";  // Afficher le message
	$retour["position"]["coordonnées"] = $resultat;  // Afficher les "titres"

	$request = $connexion->prepare("SELECT * FROM batteries");  // Sélection des informations de la table "batteries"
	$request->execute();  // Exécution de la requête

	$resultat = $request->fetchAll(PDO::FETCH_CLASS);

	$retour["infos batteries"] = "Voici les informations des batteries";  // Afficher le message
	$retour["resultats"]["batteries"] = $resultat;  // Afficher les "titres"

	echo json_encode($retour);  // Afficher les informations de la variable "$retour" sous le format JSON
?>