<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
    function get_all_input_types()
    {
        $this->db->select('*');
        $this->db->from('input_types');
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_forms()
    {
        $this->db->select('*');
        $this->db->from('forms');
        // $this->db->join('questions' , 'forms.form_id  = questions.form_id ');
        $query = $this->db->get();
        return $query->result();
    }

    function get_form_data($id)
    {
        $this->db->select('*');
        $this->db->from('forms');
        $this->db->where('form_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_form_details($id)
    {
        $this->db->select('*');
        $this->db->from('questions');
        $this->db->where('form_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_submissions()
    {
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->group_by('user_id','form_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_submission($id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->join('questions', 'answers.question_id = questions.question_id', 'inner'); 
        $this->db->join('users', 'answers.user_id = users.user_id', 'inner'); 
        $this->db->where('answers.form_id', $id);  
        $this->db->where('answers.user_id', $user_id);  
        $query = $this->db->get();
        return $query->result();
    }

    function insert_form($data)
    {
        if($this->db->insert('forms', $data))
        {
            return $this->db->insert_id();
        }
        else
        {
            return 'false';
        }
    }

    function insert_questions($data)
    {
        if($this->db->insert_batch('questions', $data))
        {
            return 'true';
        }
        else
        {
            return 'false';
        }
    }

    function user_fill_forms($data)
    {
        if($this->db->insert_batch('answers', $data))
        {
            return 'true';
        }
        else
        {
            return 'false';
        }
    }

    function get_user_data($id, $form_id)
    {
        
        $this->db->select('user_id');  
        $this->db->from('users');
        $this->db->where('mobile', '8999779536');
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            $row = $query->row();
        
            $this->db->select('*');
            $this->db->from('answers');
            $this->db->where('user_id', $row->user_id);
            $this->db->where('form_id', $form_id);
            $query_1 = $this->db->get();

            // print_r($query_1->result());
            // exit;

            if ($query_1->num_rows() > 0) {
                
                return 'already Exist';
            } else {
                
                return $row->user_id;
            }
        } else {
            
            $insert_data = array('mobile' => $id);  
            if ($this->db->insert('users', $insert_data)) {
                
                return $this->db->insert_id();
            } else {
                
                return 'false';
            }
        }
    }
}

?>