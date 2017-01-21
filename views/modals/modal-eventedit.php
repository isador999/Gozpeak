<!-- <script src="views/js/jquery-1.12.4.min.js"></script>
<script src="views/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="views/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script src="views/js/formValidation.min.js"></script>
<script src="views/js/bootstrap-formValidation.min.js"></script> -->
<script src="views/js/jquery.postevent.js"></script>

<!-- Modal EventDeletion -->
<div class="modal fade" style="display:none;" id="modalEventDeletion" tabindex="-1" role="dialog" aria-labelledby="ModalEventDeletion">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalEventDeletion"><?php echo $modal[$_SESSION['language']]['eventdeletion']['title']; ?></h4>
			</div>
			<div class="modal-body">
				<form role="form" data-toggle="validator" class="form-vertical" name="eventdeletionForm" id="eventdeletionForm" method="post" action="">
					<!-- The messages container -->
                                        <div id="eventdeletion-errors" class="eventdeletion-errors"></div>
					<?php foreach($modal[$_SESSION['language']]['eventdeletion']['field'] as $key => $value){ ?>
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
				<button type="button" value="<?php echo $modal['fr']['eventdeletion']['check']['submit']; ?>" class="btn btn-danger"><?php echo $modal['fr']['eventdeletion']['check']['desc']; ?></button>
			</div>
			</form>
		</div>
	</div>
</div>





<!-- Modal EVENT Edition -->
<div class="modal fade" id="modalEventEdit" tabindex="-1" role="dialog" aria-labelledby="ModalEventEdit">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo $modal[$_SESSION['language']]['eventedit']['title']; ?> <span> <img id="EventEditTitle"> </span> </h4>
                        </div>
                        <div class="modal-body">
				<div class="EventEditImg">
                                        <img id="EventEditImg">
                                        <br>
                                </div>
                                <div class="EventEditContent">
                                        <form role="form" data-toggle="validator" class="vertical-form posteventeditForm" name="eventeditForm" id="eventeditForm" method="post" action="<?php echo $baseUrl.'/controllers/eventupdate.php' ?>">
					<div id="errors" class="eventedit-errors"></div>
                                                                <br>
                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['mandatory']['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['mandatory']['desc']; ?>&nbsp;&#42;</label>
                                                                        <div class="col-lg-7">
                                                                                <input id="ajaxupdate-fieldone" type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['mandatory']['type'] ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['mandatory']['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent'][0]['mandatory']['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent'][0]['mandatory']['placeholder']; ?>" required />
                                                                        </div>
                                                                </div>
                                                                <br>
                                                                <br>

                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['mandatory']['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['mandatory']['desc']; ?>&nbsp;&#42;</label>
                                                                        <div class="col-lg-7">
                                                                                <input id="ajaxupdate-fieldtwo" type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['mandatory']['type'] ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['mandatory']['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent'][1]['mandatory']['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent'][1]['mandatory']['placeholder']; ?>" required />
                                                                        </div>
                                                                </div>
                                                                <br>
                                                                <br>

                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['mandatory']['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['mandatory']['desc']; ?>&nbsp;&#42;</label>
                                                                        <div class="col-lg-7">
                                                                                <textarea rows="2" id="ajaxupdate-fieldthree" type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['mandatory']['type'] ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['mandatory']['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent'][2]['mandatory']['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent'][2]['mandatory']['placeholder']; ?>" required> </textarea>
                                                                        </div>
                                                                </div>
                                                                <br>
                                                                <br>

                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['mandatory']['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['mandatory']['desc']; ?>&nbsp;&#42;</label>
                                                                        <input id="datetime-btn ajaxupdate-fieldfour" class="form-control"  type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['mandatory']['type'] ?>" name="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['mandatory']['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['mandatory']['placeholder']; ?>" required />
                                                                </div>
                                                                <br>
                                                                <br>


                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['desc']; ?>&nbsp;&#42;</label>
                                                                        <div class="col-lg-7">
                                                                                <input id="ajaxupdate-fieldfour" type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['type'] ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent'][4]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent'][4]['placeholder']; ?>" required />
                                                                        </div>
                                                                </div>

                                                <br>
                                                <div class="form-group">
                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $modal[$_SESSION['language']]['postevent']['select']['lang']['arrayname']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['select']['lang']['label']; ?>&nbsp;&#42;</label>
                                                        <select class="form-control" name="<?php echo $modal[$_SESSION['language']]['postevent']['select']['lang']['arrayname']; ?>" required />
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang']['default']['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang']['default']['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang'][0]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang'][0]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang'][1]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang'][1]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang'][2]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang'][2]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang'][3]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang'][3]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang'][4]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang'][4]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang'][5]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang'][5]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['lang'][6]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['lang'][6]['entry'] ?></option>
                                                        </select>
                                                </div>


                                                <div class="form-group">
                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $modal[$_SESSION['language']]['postevent']['select']['langlevel']['arrayname']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['select']['langlevel']['label']; ?>&nbsp;&#42;</label>
                                                        <select class="form-control" name="<?php echo $modal[$_SESSION['language']]['postevent']['select']['langlevel']['arrayname']; ?>" required />
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['langlevel']['default']['value']; ?>"> <?php echo $modal[$_SESSION['language']]['langlevel']['default']['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['langlevel'][0]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['langlevel'][0]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['langlevel'][1]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['langlevel'][1]['entry'] ?></option>
                                                        	<option value="<?php echo $modal[$_SESSION['language']]['langlevel'][2]['value']; ?>"> <?php echo $modal[$_SESSION['language']]['langlevel'][2]['entry'] ?></option>
                                                        </select>
                                                </div>

                                                <?php #} ?>
						<input id="hiddenInput" type="hidden" name="query">
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
                                <button type="<?php echo $modal['fr']['eventedit']['check']['type']; ?>" value=<?php echo $modal['fr']['eventedit']['check']['submit']; ?> class="btn btn-primary pull-right"><?php echo $modal['fr']['eventedit']['check']['desc']; ?></button>
                        </div>
                        </form>
                </div>
        </div>
</div>
