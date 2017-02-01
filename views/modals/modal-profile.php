<!-- Modal Profile -->
<div class="modal fade" style="display:none;" id="modalProfileEdition" tabindex="-1" role="dialog" aria-labelledby="modalProfileEdition">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center"><?php echo $modal[$_SESSION['language']]['profile']['edition']['title']; ?></h4>
			</div>


			<!-- The messages container -->
			<div id="profile-errors" class="text-left col-lg-offset-1 modal-errors"></div>
			<form role="form" data-toggle="validator" class="form-horizontal" name="profileForm" id="profileForm" method="POST" action="<?php echo $baseUrl.'/controllers/updateprofile.php' ?>">
				<div class="modal-body">

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="profile_pseudo"><?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['desc']; ?>&nbsp;&#42;</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" id="profile_pseudo" title="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['title']; ?>" name="profile_pseudo" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['placeholder']; ?>" disabled required />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="profile_lastname"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" id="profile_lastname" name="profile_lastname" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['placeholder']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="profile_firstname"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" id="profile_firstname" name="profile_firstname" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['placeholder']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="profile_mail"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['desc']; ?>&nbsp;&#42;</label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" id="profile_mail" name="profile_mail" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['placeholder']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="profile_nationality"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="text" class="form-control" id="profile_nationality" name="profile_nationality" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['placeholder']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="profile_birthdate"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="date" class="form-control datetime-btn" id="profile_birthdate" name="profile_birthdate" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['placeholder']; ?>"/>
						</div>
					</div>
					<script type="text/javascript">
						showDatetimePicker();
					</script>

					<!-- Begin of MultiSelects (languages) -->
					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
        			<label for="profile_languages"> <?php echo $modal[$_SESSION['language']]['profile']['edition']['select']['lang']['label']; ?> </label>
						</div>

						<div class="col-lg-5">
            	<select class="form-control" name="profile_languages" multiple>
								<?php foreach($minilang[$_SESSION['language']]['icon'] as $key => $lang){ ?>
									<!-- <option value="<?php #echo $lang['value']; ?>"> <?php #echo $lang['entry'] ?></option> -->
									<option style="background-image:url(<?php echo $lang['png'] ?>); background-repeat: no-repeat; padding-left: 18px; background-size: 19px 19px;" value="<?php echo $lang['value']; ?>"> &nbsp;&nbsp; <?php echo $lang['text']; ?></option>
								<?php } ?>
            	</select>
							<br>
							<i> <?php echo $modal[$_SESSION['language']]['profile']['edition']['selectlang']['help']; ?> </i>
        		</div>
    			</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal[$_SESSION['language']]['generic']['closed']; ?></button>
					<button type="submit" value="Submit" class="btn btn-primary"><?php echo $modal[$_SESSION['language']]['profile']['edition']['check']['desc']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal ChangePassword in Profile -->
<div class="modal fade" style="display:none;" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="ModalChangePassword">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center"><?php echo $modal[$_SESSION['language']]['changepass']['title']; ?></h4>
			</div>

			<!-- The messages container -->
			<div id="changepass-errors" class="text-left col-lg-offset-1 modal-errors"></div>
			<form role="form" data-toggle="validator" class="form-horizontal" name="changepassForm" id="changepassForm" method="post" action="<?php echo $baseUrl.'/controllers/setnewpass.php' ?>">
				<div class="modal-body">
					<?php foreach($modal[$_SESSION['language']]['changepass']['field'] as $key => $value) { ?>
						<div class="form-group">
							<div class="col-lg-4 col-lg-offset-1">
								<label for="<?php echo $value['desc']; ?>"><?php echo $value['desc']; ?>&nbsp;&#42;</label>
							</div>

							<div class="col-lg-6">
								<input type="<?php echo $value['type']; ?>" class="form-control" id="<?php echo $value['input']; ?>" name="<?php echo $value['input']; ?>" placeholder="<?php echo $value['placeholder']; ?>"/>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal[$_SESSION['language']]['generic']['closed']; ?></button>
					<button type="submit" value="Submit" class="btn btn-primary"><?php echo $modal[$_SESSION['language']]['changepass']['check']['desc']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal ProfileDeletion -->
<div class="modal fade" id="modalProfileDeletion" tabindex="-1" role="dialog" aria-labelledby="ModalProfileDeletion">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center"><?php echo $modal[$_SESSION['language']]['profiledeletion']['title']; ?></h4>
			</div>

			<!-- The messages container -->
			<div id="profiledeletion-errors" class="text-left col-lg-offset-1 modal-errors"></div>
			<form role="form" data-toggle="validator" class="form-horizontal" name="profiledeletionForm" id="profiledeletionForm" method="post" action="">
			<div class="modal-body">

				<div class="form-group">
					<div class="col-lg-4 col-lg-offset-1">
						<label for="final_deletion_string"><?php echo $modal[$_SESSION['language']]['profiledeletion']['field'][0]['desc']; ?>&nbsp;&#42;</label>
					</div>

					<div class="col-lg-6">
						<input type="text" class="form-control" id="final_deletion_string" name="final_deletion_string" placeholder="<?php echo $value['placeholder']; ?>"/>
					</div>
				</div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal[$_SESSION['language']]['generic']['closed']; ?></button>
				<button type="button" value="Submit" class="btn btn-danger"><?php echo $modal[$_SESSION['language']]['profiledeletion']['check']['desc']; ?></button>
			</div>
			</form>
		</div>
	</div>
</div>
