
<?php echo form_open('admin/post_request_handler','class="my_form" enctype="multipart/form-data"'); ?>

    <div class="form-group">
        <?php 
            echo form_label('Titulo','title');
        ?>
        <?php 
            $text_input = array(
                'name' => 'title',
                'id' => 'title',
                'value' => $title,
                'class' => 'form-control input-lg',
            );

            echo form_input($text_input);
        ?>
        <?php echo form_error('title', '<div class="text-error">', '</div>'); ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Url limpia','url_clean');
        ?>
        <?php 
            $text_input = array(
                'name' => 'url_clean',
                'id' => 'url_clean',
                'value' => $url_clean,
                'class' => 'form-control input-lg',
            );

            echo form_input($text_input);
        ?>
        <?php echo form_error('url_clean', '<div class="text-error">', '</div>'); ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Contenido','content');
        ?>
        <?php 
            $text_area = array(
                'name' => 'content',
                'id' => 'content',
                'value' => $content,
                'class' => 'form-control input-lg',
            );

            echo form_input($text_area);
        ?>
        <?php echo form_error('content', '<div class="text-error">', '</div>'); ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Descripción','description');
        ?>
        <?php 
            $text_area = array(
                'name' => 'description',
                'id' => 'description',
                'value' => $description,
                'class' => 'form-control input-lg',
            );

            echo form_input($text_area);
        ?>
        <?php echo form_error('description', '<div class="text-error">', '</div>'); ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Imagen','image');
        ?>
        <?php 
            $text_area = array(
                'name' => 'image',
                'id' => 'image',
                'value' => '',
                'type' => 'file',
                'class' => 'form-control input-lg',
            );

            echo form_input($text_area);
        ?>
        <?php echo form_error('image', '<div class="text-error">', '</div>'); ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Publicado', 'posted');
            echo form_dropdown('posted', $posted, '', 'class="form-control input-lg"');
        ?>
    </div>
    <?php echo form_submit('mysubmit','Guardar','class="btn btn-primary"') ?>
    
    <?php echo form_close(); ?>