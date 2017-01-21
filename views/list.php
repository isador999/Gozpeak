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
			<h2><a href="index.php?page=list&query=<?php echo $query?>"><img style="width:70%;" src="<?php echo $home[$_SESSION['language']][$query]['img'] ?>" alt="<?php echo $query?>_img_list" title="<?php echo $home[$_SESSION['language']][$query]['title'] ?>" /></a></h2>
			<span> <?php echo $home[$_SESSION['language']][$query]['text'] ?></span>
		</div>

		<div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-3" style="margin-top:2%;">
			<input id="selectedLanguages" name="selectedLanguages" onclick="listLanguages()" type="text" placeholder="<?php echo $list[$_SESSION['language']]['filter']['placeholder']; ?>">
			<button type="submit" onclick="filterByLanguages('<?php echo $baseUrl ?>', '<?php echo $query; ?>', document.getElementById('current_picked_eventyear').innerHTML, document.getElementById('current_picked_ideayear').innerHTML, document.getElementById('selectedLanguages').value)" class="btn btn-default"> <?php echo $list[$_SESSION['language']]['filter']['submit'] ?></button>
		</div>
	</header>

	<div class="listing-events row">
		<div class="table-responsive eventsblock col-lg-5 col-md-5">
			<fieldset class="scheduler-border">
				<legend class="scheduler-border row">
					<div class="col-lg-8 col-md-6 events-title">
						Les <img src="views/images/zpeak_orange.png" style="width:23%;" alt="Zpeak"/> événements
					</div>

					<div id="dropdown-eventyears" class="col-lg-1 col-md-1 dropdown">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <?php echo $list[$_SESSION['language']]['yearpicker']['text'] ?> : <span id="current_picked_eventyear"> <?php echo $current_eventyear; ?> </span> &nbsp; <span class="caret"></span> </button>
						<ul id="event-years" class="dropdown-menu">
							<?php foreach ($sortYears as $year) { ?>
								<li id="events-<?php echo $year; ?>"><a onclick="sortyears('<?php echo $baseUrl ?>', 'event', '<?php echo $query; ?>', '<?php echo $year ?>')" href="#"> <?php echo $year; ?> </a></li>
							<?php } ?>
						</ul>
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
						<script> sortyears('<?php echo $baseUrl ?>', 'event', '<?php echo $query; ?>', document.getElementById('current_picked_eventyear').innerHTML) </script>
						<?php #foreach ($events as $event) { ?>
							<!-- <tr class="row">
		    				<td class="col-lg-1"> <img src="<?php #echo $minilang[$_SESSION['language']]['icon'][$event["language"]]['png'] ?>" alt="<?php #echo $event["language"]; ?>" title="<?php #echo $minilang[$_SESSION['language']]['icon'][$event["language"]]['text']; ?>"> </td>
		    				<td class="col-lg-6"> <a href="<?php #echo $baseUrl.'/index.php?page=event&query='.$event["eventtype"].'&event='.$event["eventname"]; ?>"> <?php #echo $event["eventname"] ?> </a></td>
		    				<td class="col-lg-4"> <?php #echo $event["eventdayname"].' '.$event["eventdaynumber"].' '.$event["eventmonthname"]; ?></td>
		    				<td class="col-lg-1"> <?php #echo $event["eventtime"]; ?></td>
							</tr> -->
						<?php #} ?>
					</tbody>
				</table>
			</fieldset>

			<div class="row pageblock text-center">
				<ul class="pagination pagination-lg pagination_event">
					<script> //retrieve_pagination('<?php echo $baseUrl ?>', '<?php echo $query ?>', 'event', document.getElementById('current_picked_eventyear').innerHTML, document.getElementById('selectedLanguages').value) </script>
					<?php #for ($i = 1 ; $i <= $events_total_pages ; $i++) {
						#if ($i == $events_current_page ) { ?>
							<!-- <li class="active"><a href="#"> <?php #echo $i; ?></a></li> -->
						<?php #} else { ?>
							<!-- <li><a href="<?php #echo $baseUrl.'/index.php?page=list&query='.$query.'&eventpage='.$i; ?>"> <?php #echo $i; ?></a></li> -->
					<?php #}
							#} ?>
				</ul>
			</div>
		</div>

		<div class="visible-sm visible-xs" style="margin-bottom: 10%;"> </div>

		<div class="table-responsive eventsblock col-lg-offset-1 col-lg-6 col-md-offset-1 col-md-6">
			<fieldset class="scheduler-border">
				<legend class="scheduler-border row">
					<div class="col-lg-8 col-md-6 ideas-title">
						Vos <img src="views/images/zpeak_bleu.png" style="width:20%;" alt="Zpeak"/> idées d'événements
					</div>

					<div id="dropdown-ideayears" class="col-lg-offset-1 col-lg-1 col-md-offset-1 col-md-1 dropdown">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <?php echo $list[$_SESSION['language']]['yearpicker']['text'] ?> : <span id="current_picked_ideayear"> <?php echo $current_ideayear; ?> </span> &nbsp; <span class="caret"></span> </button>
						<ul id="idea-years" class="dropdown-menu">
							<?php foreach ($sortYears as $year) { ?>
								<li id="ideas-<?php echo $year; ?>"><a onclick="sortyears('<?php echo $baseUrl ?>', 'idea', '<?php echo $query; ?>', '<?php echo $year ?>')" href="#"> <?php echo $year; ?> </a></li>
							<?php } ?>
						</ul>
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
					<?php	#foreach ($ideas as $idea) { ?>
						<script> sortyears('<?php echo $baseUrl ?>', 'idea', '<?php echo $query; ?>', document.getElementById('current_picked_ideayear').innerHTML) </script>
						<!-- <tr class="row">
							<td class="col-lg-1 text-left"> <img src="<?php #echo $minilang[$_SESSION['language']]['icon'][$idea["language"]]['png'] ?>" alt="<?php #echo $idea["language"]; ?>" title="<?php #echo $minilang[$_SESSION['language']]['icon'][$idea["language"]]['text']; ?>"> </td>
              <td class="col-lg-2"> <a href="<?php #echo $baseUrl.'/index.php?page=profil&profil='.$idea["organizer"]; ?>"><?php #echo $idea["organizer"]; ?></a> </td>
              <td class="col-lg-4"> <a href="<?php #echo $baseUrl.'/index.php?page=idea&query='.$idea["ideatype"].'&idea='.$idea["ideaname"]; ?>"> <?php #echo $idea["ideaname"]; ?> </a></td>
              <td class="col-lg-4"> <?php #echo $idea["ideadayname"].' '.$idea["ideadaynumber"].' '.$idea["ideamonthname"]; ?></td>
              <td class="col-lg-1"> <?php #echo $idea["ideatime"]; ?> </td>
						</tr> -->
						<?php #} ?>
			  	</tbody>
				</table>
			</fieldset>

			<div class="row pageblock text-center">
				<ul class="pagination pagination-lg pagination_idea">
					<script> //retrieve_pagination('<?php echo $baseUrl ?>', '<?php echo $query ?>', 'idea', document.getElementById('current_picked_ideayear').innerHTML, document.getElementById('selectedLanguages').value) </script>
					<?php #for ($i = 1 ; $i <= $ideas_total_pages ; $i++) {
						#if ($i == $ideas_current_page ) { ?>
							<!-- <li class="active"><a href="#"> <?php #echo $i; ?></a></li> -->
						<?php #} else { ?>
							<!-- <li><a href="<?php #echo $baseUrl.'/index.php?page=list&query='.$query.'&ideapage='.$i; ?>"> <?php #echo $i; ?></a></li> -->
					<?php #}
							#} ?>
				</ul>
			</div>
		</div>

	</div>  <!-- END OF LISTING-EVENTS -->
</div> <!-- END OF CORPSE -->
