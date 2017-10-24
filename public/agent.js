function logger(message){
	var log = document.getElementById('log');
	log.value += "\n>" + message;
	log.scrollTop = log.scrollHeight;
}


function showAgentActivity(activity){
	activity = activity.toLowerCase();
	var elements = document.getElementsByClassName('agent-activity');

	elements.item(0).style.display = 'block';
}


function hideAgentActivities(){
	var elements = document.getElementsByClassName('agent-activity');
	var i = elements.length;

	while(i--){
		elements[i].style.display = 'none';
	}
}

function  agentActivityChanged(activity){
	hideAgentActivities();
	showAgentActivity(activity);

}

function bindAgentActivityButtons(){
	var activitySids = {};
	worker.activities.fetch(function(error,activityList){
		var activities = activityList.data;
		var i = activities.length;

		while(i--){
			activitySids[activities[i].friendlyName] = activities[i].sid;
		}
	});

	var elements  = document.getElementsByClassName('change-activity');
	var i = elements.length;

	while(i--){
		elements[i].onclick = function(){
			var nextActivity = this.dataset.nextActivity;
			var nextActivitySid = activitySids[nextActivity];
			worker.update("ActivitySid",nextActivitySid);

		}
	}
}

function registerTaskrouterCallbacks(){
	worker.on('ready',function(worker){
		agentActivityChanged(worker.activityName);
		logger('successfully registered as:' + worker.friendlyName);
		logger('Current activity is:' + worker.activityName);

	});

	worker.on('activity.update',function(worker){
		agentActivityChanged(worker.activityName);
		logger('worker activity cahnged to:' + worker.activityName);

	});

	worker.on('reservation.created',function(reservation){
		logger('------');
		logger('You have been reserved to handle a call!');
		logger('call from:' + reservation.task.attributes.from);
		logger('Selected gender:' + reservation.task.attributes.selected_gender);
		logger('------');
	});

	worker.on('reservation.accepted',function(reservation){
		logger('Reservation' + reservation.sid + 'accepted');
	});
	
	worker.on('reservation.cancelled',function(reservation){
		logger('Reservation' + reservation.sid + 'cancelled');
	});
}


window.onload = function(){
	logger('Initializing.....');
	window.worker = new Twilio.TaskRouter.Worker(workerToken);
	registerTaskrouterCallbacks();
	bindAgentActivityButtons();
}