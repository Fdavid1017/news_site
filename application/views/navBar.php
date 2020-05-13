<?php $this->load->library('session'); ?>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url(); ?>/public/icons/newspaper.svg" width="30" height="30" class="d-inline-block align-top" alt="Newspaper">
        <?php if ($this->uri->segment(2) !== 'login' && $this->uri->segment(2) !== 'register'): ?>
            <b>News</b>
        <?php else: ?>
            News
        <?php endif; ?>
    </a>
    <?php if (!$this->session->userdata('current_user')): ?>
        <div>
            <a class="navbar-brand" href="<?php echo base_url('user/login'); ?>">
                <?php if ($this->uri->segment(2) === 'login'): ?>
                    <b>Login</b>
                <?php else: ?>
                    Login
                <?php endif; ?>
            </a>
            <a class="navbar-brand" href="<?php echo base_url('user/register'); ?>">
                <?php if ($this->uri->segment(2) === 'register'): ?>
                    <b>Register</b>
                <?php else: ?>
                    Register
                <?php endif; ?>
            </a>
        </div>
    <?php else: ?>
        <div class="btn-group dropleft">
            <a type="button" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo base_url(); ?>/public/icons/people-circle.svg" width="30" height="30" class="d-inline-block align-center" alt="profile">
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url('user/showprofile'); ?>">Profile</a>
                <?php if ($this->session->userdata('current_user')->role_id === '1'): ?>
                    <a class="dropdown-item" href="#">Manage site</a>
                <?php endif; ?>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>
    <?php endif; ?>
</nav>
