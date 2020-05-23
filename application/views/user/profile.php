<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!$this->session->userdata('current_user')) {
    exit('Login to access this page!');
}
?>

<div class="d-flex justify-content-center mt-5">
    <div class="shadow card" style="width: 18rem;">
        <div class="d-flex justify-content-center mt-5">
            <img src="<?php echo $user->profile_picture === null ? base_url('public/icons/people-circle.svg') : base_url('/uploads/images/user/' . $user->profile_picture); ?>" alt="<?php echo $user->profile_picture; ?>" style="width:250px">
        </div>
        <div class="card-body">
            <h2 class="card-title"><?php echo $user->first_name . ' ' . $user->second_name; ?></h2>
            <p class="card-text"><?php echo $user->email ?></p>
        </div>
    </div>
</div>