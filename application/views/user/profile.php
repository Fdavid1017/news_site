<?php
$this->load->library('session');
$user = null;
if ($this->session->userdata('current_user')) {
    $user = $this->session->userdata('current_user');
}
?>

<h1>Profile</h1>
</br></br>
<h3><?php echo $user->first_name . ' ' . $user->second_name; ?></h3>
<img src="<?php echo base_url('/uploads/images/user/' . $user->profile_picture); ?>" alt="<?php echo $user->profile_picture; ?>" style="width:250px">
<p><?php echo $user->email ?></p>
</body>
