<div class="row row-offcanvas row-offcanvas-right">
  <div class="col-xs-12 col-sm-9">
    <div class="row">
      <?php echo validation_errors(); ?>
      <?php echo form_open('/signup'); ?>
      <?php echo form_input($signup_email); ?><br>
      <?php echo form_checkbox($signup_opt1) . 'Option 1' ?><br>
      <?php echo form_checkbox($signup_opt2) . 'Option 2' ?><br>
      <?php echo form_submit('', 'Submit', 'class="btn btn-success"'); ?>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
