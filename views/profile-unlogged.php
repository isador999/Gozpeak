<div class="profile-head">
	<div class="head-links">
		<p class="idhead"> Profil Gozpeak de <span class="idpseudo"> <?php echo $pseudo ?> </span> </p>
		<a href="#" ><strong> Lui envoyer un message privé </strong></a> <br>
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
	       	<!-- <img src="views/images/p_x.png" alt="img_others">   Autres Langues <br/> -->
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
		</table>
		</div>
	</div>

</div>
	
