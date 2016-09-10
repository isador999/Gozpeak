<div class="event-head">
		<p class="head"> Evenement Gozpeak de <span class="eventpseudo"> <a href="<?php echo $gozpeak_protocol.$gozpeak_host.'/index.php?page=profil&profil='.$infos_event['organizer'] ?>"> <?php echo $infos_event['organizer'] ?> </a> </span> </p>
</div>


<div class="event-content">
	<div class="event-images">
		<label class="btn btn-default btn-file">
    		Browse <input type="file" style="display: none;">
		</label>
	</div>

	<div class="event-infos">
		<table>
			<tr>
				<th> Organisateur : </th>
				<td> <?php echo $infos_event['organizer'] ?> &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Langue(s) : </th>
				<!-- <td> <?php echo $infos_event['language'] ?> &nbsp; &nbsp; </td> -->
				<td> <img src="views/images/p_<?php echo $infos_event['language']?>.png">  <?php echo $infos_event['language'] ?><br/> </td>
			</tr>
			<tr>
				<th> Nom de l'événement : </th>
				<td> <?php echo $infos_event['eventname'] ?> &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Description : </th>
				<td> <?php echo $infos_event['eventdesc'] ?> </td>
			</tr>
			<tr>
				<th> Type d'activité : </th>
				<td> <?php echo $infos_event['eventtype'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Lieu : </th>
				<td> <?php echo $infos_event['eventplace'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr>
			</tr>
				<th> Evénement posté le : </th>
				<td> <?php echo $infos_event['date'] ?> </td>
			</tr>
			<tr>
				<th> Date de l'événement proposé : </th>
				<td> <?php echo $infos_event['eventday'] ?> </td>
			</tr>
			<tr>
				<th> L'événement débute à : </th>
				<td> <?php echo $infos_event['eventtime'] ?> </td>
			</tr>
			<tr>
				<th> Temps restant avant le début de l'événement : </th>
				<td> <?php echo $DiffDate ?> </td>
			</tr>
		</table>
	</div>
</div>

