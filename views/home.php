<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	</head>
	
	<body>		
		<div id="home">
			<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>

			<div id="staticHome">
				<div class="city center">
					<?php if(isset($generic[$_SESSION['language']]['city'][0])) echo $generic[$_SESSION['language']]['city'][0]; ?>
				</div>
				
				<div class="activity-img hidden-xs hidden-sm hidden-md col-lg-12">
					<a href="index.php?page=list&query=run" ><span class="col-lg-3 center"><img src="<?php echo $home[$_SESSION['language']]['runzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['runzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['runzpeak']['title']; ?>" /></span></a>
					<a href="index.php?page=list&query=art" ><span class="col-lg-3 center"><img src="<?php echo $home[$_SESSION['language']]['artzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['artzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['artzpeak']['title']; ?>" /></span></a>
					<a href="index.php?page=list&query=party" ><span class="col-lg-3 center"><img src="<?php echo $home[$_SESSION['language']]['partyzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['partyzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['partyzpeak']['title']; ?>" /></span></a>
					<a href="index.php?page=list&query=eat" ><span class="col-lg-3 center"><img src="<?php echo $home[$_SESSION['language']]['eatzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['eatzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['eatzpeak']['title']; ?>" /></span></a>
				</div>
					
				<div class="activity-text hidden-xs hidden-sm hidden-md col-lg-12">
					<span class="col-lg-3 center"><?php echo $home[$_SESSION['language']]['runzpeak']['text']; ?></span>
					<span class="col-lg-3 center"><?php echo $home[$_SESSION['language']]['artzpeak']['text']; ?></span>
					<span class="col-lg-3 center"><?php echo $home[$_SESSION['language']]['partyzpeak']['text']; ?></span>
					<span class="col-lg-3 center"><?php echo $home[$_SESSION['language']]['eatzpeak']['text']; ?></span>
				</div>
				
				<div class="activity-img col-xs-12 col-sm-12 col-md-12 hidden-lg">
					<span class="col-xs-6 col-sm-6 col-md-6 center"><img src="<?php echo $home[$_SESSION['language']]['runzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['runzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['runzpeak']['title']; ?>" /></span>
					<span class="col-xs-6 col-sm-6 col-md-6 center"><img src="<?php echo $home[$_SESSION['language']]['artzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['artzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['artzpeak']['title']; ?>" /></span>
				</div>
				
				<div class="activity-text col-xs-12 col-sm-12 col-md-12 hidden-lg">
					<span class="col-xs-6 col-sm-6 col-md-6 center"><?php echo $home[$_SESSION['language']]['runzpeak']['text']; ?></span>
					<span class="col-xs-6 col-sm-6 col-md-6 center"><?php echo $home[$_SESSION['language']]['artzpeak']['text']; ?></span>
				</div>
				
				<div class="activity-img col-xs-12 col-sm-12 col-md-12 hidden-lg">
					<span class="col-xs-6 col-sm-6 col-md-6 center"><img src="<?php echo $home[$_SESSION['language']]['partyzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['partyzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['partyzpeak']['title']; ?>" /></span>
					<span class="col-xs-6 col-sm-6 col-md-6 center"><img src="<?php echo $home[$_SESSION['language']]['eatzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['eatzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['eatzpeak']['title']; ?>" /></span>
				</div>
				
				<div class="activity-text col-xs-12 col-sm-12 col-md-12 hidden-lg">
					<span class="col-xs-6 col-sm-6 col-md-6 center"><?php echo $home[$_SESSION['language']]['partyzpeak']['text']; ?></span>
					<span class="col-xs-6 col-sm-6 col-md-6 center"><?php echo $home[$_SESSION['language']]['eatzpeak']['text']; ?></span>
				</div>
				
				<div class="small-xs col-xs-12" style="display: none">
					<span class="col-xs-12 center"><img src="<?php echo $home[$_SESSION['language']]['runzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['runzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['runzpeak']['title']; ?>" /></span>
					<span class="col-xs-12 center"><?php echo $home[$_SESSION['language']]['runzpeak']['text']; ?></span>
					<span class="col-xs-12 center"><img src="<?php echo $home[$_SESSION['language']]['artzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['artzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['artzpeak']['title']; ?>" /></span>
					<span class="col-xs-12 center"><?php echo $home[$_SESSION['language']]['artzpeak']['text']; ?></span>
					<span class="col-xs-12 center"><img src="<?php echo $home[$_SESSION['language']]['partyzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['partyzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['partyzpeak']['title']; ?>" /></span>
					<span class="col-xs-12 center"><?php echo $home[$_SESSION['language']]['partyzpeak']['text']; ?></span>
					<span class="col-xs-12 center"><img src="<?php echo $home[$_SESSION['language']]['eatzpeak']['img']; ?>" alt="<?php echo $home[$_SESSION['language']]['eatzpeak']['alt']; ?>" title="<?php echo $home[$_SESSION['language']]['eatzpeak']['title']; ?>" /></span>
					<span class="col-xs-12 center"><?php echo $home[$_SESSION['language']]['eatzpeak']['text']; ?></span>
				</div>	
			</div>
			
			<div id="dynamicHome">
				<h5><a onclick="alert('Resolution : La largeur de votre écran, en pixels : ' + window.innerWidth + 'px');"> Largeur d'écran </a></h5>
				<h5><a onclick="alert('Resolution : La hauteur de votre écran, en pixels : ' + window.innerHeight + 'px');"> Hauteur d'écran </a></h5>
			</div>
		</div>
	</body>
</html>
