<div class="event-head">
	<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
	<br>
	<div class="event-titles">
		<a href="index.php?page=idea&query=<?php echo $query?>"><img src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" alt="<?php echo $query?>" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a>

		<p> <?php echo $home[$_SESSION['language']][$query]['text'] ?></p>
	</div>
	<p class="idea-banner"> <img src="views/images/zpeak_bleu.png" alt="Zpeak"> Idée "<i><?php echo $infos_idea['ideaname']?></i>" </p>
</div>


<div class="event-content">
	<div class="event-feedback">
               <div id="event-feedback-message" class="alert alert-info fade in"> <br>
			<div style="margin-right:17%; font-size:17px;"> <?php echo $form[$_SESSION['language']]['comments']['title']; ?> </div>
			<br>
                        <form class="form-horizontal eventFeedbackForm" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/idea_postcomment.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                        <!-- <label for="event-feedback-title" class="control-label"> <?php echo $form['comments']['title']; ?> </label> <br> <br> -->
                                        <textarea class="form-control" rows="5" name="message"></textarea>
                                </div>
				<button style="margin-right: 6%;" type="<?php echo $form[$_SESSION['language']]['comments']['type']; ?>" value=<?php echo $form[$_SESSION['language']]['comments']['submit']; ?> class="btn pull-right"><?php echo $form[$_SESSION['language']]['comments']['desc']; ?></button>

                        </form>
                </div>
        </div>


	<div class="event-infos">
		<table>
                       <tr>
                               <th> Organisateur : </th>
                               <td> <a href="<?php echo $gozpeak_protocol.$gozpeak_host.'/index.php?page=profil&profil='.$infos_idea['organizer'] ?>"> <?php echo $infos_idea['organizer'] ?> &nbsp; &nbsp; </a> </td>
                       </tr>
                       <tr>
                               <th> Langue(s) : </th>
                               <td> <img src="<?php echo $minilang[$_SESSION['language']]['icon'][$infos_idea['language']]['png']?>">  <?php echo $infos_idea['language'] ?><br/> </td>
                       </tr>
                       <tr>
                               <th> Niveau en <?php echo $infos_idea['language'] ?> conseillé : </th>
                               <td> <?php echo $infos_idea['level_language'] ?> &nbsp; &nbsp; </td>
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

	<?php if($logged == 0) { ?>
                <button type="<?php echo $form[$_SESSION['language']]['addmember']['type']; ?>" title="<?php echo $form[$_SESSION['language']]['addmember']['title']; ?>" class="idea-addmember btn btn-primary pull-right disabled"><?php echo $form[$_SESSION['language']]['addmember']['desc']; ?></button>
        <?php } elseif (($logged == 1) && ($user_registered == 0)) { ?>
                <form class="form-horizontal idea-addmember" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/idea_addmember.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="addmember-ideaname" value="<?php echo $infos_idea['ideaname'] ?>">
                        <!-- <input type="hidden" name="addmember-ideatype" value="<?php #echo $infos_idea['ideatype'] ?>"> -->
                        <button type="<?php echo $form[$_SESSION['language']]['addmember']['type']; ?>" value=<?php echo $form[$_SESSION['language']]['addmember']['submit']; ?> class="btn btn-primary pull-right"><?php echo $form[$_SESSION['language']]['addmember']['desc']; ?></button>
                </form>
        <?php } elseif (($logged == 1) && ($user_registered == 1)) { ?>
                <form class="form-horizontal idea-addmember" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/idea_delmember.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="delmember-ideaname" value="<?php echo $infos_idea['ideaname'] ?>">
                        <button type="<?php echo $form[$_SESSION['language']]['delmember']['type']; ?>" value=<?php echo $form[$_SESSION['language']]['delmember']['submit']; ?> class="btn btn-default pull-right"><?php echo $form[$_SESSION['language']]['delmember']['desc']; ?></button>
                </form>

        <?php } ?>

</div>


