 <?php
    class BasicInfo extends CI_Model{
        function getUserInfo(){
              $this->load->model('users');
                $userdata = $this->facebook->api('/me');
                $age = $this->calcAge($userdata['birthday']);
                $userprofile = array(
                        'facebook_id' => $userdata['id'],
                        'age' => $age,
                        'location' => $userdata['location']['name'],
                        'gender' => $userdata['gender']
                    );
                return $userprofile;
        }
        function calcAge($birthDate){
             //explode the date to get month, day and year
             $birthDate = explode("/", $birthDate);
             //Avoid warnings by setting default timezone
             date_default_timezone_set('UTC');
             //get age from date or birthdate
             $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
             return $age;
        }
    }
?>
