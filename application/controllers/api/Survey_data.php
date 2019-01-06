<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Survey_data extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['entries_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['entries_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['entries_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('survey_data_model');
    }

    public function entries_get()
    {
        //Get By Age Range
        $from = (int)$this->get('from');
        $to = (int)$this->get('to');
        $gender = $this->get('gender');
        if(is_numeric($from) && is_numeric($to)){
            $users = $this->survey_data_model->getEntriesByAgeGender($from, $to, $gender);
            if($users){
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code    
            }else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Entries OR Error!!',
                    'response' => $users
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        //Get By ID
        $id = $this->get('id');
        if($id != NULL){

            // Find and return a single record for a particular user.
            $id = (int)$id;

            // Validate the id.
            if ($id <= 0){

                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            $user = $this->survey_data_model->getEntriesById($id);
            if (!empty($user))
            {
                $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }  
        }

        if (($id === NULL) && ($from === NULL) && ($to === NULL)){
        
            // Check if the users data store contains users (in case the database result returns NULL)
            $user = $this->survey_data_model->getEntries();
            if($users){
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    public function entries_put(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->updateEntry($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function entries_delete(){
        $data = $this->get('id');
        $id = (int)$data;
        $response = $this->survey_data_model->deleteEntry($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function entries_post(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->insertEntry($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getAgeRange_get(){
        $agerange = $this->survey_data_model->getAgeRange();
        $this->response($agerange, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getAgeRange_put(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->updateAgeRange($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getAgeRange_delete($data){
        $id = (int)$data;
        $response = $this->survey_data_model->deleteAgeRange($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getAgeRange_post(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->insertAgeRange($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getGenders_get(){
        $genders = $this->survey_data_model->getGenders();
        $this->response($genders, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getGenders_put(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->updateGender($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getGenders_delete($data){
        $id = (int)$data;
        $response = $this->survey_data_model->deleteGenders($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getGenders_post(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->insertGender($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getMatches_get(){
        $matches = $this->survey_data_model->getMatches();
        $this->response($matches, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getMatches_put(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->updateMatch($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getMatches_delete($data){
        $id = (int)$data;
        $response = $this->survey_data_model->deleteMatch($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getMatches_post(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $response = $this->survey_data_model->insertMatch($data);
        $result = array(
            'status' => 1,
            'response' => $response
        );
        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function compTab_get(){
        $agerange = $this->survey_data_model->getAgeRange();
        $allentries = $this->survey_data_model->getEntries();
        $distinctComplaints = $this->survey_data_model->getDistinctComplaints();
        $explodedComplaints = array();
        $complaints = array();
        $data = array();
        for ($i=0;$i<sizeof($distinctComplaints);$i++) { 
            $explodedComplaints[$i] = explode(';', $distinctComplaints[$i]->comp);
        }
        for ($i=0, $k=0; $i<sizeof($explodedComplaints); $i++) { 
            for ($j=0; $j < sizeof($explodedComplaints[$i]); $j++) { 
                if(!in_array(ucwords($explodedComplaints[$i][$j]), $complaints)){
                    $complaints[$k] = ucwords($explodedComplaints[$i][$j]);
                    $k++;
                }
            }
        }
        for($i=0;$i<sizeof($complaints);$i++){
            $total = 0;
            for($j=1;$j<sizeof($agerange);$j++){
                $from = $agerange[$j]->from;
                $to = $agerange[$j]->to;
                $male = $this->survey_data_model->getByCompAgeGender($complaints[$i], $from, $to, 'Male')[0]->total;
                $female = $this->survey_data_model->getByCompAgeGender($complaints[$i], $from, $to, 'Female')[0]->total;
                $agetotal = $male + $female;
                $total += $agetotal;
                $data[$i][$agerange[$j]->title]['all'] = $agetotal;
                $data[$i][$agerange[$j]->title]['male'] = $male;
                $data[$i][$agerange[$j]->title]['female'] = $female;
            }
            $data[$i]['complaint'] = $complaints[$i];
            $data[$i]['total'] = $total;
        }
        $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getCompTotals_get(){
        $agerange = $this->survey_data_model->getAgeRange();
        $data = array();
        for($i=1;$i<sizeof($agerange);$i++){
            $from = $agerange[$i]->from;
            $to = $agerange[$i]->to;
            $male = $this->survey_data_model->getByAge($from, $to, 'Male')[0]->total;
            $female = $this->survey_data_model->getByAge($from, $to, 'Female')[0]->total;
            $agetotal = $male + $female;
            $data[$agerange[$i]->title]['all'] = $agetotal;
            $data[$agerange[$i]->title]['male'] = $male;
            $data[$agerange[$i]->title]['female'] = $female;
        }
        $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    //FINDINGS TAB
    public function findTab_get(){
        $agerange = $this->survey_data_model->getAgeRange();
        $allentries = $this->survey_data_model->getEntries();
        $distinctFindings = $this->survey_data_model->getDistinctFindings();
        $explodedFindings = array();
        $findings = array();
        $data = array();
        for ($i=0;$i<sizeof($distinctFindings);$i++) { 
            $explodedFindings[$i] = explode(';', $distinctFindings[$i]->find);
        }
        for ($i=0, $k=0; $i<sizeof($explodedFindings); $i++) { 
            for ($j=0; $j < sizeof($explodedFindings[$i]); $j++) { 
                if(!in_array(ucwords($explodedFindings[$i][$j]), $findings)){
                    $findings[$k] = ucwords($explodedFindings[$i][$j]);
                    $k++;
                }
            }
        }
        for($i=0;$i<sizeof($findings);$i++){
            $total = 0;
            for($j=1;$j<sizeof($agerange);$j++){
                $from = $agerange[$j]->from;
                $to = $agerange[$j]->to;
                $male = $this->survey_data_model->getByFindAgeGender($findings[$i], $from, $to, 'Male')[0]->total;
                $female = $this->survey_data_model->getByFindAgeGender($findings[$i], $from, $to, 'Female')[0]->total;
                $agetotal = $male + $female;
                $total += $agetotal;
                $data[$i][$agerange[$j]->title]['all'] = $agetotal;
                $data[$i][$agerange[$j]->title]['male'] = $male;
                $data[$i][$agerange[$j]->title]['female'] = $female;
            }
            $data[$i]['finding'] = $findings[$i];
            $data[$i]['total'] = $total;
        }
        $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function getFindTotals_get(){
        $agerange = $this->survey_data_model->getAgeRange();
        $data = array();
        for($i=1;$i<sizeof($agerange);$i++){
            $from = $agerange[$i]->from;
            $to = $agerange[$i]->to;
            $male = $this->survey_data_model->getByAge($from, $to, 'Male')[0]->total;
            $female = $this->survey_data_model->getByAge($from, $to, 'Female')[0]->total;
            $agetotal = $male + $female;
            $data[$agerange[$i]->title]['all'] = $agetotal;
            $data[$agerange[$i]->title]['male'] = $male;
            $data[$agerange[$i]->title]['female'] = $female;
        }
        $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
}