<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Survey_data_model extends CI_Model {
        function __construct(){
            parent::__construct();
            $this->load->database();
            // $query = $this->db->select('age, sex, comp, find');
        }
        public function getEntries(){
                $query = $this->db->get('entries');
                return $query->result();
        }
        public function getEntriesByAge($from, $to){
            $condition = array('age >=' => $from, 'age <' => $to);
            $this->db->where($condition);
            $query = $this->db->get('entries');
            return $query->result();
        }
        public function getEntriesById($id){
            $query = $this->db->get_where('entries', array('id' => $id));
            return $query->result();
        }
        public function getDistinctComplaints(){
            $this->db->distinct('comp');
            $this->db->select('comp');
            $query = $this->db->get('entries');
            return $query->result();
        }
        // public function insert(){
        //         $this->title = $_POST['title']; // please read the below note
        //         $this->content = $_POST['content'];
        //         $this->date = time();
        //         $this->db->insert('entries', $this);
        // }
        // public function update(){
        //         $this->title = $_POST['title'];
        //         $this->content = $_POST['content'];
        //         $this->date = time();
        //         $this->db->update('entries', $this, array('id' => $_POST['id']));
        // }
    }