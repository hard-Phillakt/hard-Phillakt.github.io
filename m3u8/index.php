<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>hls.js</title>
    <script src="./hls.min.js"></script>
    
	
  </head>
  <body>
    <input
      id="url"
      type="text"
      value="http://tube-test.eurodir.ru/m3u8/1.m3u8"
      style="width: 660px"
    />
    <input type="button" value="play" onclick="play()" />
    <br />
    <video id="video" controls style="width: 640px; height: 480px"></video>
    <script>
      var Hls = window.Hls;
      //var url = 'http://weblive.hebtv.com/live/hbys_bq/index.m3u8'
      function play() {
        var url = document.getElementById("url").value;

        if (Hls.isSupported()) {
          var hls = new Hls();
          hls.loadSource(url);
          hls.attachMedia(video);
          hls.on(Hls.Events.MANIFEST_PARSED, function () {
            video.play();
          });
        } else if (video.canPlayType("application/vnd.apple.mpegurl")) {
          video.src = url;
          video.addEventListener("canplay", function () {
            video.play();
          });
        }
      }
    </script>
  </body>
</html>
