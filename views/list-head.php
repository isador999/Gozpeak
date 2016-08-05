<div class="list-header">
	<div class="list-titles">
		<a href="index.php?page=list&query=<?php echo $query?>"><img src="views/images/<?php echo $query?>.png" alt="<?php echo $query?>" title="<?php echo $query?>" /></a>
		<p> <?php echo $home[$_SESSION['language']][$query]['text'] ?></p>
	</div>
	<br>
	<br>


	<!-- La classe contient les feuilles grises des sorties, + le 'sort' ci-dessous permettant de trier les sorties -->
	<!-- <div class="content"> -->

	<!-- Pour afficher un message PHP (comme "Votre sortie a bien été enregistré"  ou  "Aucune sortie trouvee" -->
	<div class="list-content-head">
    		<div class="list-lang">
			<img src="views/images/p_anglais.png"> Anglais
			<img src="views/images/p_allemand.png"> Allemand 
			<img src="views/images/p_espagnol.png"> Espagnol <br/>
			<img src="views/images/p_francais.png"> Français 
			<img src="views/images/p_italien.png"> Italien 
			<img src="views/images/p_autre.png"> Autres langues <br/>
		</div>

		<div class="list-sort">
      			<form id="sort">
				<input type="hidden" name="page" value="list" />
				<input type="hidden" name="query" value="<?php echo $query ?>" />
				<input type="text" name="date" id="date" />
				<input type="button" id="calendarButton" value="Calendrier de sorties" />
		      		<br/>
	
		        	<input type="checkbox" name="language[]" id="anglais"  value="anglais"  /> Anglais
			        <input type="checkbox" name="language[]" id="allemand" value="allemand" /> Allemand
			        <input type="checkbox" name="language[]" id="espagnol" value="espagnol" /> Espagnol
			        <br/>
			        <input type="checkbox" name="language[]" id="francais" value="francais" /> Français
			        <input type="checkbox" name="language[]" id="italien"  value="italien"  /> Italien
			        <input type="checkbox" name="language[]" id="autres" value="autres" /> Autres langues
			        <!-- <input type="checkbox" onclick="checkedAll()" name="all"      id="all"      value="Tous"     /> Tous -->
			        <br/>
			        <br/>
			        <input type="submit" value="Actualiser !">
			</form>
	        </div>
	</div>
</div>
