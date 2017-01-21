<!-- Modal What -->
<div class="modal fade" style="display:none;" id="modal-displaymembers" tabindex="-1" role="dialog" aria-labelledby="modalDisplayMembers">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title displaymembers"><?php echo $form[$_SESSION['language']]['displaymembers']['title']; ?></h4>
			</div>
			<div class="modal-body">
				<br>
				<i><div style="font-size: 18px; color: darkred;" id="ajaxupdate"> </div></i>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $modal['fr']['generic']['closed']; ?></button>
			</div>
		</div>
	</div>
</div>
