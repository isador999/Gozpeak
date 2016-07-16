<!-- Modal Inscription -->
<div class="modal fade" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="ModalInscription">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="ModalInscription"><?php echo $modal[$_SESSION['language']]['inscription']['title']; ?></h4>
			</div>
				<!-- Will be used to display an alert to the user> -->
				<?php //if(isset($result)) echo $result; ?>
			<div class="modal-body">
				<form role="form" class="form-horizontal inscriptionForm" id="inscriptionForm" name="inscriptionForm" method="post" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/inscription.php">
					<!-- The messages container -->
                			<div id="errors" class="inscription-errors"></div>
								<!-- <div class="alert-box success form-feedback"> Merci pour votre enregistrement !  Un lien de confirmation vous a été envoyé par mail.  Ce lien est valide pendant les prochaines 72H pour activer votre compte GoZpeak ;) </div>
								<div class="alert-box error form-feedback"> Oups... Désolé, vous devez remplir tous les champs pour vous inscrire. </div> -->
					<?php foreach($modal[$_SESSION['language']]['inscription']['field'] as $key => $value){ 
						if (isset($value['mandatory'])) { ?>
							<div class="form-group">
								<label class="col-lg-5 control-label right-modal"><?php echo $value['mandatory']['desc']; ?>&nbsp;&#42;</label>
								<div class="col-lg-7">
									<input type="<?php echo $value['mandatory']['type']; ?>" class="form-control" id="<?php echo $value['mandatory']['input']; ?>" name="<?php echo $value['mandatory']['input']; ?>" placeholder="<?php echo $value['mandatory']['placeholder']; ?>" required />
									<!-- <span class="input-group-addon">@</span> -->
									<!-- <span class="glyphicon form-control-feedback"></span> -->
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




<!-- INSCRIPTION SUCCEED MODAL -->
<div class="modal fade" id="modalInscriptionSucceed" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <a type="button" class="close hide-t-c" aria-hidden="true">×</a> -->
                <a type="button" aria-hidden="true">×</a>
                <h3 class="modal-title"> Inscription validée ! </h3>
            </div>
            <div class="modal-body">
                <p>Félicitations: </p>
                <h4 id="congratulations-user"></h4>

                <p> Merci de votre inscription ! 
		<br>Un mail de confirmation et un lien pour activer votre compte vous ont été envoyés sur votre adresse email.
		</p>

                <h5> </h5>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default btn-lg"
                        data-dismiss="modal">Close
                </button> -->
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<!-- Modal Connection -->
<div class="modal fade" id="modalConnection" tabindex="-1" role="dialog" aria-labelledby="ModalConnection">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="ModalConnection"><?php echo $modal[$_SESSION['language']]['connection']['title']; ?></h4>
			</div>
			<div class="modal-body">
				<form role="form" data-toggle="validator" class="form-horizontal connectionForm" name="connectionForm" id="connectionForm" method="post" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/connexion.php">
					<!-- The messages container -->
                			<div id="connect-errors" class="connect-errors"></div>
					<?php foreach($modal[$_SESSION['language']]['connection']['field'] as $key => $value){ ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value['mandatory']['desc']; ?>"><?php echo $value['mandatory']['desc']; ?>&nbsp;&#42;</label>
								<div class="col-lg-7">
									<input type="<?php echo $value['mandatory']['type']; ?>" class="form-control" id="<?php echo $value['mandatory']['input']; ?>" name="<?php echo $value['mandatory']['input']; ?>" placeholder="<?php echo $value['mandatory']['placeholder']; ?>"/>
								</div>
							</div>
						<?php } ?>
						<div class="form-group">
							</br>
						</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="forgotpasslink" class="btn btn-link left" data-dismiss="modal"> <?php echo $modal['fr']['connection']['check']['link']; ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
				<button type="<?php echo $modal['fr']['connection']['check']['type']; ?>" value="<?php echo $modal['fr']['connection']['check']['submit']; ?>" class="btn btn-primary"><?php echo $modal['fr']['connection']['check']['desc']; ?></button>
			</div>
			</form>
		</div>
	</div>
</div>




<!-- ### BEGIN Password Modals - ChangePass AND ForgottenPass ### BEGIN -->

<!-- Modal ForgotPassword -->
<div class="modal fade" id="modalForgottenPass"  tabindex="-1"  role="dialog" aria-labelledby="ModalForgottenPass">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		        <div class="modal-header">
			     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			     <h4 class="modal-title" id="ModalForgottenPass"><?php echo $modal[$_SESSION['language']]['forgotpass']['title']; ?></h4>
        		</div>
    
    			<div class="modal-body">
				<form role="form" data-toggle="validator" class="form-horizontal forgotpassForm" id="forgotpassForm" name="forgotpassForm" method="post" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/forgotpass.php">
				<!-- The messages container -->
               			<div id="forgotpass-errors" class="forgotpass-errors"></div><br>
				<?php foreach($modal[$_SESSION['language']]['forgotpass']['field'] as $key => $value){ ?>
        				<div class="form-group">
            					<label class="col-lg-4 control-label right-modal" for="<?php echo $value['desc']; ?>"><?php echo $value['desc']; ?>&nbsp;&#42;</label>
            					<div class="col-lg-7">
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




<!-- Modal EVENT With Query -->
<div class="modal fade" id="modalEventWithQuery" tabindex="-1" role="dialog" aria-labelledby="ModalEventQuery">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $modal[$_SESSION['language']]['event']['title']; ?></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<img src=" <?php #echo $modal[$_SESSION['language']]['query']['event']['img'] ?>">
				</div>
				<form role="form" data-toggle="validator" class="eventForm" name="eventForm" id="eventForm" method="post" action="">
					<?php foreach($modal[$_SESSION['language']]['event']['field'] as $key => $value){
						if (isset($value['mandatory'])) { ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value['mandatory']; ?>"><?php echo $value['mandatory']; ?>&nbsp;&#42;</label>
								<div class="col-lg-7">
									<input type="text" class="form-control" id="<?php echo $value['mandatory']; ?>" name="<?php echo $value['mandatory']; ?>" placeholder="<?php echo $value['mandatory']; ?>"/>
								</div>
							</div>
							<br>
						<?php } elseif(isset($value['select'])) { ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value['select']['mandatory']; ?>"><?php echo $value['select']['mandatory']; ?>&nbsp;&#42;</label>
								<select required>
									 <?php foreach($modal[$_SESSION['language']]['lang'] as $key => $lang){ ?>
									 	<option value="<?php echo $lang; ?>"> <?php echo $lang ?></option>
									 <?php } ?>
								</select>
							</div>
						<?php } else { ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value; ?>"><?php echo $value; ?></label>
								<div class="col-lg-7">
									<input type="text" class="form-control" id="<?php echo $value; ?>" name="<?php echo $value; ?>" placeholder="<?php echo $value; ?>"/>
								</div>
							</div>
						<?php }
					} ?>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
				<button type="button" class="btn btn-primary"><?php echo $modal['fr']['event']['check']; ?></button>
			</div>
		</div>
	</div>
</div>





<!-- Modal EVENT -->
<div class="modal fade" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $modal[$_SESSION['language']]['event']['title']; ?></h4>
			</div>
			<div class="modal-body">
				<form role="form" data-toggle="validator" class="eventForm" name="eventForm" id="eventForm" method="post" action="">
					<div class="form-group">
					<?php foreach($modal[$_SESSION['language']]['event']['logo'] as $key => $logo){ ?>
						<a onclick="selectQuery('<?php echo $logo; ?>')"><img class="logo" src="<?php echo $logo ?>"></a>
					<?php } ?>
					</div>
					<?php foreach($modal[$_SESSION['language']]['event']['field'] as $key => $value){
						if (isset($value['mandatory'])) { ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value['mandatory']; ?>"><?php echo $value['mandatory']; ?>&nbsp;&#42;</label>
								<div class="col-lg-7">
									<input type="text" class="form-control" id="<?php echo $value['mandatory']; ?>" name="<?php echo $value['mandatory']; ?>" placeholder="<?php echo $value['mandatory']; ?>"/>
								</div>
							</div>
							<br>
						<?php } elseif(isset($value['select'])) { ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value['select']['mandatory']; ?>"><?php echo $value['select']['mandatory']; ?>&nbsp;&#42;</label>
								<select required>
									 <?php foreach($modal[$_SESSION['language']]['lang'] as $key => $lang){ ?>
									 	<option value="<?php echo $lang; ?>"> <?php echo $lang ?></option>
									 <?php } ?>
								</select>
							</div>
						<?php } else { ?>
							<div class="form-group">
								<label class="col-lg-4 control-label right-modal" for="<?php echo $value; ?>"><?php echo $value; ?></label>
								<div class="col-lg-7">
									<input type="text" class="form-control" id="<?php echo $value; ?>" name="<?php echo $value; ?>" placeholder="<?php echo $value; ?>"/>
								</div>
							</div>
						<?php }
					} ?>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
				<button type="button" class="btn btn-primary"><?php echo $modal['fr']['event']['check']; ?></button>
			</div>
		</div>
	</div>
</div>
