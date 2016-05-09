<div id="footer" class="center">
	<div id="footerTop" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<span class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<a href="#"><i class="fa fa-commenting-o"></i>&nbsp;<?php echo $footer[$_SESSION['language']]['baby_zpeak']; ?></a>
		</span>
		<span class="col-xs-6 col-sm-5 col-md-5 col-lg-5 col-xs-offset-1 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 link">
			<a onclick="showModalWhat()"><i class="fa fa-question-circle"></i>&nbsp;<?php echo $generic[$_SESSION['language']]['what'][0]; ?></a>
		</span>
	</div>
	
	<div id="footerMiddle" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<span class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<a onclick="showModalContact()"><i class="fa fa-envelope"></i>&nbsp;<?php echo $footer[$_SESSION['language']]['contact']; ?></a>
		</span>
		<span class="col-xs-6 col-sm-5 col-md-5 col-lg-5 col-xs-offset-1 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
			<a href="#"><i class="fa fa-star-o"></i>&nbsp;<?php echo $footer[$_SESSION['language']]['premium']; ?></a>
		</span>
	</div>
	
	<div id="footerBottom" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<span><?php echo $generic[$_SESSION['language']]['footer'][0]; ?></span>
	</div>
</div>
