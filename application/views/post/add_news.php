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
echo '</br>';

echo form_label('Image 1:', 'image1');
echo form_upload('image1', set_value('image1', ''), ['id' => 'image1']);
echo '</br>';

echo form_label('Image 2:', 'image2');
echo form_upload('image2', set_value('image2', ''), ['id' => 'image2']);
echo '</br>';

echo form_label('Image 3:', 'image3');
echo form_upload('image3', set_value('image3', ''), ['id' => 'image3']);
echo '</br>';

echo form_submit('submit', 'Add news');
echo '</br>';

echo form_close();
