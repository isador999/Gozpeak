<head>
	<script src="views/js/jquery.profiledelete.js"></script>
	<script src="views/js/jquery.profile.js"></script>
</head>

<div class="profile-head">
	<div class="head-links">
		<p class="idhead">Votre profil Gozpeak</p>
		<a onclick="showModalProfile('<?php echo $_SESSION['profil']?>')"><i> Editer la Zpeak ID </i> </a> <br>
		<a onclick="showModalProfileDeletion('<?php echo $_SESSION['profil']?>')"><i> Supprimer le compte GoZpeak </i></a> <br>
	</div>
</div>


<div class="profile-content">
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
		<div class="idinfos-logged">
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
				<td> <?php //echo $infos['profession'] ?> &nbsp; &nbsp; &nbsp; </td>
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
				<td> <?php //echo $infos['languages'] ?> </td>
			</tr>
			<tr>
				<th> Utilisateur Premium : </th>
				<td> <a href="#premium#"> <?php echo $_SESSION['ispremium'] ?> </a></td>
			</tr>
		</table>
		</div>
	</div>

</div>
	
