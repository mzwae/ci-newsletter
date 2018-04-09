<?php

class Signup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Signup_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    public function index()
    {

    // Set validation rules
        $this->form_validation->set_rules('signup_email', 'User email', 'required|valid_email|is_unique[signups.signup_email]');
        // $this->form_validation->set_rules('signup_emailopt1', 'Option 1');
        // $this->form_validation->set_rules('signup_emailopt2', 'Option 2');

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
                                    'checked' => true,
                                    'style' => 'margin:10px'
                                  );

            $data['signup_opt2'] = array(
                                    'name' => 'signup_opt2',
                                    'id' => 'signup_opt2',
                                    'value' => '1',
                                    'checked' => true,
                                    'style' => 'margin:10px'
                                  );

            $this->load->view('templates/header');
            $this->load->view('signup/signup', $data);
            $this->load->view('templates/footer');
        } else {
            $signup_opt1 = $this->input->post('signup_opt1');
            $signup_opt2 = $this->input->post('signup_opt2');
            if (!$signup_opt1) {
                $signup_opt1 = false;
            }
            if (!$signup_opt2) {
                $signup_opt2 = false;
            }
            $data = array(
                      'signup_email' => $this->input->post('signup_email'),
                      'signup_opt1' => $signup_opt1,
                      'signup_opt2' => $signup_opt2,
                      'signup_active' => '1'
                    );

            if ($this->Signup_model->add($data)) {
                // print_r($data);
                echo "<br>You have successfully signed up to the newsletter!";
            } else {
                // print_r($data);
                echo "<br>There was an error in signing up to the newsletter";
            }
        }
    }

    public function settings()
    {
        $email = $this->uri->segment(3).'@'.$this->uri->segment(4).'.'.$this->uri->segment(5);
        $query = $this->Signup_model->get_settings($this->uri->segment(3).'@'.$this->uri->segment(4).'.'.$this->uri->segment(5));
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $signup_opt1 = $row->signup_opt1;
                $signup_opt2 = $row->signup_opt2;
            }
        } else {
            // redirect('signup');
            die("email not found");
        }

        $data['signup_email'] = array(
        'name' => 'signup_email',
        'class' => 'form-control',
        'id' => 'signup_email',
        'value' => set_value('signup_email', $this->uri->segment(3).'@'.$this->uri->segment(4).'.'.$this->uri->segment(5)),
        'placeholder' => 'Type your email here...'

      );

        $data['signup_opt1'] = array(
        'name' => 'signup_opt1',
        'id' => 'signup_opt1',
        'value' => '1',
        'checked' => ($signup_opt1 == 1)? true:false,
        'style' => 'margin:10px'
      );

        $data['signup_opt2'] = array(
        'name' => 'signup_opt2',
        'id' => 'signup_opt2',
        'value' => '1',
        'checked' => ($signup_opt2 == 1)? true:false,
        'style' => 'margin:10px'
      );
        $data['signup_unsub'] = array(
        'name' => 'signup_unsub',
        'id' => 'signup_unsub',
        'value' => '1',
        'checked' => false,
        'style' => 'margin:10px'
      );


        $this->load->view('templates/header');
        $this->load->view('signup/settings', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        if ($this->input->post('signup_unsub') == 1) {
            $data = array('signup_email' => $this->input->post('signup_email'));

            if ($this->Signup_model->delete($data)) {
                die("You've successfully unsubscribed");
            } else {
                die("Unsubscribe Error");
            }
        } else {
            $data = array(
        'signup_email' => $this->input->post('signup_email'),
        'signup_opt1' => $this->input->post('signup_opt1'),
        'signup_opt2' => $this->input->post('signup_opt2')
      );
            if ($this->Signup_model->edit($data)) {
                die("Your settings have been updated successfully!");
            } else {
                die("Editing Settings Error");
            }
        }
    }
    // }
}
