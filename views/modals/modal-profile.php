<!-- Modal Profile -->
<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="ModalProfile">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="ModalProfile"><?php echo $modal[$_SESSION['language']]['profile']['title']; ?></h4>
			</div>
			<div class="modal-body">
				<form role="form" data-toggle="validator" class="form-vertical" name="profileForm" id="profileForm" method="post" action="">
					<?php foreach($modal[$_SESSION['language']]['profile']['field'] as $key => $value){ ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value['desc']; ?>"><?php echo $value['desc']; ?>&nbsp;&#42;</label>
								<div class="col-lg-7">
									<input type="<?php echo $value['type']; ?>" class="form-control" id="<?php echo $value['input']; ?>" name="<?php echo $value['input']; ?>" placeholder="<?php echo $value['placeholder']; ?>"/>
								</div>
							</div>
						<?php }
					?>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
				<button type="button" value="<?php echo $modal['fr']['profile']['check']['submit']; ?>" class="btn btn-primary"><?php echo $modal['fr']['profile']['check']['desc']; ?></button>
			</div>
			</form>
		</div>
	</div>
</div>

