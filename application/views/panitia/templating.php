<?php
$this->load->view('theme/head');
$this->load->view('theme/hlink_ind12');
$this->load->view('theme/hd_alert');
$this->load->view('theme/nav');
$role = $this->session->userdata('jabatan');
$this->load->view($role . '/side');
?>
<!-- =============================================================================================== -->

<?php 
$this->load->view($content);
?>

<!-- =============================================================================================== -->
<?php
$this->load->view('theme/foot');
$this->load->view('theme/flink_ind12');
$this->load->view('theme/ft_alert');
?>
</body>

</html>