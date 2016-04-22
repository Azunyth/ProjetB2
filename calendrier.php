<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link href='fullcalendar-2.6.1/fullcalendar.css' rel='stylesheet' />
    <link href='fullcalendar-2.6.1/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='fullcalendar-2.6.1/lib/moment.min.js'></script>
    <script src='fullcalendar-2.6.1/lib/jquery.min.js'></script>
    <script src='fullcalendar-2.6.1/fullcalendar.min.js'></script>

    <script>

        $(document).ready(function() {

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var calendar = $('#calendar').fullCalendar({

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: "events.php",
                selectable: true,
                selectHelper: true,

                select: function(start, end, allDay) {

                    var title = prompt('Event Title:');
                    if (title) {
                        start=moment(start).format('YYYY/MM/DD');
                        end=moment(end).format('YYYY/MM/DD');

                        $.ajax({
                            url: 'add_events.php',
                            data: 'title='+ title+'&start='+ start +'&end='+ end ,
                            type: "POST",
                            success: function(json) {
                                alert('OK');
                            }
                        });
                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true // make the event "stick"
                        );
                    }
                    calendar.fullCalendar('unselect');
                },
                editable: true,
                eventDrop: function(event, delta) {
                    start=moment(event.start).format('YYYY/MM/DD');
                    end=moment(event.end).format('YYYY/MM/DD');
                    $.ajax({
                        url: 'update_events.php',
                        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                        type: "POST",
                        success: function(json) {
                            alert("OK");
                        }
                    });
                },
                eventResize: function(event) {
                    start=moment(event.start).format('YYYY/MM/DD');
                    end=moment(event.end).format('YYYY/MM/DD');
                    $.ajax({
                        url: 'update_events.php',
                        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                        type: "POST",
                        success: function(json) {
                            alert("OK");
                        }
                    });
                }
            });

        });

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
</head>
<body>

<div id='calendar'></div>

</body>
</html>