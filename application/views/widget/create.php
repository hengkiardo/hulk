<?=form_open('main/index/')?>
    <?=form_fieldset('Login Form')?>

        <div class="textfield">
            <?=form_label('Username', 'username')?>
            <?php
                $data = array(
                  'name'        => 'username',
                  'id'          => 'username',
                  'maxlength'   => '100',
                  'class'       => 'input-widget'
                );
                print form_input($data); 
                ?>
        </div>

        <div class="textfield">
            <?=form_label('password', 'user_pass')?>
            <?=form_password('user_pass')?>
        </div>

        <div class="buttons">
            <?=form_submit(array("name" => "generate_code", "value" => "Generate Code", "class" => "btn btn-info", "id" => "btnGenerateCode" ))?>
            &nbsp;
            <?= form_button(array("value" => true, "content" =>"Preview", "name"=> "preview_button", "id"=>"btnPreviewWidget", "class" => "btn btn-success")) ?>
        </div>

    <?=form_fieldset_close()?>
<?=form_close();?>