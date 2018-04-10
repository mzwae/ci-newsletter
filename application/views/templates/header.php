<html>
  <head>
    <title>Newsletter Signup</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
  </head>
  <body>

    <nav class="navbar navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
      <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url()?>">Newsletter Signup</a>
      </div>
      <!-- Collection of nav links and other content for toggling -->
      <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="nav-item"><a href="<?=base_url()?>home">Home</a></li>
              <li class="nav-item"><a href="<?=base_url()?>about">About</a></li>

          </ul>
      </div>
    </div>
</nav>

<div class="container">
  <?php

  if ($this->session->flashdata('email_not_found')) {
      echo '<p class="alert alert-danger text-center"><b>' . $this->session->flashdata('email_not_found') . '</b></p>';
  }
  if ($this->session->flashdata('unsub_success')) {
      echo '<p class="alert alert-success text-center"><b>' . $this->session->flashdata('unsub_success') . '</b></p>';
  }
  if ($this->session->flashdata('update_success')) {
      echo '<p class="alert alert-success text-center"><b>' . $this->session->flashdata('update_success') . '</b></p>';
  }
  if ($this->session->flashdata('unsub_error')) {
      echo '<p class="alert alert-danger text-center"><b>' . $this->session->flashdata('unsub_error') . '</b></p>';
  }
  if ($this->session->flashdata('update_error')) {
      echo '<p class="alert alert-danger text-center"><b>' . $this->session->flashdata('update_error') . '</b></p>';
  }
   ?>
