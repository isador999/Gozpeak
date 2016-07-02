<?php
session_start();
?>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
    <div id="header" class="center">
       <div id="headerTop" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="logo col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-3 col-md-offset-0 col-lg-3 col-lg-offset-0">
	            <a href="index.php?page=home"><img src="views/images/gozpeak_small.png" alt="GoZpeak" title="GoZpeak!" /></a> 
	    	</div>

			<div class="headerRight col-xs-12 col-sm-12 col-md-9 col-lg-9">
		        <span class="btn-default navbar-right col-xs-4 col-sm-4 col-md-4 col-lg-4 simple"><a onclick="showModalInscription()"><i class="fa fa-user-plus fa-fw"></i>&nbsp;<?php echo $headband[$_SESSION['language']]['registration']; ?></a></span>
			    <span class="btn-default navbar-right col-xs-4 col-sm-4 col-md-4 col-lg-4 simple"><a onclick="showModalConnection()"><i class="fa fa-sign-in fa-fw"></i>&nbsp;<?php echo $headband[$_SESSION['language']]['connection']; ?></a></span>
				<span class="btn-default navbar-right col-xs-4 col-sm-4 col-md-4 col-lg-4 simple"><a onclick="showModalEvent('<? echo $query ?>')"><i class="fa fa-calendar-plus-o fa-fw"></i>&nbsp;<?php echo $headband[$_SESSION['language']]['event']; ?></a></span>
			</div>
	    </div>
	</div>
</nav>
