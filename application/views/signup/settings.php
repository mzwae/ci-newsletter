<div class="row row-offcanvas row-offcanvas-right">
  <div class="col-xs-12 col-sm-9">
    <h3 class="text text-info">Your subscribtion email has been found!</h3>
    <p>You can change your settings below or unsubscribe. Plese check your preferences.</p>
    <div class="row">
      <?php echo validation_errors(); ?>
      <?php echo form_open('/signup/settings'); ?>
      <!-- <?php echo form_input($signup_email); ?> -->
      <?php echo form_checkbox($signup_opt1);?> Option 1<br>
      <?php echo form_checkbox($signup_opt2);?> Option 2<br>
      <?php echo form_checkbox($signup_unsub); ?> Unsubscribe <br>
      <?php echo form_submit('', 'Submit', 'class="btn btn-success"') ?><br>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
