<script src="views/js/jquery-1.12.4.min.js"></script>
<script src="views/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="views/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script src="views/js/formValidation.min.js"></script>
<script src="views/js/bootstrap-formValidation.min.js"></script>
<script src="views/js/jquery.postevent.js"></script>


<div class="modal fade" id="modalSelectQuery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo $modal[$_SESSION['language']]['SelectQuery']['title']; ?></h4>
                        </div>
                        <div class="modal-body">
                                <p class="selectquery-msg"> <?php echo $modal[$_SESSION['language']]['SelectQuery']['msg'] ?> </p>
                                <div class="form-group">
                                <?php foreach($modal[$_SESSION['language']]['SelectQuery']['field'] as $key => $value){ ?>
                                        <a onclick="showModalEventWithQuery('<?php echo $value['logo']; ?>','<?php echo $value['color']; ?>','<?php echo $value['img']; ?>', '<?php echo $value['query']; ?>')"><img class="logo" src="<?php echo $value['logo'] ?>"></a> &nbsp;
                                <?php } ?>
                                </div>

                        </div>
                </div>
        </div>
</div>



<!-- Modal EVENT With Query -->
<div class="modal fade" id="modalEventWithQuery" tabindex="-1" role="dialog" aria-labelledby="ModalEventWithQuery">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo $modal[$_SESSION['language']]['postevent']['title']; ?> <span> <img id="EventWithQueryTitle"></span> </h4>
                        </div>
                        <div class="modal-body">
                                <div class="EventWithQueryImg">
                                        <img id="EventWithQueryImg">
                                        <br/>
                                </div>
                                <div class="EventWithQueryContent">
                                        <form role="form" data-toggle="validator" class="vertical-form posteventForm" name="eventForm" id="eventForm" method="post" action="<?php echo "$gozpeak_protocol"."$gozpeak_host"?>/controllers/postevent.php">
					<div id="errors" class="postevent-errors"></div>
                                                <?php foreach($modal[$_SESSION['language']]['postevent']['field'] as $key => $value){ ?>
                                                                <br>
                                                <?php if (isset($value['mandatory']) && (!isset($value['mandatory']['js']))) { ?>
                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $value['mandatory']['input']; ?>"><?php echo $value['mandatory']['desc']; ?>&nbsp;&#42;</label>
                                                                        <div class="col-lg-7">
                                                                                <input type="<?php echo $value['mandatory']['type'] ?>" class="form-control" id="<?php echo $value['mandatory']['input']; ?>" name="<?php echo $value['mandatory']['input']; ?>" placeholder="<?php echo $value['mandatory']['placeholder']; ?>" required />
                                                                        </div>
                                                                </div>
                                                        <?php } elseif (isset($value['mandatory']['js'])) { ?>
                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $value['mandatory']['input']; ?>"><?php echo $value['mandatory']['desc']; ?>&nbsp;&#42;</label>
                                                                        <input id="datetime-btn" class="form-control"  type="<?php echo $value['mandatory']['type'] ?>" name="<?php echo $value['mandatory']['input']; ?>" placeholder="<?php echo $value['mandatory']['placeholder']; ?>" required /> <!-- <a href="#" id="datetime-btn"> <span class="input-group-addon glyphicon glyphicon-calendar"></span></a>-->
                                                                </div>
								<script type="text/javascript">
								    <?php echo $value['mandatory']['js']; ?>
                                                                </script>
                                                        <?php } else { ?>
                                                                <div class="form-group">
                                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $value['input']; ?>"><?php echo $value['desc']; ?></label>
                                                                        <div class="col-lg-7">
                                                                                <input type="<?php echo $value['type'] ?>" class="form-control" id="<?php echo $value['input']; ?>" name="<?php echo $value['input']; ?>" placeholder="<?php echo $value['placeholder']; ?>"/>
                                                                        </div>
                                                                </div>
                                                        <?php }
                                                } ?>
                                                <br>
						<?php foreach($modal[$_SESSION['language']]['postevent']['select'] as $key => $value) { ?>
                                                <div class="form-group">
                                                        <label class="col-lg-4 control-label right-modal" for="<?php echo $value['arrayname']; ?>"><?php echo $value['label']; ?>&nbsp;&#42;</label>
                                                        <select class="form-control" name="<?php echo $value['arrayname']; ?>" required >
                                                                 <?php foreach($modal[$_SESSION['language']][$value['arrayname']] as $key => $lang){ ?>
                                                                        <option value="<?php echo $lang['value']; ?>"> <?php echo $lang['entry'] ?></option>
                                                                 <?php } ?>
                                                        </select>
                                                </div>
                                                <?php } ?>
						<input id="hiddenInput" type="hidden" name="query">
                                </div>
                        </div>
                        <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><?php #echo $modal['fr']['generic']['closed']; ?></button> -->
                                <!-- <button type="button" class="btn btn-primary"><?php #echo $modal['fr']['postevent']['check']; ?></button> -->
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
                                <button type="<?php echo $modal['fr']['postevent']['check']['type']; ?>" value=<?php echo $modal['fr']['postevent']['check']['submit']; ?> class="btn btn-primary pull-right"><?php echo $modal['fr']['postevent']['check']['desc']; ?></button>
                        </div>
                        </form>
                </div>
        </div>
</div>


