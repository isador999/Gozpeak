<!doctype html>
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $ViewTitle; ?></title>

    <!-- PERSONAL FONT -->
    <link rel="stylesheet" type="text/css" href="views/fonts/typo/noteworthy.ttc">

    <!-- BOOTSTRAP STYLES -->
    <link rel=stylesheet type="text/css" href="views/css/bootstrap-theme.min.css">
    <link rel=stylesheet type="text/css" href="views/css/bootstrap.min.css">

    <!-- FONT AWESOME -->
    <link rel=stylesheet type="text/css" href="views/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="views/css/jquery-ui.min.css">

    <!-- PERSONAL STYLE -->
    <link rel=stylesheet type="text/css" href="views/css/generic.css">
    <link rel=stylesheet type="text/css" href="views/css/modals.css">
    <link rel=stylesheet type="text/css" href="views/css/home.css">
    <link rel=stylesheet type="text/css" href="views/css/list.css">
    <link rel=stylesheet type="text/css" href="views/css/profile.css">
    <link rel=stylesheet type="text/css" href="views/css/event_idea.css">
    <link rel=stylesheet type="text/css" href="views/css/footer.css">

    <link rel=stylesheet type="text/css" href="views/css/bootstrap-datetimepicker.min.css">

    <!-- BOOTSTRAP SCRIPT -->
    <script type="text/javascript" src="views/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="views/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="views/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="views/js/myScript.js"></script>
    <script type="text/javascript" src="views/js/formValidation.min.js"></script>
    <script type="text/javascript" src="views/js/bootstrap-formValidation.min.js"></script>

    <!-- PERSONAL SCRIPTS -->
    <script type="text/javascript" async src="views/js/jquery.subscribe.js"></script>
    <script type="text/javascript" async src="views/js/jquery.connect.js"></script>
    <script type="text/javascript" async src="views/js/jquery.forgotpass.js"></script>
    <script type="text/javascript" async src="views/js/jquery.contact.js"></script>
    <script type="text/javascript" async src="views/js/jquery.listmembers.js"></script>
    <script type="text/javascript" src="views/js/bootstrap-datetimepicker.js"></script>
    <!-- <script type="text/javascript" src="views/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="views/js/typeahead-scroll.js"></script> -->

  </head>
  <!-- <?php #require($this->viewFile); ?> -->


  <!-- SOURCE VIEWS IN BODY -->
  <body>
    <div id="wrap">
      <?php foreach ($ViewPages as $page) {
        require_once($page);
      }
      ?>

      <!-- <title><?php #echo $viewModel->get('pageTitle'); ?></title> -->
    </div>
  </body>
</html>
