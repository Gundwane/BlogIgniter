<table class="table table-condensed">
    <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
            <th>Imagen</th>
            <th>Publicado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($posts as $key => $post) { ?>
            <tr>
                <td><?php echo $post->post_id ?></td>
                <td><?php echo $post->title ?></td>
                <td><?php echo $post->description ?></td>
                <td><?php echo format_date ($post->created_at) ?></td> 
                <td><?php echo $post->image != "" ? '<img class="img-thumbnail img-presentation-small" src="'. base_url() . 'uploads/post/' . $post->image . '">' : "" ?></td>
                <td><?php echo $post->posted ?></td>
                <td>
                    <a href="<?php echo base_url() . 'admin/edit_post/' . $post->post_id?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href=""
                       data-post-id="<?php echo $post->post_id ?>"
                       class="btn btn-sm btn-danger" 
                       data-toggle="modal" 
                       data-target="#modalMensajeEliminar" 
                       btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="modal fade" id="modalMensajeEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="botonBorrarPost" type="button" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<script>
  var post_id;
  var botonBorrar;

  $('#modalMensajeEliminar').on('show.bs.modal', function (event) {
    botonBorrar = $(event.relatedTarget) // Button that triggered the modal
    post_id = botonBorrar.data('post-id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('¿Seguro que desea borrar el post seleccionado? ' + post_id)
    modal.find('.modal-body input').val(post_id)
  })

  $('#botonBorrarPost').click(function () {
      $.ajax({
          url: "<?php base_url() ?> post_delete/" + post_id,
      }).done(function (res) {
          if (res == 1) {
            $(botonBorrar).parent().parent().remove();
          }
      });
  });
</script>
