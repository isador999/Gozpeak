<!-- Modal Contact -->
<div class="modal fade" style="display:none;" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContact">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center"> <?php echo $modal[$_SESSION['language']]['contact']['title'] ?> </h4>
			</div>

			<div id="contact-errors" class="text-left col-lg-offset-1 modal-errors"></div>
			<form role="form" class="form-horizontal contactForm" id="contactForm" name="contactForm" method="post" action="<?php echo $baseUrl.'/controllers/contact.php' ?>">
				<div class="modal-body">
					<?php foreach($modal[$_SESSION['language']]['contact']['field'] as $key => $value) { ?>
						<div class="form-group">
							<div class="col-lg-4 col-lg-offset-1">
								<label><?php echo $value['desc']; ?>&nbsp;&#42;</label>
							</div>

							<div class="col-lg-5">
           			<input type="<?php echo $value['type']; ?>" class="form-control" id="<?php echo $value['input']; ?>" name="<?php echo $value['input']; ?>" placeholder="<?php echo $value['placeholder']; ?>" required/>
							</div>
						</div>
        	<?php } ?>

          <div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
            	<label for="contact_message"><?php echo $modal[$_SESSION['language']]['contact']['textarea']['desc']; ?>&nbsp;&#42;</label>
						</div>

						<div class="col-lg-5">
              <textarea rows=3 cols=10 class="form-control" id="contact_message" name="contact_message" placeholder="<?php echo $modal[$_SESSION['language']]['contact']['textarea']['placeholder']; ?>" required></textarea>
            </div>
          </div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label><?php echo $modal[$_SESSION['language']]['contact']['captcha']['desc']; ?>&nbsp;&#42; <br> <span id="captchaOperation"> </span> </label>
						</div>

						<div class="col-lg-4">
							<input class="form-control" type="number" name="contact_captcha" id="verify" placeholder="<?php echo $modal[$_SESSION['language']]['contact']['captcha']['placeholder'] ?>" required />
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal[$_SESSION['language']]['generic']['closed']; ?></button>
					<button type="submit" value="Submit" class="btn btn-primary"><?php echo $modal[$_SESSION['language']]['contact']['check']['desc']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal What -->
<div class="modal fade" style="display:none;" id="modalWhat" tabindex="-1" role="dialog" aria-labelledby="modalWhat">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo $modal[$_SESSION['language']]['what']['title']; ?></h4>
			</div>

			<div class="modal-body">
				<?php echo $modal[$_SESSION['language']]['what'][0]['presentation']; ?>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal[$_SESSION['language']]['generic']['closed']; ?></button>
			</div>
		</div>
	</div>
</div>
