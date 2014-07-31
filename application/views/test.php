<canvas id="myCanvas" width="400" height="400"></canvas>
<script>
            var canvas = document.getElementById('myCanvas');
            var context = canvas.getContext('2d');
            var imageObj = new Image();

            imageObj.onload = function() {
                // draw cropped image
                var sourceX = 0;
                var sourceY = 0;
                var sourceWidth = 400;
                var sourceHeight = 400;
                var destWidth = sourceWidth;
                var destHeight = sourceHeight;
                var destX = canvas.width / 2 - destWidth / 2;
                var destY = canvas.height / 2 - destHeight / 2;

                context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight)
            imageObj.src = item.big;
</script>