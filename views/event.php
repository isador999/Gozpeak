<div class="event-head">
	<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
	<br>
	<div class="event-titles">
		<a href="index.php?page=event&query=<?php echo $query?>"><img src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" alt="<?php echo $query?>" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a>
		
		<p> <?php echo $home[$_SESSION['language']][$query]['text'] ?></p>
	</div>
	<p class="event-banner"> <img src="views/images/zpeak_orange.png" alt="Zpeak"> Sortie "<i><?php echo $infos_event['eventname']?></i>" </p> 
</div>


<div class="event-content">
		<div class="event-feedback">
			<div id="event-feedback-message" class="alert alert-info fade in"> <br>
			<div style="margin-right:17%; font-size:17px;"> <?php echo $form[$_SESSION['language']]['comments']['title']; ?> </div>
			<br>
			<form class="form-horizontal eventFeedbackForm" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/event_postcomment.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<textarea class="form-control" rows="5" name="message"></textarea>
				</div>
				<button style="margin-right: 6%;" type="<?php echo $form[$_SESSION['language']]['comments']['type']; ?>" value=<?php echo $form[$_SESSION['language']]['comments']['submit']; ?> class="btn pull-right"><?php echo $form[$_SESSION['language']]['comments']['desc']; ?></button> 
				<!-- <div> 	
					<input style="width: 30px" type="checkbox" value="1" name="subscribe" id="subscribe" checked="checked">
					<b> Prévenir par mail lors d'un nouveau commentaire sur cette sortie </b>
				</div> -->
			</form>
			</div>
		</div>


		<div class="event-infos">
			<table>
				<tr>
					<th> Organisateur : </th>
					<td> <a href="<?php echo $gozpeak_protocol.$gozpeak_host.'/index.php?page=profil&profil=team' ?>"> Equipe Gozpeak &nbsp; &nbsp; </a> </td>
				</tr>
				<tr>
					<th> Langue(s) : </th>
					<td> <img src="<?php echo $minilang[$_SESSION['language']]['icon'][$infos_event['language']]['png']?>">  <?php echo $infos_event['language'] ?><br/> </td>
				</tr>
				<tr>
					<th> Niveau en <?php echo $infos_event['language'] ?> conseillé : </th>
					<td> <?php echo $infos_event['level_language'] ?> &nbsp; &nbsp; </td>
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

	<?php if($logged == 0) { ?>
		<button type="<?php echo $form[$_SESSION['language']]['addmember']['type']; ?>" title="<?php echo $form[$_SESSION['language']]['addmember']['title']; ?>" class="event-addmember btn btn-primary pull-right disabled"><?php echo $form[$_SESSION['language']]['addmember']['desc']; ?></button> 
	<?php } elseif (($logged == 1) && ($user_registered == 0)) { ?>
		<form class="form-horizontal event-addmember" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/event_addmember.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="addmember-eventname" value="<?php echo $infos_event['eventname'] ?>">
			<!-- <input type="hidden" name="addmember-eventtype" value="<?php #echo $infos_event['eventtype'] ?>"> -->
			<button type="<?php echo $form[$_SESSION['language']]['addmember']['type']; ?>" value=<?php echo $form[$_SESSION['language']]['addmember']['submit']; ?> class="btn btn-primary pull-right"><?php echo $form[$_SESSION['language']]['addmember']['desc']; ?></button> 
		</form>
	<?php } elseif (($logged == 1) && ($user_registered == 1)) { ?>
		<form class="form-horizontal event-addmember" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/event_delmember.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="delmember-eventname" value="<?php echo $infos_event['eventname'] ?>">
			<button type="<?php echo $form[$_SESSION['language']]['delmember']['type']; ?>" value=<?php echo $form[$_SESSION['language']]['delmember']['submit']; ?> class="btn btn-default pull-right"><?php echo $form[$_SESSION['language']]['delmember']['desc']; ?></button> 
		</form>

	<?php } ?>

</div>


