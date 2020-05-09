<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url(); ?>/public/icons/newspaper.svg" width="30" height="30" class="d-inline-block align-top" alt="Newspaper">
        <?php if ($this->uri->segment(1) !== 'login' && $this->uri->segment(1) !== 'register'): ?>
            <b>News</b>
        <?php else: ?>
            News
        <?php endif; ?>
    </a>
    <div>
        <a class="navbar-brand" href="<?php echo base_url(); ?>login">
            <?php if ($this->uri->segment(1) === 'login'): ?>
                <b>Login</b>
            <?php else: ?>
                Login
            <?php endif; ?>
        </a>
        <a class="navbar-brand" href="<?php echo base_url(); ?>register">
            <?php if ($this->uri->segment(1) === 'register'): ?>
                <b>Register</b>
            <?php else: ?>
                Register
            <?php endif; ?>
        </a>
    </div>
</nav>
