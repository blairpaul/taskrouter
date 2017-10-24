<!DOCTYPE html>
<html>
<head>
	<title></title>

<script type="text/javascript" src="//media.twiliocdn.com/taskrouter/js/v1.11/taskrouter.min.js"></script>
</head>
<body>


<script type="text/javascript">


var worker = new Twilio.TaskRouter.Worker('{{$workerToken}}');

worker.on("ready", function(worker) {
  console.log(worker.sid)             // 'WKxxx'
  console.log(worker.friendlyName)    // 'Worker 1'
  console.log(worker.activityName)    // 'Reserved'
  console.log(worker.available)       // false
});

worker.fetchReservations(
    function(error, reservations) {
        if(error) {
            console.log(error.code);
            console.log(error.message);
            return;
        }
        var data = reservations.data;
        for(i=0; i<data.length; i++) {
            console.log(data[i].sid);
        }
    }
);

</script>
</body>
</html>