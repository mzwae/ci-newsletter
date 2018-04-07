<?php

class Signup extends MY_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->model('Signup_model');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }

  public function index(){

    // Set validation rules
    $this->form_validation->set_rules('signup_email', 'User email', 'required|valid_email|is_unique[signups.signup_email]');
    $this->form_validation->set_rules('signup_emailopt1', 'Option 1');
    $this->form_validation->set_rules('signup_emailopt2', 'Option 2');

    // Begin validation
    if ($this->form_validation->run() == false) {
      $data['signup_email'] = array(
        'name' => 'signup_email',
        'class' => 'form-control',
        'id' => 'signup_email',
        'value' => set_value('signup_email', ''),
        'placeholder' => 'Type your email here...'

      );

      $data['signup_opt1'] = array(
        'name' => 'signup_opt1',
        'id' => 'signup_opt1',
        'value' => '1',
        'checked' => false,
        'style' => 'margin:10px'
      );

      $data['signup_opt2'] = array(
        'name' => 'signup_opt2',
        'id' => 'signup_opt2',
        'value' => '1',
        'checked' => false,
        'style' => 'margin:10px'
      );

      $this->load->view('templates/header');
      $this->load->view('signup/signup', $data);
      $this->load->view('templates/footer');
    } else {
      $data = array(
        'signup_email' => $this->input->post('signup_email'),
        'signup_opt1' => $this->input->post('signup_opt1'),
        'signup_opt2' => $this->input->post('signup_opt2'),
        'signup_active' => 1
      );

      if ($this->Signup_model->add($data)) {
        echo "You have successfully signed up";
      } else {
        echo "There was an error in signing up";
      }

    }


  }
}
