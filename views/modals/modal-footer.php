<!-- Modal Contact -->
<div class="modal fade" style="display:none;" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContact">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center"> <?php echo $modal['fr']['contact']['title'] ?> </h4>
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
            	<label for="<?php echo $modal[$_SESSION['language']]['contact']['textarea']['input']; ?>"><?php echo $modal[$_SESSION['language']]['contact']['textarea']['desc']; ?>&nbsp;&#42;</label>
						</div>

						<div class="col-lg-5">
              <textarea rows=3 cols=10 class="form-control" id="<?php echo $modal[$_SESSION['language']]['contact']['textarea']['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['contact']['textarea']['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['contact']['textarea']['placeholder']; ?>" required></textarea>
            </div>
          </div>

					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-1">
							<label><?php echo $modal[$_SESSION['language']]['contact']['captcha']['desc']; ?>&nbsp;&#42; <br> <span id="captchaOperation"> </span> </label>
						</div>

						<div class="col-lg-4">
							<input class="form-control" type="number" name="<?php echo $modal[$_SESSION['language']]['contact']['captcha']['input']; ?>" id="verify" placeholder="<?php echo $modal[$_SESSION['language']]['contact']['captcha']['placeholder'] ?>" required />
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal[$_SESSION['language']]['generic']['closed']; ?></button>
					<button type="submit" value="<?php echo $modal[$_SESSION['language']]['contact']['check']['submit']; ?>" class="btn btn-primary"><?php echo $modal[$_SESSION['language']]['contact']['check']['desc']; ?></button>
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
				<p><?php echo $modal[$_SESSION['language']]['what'][0]; ?></p>
				<p class="center"><img src="<?php echo $modal[$_SESSION['language']]['what'][1]['img']; ?>" alt="<?php echo $modal[$_SESSION['language']]['what'][1]['alt']; ?>" title="<?php echo $modal[$_SESSION['language']]['what'][1]['title']; ?>" /></p>
				<p><img src="<?php echo $modal[$_SESSION['language']]['what'][2]['img']; ?>" alt="<?php echo $modal[$_SESSION['language']]['what'][2]['alt']; ?>" title="<?php echo $modal[$_SESSION['language']]['what'][2]['title']; ?>" />
				&nbsp;<?php echo $modal['fr']['what'][2]['text']; ?></p>
				<p class="center"><?php echo $modal['fr']['what'][3]['text']; ?></p>
				<p>&nbsp;</p>
				<p class="center concept"><?php echo $modal['fr']['what'][3]['tab']; ?></p>
				<p>&nbsp;</p>
				<p><?php echo $modal['fr']['what'][4]; ?></p>
				<p><?php echo $modal['fr']['what'][5]['text']; ?>
				<img src="<?php echo $modal[$_SESSION['language']]['what'][5]['img']; ?>" alt="<?php echo $modal[$_SESSION['language']]['what'][5]['alt']; ?>" title="<?php echo $modal[$_SESSION['language']]['what'][5]['title']; ?>" /></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
			</div>
		</div>
	</div>
</div>
