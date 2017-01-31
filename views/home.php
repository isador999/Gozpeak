<div class="corpse container-fluid">
	<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
	<?php if(isset($_SESSION['resetpass']) && ($_SESSION['resetpass'] == 'valid')) { ?>
		<script type="text/javascript" src="views/js/jquery.resetpass.js"> </script>
		<script> $("#modalResetPassword").modal() </script>
	<?php } ?>


	<header>
	<!-- <div class="col-lg-5 pull-left alert alert-info fade in" id="course-message">
	<a href="" class="close" data-dismiss="alert">&times;</a>
	<strong><u> Information :</u></strong> <br> Gozpeak proposera aussi des cours particuliers pour apprendre l'espagnol rapidement ;-) <br>
	<a onclick="showModalCourses()"><i class="fa fa-leanpub"></i> Cliquez pour plus d'informations </a>
	</div> -->
		<div class="city-block row">
			<div class="col-lg-5 pull-left">
				<h4>
					<?php echo $generic[$_SESSION['language']]['text'][0]; ?> :
					<a onclick="showCities()" href="#" title="<?php echo $generic[$_SESSION['language']]['city'][0]['title']; ?>"> <?php echo $generic[$_SESSION['language']]['city'][0]['name']; ?> </a>
				</h4>

				<div id="ZpeakCities" style="display:none;">
					<!-- <div> <button class="btn btn-default" title="<?php #echo $generic[$_SESSION['language']]['cities']['title']; ?>" disabled> Gozpeak Rennes </button> <button class="col-lg-offset-1 btn btn-default" title="<?php #echo $generic[$_SESSION['language']]['cities']['title']; ?>" disabled> Gozpeak Nantes </button> <button class="col-lg-offset-1 btn btn-default" title="<?php #echo $generic[$_SESSION['language']]['cities']['title']; ?>" disabled> Gozpeak Tours </button> </div> -->
					<div> <button class="btn btn-default" disabled> Gozpeak est seulement associé à la ville de Rennes actuellement </button></div>
				</div>
			</div>
		</div>

		<div class="row promote-block">
			<div class="col-lg-4 col-sm-10 col-xs-10">
				<?php echo $home[$_SESSION['language']]['promote']['text']; ?>

				<br>
				<?php echo "< Gozpeak_Master_Branch >"; ?>
				<br>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
				<img src="views/images/aperitivo_clara_martes.jpg" class="img-rounded" alt="apéritif_linguistique_la_clara">
				<div class="caption">
					<p> El Aperitivo de La Clara </p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-5 col-xs-2">
				<iframe width="440" height="250" src="https://www.youtube.com/embed/sjW8tB3Yw8A"></iframe>
			</div>
		</div>
	</header>

	<!-- LG and MD -->
	<div class="row text-center activities" style="height:35%;">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<h3><a title="<?php echo $home[$_SESSION['language']]['run']['title']; ?>" href="index.php?page=list&query=run" ><span><img style="width:90%; max-width:300px;" src="<?php echo $home[$_SESSION['language']]['run']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['run']['alt']; ?>"/> </span></a></h3>
			<span><?php echo $home[$_SESSION['language']]['run']['text']; ?></span>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<h3><a title="<?php echo $home[$_SESSION['language']]['art']['title']; ?>" href="index.php?page=list&query=art"><span><img style="width:90%; max-width:300px;" src="<?php echo $home[$_SESSION['language']]['art']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['art']['alt']; ?>" /> </span></a></h3>
			<span><?php echo $home[$_SESSION['language']]['art']['text']; ?></span>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<h3><a title="<?php echo $home[$_SESSION['language']]['party']['title']; ?>" href="index.php?page=list&query=party"><span><img style="width:90%; max-width:300px;" src="<?php echo $home[$_SESSION['language']]['party']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['party']['alt']; ?>" /> </span></a></h3>
			<span><?php echo $home[$_SESSION['language']]['party']['text']; ?></span>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<h3><a title="<?php echo $home[$_SESSION['language']]['eat']['title']; ?>" href="index.php?page=list&query=eat"><span><img style="width:90%; max-width:300px;" src="<?php echo $home[$_SESSION['language']]['eat']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['eat']['alt']; ?>" /> </span></a></h3>
			<span><?php echo $home[$_SESSION['language']]['eat']['text']; ?></span>
		</div>
	</div>
