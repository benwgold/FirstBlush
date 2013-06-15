 <?php
    class Photos_fb extends CI_Model{
        function getUserPhotos(){
            $photodata = $this->facebook->api('/me/photos', 'GET');
            $photos = $photodata['data'];
           /*
            $imagesWide = array();
            $imagesTall = array();
            $imagesSquare = array();
            $w = 0;
            $t = 0;
            $s = 0;
            */
            for ($i=0; $i<count($photos); $i++){
                if ($photos[$i]['images'][6]['width'] > $photos[$i]['images'][6]['height'] + 5){
                    //$imagesWide[$w] = $photos[$i]['images'][6]['source'];
                    $shape = 'wide';
                }
                else if ($photos[$i]['images'][6]['height'] > $photos[$i]['images'][6]['width'] + 5){
                    //$imagesTall[$t] = $photos[$i]['images'][6]['source'];
                    $shape = 'tall';
                }
                else{
                    //$imagesSquare[$s] = $photos[$i]['images'][6]['source'];
                    $shape = 'square';
                }
                $photos[$i] = (object) (array('big' => $photos[$i]['images'][3]['source'],
                                                'small' => $photos[$i]['images'][6]['source'],
                                                'thumb' => $photos[$i]['picture'],
                                                'shape' => $shape));
            }
            //$images['0'] = $photos['0']['source'];
            /*
            $photos = array(
                'wide' => $imagesWide,
                'tall' => $imagesTall,
                'square' => $imagesSquare
                );
            */
            return $photos;
        }
    }
?>
