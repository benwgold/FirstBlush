<!--<h3> <?php echo $user_profile['age']." y/o ".$user_profile['gender']?> </h3>-->
<!--<div id="rondellThumbnails" style="height:430px;"> </div>-->
<div id='thumbContainer'>

<canvas id="canvas0" width="100" height="100"></canvas>
<canvas id="canvas1" width="100" height="100"></canvas>
<canvas id="canvas2" width="100" height="100"></canvas>
<canvas id="canvas3" width="100" height="100"></canvas>


<?php
/*
    $j = 0;
    for ($i=0; $i<count($photos['wide']); $i++){
        if ($j == 0){
            echo '<ul class="thumbnails">';
        }
        //echo '<li><a href="#" class="thumbnail"><img src="/assets/php/thumbnail.php?file='.$user_photos[$i].'&maxw=200&maxh=200" /></a></li>';
        echo '<li><a href="#" class="thumbnail"><img class="photo" id=photo'.$i.'src="" alt=""></a></li>';
        $j++;
    }
*/



   /* TESTING OUT RONDELL
   for ($i=0; $i<count($photos); $i++){
        if ($i == 0){
            echo '<ul class="thumbnails">';
        }
        //echo '<li><a href="#" class="thumbnail"><img src="/assets/php/thumbnail.php?file='.$user_photos[$i].'&maxw=200&maxh=200" /></a></li>';
        echo '<li class="span2" height=200px><a href="#" class="thumbnail"><img class="photo" src="'.$photos[$i]->thumb.'" alt=""></a></li>';
    }
    echo "</ul>";
    */
   // echo print_r($user_photos);
// echo print_r($user_profile, TRUE) ?>
</div>



<script type="text/javascript">
    var setCanvas = function(i, data){
        var canvas = document.getElementById('canvas'+i);
        var context = canvas.getContext('2d');
        var imageObj = new Image();

        imageObj.onload = function() {
            // draw cropped image
            var sourceX = 1;
            var sourceY = 1;
            var sourceWidth = data[i].small.width;
            var sourceHeight = data[i].small.height;
            //vertical image
            if (data[i].small.height > data[i].small.width+5){
                var difference = data[i].small.height - data[i].small.width;
                sourceY += difference/2;
                sourceHeight = sourceWidth;
            }
            else if(data[i].small.width > data[i].small.height+5){
                var difference = data[i].small.width - data[i].small.height;
                sourceX += difference/2;
                sourceWidth = sourceHeight;
            }




            var destWidth = 100;
            var destHeight = 100;
            var destX = 0;
            var destY = 0;

            context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
        };
        imageObj.src = data[i].small.image;
    }
    var makeCanvases = function(count){
        var container = document.getElementById('thumbContainer');
        container.innerHTML = '';
        for (var i = 0; i<count; i++){
            container.innerHTML += '<canvas id="canvas'+i+'" width="100" height="100"></canvas>';
        }


    }
  $(function() {
    $.ajax({
      url: "<?php echo site_url('data/get_user_photos');?>",
      dataType: "json",
       error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      },
      success: function(data, text, xhr) {
        //console.log(data[0]);
        var item, rondellContent = "", i;
        if (text === "success") {
            makeCanvases(24);
            for (i = 0; i < 24; i++) {

                setCanvas(i, data);


                /*
                imageObj.src = item.big;

                item = data[i];
                rondellContent += ' \
                  <a href="'+item.big+'" title=photo"'+i+'" \
                    target="_blank" style="display:none"> \
                    <img src="'+item.big+'" title=photo"'+i+'" width="'+400+'" height="'+200+'"/> \
                  </a> \
                ';

              }
              $("#rondellThumbnails").html(rondellContent).children().rondell({
                preset: "thumbGallery"
              });
    */
            }
        }
      }
    });
  });
</script>

<script>
//watches for press of next button, finds selected items and posts them
//
</script>

<script>
//select items
jQuery(document).ready(function($) {
    //on page load, set how many photos need to be selected (based on value in app_general_configs)
    var howManyMore = <?php echo $this->config->item('num_photos_select'); ?>;
    $("#nextButton").hide();
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