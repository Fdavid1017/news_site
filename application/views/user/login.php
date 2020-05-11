<h1>Login</h1>
<?php
echo form_open();

echo form_label('Email:', 'email');
echo form_input('email', set_value('Email', ''), ['id' => 'email', 'required' => 'required']);
echo form_error('email');
echo '</br>';

echo form_label('Password:', 'password');
echo form_password('password', set_value('password', ''), ['id' => 'password', 'required' => 'required']);
echo form_error('password');
echo '</br>';

echo form_submit('submit', 'Beküld');

echo form_close();
?>

</body>
