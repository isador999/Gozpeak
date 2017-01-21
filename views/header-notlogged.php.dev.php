<?php
session_start();
?>

<nav id="zpeakNavigation" class="navbar navbar-default navbar-inverse navbar-fixed" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a id="zpeakLogo" class="navbar-brand" href="index.php?page=home"><img src="views/images/gozpeak_small.png" alt="GoZpeak" title="GoZpeak!" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul id="zpeakNavbar" class="nav navbar-nav nav-pills navbar-right">
        <li class="btn navbar-btn pull-right">
          <a title="<?php echo $headband[$_SESSION['language']]['event']['title']; ?>" data-toggle="modal" data-target="#modalSelectQueryNotLogged"><span class="glyphicon glyphicon-calendar"> <?php echo $headband[$_SESSION['language']]['event']['text']; ?> </span></a>
        </li>

        <li class="btn navbar-btn pull-right">
          <a title="<?php echo $headband[$_SESSION['language']]['registration']['title']; ?>" data-toggle="modal" data-target="#modalInscription"><span class="glyphicon glyphicon-user"> <?php echo $headband[$_SESSION['language']]['registration']['text']; ?></span></a>
        </li>

        <li class="btn navbar-btn pull-right">
          <a title="<?php echo $headband[$_SESSION['language']]['connection']['title']; ?>" data-toggle="modal" data-target="#modalConnection"><span class="glyphicon glyphicon-log-in"> <?php echo $headband[$_SESSION['language']]['connection']['text']; ?></span></a>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
