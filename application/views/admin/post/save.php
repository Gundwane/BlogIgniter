
<?php echo form_open('','class="my_form" enctype="multipart/form-data"'); ?>

<?php echo validation_errors() ?>
    <div class="form-group">
        <?php 
            echo form_label('Titulo','title');
        ?>
        <?php 
            $text_input = array(
                'name' => 'title',
                'id' => 'title',
                'value' => '',
                'class' => 'form-control input-lg',
            );

            echo form_input($text_input);
        ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Url limpia','url_clean');
        ?>
        <?php 
            $text_input = array(
                'name' => 'url_clean',
                'id' => 'url_clean',
                'value' => '',
                'class' => 'form-control input-lg',
            );

            echo form_input($text_input);
        ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Contenido','content');
        ?>
        <?php 
            $text_area = array(
                'name' => 'content',
                'id' => 'content',
                'value' => '',
                'class' => 'form-control input-lg',
            );

            echo form_input($text_area);
        ?>
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Descripción','description');
        ?>
        <?php 
            $text_area = array(
                'name' => 'description',
                'id' => 'description',
                'value' => '',
                'class' => 'form-control input-lg',
            );

            echo form_input($text_area);
        ?>
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
    </div>
    <div class="form-group">
        <?php 
            echo form_label('Publicado', 'posted');
            echo form_dropdown('posted', $data_posted, null, 'class="form-control input-lg"');
        ?>
    </div>
    <?php echo form_submit('mysubmit','Guardar','class="btn btn-primary"') ?>
    
    <?php echo form_close(); ?>