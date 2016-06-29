
<h4><a href="index.php?page=list&query=<?php echo $query?>"><img src="views/images/<?php echo $query?>.png" alt="<?php echo $query?>" title="<?php echo $query?>" /></a> </h4>


<!-- La classe contient les feuilles grises des sorties, + le 'sort' ci-dessous permettant de trier les sorties -->
<div class="content">

<!-- Pour afficher un message PHP (comme "Votre sortie a bien été enregistré"  ou  "Aucune sortie trouvee" -->
<p class="message"> <?echo $message ?> </p>


<div class="content-head">
    <div class="lang">
	<img src="views/images/p_anglais.png"> Anglais
	<img src="views/images/p_allemand.png"> Allemand 
	<img src="views/images/p_espagnol.png"> Espagnol 
	<img src="views/images/p_francais.png"> Français <br/>
	<img src="views/images/p_italien.png"> Italien 
	<img src="views/images/p_russe.png"> Russe 
	<img src="views/images/p_chinois.png"> Chinois 
	<img src="views/images/p_arabe.png"> Arabe <br/>
	<img src="views/images/p_hebreux.png"> Hebreux 
	<img src="views/images/p_indien.png"> Indien 
	<img src="views/images/p_japonais.png"> Japonais <br/>
    </div>


    <div class="sort">
      <form id="sort">
	<input type="hidden" name="page" value="list" />
	<input type="hidden" name="query" value="<?echo $query?>" />
	<input type="text" name="date" id="date" />
        <input type="button" id="calendarButton" value="Calendrier de sorties" />
        <br/>

        <input type="checkbox" name="language[]" id="anglais"  value="anglais"  /> Anglais
        <input type="checkbox" name="language[]" id="allemand" value="allemand" /> Allemand
        <input type="checkbox" name="language[]" id="espagnol" value="espagnol" /> Espagnol
        <input type="checkbox" name="language[]" id="francais" value="francais" /> Français
        <br/>
        <input type="checkbox" name="language[]" id="italien"  value="italien"  /> Italien
        <input type="checkbox" name="language[]" id="russe"    value="russe"    /> Russe
        <input type="checkbox" name="language[]" id="chinois"  value="chinois"  /> Chinois
        <input type="checkbox" name="language[]" id="arabe"    value="arabe"    /> Arabe
        <br/>
        <input type="checkbox" name="language[]" id="hebreux"  value="hebreux"  /> Hebreux
        <input type="checkbox" name="language[]" id="indien"   value="indien"   /> Indien
        <input type="checkbox" name="language[]" id="japonais" value="japonais" /> Japonais
        <!-- <input type="checkbox" onclick="checkedAll()" name="all"      id="all"      value="Tous"     /> Tous -->
        <br/>
        <input type="submit" value="Actualiser !">
      </form>

    </div>

</div>
