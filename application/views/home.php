<h1>Home</h1>

<div class="row">
    <div class="col-2">
        <?php if ($this->session->userdata('current_user')): ?>
            <a class="btn btn-primary" href="<?php echo base_url('news/addnews') ?>">Add news</a>
        <?php endif; ?>
    </div>
    <div class="col">
        <?php echo date("Y-m-d h:i:s"); ?>
        <div class="card-columns">
            <?php foreach ($this->news_model->get_list() as $value): ?>
                <div class="card text-center border-primary" style="width: 18rem;">
                    <?php if (false): ?>
                        <img src="" class="card-img-top" alt="">
                    <?php endif; ?>
                    <div class="card-body">
                        <p class="card-text"><?php echo $value->text ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <div class="row">
                                <div class="col">
                                    <?php echo $this->category_model->select_by_id($value->category_id)->name ?>
                                </div>
                                <div class="col">
                                    <?php echo $value->add_date ?>
                                </div>
                            </div>
                        </small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>

