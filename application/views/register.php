<h1>Register</h1>
<?php
echo validation_errors();
echo form_open();

echo form_label('Fisrt name:', 'first_name');
echo form_input('first_name', set_value('first_name', ''), ['id' => 'first_name', 'required' => 'required']);
echo form_error('first_name');
echo '</br>';

echo form_label('Second name:', 'second_name');
echo form_input('second_name', set_value('second_name', ''), ['id' => 'second_name', 'required' => 'required']);
echo form_error('second_name');
echo '</br>';

echo form_label('Email:', 'email');
echo form_input('email', set_value('email', ''), ['id' => 'email', 'required' => 'required']);
echo form_error('email');
echo '</br>';

echo form_label('Password:', 'password');
echo form_password('password', set_value('password', ''), ['id' => 'password', 'required' => 'required']);
echo form_error('password');
echo '</br>';

echo form_label('Password again:', 'password_confirmation');
echo form_password('password_confirmation', set_value('password_confirmation', ''), ['id' => 'password_confirmation', 'required' => 'required']);
echo form_error('password_confirmation');
echo '</br>';

echo form_submit('submit', 'Beküld');

echo form_close();
?>

</body>
