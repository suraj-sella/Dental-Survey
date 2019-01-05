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
        public function getEntriesByAgeGender($from, $to, $gender){
            if($gender=='all') $condition = array('age >=' => $from, 'age <' => $to);
            else $condition = array('age >=' => $from, 'age <' => $to, 'sex' => $gender);
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
        public function getByCompAgeGender($comp, $from, $to, $gender){
            $condition = array('age >= ' => $from, 'age < ' => $to, 'sex = ' => $gender);
            $this->db->like('comp', $comp);
            $this->db->select('count(*) as total');
            $this->db->where($condition);
            $query = $this->db->get('entries');
            return $query->result();
        }
        public function getAgeRange(){
            $query = $this->db->get('age-range');
            return $query->result();
        }
        public function updateAgeRange($data){
            extract($data);
            $rowdata = array(
                'from' => $from,
                'to' => $to,
                'title' => $title
            );
            $this->db->where('id', $id);
            $this->db->update('age-range', $rowdata);
            return !!$this->db->affected_rows();
        }
        public function deleteAgeRange($id){
            $this->db->where('id', $id);
            $this->db->delete('age-range');
            return !!$this->db->affected_rows();
        }
        public function insertAgeRange($data){
            $this->db->insert('age-range', $data);
            return !!$this->db->affected_rows();
        }
        public function getGenders(){
            $query = $this->db->get('gender-data');
            return $query->result();
        }
        public function getMatches(){
            $query = $this->db->get('match-data');
            return $query->result();
        }
        public function getByAge($from, $to, $gender){
            $condition = array('age >= ' => $from, 'age < ' => $to, 'sex = ' => $gender);
            $this->db->select('count(*) as total');
            $this->db->where($condition);
            $query = $this->db->get('entries');
            return $query->result();
        }

        public function getDistinctFindings(){
            $this->db->distinct('find');
            $this->db->select('find');
            $query = $this->db->get('entries');
            return $query->result();
        }
        public function getByFindAgeGender($find, $from, $to, $gender){
            $condition = array('age >= ' => $from, 'age < ' => $to, 'sex = ' => $gender);
            $this->db->like('find', $find);
            $this->db->select('count(*) as total');
            $this->db->where($condition);
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