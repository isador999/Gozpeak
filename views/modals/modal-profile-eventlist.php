<!-- Modal What -->
<div class="modal fade" style="display:none;" id="modalProfileEventListing" tabindex="-1" role="dialog" aria-labelledby="modalProfileEventListing">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo $modal[$_SESSION['language']]['profile']['eventlist']['title']; ?></h4>
			</div>
			<div class="modal-body">

				<div class="listing-events row">
					<div class="table-responsive eventsblock col-lg-offset-1 col-lg-10">

						<fieldset class="scheduler-border">
							<legend class="scheduler-border row">
								<div class="col-lg-8 col-md-6 ideas-title">
									Vos <img src="<?php echo $baseUrl.'views/images/zpeak_bleu.png' ?>" style="width:20%;" alt="Zpeak"/> idées postées
								</div>
							</legend>

							<div id="empty-ideas-message-profile" class="empty-events text-center alert-info"><?php echo $modal[$_SESSION['language']]['profile']['eventlist']['empty']; ?></div>

							<table id="table-ideas-profile" class="table table-striped table-hover">
						  	<thead>
									<tr class="row">
										<th>Langue&nbsp;</th>
										<th>Catégorie&nbsp;</th>
			              <th>Idée&nbsp;</th>
			              <th>Date&nbsp;</th>
			              <th>Heure&nbsp;</th>
									</tr>
						  	</thead>

			        	<tbody>

						  	</tbody>
							</table>
						</fieldset>
					</div>
				</div>

				<div class="row pageblock text-center">
					<ul class="pagination pagination-lg pagination_idea">

					</ul>
				</div>


			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
			</div>
		</div>
	</div>
</div>
