<?php $this->load->view('includes/header'); ?>

<div id="main_content">
<?php if(isset($main_content))$this->load->view($main_content);else$this->load->view('includes/main_content');?>
</div>

<?php $this->load->view('includes/footer'); ?>