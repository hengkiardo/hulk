<?=form_open('tools/create_widget/', array("class"=>"", "id"=>"formCreateWidget", "onSubmit" => "createWidget(); return false" ))?>
    <div class="clearfix">
        <?=form_label('Username', 'username')?>
        <div class="prepend">
            <span class="form-add-on">@</span>
            <?php
                $data = array(
                  'name'        => 'username',
                  'id'          => 'username',
                  'maxlength'   => '100',
                  'class'       => 'input-widget medium have-add-on-left'
                );
                print form_input($data); 
              ?>
              <span class="tip">Your Instagram username goes here</span>
        </div>
    </div>
    <div class="clearfix">
        <?=form_label('Hashtag', 'hashtag')?>
        <div class="prepend">
            <span class="form-add-on">#</span>
            <?php
                $data = array(
                  'name'        => 'hashtag',
                  'id'          => 'hashtag',
                  'maxlength'   => '100',
                  'placeholder'  => 'ex : jakarta',
                  'class'       => 'input-widget medium have-add-on-left'
                );
                print form_input($data); 
                ?>
            <span class="tip">or, enter a hashtag here.</span>
        </div>
    </div>
    <div class="clearfix">
        <?=form_label('Slideshow', 'is_slideshow')?>
        <div class="prepend">
            <?php
                $options = array(
                  'yes'  => 'Yes',
                  'no'   => 'No'
                );

                echo form_dropdown('is_slideshow', $options, 'no', 'class="small" id="is_slideshow"');    
            ?>
            <span class="tip"></span>
        </div>
    </div>
    <div class="clearfix">
        <?=form_label('Thumbnail size', 'thumbnail_size')?>
        <div class="append">
            <?php
                $data = array(
                  'name'        => 'thumbnail_size',
                  'id'          => 'thumbnail_size',
                  'maxlength'   => '3',
                  'class'       => 'input-widget left small'
                );
                print form_input($data); 
            ?>
            <span class="form-add-on">px</span>
        </div>
    </div>

    <div class="clearfix" id="blockLayout">
        <?=form_label('Layout', 'layoutX')?>
        <div class="prepend">
            <?php
                $options = array("1"=>1,2,3,4,5,6,7,8,9,10);

                echo form_dropdown('layoutX', $options, 2, 'class="small layout" id="layoutX"');
            ?>
              <span class="inline-block padding010"> x </span>
            <?php
                echo form_dropdown('layoutY', $options, '1', 'class="small layout" id="layoutY"');    
            ?>
        </div>
    </div>

    <div class="clearfix">
        <?=form_label('Photo Border', 'photo_border')?>
        <div class="prepend">
            <?php
                $options = array(
                  'yes'  => 'Yes',
                  'no'   => 'No'
                );

                echo form_dropdown('photo_border', $options, 'yes', 'id ="photo_border" class="small"');    
            ?>
            <span class="tip">Should a border be displayed around each photo</span>
        </div>
    </div>
   
    <div class="clearfix">
        <?=form_label('Background Color', 'backgroundColor')?>
        <div class="prepend">
            <span class="form-add-on">#</span>
            <?php
                $data = array(
                  'name'        => 'backgroundColor',
                  'id'          => 'backgroundColor',
                  'maxlength'   => '100',
                  'value'       => '9ea3a0',
                  'class'       => 'input-widget small have-add-on-left'
                );
                print form_input($data); 
            ?>
            <span class="tip">Background of the widget. Leave empty for transparent.</span>
        </div>
    </div>
    <div class="clearfix">
        <?=form_label('Photo Padding', 'photo_padding')?>
        <div class="append">
            <?php
                $data = array(
                  'name'        => 'photo_padding',
                  'id'          => 'photo_padding',
                  'maxlength'   => '2',
                  'class'       => 'input-widget left small'
                );
                print form_input($data); 
            ?>
            <span class="form-add-on">px</span>
            <span class="tip">Amount of space between each photo</span>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="buttons">
        <?=form_submit(array("name" => "generate_code", "value" => "Get Code", "class" => "btn btn-info", "id" => "btnGenerateCode",  "onSubmit" => "createWidget(); return false" ))?>
        &nbsp;
        <?= form_button(array("value" => true, "content" =>"Preview", "name"=> "preview_button", "id"=>"btnPreviewWidget", "class" => "btn btn-success")) ?>
    </div>
<?=form_close();?>