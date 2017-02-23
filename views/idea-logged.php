<div class="corpse container-fluid">
  <?php #if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>

  <div class="row">
    <div class="text-center activity">
      <a href="<?php echo $baseUrl ?>/index.php?page=list&query=<?php echo $query?>"><img src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" style="width:240px;" alt="<?php echo $query?>" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a>
      <p> <?php echo $home[$_SESSION['language']][$query]['text'] ?></p>
    </div>
  </div>

  <div class="row generic-eventblock">
    <div class="col-lg-8 idea-infos">
      <fieldset class="table-responsive scheduler-border">
        <legend class="scheduler-border ideas-title" style="padding-top: 2%;"> <img style="width: 8%;" src="views/images/zpeak_bleu.png" alt="Zpeak"/> idée : "<?php echo $infos_idea['ideaname']; ?>"</legend>
        <table class="table table-striped table-hover">
          <tr>
            <th> Organisateur : </th>
            <td> <a href="<?php echo $baseUrl.'/index.php?page=profil&profil='.$infos_idea['organizer']; ?>"> <?php echo $infos_idea['organizer'] ?> </a> </td>
          </tr>

          <tr>
            <th> Langue(s) : </th>
            <td> <img src="<?php echo $baseUrl."/".$minilang[$_SESSION['language']]['icon'][$infos_idea['language']]['png']; ?>" alt="langue de l'événement" /> <?php echo $minilang[$_SESSION['language']]['icon'][$infos_idea['language']]['text']; ?> </td>
          </tr>

          <tr>
            <th> Niveau de langue conseillé : </th>
            <td> <?php echo $infos_idea['level_language'] ?> </td>
          </tr>

          <tr>
            <th> Nom de l'événement : </th>
            <td> <?php echo $infos_idea['ideaname'] ?> </td>
          </tr>

          <tr>
            <th> Description : </th>
            <td> <?php echo $infos_idea['ideadesc'] ?> </td>
          </tr>

          <tr>
            <th> Type d'activité : </th>
            <td> <img style="width: 35%;" src="<?php echo $baseUrl."/".$home[$_SESSION['language']][$infos_idea['ideatype']]['img'] ?>" alt="<?php $home[$_SESSION['language']][$infos_idea['ideatype']]['alt'] ?>" title="<?php echo $home[$_SESSION['language']][$infos_idea['ideatype']]['text'] ?>" /> </td>
          </tr>

          <tr>
            <th> Lieu : </th>
            <td> <?php echo $infos_idea['ideaplace'] ?></td>
          </tr>

          <tr>
            <th> Evénement posté le : </th>
            <td> <?php echo $infos_idea['date']; ?> </td>
          </tr>

          <tr>
            <th> Date et heure de l'événement proposé : </th>
            <td> <?php echo $infos_idea['ideadayname'].' '.$infos_idea['ideadaynumber'].' '.$infos_idea['ideamonthname'].' '.$infos_idea['ideayear']; ?>,  à  <?php echo $infos_idea['ideatime']; ?></td>
          </tr>

          <tr>
            <th> Temps restant avant le début de l'événement : </th>
            <td> <?php echo $DiffDate ?> </td>
          </tr>
        </table>
      </fieldset>
    </div>  <!-- END OF idea-infos -->

    <!-- EVENT BUTTONS -->
    <div class="row">
      <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-3 event-buttons">
        <?php if ($user_is_organizer == 1) { ?>
          <script src="views/js/jquery.eventedit.js"></script>
          <button title="<?php echo $form[$_SESSION['language']]['organizer']['eventedit']['title']; ?>" data-toggle="modal" data-target="#modalEventEdit" onclick="GetEventInfos('<?php echo $baseUrl; ?>', 'idea', '<?php echo urlencode($infos_idea['ideaname']); ?>', '<?php echo $modal[$_SESSION['language']]['SelectQuery']['field'][$infos_idea['ideatype']]['logo']; ?>', '<?php echo $modal[$_SESSION['language']]['SelectQuery']['field'][$infos_idea['ideatype']]['color']; ?>', '<?php echo $modal[$_SESSION['language']]['SelectQuery']['field'][$infos_idea['ideatype']]['img']; ?>', '<?php echo $infos_idea['ideatype']; ?>');" class="btn btn-primary"><?php echo $form[$_SESSION['language']]['organizer']['eventedit']['desc']; ?></button>
        <?php } elseif ($user_registered == 0) { ?>
          <form class="form-horizontal idea-addmember" action="<?php echo $baseUrl.'/controllers/idea_addmember.php' ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="addmember-ideaname" value="<?php echo $infos_idea['ideaname']; ?>">
            <button type="submit" class="idea-addmember btn btn-primary pull-left"><?php echo $form[$_SESSION['language']]['addmember']['desc']; ?></button>
          </form>
        <?php } elseif ($user_registered == 1) { ?>
          <form class="form-horizontal idea-addmember" action="<?php echo $baseUrl.'/controllers/idea_delmember.php' ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="delmember-ideaname" value="<?php echo $infos_idea['ideaname']; ?>">
            <button type="submit" class="idea-addmember btn btn-default pull-left"><?php echo $form[$_SESSION['language']]['delmember']['desc']; ?></button>
          </form>
        <?php } ?>
        <button title="<?php echo $form[$_SESSION['language']]['listmembers']['title']; ?>" data-toggle="modal" data-target="#modal-displaymembers" onclick="showEventMembers('<?php echo $baseUrl; ?>', 'zpeakidea','<?php echo $infos_idea['ideaname'] ?>')" class="idea-listmembers btn btn-default pull-left"><?php echo $form[$_SESSION['language']]['listmembers']['desc']; ?> <span class="badge"><?php echo $nb_members; ?></span></button>
      </div>
    </div>
  </div>

  <!-- <div class="row">
    <div style="background-color: dimgray;">
      Futurs commentaires
    </div>
  </div> -->
</div>  <!-- END OF CORPSE -->
