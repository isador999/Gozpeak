<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
    <div id="header" class="center">
       <div id="headerTop" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       		<div class="logo col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-3 col-md-offset-0 col-lg-3 col-lg-offset-0">
		    <a href="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/index.php?page=home"><img src="views/images/gozpeak_small.png" alt="GoZpeak" title="GoZpeak!" /></a>
		</div>

	<!-- <div class="headerRight col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-1"> -->
	
	     <!-- <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-1"> -->
	     	<div class="headerRight col-xs-12 col-sm-12 col-md-9 col-lg-9">
	     	<!-- Page to use when user is logged -->
		    <span class="btn-default navbar-right col-xs-4 col-sm-4 col-md-4 col-lg-4 middle"><a href="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/index.php?page=logout"> Se déconnecter </a></span>
		<!-- ######### Doesn't works with GLOBALS $_SESSION variables...  CHECK IF IT'S NORMAL BEFORE PRODUCTION !!! ######### --> 
	     	    <!-- <span class="btn-default navbar-right col-xs-4 col-sm-4 col-md-4 col-lg-4 simple"> Connecté en tant que <a href="index.php?page=profil&profil=<?//echo $_SESSION['profil']?>"> <b><?//echo $_SESSION['profil']?> </b></a> </span> -->
	     	    <span class="btn-default navbar-right col-xs-4 col-sm-4 col-md-4 col-lg-4 simple"> Connecté en tant que <a href="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/index.php?page=profil"> <b><?php echo $_SESSION['profil'];?> </b></a> </span>
		    <span class="btn-default navbar-right col-xs-4 col-sm-4 col-md-4 col-lg-4 simple"><a onclick="showModalEvent('<? echo $query ?>')"><i class="fa fa-calendar-plus-o fa-fw"></i>&nbsp;<?php echo $headband[$_SESSION['language']]['event']; ?></a></span>
	    </div>
        </div>
    </div> <!--end navbar-header -->
</nav>
