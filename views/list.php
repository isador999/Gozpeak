<div class="corpse container-fluid">
	<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>

	<header class="row listing-header text-center" style="margin-top: 1.5%;">
		<div class="col-lg-4 col-md-4 col-sm-4" style="margin-top:2%;">

			<!-- Lang buttons for LG, MD -->
			<div class="row">
				<div class="col-lg-9 col-md-11 col-sm-11 text-left">
				<?php foreach($minilang[$_SESSION['language']]['icon'] as $key => $value) { ?>
					<div style="display:inline-block;">
						<img src="<?php echo $value['png']; ?>" /> <?php echo $value['text']; ?>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-4 activity text-center">
			<h2><a href="index.php?page=list&query=<?php echo $query?>"><img style="width:240px;" src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" alt="<?php echo $query?>_img_list" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a></h2>
			<span> <?php echo $home[$_SESSION['language']][$query]['text'] ?></span>
		</div>

		<div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-3" style="margin-top:2%;">
			<input id="selectedLanguages" name="selectedLanguages" onclick="listLanguages()" type="text" placeholder="<?php echo $list[$_SESSION['language']]['filter']['placeholder']; ?>">
			<button type="submit" onclick="filterByLanguages('<?php echo $baseUrl ?>', '<?php echo $query; ?>', document.getElementById('current_picked_eventyear').innerHTML, document.getElementById('current_picked_eventmonth').innerHTML, document.getElementById('current_picked_ideayear').innerHTML, document.getElementById('current_picked_ideamonth').innerHTML, document.getElementById('selectedLanguages').value)" class="btn btn-default"> <?php echo $list[$_SESSION['language']]['filter']['submit'] ?></button>
		</div>
	</header>

	<div class="listing-events row">
		<div class="table-responsive eventsblock col-lg-5 col-md-5">
			<fieldset class="scheduler-border">
				<legend class="scheduler-border">
					<div class="row">
						<div class="col-lg-4 col-md-7 col-sm-7 col-xs-5 text-left events-title">
							Les <img src="views/images/zpeak_orange.png" style="width:80px;" alt="Zpeak"/> événements
						</div>
					<!-- </div> -->

					 	<div class="row">
							<div class="col-lg-8 col-md-5 col-sm-5 col-xs-7 row">
								<div id="dropdown-eventmonths" class="dropdown col-lg-6 col-md-7 col-sm-6 col-xs-6">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <?php echo $list[$_SESSION['language']]['monthpicker']['text'] ?> : <span id="current_picked_eventmonth"> <?php echo $current_eventmonth; ?> </span> &nbsp; <span class="caret"></span> </button>
									<ul id="event-months" class="dropdown-menu">
										<?php foreach ($list[$_SESSION['language']]['monthpicker']['option'] as $month) { ?>
											<li id="events-<?php echo $month['entry']; ?>"><a onclick="sortEvents('<?php echo $baseUrl ?>', 'event', '<?php echo $query; ?>', document.getElementById('current_picked_eventyear').innerHTML, '<?php echo $month['entry'] ?>')" href="#"> <?php echo $month['entry']; ?> </a></li>
										<?php } ?>
									</ul>
								</div>

								<div id="dropdown-eventyears" class="dropdown col-lg-5 col-md-7 col-sm-4 col-xs-5">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <?php echo $list[$_SESSION['language']]['yearpicker']['text'] ?> : <span id="current_picked_eventyear"> <?php echo $current_eventyear; ?> </span> &nbsp; <span class="caret"></span> </button>
									<ul id="event-years" class="dropdown-menu">
										<?php foreach ($sortYears as $year) { ?>
											<li id="events-<?php echo $year; ?>"><a onclick="sortEvents('<?php echo $baseUrl ?>', 'event', '<?php echo $query; ?>', '<?php echo $year ?>', document.getElementById('current_picked_eventmonth').innerHTML)" href="#"> <?php echo $year; ?> </a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</legend>

				<div id="empty-events-message" class="empty-events text-center alert-info" <?php if (!empty($events)) { ?> style="display:none;" <?php } ?> > <?php echo $list[$_SESSION['language']]['events']['empty']; ?></div>

				<table id="table-events" class="table table-striped table-hover">
		  		<thead>
						<tr class="row">
		    			<th>Langue&nbsp;</th>
		  				<!--<th>Organisateur &nbsp; </th>-->
		    			<th>Sortie&nbsp; </th>
		    			<th>Date&nbsp;</th>
		    			<th>Heure&nbsp;</th>
						</tr>
		  		</thead>

					<tbody>
						<script> sortEvents('<?php echo $baseUrl ?>', 'event', '<?php echo $query; ?>', document.getElementById('current_picked_eventyear').innerHTML) </script>
					</tbody>
				</table>
			</fieldset>

			<div class="row pageblock text-center">
				<ul class="pagination pagination-lg pagination_event">

				</ul>
			</div>
		</div>

		<div class="visible-sm visible-xs" style="margin-bottom: 15%;"> </div>

		<div class="eventsblock col-lg-offset-1 col-lg-6 col-md-offset-1 col-md-6">
			<fieldset class="scheduler-border">
				<legend class="scheduler-border">
					<div class="row">
						<div class="col-lg-5 col-md-7 col-sm-7 col-xs-5 text-left ideas-title">
							Vos <img src="views/images/zpeak_bleu.png" style="width:80px;" alt="Zpeak"/> idées d'événements
						</div>

						<div class="row">
							<div class="col-lg-7 col-md-5 col-sm-5 col-xs-7 row">
								<div id="dropdown-ideamonths" class="dropdown col-lg-6 col-md-9 col-sm-6 col-xs-6">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <?php echo $list[$_SESSION['language']]['monthpicker']['text'] ?> : <span id="current_picked_ideamonth"> <?php echo $current_ideamonth; ?> </span> &nbsp; <span class="caret"></span> </button>
									<ul id="idea-months" class="dropdown-menu">
										<?php foreach ($list[$_SESSION['language']]['monthpicker']['option'] as $month) { ?>
											<li id="ideas-<?php echo $month['entry']; ?>"><a onclick="sortEvents('<?php echo $baseUrl ?>', 'idea', '<?php echo $query; ?>', document.getElementById('current_picked_ideayear').innerHTML, '<?php echo $month['entry'] ?>')" href="#"> <?php echo $month['entry']; ?> </a></li>
										<?php } ?>
									</ul>
								</div>

								<div id="dropdown-ideayears" class="dropdown col-lg-6 col-md-9 col-sm-4 col-xs-5">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <?php echo $list[$_SESSION['language']]['yearpicker']['text'] ?> : <span id="current_picked_ideayear"> <?php echo $current_ideayear; ?> </span> &nbsp; <span class="caret"></span> </button>
									<ul id="idea-years" class="dropdown-menu">
										<?php foreach ($sortYears as $year) { ?>
											<li id="ideas-<?php echo $year; ?>"><a onclick="sortEvents('<?php echo $baseUrl ?>', 'idea', '<?php echo $query; ?>', '<?php echo $year ?>', document.getElementById('current_picked_ideamonth').innerHTML)" href="#"> <?php echo $year; ?> </a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</legend>

				<div id="empty-ideas-message" class="empty-events text-center alert-info" <?php if (!empty($ideas)) { ?> style="display:none;" <?php } ?> ><?php echo $list[$_SESSION['language']]['ideas']['empty']; ?></div>

				<table id="table-ideas" class="table table-striped table-hover">
			  	<thead>
						<tr class="row">
							<th>Langue&nbsp;</th>
              <th>Organisateur&nbsp;</th>
              <th>Idée&nbsp;</th>
              <th>Date&nbsp;</th>
              <th>Heure&nbsp;</th>
						</tr>
			  	</thead>

        	<tbody>
						<script> sortEvents('<?php echo $baseUrl ?>', 'idea', '<?php echo $query; ?>', document.getElementById('current_picked_ideayear').innerHTML) </script>
			  	</tbody>
				</table>
			</fieldset>

			<div class="row pageblock text-center">
				<ul class="pagination pagination-lg pagination_idea">
				</ul>
			</div>
		</div>

	</div>  <!-- END OF LISTING-EVENTS -->
</div> <!-- END OF CORPSE -->
