<script src="views/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="views/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script src="views/js/myScript.js" charset="UTF-8"></script>
<script src="views/js/jquery.lang-sort.js" charset="UTF-8"></script>


<div class="list-header">
	<div class="list-titles">
		<a href="index.php?page=list&query=<?php echo $query?>"><img src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" alt="<?php echo $query?>" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a>
		<p> <?php echo $home[$_SESSION['language']][$query]['text'] ?></p>
	</div>
	<br>
	<br>


	<!-- La classe contient les feuilles grises des sorties, + le 'sort' ci-dessous permettant de trier les sorties -->
	<!-- <div class="content"> -->

	<!-- Pour afficher un message PHP (comme "Votre sortie a bien été enregistré"  ou  "Aucune sortie trouvee" -->
	<div class="list-content-head">
    		<div class="list-lang">
			<?php foreach($minilang[$_SESSION['language']]['icon'] as $key => $value){ ?>
				<img src="<?php echo $value['png']; ?>"> <?php echo $value['text']; ?>
			<?php } ?>
		</div>

		<div class="list-sort">
      			<form id="lang-sort" size="7" data-toggle="validator" name="lang-sort" method="post" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/list-sort.php">
				<input type="hidden" name="query" value="<?php echo $query ?>" />
				<!-- In the future, maybe range datetime could be useful 
				<input id="datetime-lang" class="form-control" type="text" name="searchdatepicker" />
				<script type="text/javascript"> showDatetimePicker(); </script> -->
				<!-- <input type="button" id="calendarButton" value="Calendrier de sorties" /> -->

				<select class="form-control" name="lang-sort" multiple>
                                	<?php foreach($minilang[$_SESSION['language']]['icon'] as $key => $lang){ ?>
                                		 <option value="<?php echo $lang['value']; ?>"  > <?php echo $lang['text'] ?></option>
                                	<?php } ?>
                                </select>
	
			        <br/>
				<button type="submit" value="Submit" class="btn btn-primary pull-left"> Afficher les langues sélectionnées </button>
			</form>
<!--      			<form id="sort">
				<input type="hidden" name="page" value="list" />
				<input type="hidden" name="query" value="<?php echo $query ?>" /> 
				<input type="text" name="date" id="date" />
				<input type="button" id="calendarButton" value="Calendrier de sorties" />
		      		<br/>
	
		        	<input type="checkbox" name="language[]" id="anglais"  value="anglais"  /> Anglais
			        <input type="checkbox" name="language[]" id="espagnol" value="espagnol" /> Espagnol
			        <input type="checkbox" name="language[]" id="italien" value="italien" /> Italien
			        <br/>
			        <input type="checkbox" name="language[]" id="francais" value="francais" /> Français
			        <input type="checkbox" name="language[]" id="portugais"  value="portugais"  /> Portugais
			        <input type="checkbox" name="language[]" id="breton"  value="breton"  /> Breton
			        <input type="checkbox" name="language[]" id="autre" value="autre" /> Autre langue
			        <input type="checkbox" onclick="checkedAll()" name="all"      id="all"      value="Tous"     /> Tous
			        <br/>
			        <br/>
			        <input type="submit" value="Actualiser !">
			</form>-->
	        </div>
	</div>
</div>
