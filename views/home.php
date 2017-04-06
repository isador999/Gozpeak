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
					<div class="carousel-page">
						<img src="views/images/gozpeak_small.png" class="img-responsive" style="margin: 0px auto;" />
						<div class="branding text-center">
					 		<?php echo "LA référence des langues étrangères à Rennes !" ?>
						</div>
						<img src="views/images/menu_clara.jpg" class="img-responsive img-rounded" style="margin:0px auto; height: 430px; max-height: 600px;"  />
				</div>
				</div>

				<!-- Page 2 -->
				<!-- <div class="item">
					<div class="carousel-page">
					</div>
				</div> -->

				<!-- Page 3 -->
				<!-- <div class="item">
					<div class="carousel-page">
						<img src="views/images/fete_culture_espagnole.jpeg" class="img-responsive img-rounded" style="margin:0px auto; padding-bottom: 45px; height: 500px; max-height: 550px"  />
					</div>
				</div> -->

				<!-- Page 4 -->
				<div class="item">
					<div class="carousel-page">
						<img src="views/images/sejour.jpeg" class="img-responsive img-rounded" style="margin:0px auto; height: 520px; max-height: 600px"  />
					</div>
				</div>

				<!-- Page 4 -->
				<div class="item">
					<div class="carousel-page">
						<img src="views/images/cartel.jpg" class="img-responsive img-rounded" style="margin:0px auto; height: 520px; max-height: 600px"  />
					</div>
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
		<div class="col-lg-offset-1 col-lg-4 col-md-offset-2 col-md-6 col-sm-offset-1 col-sm-3">
			<div>
				 <iframe width="600" height="440" src="https://www.youtube.com/embed/cXF3-OzHoYU"></iframe>
		 </div>
	 </div>

		<div class="col-lg-offset-3 col-lg-4 col-md-offset-1 col-md-10 col-sm-12">
		 <h2> <?php echo $home[$_SESSION['language']]['promote']['text']; ?> </h2>
		 <br>
		 <div>
			 <h3> Participez aux événements proposés par Gozpeak et proposez vos propres sorties linguistiques  ! </h3>
		 </div>
		</div>
	</div>

		<!-- <div class="col-lg-3 col-md-6 col-sm-5 col-xs-2"> -->
		<!-- </div> -->

		<!-- <div class="col-lg-offset-2 col-lg-4 col-md-6 col-sm-6 col-xs-8">
			<img src="views/images/aperitivo_clara_martes.jpg" class="img-rounded" alt="apéritif_linguistique_la_clara">
			<div class="caption">
				<p> El Aperitivo de La Clara </p>
			</div>
		</div> -->
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
