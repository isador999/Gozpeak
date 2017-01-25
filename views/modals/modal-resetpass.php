<!-- Modal ResetPassword -->
<div class="modal fade" style="display:none;" id="modalResetPassword"  tabindex="-1"  role="dialog" aria-labelledby="ModalResetPassword">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
  		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	<h4 class="modal-title"><?php echo $modal[$_SESSION['language']]['resetpass']['title']; ?></h4>
  		</div>

				<!-- The messages container -->
			<div id="resetpass-errors" class="resetpass-errors"></div>
			<form role="form" data-toggle="validator" class="form-horizontal resetpassForm" name="resetpassForm" id="resetpassForm" method="post" action="<?php echo $baseUrl.'/controllers/reset_user_password.php' ?>">
				<div class="modal-body">
    			<?php foreach($modal[$_SESSION['language']]['resetpass']['field'] as $key => $value){ ?>
        		<div class="form-group">
							<label class="col-lg-4 control-label right-modal" for="<?php echo $value['desc']; ?>"><?php echo $value['desc']; ?>&nbsp;&#42;</label>
							<div class="col-lg-7">
              	<input type="<?php echo $value['type']; ?>" class="form-control" id="<?php echo $value['input']; ?>" name="<?php echo $value['input']; ?>" placeholder="<?php echo $value['placeholder']; ?>"/>
            	</div>
						</div>
					<?php } ?>
				</div>

				<div class="modal-footer">
      		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal[$_SESSION['language']]['generic']['closed']; ?></button>
					<button type="submit" value="Submit" class="btn btn-primary pull-right"><?php echo $modal[$_SESSION['language']]['resetpass']['check']['desc']; ?></button>
      	</div>
			</form>
		</div>
	</div>
</div>
