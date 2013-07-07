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
            $data['logout_url'] = $headData['logout_url'];
            $this->load->view('templates/header', $headData);
            $gettingStartedData['step'] = $step;
            if ($step == 1){
                $title = 'Select Your Photos';
                $subTitle = 'Select a couple photos to show off that hot body :)
        (to remain anonymous, dont pick any photos with personally identifying info)';
            }
            if ($step == 2){
                $title = 'Add Captions';
            }
            if ($step == 3){
                $title = "";
            }
            $gettingStartedData['title'] = $title;
            $gettingStartedData['subTitle'] = $subTitle;
            $gettingStartedData['totalSteps'] = 3;
            $this->load->view('gettingstartedinstructions',$gettingStartedData);
            if ($step == 1){
             //Fetch and insert photos
                $this->load->model('facebook/photos_fb');
                $this->load->model('database/photos_db');
                $photos = $this->photos_fb->getUserPhotos();
                //$this->photos_db->insert_photos_first_time($user, $photos);
                $data['photos'] = $photos;
                $data['user_profile'] = $user;
                $this->load->view('allphotos',$data);
            }
            $this->load->view('templates/footer');
        }


    }

}
?>