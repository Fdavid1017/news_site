<div class="d-flex justify-content-center mt-5">
    <div class="shadow card">
        <div class="card-body p-3">
            <h1 class="card-title">Login</h1>
            <?php echo form_open(); ?>

            <div class="row ml-3 mr-3">
                <div class="col">
                    <?php echo form_label('Email:', 'email'); ?>
                </div>
                <div class="col">
                    <?php echo form_input('email', set_value('Email', ''), ['id' => 'email', 'required' => 'required', 'placeholder' => 'Email', 'class' => 'form-control']); ?>
                </div>
                <?php echo form_error('email');
                echo '</br>';
                ?>
            </div>
        </div>

        <div class="row ml-3 mr-3">
            <div class="col">
                <?php echo form_label('Password:', 'password');  ?>
            </div>
            <div class="col">
                <?php echo form_password('password', set_value('password', ''), ['id' => 'password', 'required' => 'required', 'placeholder' => '********', 'class' => 'form-control']);  ?>
            </div>
            <?php echo form_error('password');
            echo '</br>';
            ?>
        </div>

        <div class="row p-3">
            <div class="col d-flex justify-content-center">
                <?php echo form_submit('submit', 'Login', ['class' => 'shadow btn btn-outline-dark shadow']);  ?>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>