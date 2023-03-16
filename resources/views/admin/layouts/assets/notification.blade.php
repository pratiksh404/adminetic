@if (env('PUSHER_APP_KEY') !== null && env('PUSHER_APP_KEY') !== '')
<script>
  // Enable pusher logging - don't include this in production
     //   Pusher.logToConsole = true;
    
        var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
          cluster: 'ap2'
        });
    
        var push_notification = pusher.subscribe('push_notification');
        push_notification.bind('push-notification-event', function(data) {
          notify("Alert: Notification",data.message);
        });
    
        var general_push_notification = pusher.subscribe('general_push_notification');
        general_push_notification.bind('general-push-notification-event', function(data) {
            var user_id = parseInt("{{auth()->user()->id}}");
            var severity = parseInt(data.data.severity ?? 0);
            var color = 'primary';
            if (severity <= 4 && severity>= 0) {
              switch (severity) {
                case 0:
                  color = "primary"
                  break;
                case 1:
                  color = "secondary"
                  break;
                case 2:
                  color = "warning"
                  break;
                case 3:
                  color = "danger"
                  break;
                case 4:
                  color = "danger"
                  break;
                default:
                  color = "primary"
                  break;
              }
            } else {
              color="primary";
            }
            var audiance = [];
            Object.values(data.data.audiance).forEach(function(user_id){
                  audiance.push(parseInt(user_id));
            });

            if (audiance.includes(user_id)) {
              notify(data,data.data.title,data.data.subject,color);
              Livewire.emit('general_push_notification');
            }

            @if (Session::has('logged_in_user_notifications'))
              var data = @json("{{ Session::get('logged_in_user_notifications') }}");
              notify(data,data.data.title,data.data.subject,color);
            @endif
        });
  

        function notify(data,title = "Notfication",message ="",color = 'primary'){
          var icon = data.data.icon != null ? data.data.icon : 'fa fa-bell';
                $.notify('<i class="' + icon + ' text-'+color+'"></i><strong class="text-'+color+'">' + title + '</strong> <br> <p class="p-4">' + message + '</p>', {
                 type: 'theme',
                 allow_dismiss: data.data.allow_dismiss != null ? data.data.allow_dismiss : true,
                 newest_on_top: data.data.newest_on_top != null ? data.data.newest_on_top : true,
                 mouse_over: data.data.mouse_over != null ? data.data.mouse_over : false,
                 showProgressbar:data.data.showProgressbar != null ? data.data.showProgressbar : false,
                 spacing:data.data.spacing != null ? data.data.spacing : 10,
                 timer:data.data.timer != null ? data.data.timer : 8000,
                 placement:{
                   from: data.data.placement_from != null ? data.data.placement_from : 'bottom',
                   align: data.data.placement_align != null ? data.data.placement_align : 'right'
                 },
                 offset:{
                   x:30,
                   y:30
                 },
                 delay:data.data.delay != null ? data.data.showProgressbar : 1000 ,
                 z_index:10000,
                 animate:{
                    enter:'animated ' + data.data.animate_enter != null ? data.data.animate_enter : 'bounceIn',
                    exit:'animated ' + data.data.animate_exit != null ? data.data.animate_exit : 'rubberBand'
                 }
                 });
            
               // Browser Notification
                if (window.Notification) {
                    console.log('Notifications are supported!');
                } else {
                    alert('Notifications aren\'t supported on your browser! :(');
                }

                  new Notification(title, {
                    body: message, // content for the alert
                  });
              }
</script>
@endif