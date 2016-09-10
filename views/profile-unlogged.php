<div class="profile-head">
	<div class="head-links">
		<p class="idhead"> Profil Gozpeak de <span class="idpseudo"> <?php echo $pseudo ?> </span> </p>
		<!-- <a href="#" ><strong> Lui envoyer un message privé </strong></a> <br> -->
	</div>
</div>


<div class="profile-content">
	<div class="idlang">
		<br/>
		<br/>
		<?php foreach($minilang[$_SESSION['language']]['icon'] as $key => $value){ ?>
                        <img src="<?php echo $value['png']; ?>"> <?php echo $value['text']; ?> <br>
                <?php } ?>
		<br/>
	</div>


	<div class="idcontent">
		<div class="idpicture"> <img src="views/images/portrait_moyen.png"> </div>
		<div class="idnumber"> Profil N°<?php echo $infos['id'] ?> </div>
		<div class="idinfos-unlogged">

		<table>
			<tr>
				<th> Pseudo : </th>
				<td> <?php echo $infos['pseudo'] ?> &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Email : </th>
				<td> <?php echo $infos['email'] ?> &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Nom : </th>
				<td> <?php echo $infos['lastname'] ?> &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<th> Prenom : </th>
				<td> <?php echo $infos['name'] ?> </td>
			</tr>
			<!-- <tr>
				<th> Profession : </th>
				<td> <?php //echo $infos['profession'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr> -->
			<tr>
				<th> Nationalite : </th>
				<td> <?php echo $infos['nationality'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr>
			</tr>
				<th> Date de naissance : </th>
				<td> <?php echo $infos['birthday'] ?> </td>
			</tr>
			<tr>
				<th> Nombre de sorties proposées : </th>
				<td> <?php echo $nb_events; ?> </td>
			</tr>
			<tr>
				<th> Langues parlées : </th>
				<td> <?php //echo $infos['languages'] ?> </td>
			</tr>
			<tr>
				<th> Niveau des langues pratiquées </th>
				<td> <?php echo $infos['level_languages'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr>
		</table>
		</div>
	</div>

</div>
	
