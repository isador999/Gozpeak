<!-- Modal Contact -->
<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Restez en contact avec nous :</h4>
			</div>

			<div id="message" class="center form-wrapper modal-body">
			<form role="form" data-toggle="validator" method="post" name="contactform" id="contactform" class="contactform" action="https://demo.gozpeak.com/index.php?page=contact">
                                <input type="text" name="name" placeholder="Nom" id="name" />
                                <input type="text" name="email" placeholder="Email" id="email" />
                                <input type="text" name="subject" placeholder="Sujet" id="subject" />
                                <textarea placeholder="Message" name="comments" id="comments"></textarea>
				<br>
				<div class="center" id="captcha">
					<span>3+1=</span>
					<input type="text" name="verify" id="verify" />
				</div>

				<input type="submit" id="ssubmit" name="subscribe" value="SOUSCRIRE" class="orange" />
			</form>

			</div>

			<div class="modal-footer">
				<button onclick="closedContact()" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
			</div>
		</div>
	</div>
</div>



<!-- Modal What -->
<div class="modal fade" id="modalWhat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $modal[$_SESSION['language']]['what']['title']; ?></h4>
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

