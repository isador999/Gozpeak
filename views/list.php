<!-- Liste des sorties / idées Gozpeak -->

<!-- Ici, de mon point de vue, si on vient d'un des boutons de la page Home.php, on sette une variable PHP qui pourrait savoir quel thème afficher...   (enfin juste une image Artzpeak, Runzpeak, etc...  et eventuellement des couleurs (ou pas, on s'en fout peut-être pour l'instant)  -->

<div class="list-content">
	<!-- FEUILLE GRISE DES Zpeak Sorties -->
	<div class="middle-left">
		<div class="list-content-left">
		<br/>
		<br/>
			<div class="list-content-img-left">Les <img src="views/images/zpeak_orange.png" height="50" alt="Zpeak" />  Sorties ! </div>
			<table>
			  <tr>
			    <th>Langue&nbsp;</th>
			    <!--<th>Organisateur &nbsp; </th>-->
			    <th>Sortie&nbsp; </th>
			    <th>Date&nbsp;</th>
			    <th>Heure&nbsp;</th>
			  </tr>


			<br>
			<br>
			<?php foreach ($events as $event) { ?>
			  <tr>
			                <td> <img src="<?php echo $minilang[$_SESSION['language']]['icon'][$event['language']]['png'] ?>" alt="<?php echo $event['language'] ?>" title="<?php echo $minilang[$_SESSION['language']]['icon'][$event['language']]['text'] ?>"> </td>
				        <!-- <td> <a href="index.php?page=profil&profil=<?php #echo $event['organizer'] ?>"><?php #echo $event['organizer'] ?></a> </td> -->
			                <td> <a href="index.php?page=event&query=<?php echo $event['eventtype'] ?>&event=<?php echo $event['eventname'] ?>"> <?php echo $event['eventname'] ?> </a></td>
			                <!-- <td> <?php #echo $event['eventday'] ?><br><?php #echo $event['eventtime'] ?></td> -->
			                <td> <?php echo convertDateToFr($event['eventday']); ?></td>
			                <td> <?php echo $event['eventtime']; ?></td>
			  </tr>
			<?php } ?>
			</table>
		<!-- End Content-left -->
		</div>
			<?php 
			echo '<p class="pagination-left">[ Page :';
			
			// Boucle sur les pages
				for ($i = 1 ; $i <= $events_total_pages ; $i++) {
				    if ($i == $events_current_page ) {
				        echo " $i";
				    } else {
				        echo " <a href=\"$gozpeak_protocol$gozpeak_host/index.php?page=list&query=$query&eventpage=$i\">$i</a> ";
				    }
				}
				echo ' ]</p>';
			?>
	</div>


	<!-- FEUILLE GRISE DES Zpeak Idees -->
	<div class="middle-right">
		<div class="list-content-right">
		<br/>
		<br/>
			<div class="list-content-img-right">Vos <img src="views/images/zpeak_bleu.png" height="50" alt="Zpeak" />  Idées !</div>
			<table>
			  <tr>
			    <th>Langue&nbsp;</th>
			    <th>Organisateur&nbsp;</th>
			    <th>Idée&nbsp;</th>
			    <th>Date&nbsp;</th>
			    <th>Heure&nbsp;</th>
			  </tr>


			<br>
			<br>
			<?php foreach ($ideas as $idea) { ?>
			  <tr>
		                <td> <img src="<?php echo $minilang[$_SESSION['language']]['icon'][$idea['language']]['png'] ?>" alt="<?php echo $idea['language'] ?>" title="<?php echo $minilang[$_SESSION['language']]['icon'][$idea['language']]['text'] ?>"> </td>
		                <td> <a href="index.php?page=profil&profil=<?php echo $idea['organizer'] ?>"><?php echo $idea['organizer'] ?></a> </td>
		                <td> <a href="index.php?page=idea&query=<?php echo $idea['ideatype'] ?>&idea=<?php echo $idea['ideaname'] ?>"> <?php echo $idea['ideaname'] ?> </a></td>
		                <!-- <td> <?php #echo $idea['ideaday'] ?><br><?php #echo $idea['ideatime'] ?></td> -->
		                <td> <?php echo convertDateToFr($idea['ideaday']); ?> </td>
		                <td> <?php echo $idea['ideatime']; ?> </td>
			  </tr>
			<?php } ?>
			</table> 
		<!-- End of content-right -->
		</div>
	</div>
			<?php 
			//echo $num_ideas;
			echo '<p class="pagination-right">[ Page :';
			
			// Boucle sur les pages
				for ($i = 1 ; $i <= $ideas_total_pages ; $i++) {
				    if ($i == $ideas_current_page ) {
				        echo " $i";
				    } else {
				        echo " <a href=\"$gozpeak_protocol$gozpeak_host/index.php?page=list&query=$query&ideapage=$i\">$i</a> ";
				    }
				}
				echo ' ]</p>';
			?>
</div>


<!-- Boutons JS de résolution écran -->
<a onclick="alert(window.innerWidth);"> WIDTH </a>
<a onclick="alert(window.innerHeight);"> HEIGHT </a>

