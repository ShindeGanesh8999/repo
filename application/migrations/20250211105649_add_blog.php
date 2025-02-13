<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Migration_Add_blog extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                'input_type_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'input_type' => array(
                    'type' => 'TEXT',
                ),
            ));
            $this->dbforge->add_key('input_type_id', TRUE);
            $this->dbforge->create_table('input_types');


            // $this->dbforge->add_field([
            //     'question_id' => [
            //         'type' => 'INT',
            //         'constraint' => 5,
            //         'unsigned' => TRUE,
            //         'auto_increment' => TRUE,
            //     ],
            //     'question' => [
            //         'type' => 'TEXT',
            //     ],
            // ]);
            // $this->dbforge->add_key('question_id', TRUE);
            // $this->dbforge->create_table('questions');


            // $this->dbforge->add_field([
            //     'form_id' => [
            //         'type' => 'INT',
            //         'constraint' => 5,
            //         'unsigned' => TRUE,
            //         'auto_increment' => TRUE,
            //     ],
            //     'question_ids' => [
            //         'type' => 'TEXT',
            //     ],
            //     'title' => [
            //         'type' => 'TEXT',
            //     ],
            //     'description' => [
            //         'type' => 'TEXT',
            //     ],
            // ]);
            // $this->dbforge->add_key('form_id', TRUE);
            // $this->dbforge->create_table('forms');


            // $this->dbforge->add_field([
            //     'user_id' => [
            //         'type' => 'INT',
            //         'constraint' => 5,
            //         'unsigned' => TRUE,
            //         'auto_increment' => TRUE,
            //     ],
            //     'user' => [
            //         'type' => 'TEXT',
            //     ],
            // ]);
            // $this->dbforge->add_key('user_id', TRUE);
            // $this->dbforge->create_table('users');


            // $this->dbforge->add_field([
            //     'answer_id' => [
            //         'type' => 'INT',
            //         'constraint' => 5,
            //         'unsigned' => TRUE,
            //         'auto_increment' => TRUE,
            //     ],
            //     'answer' => [
            //         'type' => 'TEXT',
            //     ],
            //     'question_id' => [
            //         'type' => 'INT',
            //         'constraint' => 5,
            //         'unsigned' => TRUE,
            //     ],
            //     'user_id' => [
            //         'type' => 'INT',
            //         'constraint' => 5,
            //         'unsigned' => TRUE,
            //     ],
            // ]);
            // $this->dbforge->add_key('answer_id', TRUE);
            // $this->dbforge->create_table('answers');
        }

        public function down()
        {
            $this->dbforge->drop_table('input_types');
            // $this->dbforge->drop_table('questions');
            // $this->dbforge->drop_table('forms');
            // $this->dbforge->drop_table('users');
            // $this->dbforge->drop_table('answers');
        }
    }

?>