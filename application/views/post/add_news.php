<div class="d-flex justify-content-center mt-5">
    <div class="shadow card">
        <div class="card-body p-3">
            <h1 class="card-title">Add news</h1>
            <?php echo form_open_multipart(); ?>

            <div class="row ml-3 mr-3">
                <div class="col">
                    <?php echo form_label('Text:', 'text'); ?>
                </div>
                <div class="col">
                    <?php echo form_textarea('text', set_value('text', ''), ['id' => 'text', 'rows' => '2', 'required' => 'required', 'placeholder' => 'Text', 'class' => 'form-control']); ?>
                </div>
                <?php echo form_error('text'); ?>
                <?php echo '</br>'; ?>
            </div>

            <?php
            $categories = [];
            $list = $this->category_model->get_list();

            for ($i = 0; $i < count($list); $i++) {
                $value = [$list[$i]->id => $list[$i]->name];
                $categories[$i] = $value;
            } ?>
            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Categorys:', 'category_id'); ?>
                </div>
                <div class="col">
                    <?php echo form_dropdown('category_id', $categories, 'category_id', ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Image 1:', 'image1'); ?>
                </div>
                <div class="col">
                    <?php echo form_upload('image1', set_value('image1', ''), ['id' => 'image1', 'class' => 'form-control-file']); ?>
                </div>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Image 2:', 'image2'); ?>
                </div>
                <div class="col">
                    <?php echo form_upload('image2', set_value('image2', ''), ['id' => 'image2', 'class' => 'form-control-file']); ?>
                </div>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Image 3:', 'image3'); ?>
                </div>
                <div class="col">
                    <?php echo form_upload('image3', set_value('image3', ''), ['id' => 'image3', 'class' => 'form-control-file']); ?>
                </div>
            </div>

            <div class="row p-3 mt-3">
                <div class="col d-flex justify-content-center">
                    <?php echo form_submit('submit', 'Add news', ['class' => 'shadow btn btn-outline-dark']); ?>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>