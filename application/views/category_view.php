<h1>Categories</h1>

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

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-target
</button>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <?php
        echo form_open(base_url('category/add'));

        echo form_label('Category:', 'category');
        echo form_input('category', '', ['id' => 'category', 'required' => 'required']);
        echo form_error('category');
        echo '</br>';

        echo form_submit('submit', 'Add');

        echo form_close();
        ?>
    </div>
</div>