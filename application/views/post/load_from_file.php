<div class="d-flex justify-content-center mt-5">
    <div class="shadow card">
        <div class="card-body p-3">
            <h1 class="card-title">Add news</h1>
            <?php echo form_open_multipart(); ?>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('File:', 'file'); ?>
                </div>
                <div class="col">
                    <?php echo form_upload('file', set_value('file', ''), ['id' => 'file', 'class' => 'form-control-file']); ?>
                </div>
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

            <div class="row p-3 mt-3">
                <div class="col d-flex justify-content-center">
                    <?php echo form_submit('submit', 'Add news', ['class' => 'shadow btn btn-outline-dark']); ?>
                </div>
            </div>

            <div class="card-footer text-muted">
                Upload a TXT file which contains the text of the news
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>