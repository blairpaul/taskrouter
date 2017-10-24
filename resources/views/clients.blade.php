<!DOCTYPE html>
<html>
<head>
  <title>Twilio Client Quickstart</title>
  <link rel="stylesheet" href="site.css">
  <script type="text/javascript">
    var url = "{{url('')}}" ;

  </script>
</head>
<body>
  <div id="controls">

    <div id="call-controls">
      <p class="instructions">Make a Call:</p>
      <input id="phone-number" type="text" placeholder="Enter a phone # or client name" />
      <button id="button-call">Call</button>
      <button id="button-hangup">Hangup</button>
    </div>
    <div id="log"></div>
  </div>

  <script type="text/javascript" src="//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="{{url('quickstart.js')}}"></script>
</body>
</html>


