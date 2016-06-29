<div class="content-head">
	<p class="idhead">Ma Zpeak ID!</p>
</div>
<br/>
<br/>

<div class="content-small">
	<div class="idlang">
	<div> <a href="index.php?page=deletion&profile=<?echo $infos['pseudo'] ?>"> Supprimer le compte GoZpeak </a> </div>
	<div> <a onclick="showModalProfile('<? echo $pseudo ?>')"><i> Editer la Zpeak ID </a></div>
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

	<div class="idcard">
		<div class="idcontent">
			<div class="idpicture"> <img src="views/images/portrait_moyen.png"> </div>
			<div class="idnumber"> CARTE N°<?echo $infos['id'] ?> </div>
	<table>
	    <tr>
		<th> NOM : </th> <td> <? echo $infos['lastname'] ?> &nbsp; &nbsp; </td>
		<th> PRENOM : </th> <td> <? echo $infos['name'] ?> </td> 
	    </tr>
	</table>
	<table>
	    <tr>
		<th> PROFESSION : </th> <td> <? echo $infos['profession'] ?> &nbsp; &nbsp; &nbsp; </td>
	    </tr>
	</table>
	<table>
	    <tr>
		<th> NATIONALITE : </th> <td> <? echo $infos['nationality'] ?> &nbsp; &nbsp; &nbsp; </td>
		<th> DATE DE NAISSANCE : </th> <td> <? echo $infos['birthday'] ?> </td>
	    </tr>
	</table>
	<table>
	    <tr>
		<th> LANGUES PARLÉES : </th> <td> <? echo $infos['languages'] ?> </td>
	    </tr>
	</table>
</div>

</div>
</div>

