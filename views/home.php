<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
<?php if(isset($_SESSION['resetpass']) && ($_SESSION['resetpass'] == 'valid')) { ?>
	<script type="text/javascript" src="views/js/jquery.resetpass.js"> </script>
	<script> $("#modalResetPassword").modal() </script>
<?php } ?>
<header>
	<div class="row">
		<div id="zpeak_carousel" class="carousel slide" data-ride="carousel">
			<!-- Bulles -->
			<ol class="carousel-indicators">
				<li data-target="#zpeak_carousel" data-slide-to="0" class="active"></li>
				<li data-target="#zpeak_carousel" data-slide-to="1"></li>
				<li data-target="#zpeak_carousel" data-slide-to="2"></li>
			</ol>

			<!-- Slides -->
			<div class="carousel-inner">
				<!-- Page 1 -->
				<div class="item active">
					<div class="carousel-page" style="height:180px">
						<img src="views/images/gozpeak_small.png" class="img-responsive" style="margin:0px auto;" />

					<div class="carousel-caption branding"> <?php echo "LA référence des langues étrangères à Rennes !" ?> </div>
				</div>
				</div>

				<!-- Page 2 -->
				<div class="item">
					<div class="carousel-page">
						<img src="views/images/zpeak_concerto.png" class="img-responsive img-rounded" style="margin:0px auto; max-height: 220px;"  />
					</div>
					<!-- <div class="carousel-caption branding"> El Aperitivo Clara (Uno) </div> -->
				</div>

				<!-- Page 3 -->
				<div class="item">
					<div class="carousel-page">
						<img src="views/images/ateliers_langues.png" class="img-responsive img-rounded" style="margin:0px auto; max-height: 220px"  />
					</div>

					<!-- <div class="carousel-caption branding"> El Aperitivo Clara (Dos) </div> -->
				</div>
			</div>
			<!-- Contrôles -->
			<a class="left carousel-control" href="#zpeak_carousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#zpeak_carousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>

	<!-- <div id="brand-block" class="row">
		<h3>
			<div class="col-lg-2">
	      <img src="views/images/gozpeak_small.png" alt="GoZpeak" />
	    </div>

			<div class="col-lg-4" style="padding-top:1%;">
				Votre référence des langues étrangères à Rennes !
			</div>
			<?php #echo $generic[$_SESSION['language']]['text'][0]; ?>
			<a onclick="showCities()" href="#" title="<?php #echo $generic[$_SESSION['language']]['city'][0]['title']; ?>"> <?php #echo $generic[$_SESSION['language']]['city'][0]['name']; ?> </a>
		</h3> -->

		<!-- <div id="ZpeakCities" style="display:none;">
			<div> <button class="btn btn-default" disabled>
			 	Gozpeak est seulement associé à la ville de Rennes actuellement </button>
			</div>
		</div> -->
	<!-- </div> -->

	<div class="row promote-block">
		<div class="col-lg-offset-1 col-lg-5 col-sm-10 col-xs-10">
			 <h2> <?php echo $home[$_SESSION['language']]['promote']['text']; ?> </h2>
			 <br>
			 <div>
				 <h3> Participez aux événements proposés par Gozpeak et proposez vos propres sorties linguistiques  ! </h3>
			 </div>
		</div>

		<div class="col-lg-offset-2 col-lg-4 col-md-6 col-sm-6 col-xs-8">
			<img src="views/images/aperitivo_clara_martes.jpg" class="img-rounded" alt="apéritif_linguistique_la_clara">
			<div class="caption">
				<p> El Aperitivo de La Clara </p>
			</div>
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
