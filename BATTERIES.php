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
	<title>Batteries</title>
	<?php
    	header("Refresh:5");
	?>
</head>
<body>

<!-- fond barre de navigation -->
<div id="bande_horizontale_top">
	
<!-- barre de navigation centrer-->
<center>
	<nav>
      	<ul class="menu">
      		<li><a href="index.php">ACCUEIL</a></li>
        	 <li>
          		HISTORIQUE
         	  <ul class="sub-menu">
            	<a href="7jours.php"><li>7 Jours</li></a>
            	<a href="ERREUR.php"><li>ERREUR</li></a>
          	  </ul>
        	  </li>
        	 <li><a href="POSITION_GPS.php">POSITION GPS</a></li>
        	<li><a href="connect.php">ACCES BDD</a></li>
        </ul>
        </nav><!-- fin barre de navigation -->

</div> <!-- fin fond barre de navigation -->
	 
	<?php
		$conn = mysqli_connect("localhost", "root", "", "projet");  // Connexion à la BDD    
		$sql = "SELECT * FROM batteries";  // Sélection des informations de la table "batteries"
		$reponse = mysqli_query($conn, $sql);
		// On affiche chaque entrée une à une
        ?>
        <table class="tableau">
          <thead>
            <tr>
                <th>id</th>
            <!--<th>Exists</th>
                <th>Sanity Error</th>
                <th>Current (A)</th>
								<th>SOC</th>
								<th>Max Cell Temp(C)</th>
                <th>Inter Bal</th>
                <th>PCBA Temp(C)</th>-->
                <th>Cell_1(V)</th>
								<th>Cell_2(V)</th>
								<th>Cell_3(V)</th>
								<th>Cell_4(V)</th>
								<th>Cell_5(V)</th>
								<th>Cell_6(V)</th>
								<th>Cell_7(V)</th>
								<th>Cell_8(V)</th>
								<th>Delta Voltage(V)</th>
								<th>Module Voltage(V)</th>
            </tr>
          </thead>

			<?php 
				//On affiche les lignes du tableau une à une à l'aide d'une boucle
				while($rows = mysqli_fetch_assoc($reponse)){
				
				//comparaison seuil pour changement de style
				//if ($rows['code_erreur']!= '') {
					//$style = 'lignewarning';
				//}

					if (($rows['Current']>$rows['seuilintensite']) OR ($rows['Module_Voltage']<$rows['seuilbatrest']) OR ($rows['PCBA_Temp']>$rows['seuiltemp']) OR ($rows['Cell_1'] || $rows['Cell_2'] || $rows['Cell_3'] || $rows['Cell_4'] || $rows['Cell_5'] || $rows['Cell_6'] || $rows['Cell_7'] || $rows['Cell_8']<$rows['seuiltension'])) {
							$style = 'lignecoloree';
						}

				  else {
					$style = 'bodytab';
				}
          	?>

            <tr class= <?php echo $style ?>>
                <td><?php echo $rows['id'];?></td>
            <!--<td><?php echo $rows['Exists'];?></td>
                <td><?php echo $rows['Sanity_Error'];?></td>
                <td><?php echo $rows['Current'];?></td>
								<td><?php echo $rows['SOC'];?></td>
								<td><?php echo $rows['Max_Cell_Temp'];?></td>
								<td><?php echo $rows['Inter_Bal'];?></td>
								<td><?php echo $rows['PCBA_Temp'];?></td>-->
								<td><?php echo $rows['Cell_1'];?></td>
								<td><?php echo $rows['Cell_2'];?></td>
								<td><?php echo $rows['Cell_3'];?></td>
								<td><?php echo $rows['Cell_4'];?></td>
								<td><?php echo $rows['Cell_5'];?></td>
								<td><?php echo $rows['Cell_6'];?></td>
								<td><?php echo $rows['Cell_7'];?></td>
								<td><?php echo $rows['Cell_8'];?></td>
								<td><?php echo $rows['Delta_Voltage'];?></td>
								<td><?php echo $rows['Module_Voltage'];?></td>
		            </tr>
		            <?php
				} 
			    ?>   
	
</center>
</body>
</html>