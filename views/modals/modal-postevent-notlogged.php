

<div class="modal fade" style="display:none;" id="modalSelectQueryNotLogged" tabindex="-1" role="dialog" aria-labelledby="modalSelectQueryNotLogged">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-title text-center"> <?php echo $modal[$_SESSION['language']]['SelectQuery']['title']; ?> </div>
      </div>

      <div class="modal-body titleSelectQuery">
        <div class="text-center"> <?php echo $modal[$_SESSION['language']]['SelectQuery']['msg']; ?> </div>
        <div class="form-group">
        <?php foreach($modal[$_SESSION['language']]['SelectQuery']['field'] as $key => $value){ ?>
          <a class="col-lg-offset-1 col-lg-4" onclick="showModalEventWithQuery('<?php echo $value['logo']; ?>','<?php echo $value['color']; ?>','<?php echo $value['img']; ?>', '<?php echo $value['query']; ?>')"><img class="logo" alt="<?php echo $value['query']; ?>" src="<?php echo $value['logo'] ?>"></a> &nbsp;
        <?php } ?>
        </div>
      </div>

      <div class="modal-footer">
			  <div class="col-lg-offset-1 col-lg-10 text-left"> <u>Attention </u>:  Vous devez obligatoirement être connecté à votre compte Gozpeak pour pouvoir proposer une activité ! <br/>
        Si vous n'avez pas de compte, <a href="#" onclick="$('#modalSelectQueryNotLogged').modal('hide');" data-toggle="modal" data-target="#modalInscription"> Inscrivez-vous </a> gratuitement. <br>  Sinon : <a href="#" onclick="$('#modalSelectQueryNotLogged').modal('hide');" data-toggle="modal" data-target="#modalConnection"> Connectez-vous !</a> </div>
      </div> <!-- END OF FOOTER -->


    </div> <!-- END OF MODAL-CONTENT -->
  </div>
</div>
