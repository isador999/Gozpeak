<script type="text/javascript" src="views/js/jquery.changepass.js"> </script>
<script type="text/javascript" src="views/js/jquery.profile.js"></script>

<div class="corpse container-fluid">
	<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
	<div class="row">
		<div class="col-lg-offset-1 col-md-offset-1 profile">
			<div class="row">
				<div class="col-lg-11 col-md-11 profile-header">
					<legend id="profile-title">
						Profil <span><?php echo $pseudo ?> </span>
					</legend>

					<div class="profile-avatar row">
						<div class="col-lg-2 col-md-2 col-sm-3">
							<img src="<?php echo $baseUrl; ?>/views/images/avatar_defaut.jpeg" alt="Avatar Img">
						</div>

						<div class="profile-head-text col-lg-5 col-md-5 col-sm-9">
							Inscrit depuis le <?php echo ' '.$infos['subscribedayname']; echo ' '.$infos['subscribedaynumber']; echo ' '.$infos['subscribemonthname']; echo ' '.$infos['subscribeyear']; ?>  <br> <br>
							Dernière connexion : <?php if (!empty($last_connection_interval)) { echo $last_connection_interval; } else { echo "Inconnu"; } ?>
						</div>

						<div class="profile-head-text col-lg-5 col-md-5 col-sm-10">
							<button data-toggle="modal" data-target="#modalMsgMember" class="btn btn-primary" disabled> Envoyer un message à ce membre </button>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-9 col-sm-8 profile-table">
					<div class="row">
						<div class="profile-table-title col-lg-9 col-md-9 col-sm-8 col-xs-8" style="margin-bottom: 3.5%;">
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								Les informations de votre <img src="<?php echo $baseUrl ?>/views/images/zpeak_orange.png" alt="Zpeak" style="width: 12%;" title="Zpeak" />  ID
							</div>
							<!-- <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-2 col-xs-2">
								<button id="btn-profile-update" onclick="GetProfileInfos('<?php #echo $_SESSION['profil']; ?>')" data-toggle="modal" data-target="#modalProfileEdition" class="btn btn-primary"> Modifier vos informations de profil </button>
							</div> -->
						</div>
					</div>

					<table class="table table-condensed table-bordered table-striped table-hover">
						<tr>
							<th> Pseudo : </th>
							<td> <?php echo $infos['pseudo'] ?> </td>
						</tr>
						<!--<tr>
							<th> Email : </th>
							<td> <?php #echo $infos['email'] ?> </td>
						</tr> -->
						<tr>
							<th> Nom : </th>
							<td> <?php echo $infos['lastname'] ?> </td>
						</tr>
						<tr>
							<th> Prénom : </th>
							<td> <?php echo $infos['name'] ?> </td>
						</tr>
						<!-- <tr>
							<th> Profession : </th>
							<td> <?php //echo $infos['profession'] ?> &nbsp; &nbsp; &nbsp; </td>
						</tr> -->
						<tr>
							<th> Nationalité : </th>
							<td> <?php echo $infos['nationality'] ?>  </td>
						</tr>
						<!--</tr>
							<th> Date de naissance : </th>
							<td> <?php #echo $infos['birthday'] ?> </td>
						</tr> -->
						<tr>
							<th> Nombre de sorties proposées : </th>
							<td> <div class="col-lg-10"> <?php echo $nb_posted_ideas; ?>  <button class="col-lg-offset-1 btn btn-default" disabled> Voir les événements postés </button> </div> </td>
						</tr>
						<tr>
							<th> Langues parlées : </th>
							<td> <?php //echo $infos['languages'] ?> </td>
						</tr>
						<tr>
							<th> Niveau des langues pratiquées </th>
							<td> <?php echo $infos['level_languages'] ?> </td>
						</tr>
					</table>
				</div>

				<!-- <div class="col-lg-3 col-md-3">
					<div class="profile-minilang-block">
						<?php #foreach($minilang[$_SESSION['language']]['icon'] as $key => $value){ ?>
    					<img class="profile-minilang-entry" src="<?php #echo $value['png']; ?>"> &nbsp; <?php #echo $value['text']; ?> <br>
    				<?php #} ?>
					</div>
				</div> -->
			</div>

		</div>
	</div>
</div>
