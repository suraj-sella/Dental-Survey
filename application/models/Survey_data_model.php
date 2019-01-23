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
        public function updateEntry($data){
            extract($data);
            $rowdata = array(
                'age' => $age,
                'sex' => $sex,
                'comp' => $comp,
                'find' => $find
            );
            $this->db->where('id', $id);
            $this->db->update('entries', $rowdata);
            return !!$this->db->affected_rows();
        }
        public function deleteEntry($id){
            $this->db->delete('entries', array('id' => $id)); 
            return !!$this->db->affected_rows();
        }
        public function insertEntry($data){
            $this->db->insert('entries', $data);
            return !!$this->db->affected_rows();
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
        public function getComplaints(){
            $query = $this->db->get('complaints');
            return $query->result();
        }
        public function updateComplaint($data){
            extract($data);
            $rowdata = array(
                'name' => $name,
                'findingid' => $findingid
            );
            $this->db->where('id', $id);
            $this->db->update('complaints', $rowdata);
            return !!$this->db->affected_rows();
        }
        public function deleteComplaint($id){
            $this->db->delete('complaints', array('id' => $id)); 
            return !!$this->db->affected_rows();
        }
        public function insertComplaint($data){
            $this->db->insert('complaints', $data);
            return !!$this->db->affected_rows();
        }

        public function getFindings(){
            $query = $this->db->get('findings');
            return $query->result();
        }
        public function updateFinding($data){
            extract($data);
            $rowdata = array(
                'name' => $name
            );
            $this->db->where('id', $id);
            $this->db->update('findings', $rowdata);
            return !!$this->db->affected_rows();
        }
        public function deleteFinding($id){
            $this->db->delete('findings', array('id' => $id)); 
            return !!$this->db->affected_rows();
        }
        public function insertFinding($data){
            $this->db->insert('findings', $data);
            return !!$this->db->affected_rows();
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
            $this->db->delete('age-range', array('id' => $id)); 
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
        public function updateGender($data){
            extract($data);
            $rowdata = array(
                'title' => $title,
                'value' => $value
            );
            $this->db->where('id', $id);
            $this->db->update('gender-data', $rowdata);
            return !!$this->db->affected_rows();
        }
        public function deleteGender($id){
            $this->db->delete('gender-data', array('id' => $id)); 
            return !!$this->db->affected_rows();
        }
        public function insertGender($data){
            $this->db->insert('gender-data', $data);
            return !!$this->db->affected_rows();
        }
        public function getMatches(){
            $query = $this->db->get('match-data');
            return $query->result();
        }
        public function updateMatch($data){
            extract($data);
            $rowdata = array(
                'title' => $title,
                'value' => $value
            );
            $this->db->where('id', $id);
            $this->db->update('match-data', $rowdata);
            return !!$this->db->affected_rows();
        }
        public function deleteMatch($id){
            $this->db->delete('match-data', array('id' => $id)); 
            return !!$this->db->affected_rows();
        }
        public function insertMatch($data){
            $this->db->insert('match-data', $data);
            return !!$this->db->affected_rows();
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