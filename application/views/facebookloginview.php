<!DOCTYPE html>
<html>
<head>
    <title>Facebook Sweetness</title>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
    <script src="/assets/js/global.js" type="text/javascript"></script>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/assets/css/site-specific.css" rel="stylesheet" media="screen">
    <script src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
            <h1 class="text-center">first blush</h1>

            <?php if (@$user_profile): ?>
                <a href="<?php echo $logout_url?>">Logout of this thing</a>
                <br/>
                <h3> <?php echo $user_profile['age']." y/o ".$user_profile['gender']?> </h3>
                    <div>
                    <?php
                        /*
                        $j = 0;
                        for ($i=0; $i<count($photos['wide']); $i++){
                            if ($j == 0){
                                echo '<ul class="thumbnails">';
                            }
                            //echo '<li><a href="#" class="thumbnail"><img src="/assets/php/thumbnail.php?file='.$user_photos[$i].'&maxw=200&maxh=200" /></a></li>';
                            echo '<li><a href="#" class="thumbnail"><img class="photo" src="'.$photos['wide'][$i].'" alt=""></a></li>';
                            $j++;
                        }
                        for ($i=0; $i<count($photos['tall']); $i++){
                            if ($j == 0){
                                echo '<ul class="thumbnails">';
                            }
                            //echo '<li><a href="#" class="thumbnail"><img src="/assets/php/thumbnail.php?file='.$user_photos[$i].'&maxw=200&maxh=200" /></a></li>';
                            echo '<li><a href="#" class="thumbnail"><img class="photo" src="'.$photos['tall'][$i].'" alt=""></a></li>';
                            $j++;
                        }
                        for ($i=0; $i<count($photos['square']); $i++){
                            if ($j == 0){
                                echo '<ul class="thumbnails">';
                            }
                            //echo '<li><a href="#" class="thumbnail"><img src="/assets/php/thumbnail.php?file='.$user_photos[$i].'&maxw=200&maxh=200" /></a></li>';
                            echo '<li><a href="#" class="thumbnail"><img class="photo" src="'.$photos['square'][$i].'" alt=""></a></li>';
                            $j++;
                        }
                        */
                       for ($i=0; $i<count($photos); $i++){
                            if ($i == 0){
                                echo '<ul class="thumbnails">';
                            }
                            //echo '<li><a href="#" class="thumbnail"><img src="/assets/php/thumbnail.php?file='.$user_photos[$i].'&maxw=200&maxh=200" /></a></li>';
                            echo '<li><a href="#" class="thumbnail"><img class="photo" src="'.$photos[$i]->thumb.'" alt=""></a></li>';
                        }
                        echo "</ul>";
                       // echo print_r($user_photos);
                    // echo print_r($user_profile, TRUE) ?>
                    </div>
            <?php else: ?>
                <h3 class="text-center"><p class="muted">Like it or not, impressions matter. Find out what strangers think of your photos.</p></h3>
                    <div class="logincontainer">
                        <a href="<?php echo $login_url ?>" class="loginlink">
                        <div class="fbbg">
                        <!--<img src='/assets/img/Connect-fb.png' alt="Sign in Button" class="loginimage"/>-->
                        </div>

                        </a>
                    </div>
            <?php endif; ?>
    </div>
        <script>

        </script>


</body>

</html>