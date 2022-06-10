<!--
********************************************
** Nom: Yvetot                            **
** Prénom: Quentin                        **
** Date de création: 07/03/2022           **
** Dernière modification: Moi, 03/06/2022 **
********************************************
-->
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylebat.css">
	<title>Position GPS</title>
		<style type="text/css">
		#map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
       		height: 800px;
       		width: 800px;
        	margin-left: auto;
        	margin-right: auto;
        	margin-top: 100px;
      	}
      </style>
</head>
<body>

<!-- fond barre de navigation -->
	<div id="bande_horizontale_top">
	
<!-- barre de navigation centrer-->
<center>
	<nav>
      	<ul class="menu">
      		<li><a href="index.php">ACCUEIL</a></li>
      		<li><a href="BATTERIES.php">BATTERIES</a></li>
        	 <li>
          		HISTORIQUE
         	  <ul class="sub-menu">
            	<a href="7jours.php"><li>7 Jours</li></a>
            	<a href="ERREUR.php"><li>ERREUR</li></a>
          	  </ul>
        	 <li><a href="connect.php">ACCES BDD</a></li>
        	</li>
        </ul>
        </nav><!-- fin barre de navigation -->

</div> <!-- fin fond barre de navigation -->

<?php
		$conn = mysqli_connect("localhost", "root", "", "projet");  // Connexion à la BDD    
		$sql = "SELECT * FROM GPS";  // Sélection des informations de la table "GPS"
		$reponse = mysqli_query($conn, $sql);

?>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBsffo_C5anlPf-QPBKvipBYreUl3Y8EKo" type="text/javascript"></script> <!-- initialisation de la carte + clé api maps -->
<script async type="text/javascript">
    // Coordonées centre map
			const bus = { lat: 43.2119, lng: 2.35324}

			var map = null;

            function initMap() {
				// Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
				const map = new google.maps.Map(document.getElementById("map"), {
						// Nous plaçons le centre de la carte avec les coordonnées ci-dessus
						center: bus, 
						// Nous définissons le zoom par défaut
						zoom: 14, 
			
						// Nous activons les options de contrôle de la carte (plan, satellite...)
						mapTypeControl: true,



																})

					var marker = new google.maps.Marker({
    				position: new google.maps.LatLng(43.21454431917041, 2.372002509244425),
    				map: map,
});

                                                            }




                    window.onload = function(){
				// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
				initMap(); 
			};

			
		</script>

<div id="map">
			<!-- Ici s'affichera la carte -->
		</div>
</body>
</html>