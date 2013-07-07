<?php
class Facebooklogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //Load FB api keys from config file NOT TESTED
        $this->config->load('facebook', TRUE);
        $fb_config = $this->config->item('facebook');
        $this->load->library('facebook', $fb_config);
        $this->facebook->destroySession();

        $user = $this->facebook->getUser();
        $data['appId'] = $this->facebook->getAppId();

        if ($user) {
            try {
                $this->load->model('facebook/basicinfo');
                $this->load->model('database/users');
                $this->load->model('database/photos_db');
                $userdata = $this->basicinfo->getUserInfo();
                $query = $this->users->fetch_user($userdata['facebook_id']);
                //Check if the user is new to the site
                if ($this->users->isNew($query)){
                    //Insert to users table
                    $this->users->insert_new_user($userdata);
                    $userdata['credits'] = 0;
                    redirect('/gettingstarted/step/1');
                }
                //If not, redirect to home controller (as of now, just gets all photos, doesnt redirect)
                else{
                    $row = $query->row_array();
                    $userdata = array(
                        'age' => $row['age'],
                        'location' => $row['location'],
                        'gender' => $row['gender']
                    );
                    $photos = $this->photos_db->fetch_photos($row['facebook_id']);
                }
                $data['photos'] = $photos;
                $data['user_profile'] = $userdata;
                $data['logout_url'] = $this->facebook->getLogoutUrl();
                $this->load->template('allphotos',$data);
            } catch (FacebookApiException $e) {
                $user = null;
                print_r('Oops! There has been a problem with the facebook API.');
            }
        }
        else{
            $params = array('scope' => 'user_photos,user_birthday');
            $data['login_url'] = $this->facebook->getLoginUrl($params);
            $this->load->template('welcomeview', $data);
        }
    }
}
?>
