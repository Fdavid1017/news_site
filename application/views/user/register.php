<div class="d-flex justify-content-center mt-5">
    <div class="card shadow">
        <div class="card-body p-3">
            <h1 class="card-title">Login</h1>

            <?php echo form_open_multipart(); ?>

            <div class="row ml-3 mr-3">
                <div class="col">
                    <?php echo form_label('Fisrt name:', 'first_name'); ?>
                </div>
                <div class="col">
                    <?php echo form_input('first_name', set_value('first_name', ''), ['id' => 'first_name', 'required' => 'required', 'placeholder' => 'First name', 'class' => 'form-control']); ?>
                </div>
                <?php echo form_error('first_name'); ?>
                <?php echo '</br>'; ?>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Second name:', 'second_name'); ?>
                </div>
                <div class="col">
                    <?php echo form_input('second_name', set_value('second_name', ''), ['id' => 'second_name', 'required' => 'required', 'placeholder' => 'Second name', 'class' => 'form-control']); ?>
                </div>
                <?php echo form_error('second_name'); ?>
                <?php echo '</br>'; ?>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Email:', 'email'); ?>
                </div>
                <div class="col">
                    <?php echo form_input('email', set_value('email', ''), ['id' => 'email', 'required' => 'required', 'placeholder' => 'Email', 'class' => 'form-control']); ?>
                </div>
                <?php echo form_error('email'); ?>
                <?php echo '</br>'; ?>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Password:', 'password'); ?>
                </div>
                <div class="col">
                    <?php echo form_password('password', set_value('password', ''), ['id' => 'password', 'required' => 'required', 'placeholder' => '********', 'class' => 'form-control']); ?>
                </div>
                <?php echo form_error('password'); ?>
                <?php echo '</br>'; ?>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_label('Password again:', 'password_confirmation'); ?>
                </div>
                <div class="col">
                    <?php echo form_password('password_confirmation', set_value('password_confirmation', ''), ['id' => 'password_confirmation', 'required' => 'required', 'placeholder' => '********', 'class' => 'form-control']); ?>
                </div>
                <?php echo form_error('password_confirmation'); ?>
                <?php echo '</br>'; ?>
            </div>

            <div class="row ml-3 mr-3 mt-3">
                <div class="col">
                    <?php echo form_upload('image', '', ['class' => 'form-control-file']); ?>
                    <?php echo '</br>'; ?>
                </div>
            </div>

            <div class="row p-3">
                <div class="col d-flex justify-content-center">
                    <?php echo form_submit('submit', 'Beküld', ['class' => 'shadow btn btn-outline-dark']); ?>
                </div>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>