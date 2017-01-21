<script src="views/js/jquery.postevent.js"></script>

<div class="modal fade" style="display:none;" id="modalSelectQuery" tabindex="-1" role="dialog" aria-labelledby="modalSelectQuery">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-title text-center"> <?php echo $modal[$_SESSION['language']]['SelectQuery']['title']; ?> </div>
      </div>

      <div class="modal-body titleSelectQuery">
        <div class="container-fluid">
          <div class="row text-center">
            <?php echo $modal[$_SESSION['language']]['SelectQuery']['msg']; ?>
          </div>

          <div class="row form-group">
              <?php foreach($modal[$_SESSION['language']]['SelectQuery']['field'] as $key => $value){ ?>
                <a class="col-lg-offset-1 col-lg-4" onclick="showModalEventWithQuery('<?php echo $value['logo']; ?>','<?php echo $value['color']; ?>','<?php echo $value['img']; ?>', '<?php echo $value['query']; ?>')"><img class="logo" alt="<?php echo $value['query']; ?>" src="<?php echo $value['logo'] ?>"></a> &nbsp;
              <?php } ?>
          </div>
        </div>
      </div>

      <div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" style="display:none;" id="modalEventWithQuery" tabindex="-1" role="dialog" aria-labelledby="ModalEventWithQuery">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center"><?php echo $modal[$_SESSION['language']]['postevent']['title']; ?> <span> <img id="EventWithQueryTitle"></span> </h4>
      </div>

      <form role="form" data-toggle="validator" class="vertical-form posteventForm" name="eventForm" id="eventForm" method="post" action="<?php echo $baseUrl.'/controllers/postevent.php' ?>">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div id="postevent-errors" class="text-left col-lg-offset-1 modal-errors"></div>
            </div>

            <div class="row">
              <div class="col-lg-5 EventWithQueryImg">
                <img style="width: 92%;" id="EventWithQueryImg" alt="logo">
              </div>

              <!-- Name et Place of event -->
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="text-left" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['desc']; ?>&nbsp;&#42;</label>
                  <div class="text-left">
                    <input type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['type'] ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent']['field'][0]['placeholder']; ?>" required />
                  </div>
                </div>

                <div class="form-group">
                  <label class="text-left" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['desc']; ?>&nbsp;&#42;</label>
                  <div class="text-left">
                    <input type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['type'] ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent']['field'][1]['placeholder']; ?>" required />
                  </div>
                </div>
                <!-- End of eventplace and eventname -->
              </div>
            </div>

            <!-- Second block form-group, only for textarea -->
            <div class="row">
              <div class="col-lg-offset-1">
                <div class="row">
                  <div class="form-group col-lg-8">
                    <label class="text-left" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['desc']; ?>&nbsp;&#42;</label>
                    <div class="text-left">
                      <textarea rows=5 cols=8 class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent']['field'][2]['placeholder']; ?>" required></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Third block form-group, for eventdesc, select date/hour, etc... -->
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <div class="row">
                  <div class="col-lg-5 form-group">
                    <label class="text-left" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['desc']; ?>&nbsp;&#42;</label>
                    <input id="datetime-btn-event" class="form-control datetime-btn"  type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['type'] ?>" name="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent']['field'][3]['placeholder']; ?>" required />
                  </div>
                  <script type="text/javascript">
                    showDatetimePicker();
                  </script>

                  <div class="col-lg-5 form-group">
                    <label class="text-left" for="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['input']; ?>"><?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['desc']; ?></label>
                    <div class="text-left">
                      <input type="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['type'] ?>" class="form-control" id="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['input']; ?>" name="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['input']; ?>" placeholder="<?php echo $modal[$_SESSION['language']]['postevent']['field'][4]['placeholder']; ?>" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Selects block -->
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <div class="row">
                  <div class="col-lg-5 form-group">
                    <label for="<?php echo $modal[$_SESSION['language']]['select']['lang']['input']; ?>"><?php echo $modal[$_SESSION['language']]['select']['lang']['label']; ?>&nbsp;&#42;</label>
                    <select id="<?php echo $modal[$_SESSION['language']]['select']['lang']['input']; ?>" class="form-control" name="<?php echo $modal[$_SESSION['language']]['select']['lang']['name']; ?>" required >
                      <?php foreach($modal[$_SESSION['language']]['select']['lang']['option'] as $key => $lang){ ?>
                        <option value="<?php echo $lang['value']; ?>"> <?php echo $lang['entry']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-lg-5 form-group">
                    <label for="<?php echo $modal[$_SESSION['language']]['select']['langlevel']['input']; ?>"><?php echo $modal[$_SESSION['language']]['select']['langlevel']['label']; ?>&nbsp;&#42;</label>
                    <select id="<?php echo $modal[$_SESSION['language']]['select']['langlevel']['input']; ?>" class="form-control" name="<?php echo $modal[$_SESSION['language']]['select']['langlevel']['name']; ?>" required >
                      <?php foreach($modal[$_SESSION['language']]['select']['langlevel']['option'] as $key => $lang){ ?>
                        <option value="<?php echo $lang['value']; ?>"> <?php echo $lang['entry']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <input id="hiddenInput" type="hidden" name="query">
          </div>
        <!-- End of Modal Body -->
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
          <button type="<?php echo $modal[$_SESSION['language']]['postevent']['check']['type']; ?>" value=<?php echo $modal[$_SESSION['language']]['postevent']['check']['submit']; ?> class="btn btn-primary pull-right"><?php echo $modal[$_SESSION['language']]['postevent']['check']['desc']; ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
