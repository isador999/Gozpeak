<div class="corpse container-fluid">

  <div class="row">
    <div class="text-center activity">
      <a href="index.php?page=list&query=<?php echo $query?>"><img src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" alt="<?php echo $query?>" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a>
      <p> <?php echo $home[$_SESSION['language']][$query]['text'] ?></p>
    </div>
  </div>

  <div class="row generic-eventblock">
    <div class="col-lg-8 event-infos">
      <fieldset class="table-responsive scheduler-border">
        <legend class="scheduler-border events-title" style="padding-top: 2%;">
          <img src="views/images/zpeak_orange.png" style="width: 8%;" alt="Zpeak"/> sortie : "<?php echo $infos_event['eventname']; ?>"
        </legend>

        <table class="table table-striped table-hover">
          <tr>
            <th> Organisateur : </th>
            <td> <img src="views/images/gozpeak_mini.png" title="Gozpeak" />
          </tr>

          <tr>
            <th> Langue(s) : </th>
            <td> <img src="<?php echo $minilang[$_SESSION['language']]['icon'][$infos_event['language']]['png']?>">  <?php echo $infos_event['language'] ?><br/> </td>
          </tr>

          <tr>
            <th> Niveau en <?php echo $infos_event['language'] ?> conseillé : </th>
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
            <td> <img style="width: 45%;" src="<?php echo $home[$_SESSION['language']][$infos_event['eventtype']]['img'] ?>" title="<?php echo $home[$_SESSION['language']][$infos_event['eventtype']]['text'] ?>" /> </td>
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
            <td> <?php echo $infos_event['eventdayname'].' '.$infos_event['eventdaynumber'].' '.$infos_event['eventmonthname'].' '.$infos_event['eventyear']; ?>,  à  <?php echo $infos_event['eventtime']; ?> </td>
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
      <div class="col-lg-offset-1 col-lg-2 text-center event-buttons">
        <button type="<?php echo $form[$_SESSION['language']]['addmember']['type']; ?>" title="<?php echo $form[$_SESSION['language']]['addmember']['title']; ?>" class="event-addmember btn btn-primary pull-right disabled"><?php echo $form[$_SESSION['language']]['addmember']['desc']; ?></button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12" style="background-color: dimgray;">
      Futur comments
    </div>
  </div>
</div>  <!-- END OF CORPSE -->
