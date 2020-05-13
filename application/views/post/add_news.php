<h1>Add news</h1>
<?php
echo form_open_multipart();

echo form_label('Text:', 'text');
echo form_textarea('text', set_value('text', ''), ['id' => 'text', 'required' => 'required']);
echo form_error('text');
echo '</br>';

$categories = [];

foreach ($this->category_model->get_list() as $value) {
    array_push($categories, $value->name);
}

echo form_label('Categorys:', 'category_id');
echo form_dropdown('category_id', $categories, 'category_id');

echo form_submit('submit', 'Add news');

echo form_close();
