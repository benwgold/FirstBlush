<?php
    class Users extends CI_Model{
        function insert_new_user($userdata){
            $string="insert into users(facebook_id, age, location, gender, credits) values (".$userdata['facebook_id'].", ".$userdata['age'].", '".$userdata['location']."', '".$userdata['gender']."', '0');";
            $query=$this->db->query($string);
        }

        function fetch_user($facebook_id){
            $string="select facebook_id, age, gender, location, credits from users where facebook_id = ".$facebook_id.";";
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