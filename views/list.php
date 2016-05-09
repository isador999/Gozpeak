<!--<div class="content"> -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
        <head>
                <script>
                        window.onload = function(){ height("staticHome") };
                        window.onresize = function(){ height("staticHome") };
                </script>
        </head>

<body>

<!-- Ici, de mon point de vue, si on vient d'un des boutons de la page Home.php, on sette une variable PHP qui pourrait savoir quel thème afficher...   (enfin juste une image Artzpeak, Runzpeak, etc...  et eventuellement des couleurs (ou pas, on s'en fout peut-être pour l'instant)  -->

<!-- POUR UN EXEMPLE DE COMMENT C'ETAIT SUR LA DEMO => https://gozpeak.no-ip.info -->




<!-- FEUILLE GRISE DES Zpeak Sorties -->
<div class="content-left" style="background-image:url(views/images/papier.png); background-repeat:no-repeat;"
<br/>
<br/>
<div class="content-img-left">Les <img src="views/images/zpeak_orange.png" height="50" alt="Orange" />  Sorties ! </div>
<table>
  <tr>
    <th>Langue &nbsp;</th>
    <th>Organisateur &nbsp; </th>
    <th>Nom de la sortie &nbsp; </th>
    <th>Heure</th>
  </tr>

<? foreach ($events as $event) : ?>
  <tr>
                <td><img src="views/images/p_<? echo $event['language'] ?>.png" alt="logo_lang"> </td>
                <td><font color="red"> <a href="index.php?page=profil&profil=<?echo $event['organizer']?>"><? echo $event['organizer'] ?></a> </font></td>
                <td><a href="index.php?page=idea&idea=<?echo $event['eventname']?>&query=runzpeak"><? echo $event['eventname'] ?></a></td>
                <td><? echo $event['eventhour'].'H'.$event['eventminutes'] ?></td>
  </tr>
<? endforeach; ?>
</table>

</div>



<!-- FEUILLE GRISE DES Zpeak Idees -->
<div class="content-right" style="background-image:url(views/images/papier.png); background-repeat:no-repeat;"
<br/>
<br/>
<div class="content-img-right">Vos <img src="views/images/zpeak_bleu.png" height="50" alt="Bleu" />  Idées !</div>
<table>
  <tr>
    <th>Langue &nbsp;</th>
    <th>Organisateur &nbsp; </th>
    <th>Nom de la sortie &nbsp; </th>
    <th> Heure </th>
  </tr>

<? foreach ($ideas as $idea) : ?>
  <tr>
	<td><img src="views/images/p_<?echo $idea['language'] ?>.png" alt="logo_lang"> </td>
       	<td> <a href="index.php?page=profil&profil=<?echo $idea['organizer']?>"><? echo $idea['organizer'] ?></a> </td>
       	<td><a href="index.php?page=idea&idea=<?echo $idea['ideaname']?>&query=runzpeak"><? echo $idea['ideaname'] ?></a></td>
       	<td><? echo $idea['ideahour'].'H'.$idea['ideaminutes'] ?></td>
  </tr>
<? endforeach; ?>
</table>
</div>

</div>

</div> <!-- CONTENT END -->


<!-- Boutons JS de résolution -->
<a onclick="alert(window.innerWidth);"> WIDTH </a>
<a onclick="alert(window.innerHeight);"> HEIGHT </a>

</body>
</html>
