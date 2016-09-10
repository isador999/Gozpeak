<div class="modal fade" id="modalSelectQuery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo $modal[$_SESSION['language']]['SelectQuery']['title']; ?></h4>
                        </div>
                        <div class="modal-body">
                                <p class="selectquery-msg"> Cliquez sur un logo pour choisir la catégorie de votre événement Gozpeak  </p>
                                <div class="form-group">
                                <?php foreach($modal[$_SESSION['language']]['SelectQuery']['field'] as $key => $value){ ?>
                                        <a onclick="showModalEventWithQuery('<?php echo $value['logo']; ?>','<?php echo $value['color']; ?>','<?php echo $value['img']; ?>', '<?php echo $value['query']; ?>')"><img class="logo" src="<?php echo $value['logo'] ?>"></a> &nbsp;
                                <?php } ?>
                                </div>
                        </div>
			<div class="modal-footer">
			<p style="text-align:left; padding-left:2%; font-size: 14px; font-style: italic; color:darkred"> <u>Attention </u>:  Vous devez obligatoirement être connecté à votre compte Gozpeak pour pouvoir proposer une activité ! <br/>
                        Si vous n'avez pas de compte, <a onclick="$('#modalSelectQuery').modal('hide'); showModalInscription()"> Inscrivez-vous </a> gratuitement.  Sinon : <a onclick="$('#modalSelectQuery').modal('hide'); showModalConnection()"> Connectez-vous !</a> </p>
                        </div>
                </div>
        </div>
</div>


