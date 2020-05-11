<div id="container">
    <h1>Welcome to CodeIgniter!</h1>

    <div id="body">
        <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

        <p>If you would like to edit this page you'll find it located at:</p>
        <code>application/views/welcome_message.php</code>

        <p>The corresponding controller for this page is found at:</p>
        <code>application/controllers/Welcome.php</code>

        <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<p>
    <?php
    $this->load->library('session');
    if ($this->session->userdata('current_user')) {
        foreach (get_object_vars($this->session->userdata('current_user')) as $obj) {
            echo $obj;
            echo '</br>';
        }
    }
    ?>
</p>

</body>