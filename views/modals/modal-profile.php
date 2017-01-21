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
							<label for="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['desc']; ?>"><?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['desc']; ?>&nbsp;&#42;</label>
						</div>
						<div class="col-lg-5">
							<input type="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['type']; ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['input']; ?>" title="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['title']; ?>" name="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['pseudo']['placeholder']; ?>" disabled required />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['desc']; ?>"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['type']; ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][0]['placeholder']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['desc']; ?>"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['type']; ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][1]['placeholder']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['desc']; ?>"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['desc']; ?>&nbsp;&#42;</label>
						</div>
						<div class="col-lg-5">
							<input type="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['type']; ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][2]['placeholder']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['desc']; ?>"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['type']; ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][3]['placeholder']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label for="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['desc']; ?>"><?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['desc']; ?></label>
						</div>
						<div class="col-lg-5">
							<input type="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['type']; ?>" class="form-control datetime-btn" id="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['profile']['edition']['field'][4]['placeholder']; ?>"/>
						</div>
					</div>
					<script type="text/javascript">
						showDatetimePicker();
					</script>

					<!-- Begin of MultiSelects (languages) -->
					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
        			<label for="<?php echo $modal[$_SESSION['language']]['profile']['edition']['select']['lang']['for']; ?>"> <?php echo $modal[$_SESSION['language']]['profile']['edition']['select']['lang']['label']; ?> </label>
						</div>

						<div class="col-lg-5">
            	<select class="form-control" name="profile_languages" multiple>
								<?php foreach($modal[$_SESSION['language']]['select']['lang']['option'] as $key => $lang){ ?>
									<option value="<?php echo $lang['value']; ?>"> <?php echo $lang['entry'] ?></option>
								<?php } ?>
            	</select>
							<br>
							<i> <?php echo $modal[$_SESSION['language']]['profile']['edition']['select']['lang']['help']; ?> </i>
        		</div>
    			</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
					<button type="button" value="<?php echo $modal[$_SESSION['language']]['profile']['edition']['check']['submit']; ?>" class="btn btn-primary"><?php echo $modal[$_SESSION['language']]['profile']['edition']['check']['desc']; ?></button>
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
				<h4 class="modal-title text-center"><?php echo $modal[$_SESSION['language']]['profile']['changepass']['title']; ?></h4>
			</div>

			<!-- The messages container -->
			<div id="changepass-errors" class="text-left col-lg-offset-1 modal-errors"></div>
			<form role="form" data-toggle="validator" class="form-horizontal" name="changepassForm" id="changepassForm" method="post" action="<?php echo $baseUrl.'/controllers/setnewpass.php' ?>">
				<div class="modal-body">
					<?php foreach($modal[$_SESSION['language']]['profile']['changepass']['field'] as $key => $value) { ?>
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
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
					<button type="<?php echo $modal[$_SESSION['language']]['changepass']['check']['type']; ?>" value="<?php echo $modal[$_SESSION['language']]['changepass']['check']['submit']; ?>" class="btn btn-primary"><?php echo $modal[$_SESSION['language']]['changepass']['check']['desc']; ?></button>
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
				<?php foreach($modal[$_SESSION['language']]['profiledeletion']['field'] as $key => $value){ ?>
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
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
				<button type="button" value="<?php echo $modal[$_SESSION['language']]['profiledeletion']['check']['submit']; ?>" class="btn btn-danger"><?php echo $modal[$_SESSION['language']]['profiledeletion']['check']['desc']; ?></button>
			</div>
			</form>
		</div>
	</div>
</div>
