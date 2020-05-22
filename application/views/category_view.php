<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="shadow card">
        <div class="card-body p-3">
            <h1 class="card-title">Categories</h1>

            <?php
            $categories = $this->category_model->get_list();
            ?>

            <ul class="list-group">
                <?php foreach ($categories as $value) : ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col text-left">
                                <?php echo $value->name; ?>
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo base_url('category/delete/' . $value->id) ?>">Delete</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <button class="shadow btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add new category
                    </button>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <?php echo form_open(base_url('category/add')); ?>

                    <div class="row ml-3 mr-3">
                        <div class="col">
                            <?php echo form_label('Category:', 'category'); ?>
                        </div>
                        <div class="col">
                            <?php echo form_input('category', '', ['id' => 'category', 'required' => 'required', 'class' => 'form-control']); ?>
                            <?php echo form_error('category'); ?>
                            <?php echo '</br>'; ?>
                        </div>
                    </div>

                    <div class="row p-3 mt-3">
                        <div class="col d-flex justify-content-center">
                            <?php echo form_submit('submit', 'Add', ['class' => 'shadow btn btn-outline-dark']); ?>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>