<?php
    class Users extends CI_Model{


        function login_user($userdata){
            $query = $this->fetch_user($userdata['facebook_id']);
            if ($this->isNew($query)){
                $this->insert_new_user($userdata);
                $userdata['credits'] = 0;
            }
            else{
                $userdata['credits'] = $this->get_credits($query);
            }
            return $userdata;
        }

        function insert_new_user($userdata){
            $string="insert into users(facebook_id, age, location, gender) values (".$userdata['facebook_id'].", ".$userdata['age'].", '".$userdata['location']."', '".$userdata['gender']."');";
            $query=$this->db->query($string);
        }

        function fetch_user($facebook_id){
            $string="select facebook_id, credits from users where facebook_id = ".$facebook_id.";";
            $query=$this->db->query($string);
            return $query;
        }

        function get_credits($query){
            $row =  $query->row();
            return $row->credits;
        }
        function isNew($query){
            if ($query->num_rows() == 0){
                return True;
            }
            else if ($query->num_rows() > 0){
                return False;
            }
        }

    }

?>