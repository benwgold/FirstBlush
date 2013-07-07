<!--<h3> <?php echo $user_profile['age']." y/o ".$user_profile['gender']?> </h3>-->
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
        echo '<li class="span2" height=200px><a href="#" class="thumbnail"><img class="photo" src="'.$photos[$i]->thumb.'" alt=""></a></li>';
    }
    echo "</ul>";
   // echo print_r($user_photos);
// echo print_r($user_profile, TRUE) ?>
</div>

<script>
//select items
jQuery(document).ready(function($) {
    //on page load, set how many photos need to be selected
    var howManyMore = 3;
    $("#nextButton").hide()
    $("#howmanymoretext").html("Select " + howManyMore + " more photos to continue." );
    $(".thumbnail").click(function(){
        //functionality fo showing selected elemnts
        var li =  $(this).parent();
        if($(li).hasClass('selected')){
            $(li).removeClass('selected');
            $(li).css("background-color", "white");
            ++howManyMore;

        }
        else{
            $(li).addClass('selected');
            $(li).css("background-color", "green");
            --howManyMore;
        }

        if (howManyMore <= 0){
            $("#nextButton").show();
            $("#howmanymoretext").hide();
        }
        else{
            $("#howmanymoretext").html("Select " + howManyMore + " more photos to continue." );
            $("#nextButton").hide();
            $("#howmanymoretext").show();
        }


    });
});
</script>


<script>
jQuery(document).ready(function($) {
    //on page load, set how many photos need to be selected

    $("#nextButton").click(function(){
        //switch database stuff and go
    });
});
</script