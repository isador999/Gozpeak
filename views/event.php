<div class="event-head">
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
					<!-- <label for="event-feedback-title" class="control-label"> <?php echo $form['comments']['title']; ?> </label> <br> <br> -->
					<textarea class="form-control" rows="5" name="message"></textarea>
				</div>
				<!-- <a href="#" onclick="()"><input type="submit" name="dsubmit" id="commentSubmit" value="<?php #echo $form['comments']['submit'] ?>"></a> -->
				<button style="margin-right: 6%;" type="<?php echo $form[$_SESSION['language']]['comments']['type']; ?>" value=<?php echo $form[$_SESSION['language']]['comments']['submit']; ?> class="btn pull-right"><?php echo $form[$_SESSION['language']]['comments']['desc']; ?></button> 
				<!-- <div> 	
					<input style="width: 30px" type="checkbox" value="1" name="subscribe" id="subscribe" checked="checked">
					<b> Prévenir par mail lors d'un nouveau commentaire sur cette sortie </b>
				</div> -->
			</form>
			</div>
		</div>


			<!-- <form class="form-horizontal" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/event_addimage.php" method="POST" enctype="multipart/form-data"> -->
				<!-- <label class="btn btn-default btn-file">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    					Ajouter une image/photo pour cet événement <input name="eventimage" type="file">
					<input type="submit" value="Envoyer" />
				</label>   -->

<!--				<div class="col-lg-7 event-img-uploader">
                			<span class="btn btn-success fileinput-button">
                			    <i class="glyphicon glyphicon-plus"></i>
                			    <span><?php //echo $event_img_uploader[$_SESSION['language']]['button']['add'] ?></span>
                			    <input type="file" name="files[]" multiple>
                			</span>
                			<button type="submit" class="btn btn-primary start">
                			    <i class="glyphicon glyphicon-upload"></i>
                			    <span><?php //echo $event_img_uploader[$_SESSION['language']]['button']['upload'] ?></span>
                			</button>
                			<button type="button" class="btn btn-danger delete">
                			    <i class="glyphicon glyphicon-trash"></i>
                			    <span><?php //echo $event_img_uploader[$_SESSION['language']]['button']['delete'] ?></span>
                			</button>
		                </div>  -->


			<!-- </form> -->

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
	<div class="btn btn-primary event-addmember"> S'inscrire à cet événement </div>
</div>

