<div class="ui-widget input-group mt-2">
  <label for="{{$id}}" class="input-group-text">{{$title}}</label>
  <input id="{{$id}}" name="{{$id}}" @isset($value)value="{{$value}}"@endisset  class="form-control">
  <button class="btn btn-info btn-scan" type="button" id="inputGroupFileAddon04"><span class="icon icon-qrcode"></span></button>
</div>
<div class="cont hideee">
<div id="video-container">
    <video id="qr-video"></video>
</div>

<select name="cam-list" id="cam-list"></select>
<div id="cam-qr-result"></div>
</div>

<script type="module">
    import QrScanner from "/lib/qr-scanner.min.js";

    const video = document.getElementById('qr-video');
    const videoContainer = document.getElementById('video-container');
     const camList = document.getElementById('cam-list');
     const camQrResult = document.getElementById('cam-qr-result');

    document.querySelector(".btn-scan").addEventListener("click", ()=>{

      document.querySelector(".cont").classList.remove("hideee");
    })

    function setResult(label, result) {
   document.querySelector("#{{$id}}").value = result.data;
   document.querySelector(".cont").classList.add('hideee');
        console.log(result.data);
         label.textContent = JSON.stringify(result.data)//.data;
        camQrResultTimestamp.textContent = new Date().toString();
         label.style.color = 'teal';
         clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
       // scanner.stop();
    }

    // ####### Web Cam Scanning #######

    const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
        onDecodeError: error => {
            camQrResult.textContent = error;
            camQrResult.style.color = 'inherit';
        },
        highlightScanRegion: true,
        highlightCodeOutline: true,
    });

    camList.addEventListener('change', event => {
        scanner.setCamera(event.target.value).then(updateFlashAvailability);
    });

    scanner.start().then(() => {
       // updateFlashAvailability();
        // List cameras after the scanner started to avoid listCamera's stream and the scanner's stream being requested
        // at the same time which can result in listCamera's unconstrained stream also being offered to the scanner.
        // Note that we can also start the scanner after listCameras, we just have it this way around in the demo to
        // start the scanner earlier.
        QrScanner.listCameras(true).then(cameras => cameras.forEach(camera => {
            const option = document.createElement('option');
            option.value = camera.id;
            option.text = camera.label;
            camList.add(option);
        }));
    });

  //  QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

</script>


<script>
  $( function() {
 
    $( "#{{$id}}" ).autocomplete({
      source: "search.php",
      minLength: 2,
      select: function( event, ui ) {
        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });
  } );
  </script>