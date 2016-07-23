<script src="views/js/jquery.profile.js"></script>

<div class="content-head">
	<div class="head-links">
		<p class="idhead">Votre profil Gozpeak</p>
		<a href="index.php?page=deletion&profile=<?php echo $infos['pseudo'] ?>"> Supprimer le compte GoZpeak </a> <br>
		<a onclick="showModalProfile('<?php echo $pseudo ?>')"><i> Editer la Zpeak ID </a>
	</div>
</div>


<div class="content-profile">
	<div class="idlang">
		<br/>
		<br/>
        	<img src="views/images/p_anglais.png">    Anglais  <br/>
        	<img src="views/images/p_allemand.png">   Allemand <br/>
	       	<img src="views/images/p_espagnol.png">   Espagnol <br/>
	       	<img src="views/images/p_francais.png">   Français <br/>
	      	<img src="views/images/p_italien.png">    Italien  <br/>
	        <img src="views/images/p_russe.png">      Russe    <br/>
	       	<img src="views/images/p_chinois.png">    Chinois  <br/>
	       	<img src="views/images/p_arabe.png">      Arabe    <br/>
	       	<img src="views/images/p_hebreux.png">    Hebreux  <br/>
	       	<img src="views/images/p_indien.png">     Indien   <br/>
	       	<img src="views/images/p_japonais.png">   Japonais <br/>
		<br/>
	</div>


	<!-- <div class="idcard"> -->
	<div class="idcontent">
		<div class="idpicture"> <img src="views/images/portrait_moyen.png"> </div>
		<div class="idnumber"> Profil N°<?php echo $infos['id'] ?> </div>
		<div class="idinfos">
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
			<tr>
				<th> Profession : </th>
				<td> <?php echo $infos['profession'] ?> &nbsp; &nbsp; &nbsp; </td>
			</tr>
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
				<td> <?php echo $infos['languages'] ?> </td>
			</tr>
		</table>
		</div>
	</div>

</div>
	
