<?php

class Signup_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    //Inserts user's singup data in the signup table
    //Accepts one argument: $data array
    public function add($data)
    {
        if ($this->db->insert('signups', $data)) {
            return true;
        } else {
            return false;
        }
    }

    //Called when user edits settings and not unsubscribing
    //Accepts one argument: $data array
    public function edit($data)
    {
        $this->db->where('signup_email', $data['signup_email']);
        if ($this->db->update('signups', $data)) {
            return true;
        } else {
            return false;
        }
    }

    //Called if user unsubscribes
    //Accepts  one argument: $data array
    //Returns true if user was deleted, false otherwise
    public function delete($data)
    {
        $this->db->where('signup_email', $data['signup_email']);
        if ($this->db->delete('signups')) {
            return true;
        } else {
            return false;
        }
    }

    //Populates settings forms with data
    //Accepts one argument: $email
    public function get_settings($email)
    {
        $this->db->where('signup_email', $email);
        $query = $this->db->get('signups');
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
}
