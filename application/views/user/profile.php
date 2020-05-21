<h1>Profile</h1>
</br></br>
<h3><?php echo $user->first_name . ' ' . $user->second_name; ?></h3>
<img src="<?php echo $user->profile_picture === null ? base_url('public/icons/people-circle.svg') : base_url('/uploads/images/user/' . $user->profile_picture); ?>" alt="<?php echo $user->profile_picture; ?>" style="width:250px">
<p><?php echo $user->email ?></p>
</body>