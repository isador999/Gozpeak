<!DOCTYPE html> 
<html lang="fr"> 
<head> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 

<title>Gozpeak</title> 

<script>
        window.onload = function(){ height("wrapper") };
        window.onresize = function(){ height("wrapper") };
</script>

</head> 
 
<body> 
	<div id="wrapper">
		<header class="center">
		   <a class="logo" href="index.php"><img src="views/images/logo.png" alt="logo" title="logo" /></a>
		</header>

		<div id="book">				
			<div class="top-page"></div>
			
			<div class="content-page">
				<div class="top-spiral"></div>
				<div class="bottom-spiral"></div>
			
				<div id="home" class="center">
					<div class="row"></div>
					<h3> Bienvenue ! </h3>
					<div class="row"></div>
					<h3 class="presentation"> Gozpeak est actuellement démarré dans les villes suivantes : </h3>
					    <div id="welcomeCity" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
					        <span class="link">
						    <a href="index.php?page=home">
							  <p><?php echo $generic[$_SESSION['language']]['city'][0]; ?><p>
						    </a>
						</span>
					    </div>    	
				</div>
			</div>
			
			<div class="bottom-page">
				<!-- <ul class="social">
					<li><a class="facebook tooltip" target="_blank" href="https://www.facebook.com/gozpeak" title="Facebook"></a></li>
					<a target="_blank" href="https://www.facebook.com/gozpeak" title="Facebook"></a>
				</ul> -->
			</div>
		</div>
		
		<p class="copyright center">Copyright &copy; Gozpeak - All Rights Reserved</p>
		
	</div>
</body> 
</html>

