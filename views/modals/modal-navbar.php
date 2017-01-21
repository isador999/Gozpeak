
<div class="modal fade" style="display:none;" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="ModalInscription">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center" id="ModalInscription"><?php echo $modal[$_SESSION['language']]['inscription']['title']; ?></h4>
			</div>

			<!-- The messages container -->
			<div id="inscription-errors" class="text-left col-lg-offset-1 modal-errors"></div>

			<form role="form" class="form-horizontal inscriptionForm" id="inscriptionForm" name="inscriptionForm" method="post" action="<?php echo $baseUrl .'/controllers/inscription.php' ?>">

				<div class="modal-body">
					<?php foreach($modal[$_SESSION['language']]['inscription']['field'] as $key => $value){
						if (isset($value['mandatory'])) { ?>

							<div class="form-group">
								<div class="col-lg-4 col-lg-offset-1">
									<label for="<?php echo $value['mandatory']['input']; ?>"><?php echo $value['mandatory']['desc']; ?>&nbsp;&#42;</label>
								</div>

								<div class="col-lg-6">
									<input type="<?php echo $value['mandatory']['type']; ?>" class="form-control" id="<?php echo $value['mandatory']['input']; ?>" name="<?php echo $value['mandatory']['input']; ?>" placeholder="<?php echo $value['mandatory']['placeholder']; ?>" required />
								</div>
							</div>
						<?php }
					} ?>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
					<button type="<?php echo $modal['fr']['inscription']['check']['type']; ?>" value=<?php echo $modal['fr']['inscription']['check']['submit']; ?> class="btn btn-primary pull-right"><?php echo $modal['fr']['inscription']['check']['desc']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>




<div class="modal fade" style="display:none;" id="modalConnection" tabindex="-1" role="dialog" aria-labelledby="ModalConnection">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center" id="ModalConnection"><?php echo $modal[$_SESSION['language']]['connection']['title']; ?></h4>
			</div>

			<!-- The messages container -->
			<div id="connect-errors" class="text-left col-lg-offset-1 modal-errors"></div>
			<form role="form" data-toggle="validator" class="form-horizontal connectionForm" name="connectionForm" id="connectionForm" method="post" action="<?php echo $baseUrl.'/controllers/connexion.php' ?>">
				<div class="modal-body">
					<?php foreach($modal[$_SESSION['language']]['connection']['field'] as $key => $value){ ?>

						<div class="form-group">
							<div class="col-lg-3 col-lg-offset-1">
								<label for="<?php echo $value['mandatory']['input']; ?>"><?php echo $value['mandatory']['desc']; ?>&nbsp;&#42;</label>
							</div>

							<div class="col-lg-7">
								<input type="<?php echo $value['mandatory']['type']; ?>" class="form-control" id="<?php echo $value['mandatory']['input']; ?>" name="<?php echo $value['mandatory']['input']; ?>" placeholder="<?php echo $value['mandatory']['placeholder']; ?>"/>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link left" data-dismiss="modal" data-toggle="modal" data-target="#modalForgottenPass"> <?php echo $modal['fr']['connection']['check']['link']; ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
					<button type="<?php echo $modal['fr']['connection']['check']['type']; ?>" value="<?php echo $modal['fr']['connection']['check']['submit']; ?>" class="btn btn-primary"><?php echo $modal['fr']['connection']['check']['desc']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- ### BEGIN Password Modals - ChangePass AND ForgottenPass ### BEGIN -->
<!-- Modal ForgotPassword -->
<div class="modal fade" style="display:none;" id="modalForgottenPass" tabindex="-1" role="dialog" aria-labelledby="ModalForgottenPass">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
      <div class="modal-header">
	     	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	     	<h4 class="modal-title text-center" id="ModalForgottenPass"><?php echo $modal[$_SESSION['language']]['forgotpass']['title']; ?></h4>
    	</div>

			<!-- The messages container -->
    	<div id="forgotpass-errors" class="text-left col-lg-9 col-lg-offset-1 modal-errors"></div>
			<form role="form" data-toggle="validator" class="form-horizontal forgotpassForm" id="forgotpassForm" name="forgotpassForm" method="post" action="<?php echo $baseUrl.'/controllers/forgotpass.php' ?>">
				<div class="modal-body">
					<?php foreach($modal[$_SESSION['language']]['forgotpass']['field'] as $key => $value){ ?>
    				<div class="form-group">
							<div class="col-lg-6 col-lg-offset-1">
        				<label for="<?php echo $value['input']; ?>"><?php echo $value['desc']; ?>&nbsp;&#42;</label>
							</div>

							<div class="col-lg-8 col-lg-offset-1">
								<input type="<?php echo $value['type']; ?>" class="form-control" id="<?php echo $value['input']; ?>" name="<?php echo $value['input']; ?>" placeholder="<?php echo $value['placeholder']; ?>"/>
        			</div>
  					</div>
    			<?php } ?>
    		</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
					<button type="<?php echo $modal['fr']['forgotpass']['check']['type']; ?>" value="<?php echo $modal['fr']['forgotpass']['check']['submit']; ?>" class="btn btn-primary"><?php echo $modal['fr']['forgotpass']['check']['desc']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
