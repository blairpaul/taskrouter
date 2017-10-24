<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="//media.twiliocdn.com/taskrouter/quickstart/agent.css"/>
        <script type="text/javascript" src="//media.twiliocdn.com/taskrouter/js/v1.8/taskrouter.min.js"></script>

        <script type="text/javascript">
            window.workerToken = '{{$workerToken}}';
        </script>

        <script src="{{url('agent.js')}}"></script>
    </head>
    <body>
        <div class="content"> 

            <section class="agent-activity offline">
                <p class="activity">Offline</p>
                <button class="change-activity" data-next-activity="Idle">Go Available</button>
            </section>

            <section class="agent-activity idle">
                <p class="activity">Available</p>
                <button class="change-activity" data-next-activity="Offline">Go Offline</button>
            </section>

            <section class="agent-activity busy">
                <p class="activity">Busy</p>
            </section>

            <section class="agent-activity wrapup">
                <p class="activity">Wrap-up</p>
                <button class="change-activity" data-next-activity="Idle">Go Available</button>
                <button class="change-activity" data-next-activity="Offline">Go Offline</button>          
            </section>

            <section class="log">
                <textarea id="log" readonly="true"></textarea>
            </section>
        </div>

    </body>
</html>
