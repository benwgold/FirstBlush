<?php
class Data extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->config->load('facebook', TRUE);
        $fb_config = $this->config->item('facebook');
        $this->load->library('facebook', $fb_config);

    }
    function get_user_photos(){
         $user = $this->facebook->getUser();
         if($user){
            $this->load->model('facebook/photos_fb');

            $photos = $this->photos_fb->getUserPhotos();
            echo json_encode($photos);
         }
    }
}
?>