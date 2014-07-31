<?php
class Gettingstarted extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }

    function step($step)
    {

        $this->config->load('facebook', TRUE);
        $fb_config = $this->config->item('facebook');
        $this->load->library('facebook', $fb_config);
        $user = $this->facebook->getUser();

        if($user){
            $headData['logout_url'] = $this->facebook->getLogoutUrl();
           // $data['logout_url'] = $headData['logout_url'];
            $this->load->view('templates/header', $headData);

            //load corresponding instructions template for step
            $this->_loadInstructions($step);

            //load corresponding views for current step
            $this->_loadMainViews($step);

            $this->load->view('templates/footer');
        }
    }
    private function _loadInstructions($step){
                    $instructionsData['step'] = $step;
            if ($step == 1){
                $title = 'Select Your Photos';
                $subTitle = 'Select a couple photos to show off that hot body :)
        (to remain anonymous, dont pick any photos with personally identifying info)';
            }
            if ($step == 2){
                $title = 'Add Captions';
                $subTitle = 'Say a little something about your cute photos';
            }
            if ($step == 3){
                $title = "";
            }
            $instructionsData['title'] = $title;
            $instructionsData['subTitle'] = $subTitle;
            $instructionsData['totalSteps'] = 3;
            $this->load->view('gettingstartedinstructions',$instructionsData);
    }
    private function _loadMainViews($step){
        if ($step == 1){
             //Fetch and insert photos
                $this->load->model('facebook/photos_fb');
                $this->load->model('database/photos_db');
                $photos = $this->photos_fb->getUserPhotos();
                //echo $photos;
                //$this->photos_db->insert_photos_first_time($user, $photos);
                //$data['photos'] = $photos;
                $this->load->view('allphotos');//,$data);
        }
        if ($step == 2){
        }
    }
}
?>