<!-- Liste des sorties / idées Gozpeak -->

<!-- Ici, de mon point de vue, si on vient d'un des boutons de la page Home.php, on sette une variable PHP qui pourrait savoir quel thème afficher...   (enfin juste une image Artzpeak, Runzpeak, etc...  et eventuellement des couleurs (ou pas, on s'en fout peut-être pour l'instant)  -->



<div class="list-content">
	<!-- FEUILLE GRISE DES Zpeak Sorties -->
	<div class="middle-left">
		<div class="list-content-left">
		<br/>
		<br/>
			<div class="list-content-img-left">Les <img src="views/images/zpeak_orange.png" height="50" alt="OrangeZpeak" />  Sorties ! </div>
			<table>
			  <tr>
			    <th>Langue &nbsp;</th>
			    <th>Organisateur &nbsp; </th>
			    <th>Nom de la sortie &nbsp; </th>
			    <th>Heure</th>
			  </tr>


			<?php foreach ($events as $event) { ?>
			  <tr>
			                <td> <img src="views/images/p_<?php echo $event['language'] ?>.png" alt="<?php echo $event['language'] ?>"</td>
				                <td> <a href="index.php?page=profil&profil=<?php echo $event['organizer'] ?>"><?php echo $event['organizer'] ?></a> </td>
			                <td> <a href="index.php?page=event&event=<?php echo $event['eventname'] ?>&query=<?php echo $_SESSION['query'] ?>"> <?php echo $event['eventname'] ?> </a></td>
			                <td> <?php echo $event['eventhour'].'H'.$event['eventminutes'] ?></td>
			  </tr>
			<?php } ?>
			</table>
		<!-- End Content-left -->
		</div>
	</div>


	<!-- FEUILLE GRISE DES Zpeak Idees -->
	<div class="middle-right">
		<div class="list-content-right">
		<br/>
		<br/>
			<div class="list-content-img-right">Vos <img src="views/images/zpeak_bleu.png" height="50" alt="BleuZpeak" />  Idées !</div>
			<table>
			  <tr>
			    <th>Langue &nbsp;</th>
			    <th>Organisateur &nbsp; </th>
			    <th>Nom de la sortie &nbsp; </th>
			    <th> Heure </th>
			  </tr>


			<?php foreach ($ideas as $idea) { ?>
			  <tr>
		                <td> <img src="views/images/p_<?php echo $idea['language'] ?>.png" alt="<?php echo $idea['language'] ?>"</td>
		                <td> <a href="index.php?page=profil&profil=<?php echo $idea['organizer'] ?>"><?php echo $idea['organizer'] ?></a> </td>
		                <td> <a href="index.php?page=event&event=<?php echo $idea['eventname'] ?>&query=<?php echo $_SESSION['query'] ?>"> <?php echo $idea['eventname'] ?> </a></td>
		                <td> <?php echo $idea['eventhour'].'H'.$idea['eventminutes'] ?></td>
			  </tr>
			<?php } ?>
			</table> 
		<!-- End of content-right -->
		</div>
	</div>
</div>


<!-- Boutons JS de résolution écran -->
<a onclick="alert(window.innerWidth);"> WIDTH </a>
<a onclick="alert(window.innerHeight);"> HEIGHT </a>

