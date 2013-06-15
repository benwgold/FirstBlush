<?php
    class Photos_db extends CI_Model{
        function insert_photos_first_time($user_id, $photos){
            for($i=0; $i<count($photos); $i++){
                $string = "insert into user_photos(user_id, user_photo_id, link_big, link_small, link_thumb, shape) values(
                '".$user_id."', '".$i."', '".$photos[$i]->big."', '".$photos[$i]->small."', '".$photos[$i]->thumb."', '".$photos[$i]->shape."');";
                $query = $this->db->query($string);
            }
        }
        //WONT WORK UNTIL YOU ADAPT IT
        function fetch_thumb_photos($user_id){
            $string = "select link_thumb as link, user_photo_id as id from user_photos where user_id = '".$user_id."';";
            $query = $this->db->query($string);
            $links = array();
            foreach ($query->result_array() as $row){
                $links[$row['id']] = $row['link'];
            }
            return $links;
        }
        function fetch_photos($user_id){
            $string = "select link_thumb as thumb, link_small as small, link_big as big, user_photo_id as id, shape as shape from user_photos where user_id = '".$user_id."';";
            $query = $this->db->query($string);
            $links = array();
            foreach ($query->result_array() as $row){
                $links[$row['id']] = (object) (array('big' => $row['big'],
                                                'small' => $row['small'],
                                                'thumb' => $row['thumb'],
                                                'shape' => $row['shape']));
            }
            return $links;
        }
        /**
         * Only keep 25 photos per user.  If update is called, compare new links to old links and delete the last ones, updating
         * user_photo_id in the process
         * @param  [type] $user_id [description]
         * @param  [type] $photos  [description]
         * @return [type]          [description]
         */
        function update_photos($user_id, $photos){
            //TO DO
        }

    }
?>