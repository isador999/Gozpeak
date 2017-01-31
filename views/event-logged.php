<div class="corpse container-fluid">
  <?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>

  <div class="row">
    <div class="text-center activity">
      <a href="index.php?page=list&query=<?php echo $query?>"><img src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" style="width:240px;" alt="<?php echo $query?>" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a>
      <p> <?php echo $home[$_SESSION['language']][$query]['text'] ?></p>
    </div>
  </div>

  <div class="row generic-eventblock">
    <div class="col-lg-8 event-infos">
      <fieldset class="table-responsive scheduler-border">
        <legend class="scheduler-border events-title" style="padding-top: 2%;"> <img style="width: 8%;" src="views/images/zpeak_orange.png" alt="Zpeak"/> sortie : "<?php echo $infos_event['eventname']; ?>"</legend>
        <table class="table table-striped table-hover">
          <tr>
            <th> Organisateur : </th>
            <td> <img src="<?php echo $baseUrl.'views/images/gozpeak_mini.png' ?>" title="Gozpeak" />
          </tr>

          <tr>
            <th> Langue(s) : </th>
            <td> <img src="<?php echo $minilang[$_SESSION['language']]['icon'][$infos_event['language']]['png']?>">  <?php echo $infos_event['language'] ?><br/> </td>
            <td> <img src="<?php echo $minilang[$_SESSION['language']]['icon'][$infos_event['language']]['png']; ?>" alt="langue de l'événement" /> <?php echo $minilang[$_SESSION['language']]['icon'][$infos_event['language']]['text']; ?> </td>
          </tr>

          <tr>
            <th> Niveau de langue conseillé : </th>
            <td> <?php echo $infos_event['level_language'] ?> </td>
          </tr>

          <tr>
            <th> Nom de l'événement : </th>
            <td> <?php echo $infos_event['eventname'] ?> </td>
          </tr>

          <tr>
            <th> Description : </th>
            <td> <?php echo $infos_event['eventdesc'] ?> </td>
          </tr>

          <tr>
            <th> Type d'activité : </th>
            <td> <img style="width: 45%;" src="<?php echo $home[$_SESSION['language']][$infos_event['eventtype']]['img']; ?>" title="<?php echo $home[$_SESSION['language']][$infos_event['eventtype']]['text'] ?>" /> </td>
          </tr>

          <tr>
            <th> Lieu : </th>
            <td> <?php echo $infos_event['eventplace'] ?> </td>
          </tr>

          </tr>
            <th> Evénement posté le : </th>
            <td> <?php echo $infos_event['date'] ?> </td>
          </tr>

          <tr>
            <th> Date et heure de l'événement proposé : </th>
            <td> <?php echo $infos_event['eventdayname'].' '.$infos_event['eventdaynumber'].' '.$infos_event['eventmonthname'].' '.$infos_event['eventyear']; ?>,  à  <?php echo $infos_event['eventtime']; ?>
            </td>
          </tr>

          <tr>
            <th> Temps restant avant le début de l'événement : </th>
            <td> <?php echo $DiffDate ?> </td>
          </tr>
        </table>
      </fieldset>
    </div>  <!-- END OF event-infos -->

    <!-- EVENT BUTTONS -->
    <div class="row">
      <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-3 text-center event-buttons">
			<?php if ($user_is_organizer == 1) { ?>
        <script src="views/js/jquery.eventedit.js"></script>
        <button onclick="showModalEventEdit()" title="<?php echo $form[$_SESSION['language']]['organizer']['eventedit']['title']; ?>" class="event-edit btn btn-primary pull-left"><?php echo $form[$_SESSION['language']]['organizer']['eventedit']['desc']; ?></button>
      <?php } elseif ($user_registered == 0) { ?>
				<form class="form-horizontal event-addmember" action="<?php echo $baseUrl.'/controllers/event_addmember.php' ?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="addmember-eventname" value="<?php echo $infos_event['eventname']; ?>">
					<button type="button" value=<?php echo $form[$_SESSION['language']]['addmember']['submit']; ?> class="event-addmember btn btn-primary pull-left"><?php echo $form[$_SESSION['language']]['addmember']['desc']; ?></button>
				</form>

			<?php } elseif ($user_registered == 1) { ?>
				<form class="form-horizontal event-addmember" action="<?php echo $baseUrl.'/controllers/event_delmember.php' ?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="delmember-eventname" value="<?php echo $infos_event['eventname']; ?>">
				  <button type="button" value=<?php echo $form[$_SESSION['language']]['delmember']['submit']; ?> class="event-addmember btn btn-default pull-left"><?php echo $form[$_SESSION['language']]['delmember']['desc']; ?></button>
				</form>
			<?php } ?>
        <button title="<?php echo $form[$_SESSION['language']]['listmembers']['title']; ?>" data-toggle="modal" data-target="#modal-displaymembers" onclick="showEventMembers('<?php echo $baseUrl; ?>', 'zpeakevent','<?php echo $infos_event['eventname'] ?>')" class="event-listmembers btn btn-default pull-left"><?php echo $form[$_SESSION['language']]['listmembers']['desc']; ?> <span class="badge"><?php echo $nb_members; ?></span></button>
      </div>
    </div>
  </div>

  <!-- <div class="row">
    <div class="col-lg-offset-2 col-lg-9" style="background-color: dimgray;">
      Futur comments
    </div>
  </div> -->
</div>  <!-- END OF CORPSE -->
