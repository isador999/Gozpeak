<div class="idea-head">
		<p class="head"> Evenement Gozpeak de <span class="ideapseudo"> <a href="<?php echo $gozpeak_protocol.$gozpeak_host.'/index.php?page=profil&profil='.$infos_idea['organizer'] ?>"> <?php echo $infos_idea['organizer'] ?> </a> </span> </p>
</div>


<div class="idea-content">
	<div class="idea-images">
		<label class="btn btn-default btn-file">
    		Browse <input type="file" style="display: none;">
		</label>
	</div>

	<div class="idea-infos">
		<table>
			<tr>
				<th> Organisateur : </th>
				<td> <?php echo $infos_idea['organizer'] ?> &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Langue(s) : </th>
				<!-- <td> <?php echo $infos_idea['language'] ?> &nbsp; &nbsp; </td> -->
				<td> <img src="views/images/p_<?php echo $infos_idea['language']?>.png">  <?php echo $infos_idea['language'] ?><br/> </td>
			</tr>
			<tr>
				<th> Nom de l'événement : </th>
				<td> <?php echo $infos_idea['ideaname'] ?> &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Description : </th>
				<td> <?php echo $infos_idea['ideadesc'] ?> </td>
			</tr>
			<tr>
				<th> Type d'activité : </th>
				<td> <?php echo $infos_idea['ideatype'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Lieu : </th>
				<td> <?php echo $infos_idea['ideaplace'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr>
			</tr>
				<th> Evénement posté le : </th>
				<td> <?php echo $infos_idea['date'] ?> </td>
			</tr>
			<tr>
				<th> Date de l'événement proposé : </th>
				<td> <?php echo $infos_idea['ideaday'] ?> </td>
			</tr>
			<tr>
				<th> L'événement débute à : </th>
				<td> <?php echo $infos_idea['ideatime'] ?> </td>
			</tr>
			<tr>
				<th> Temps restant avant le début de l'événement : </th>
				<td> <?php echo $DiffDate ?> </td>
			</tr>
		</table>
	</div>
</div>

