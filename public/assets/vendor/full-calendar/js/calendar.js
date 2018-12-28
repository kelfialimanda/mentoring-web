$(function() {
    "use strict"; 

    $(document).ready(function() {

        $('#calendar1').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '2018-12-28',
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [{
                    title: 'EASY - Mentoring c# - C# for beginner',
                    start: '2018-12-31',
                    end: '2019-01-02',
                    backgroundColor: '#ffc108',
                    borderColor: '#ffc108'
                },
                {
                    title: 'HARD - Full stack mentoring - Laravel',
                    start: '2019-02-04',
                    end: '2019-02-07',
                    backgroundColor: '#00CC00',
                    borderColor: '#00CC00'
                },
                {
                    title: 'HARD - Non STOP Trading - StockHolding',
                    start: '2019-01-13T07:00:00',
                    end: '2019-01-15T07:00:00',
                    url: 'http://google.com',
                    backgroundColor: '#ef172c',
                    borderColor: '#ef172c'
                },
            ]
        });
        $('#calendar2').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '2018-12-28',
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [{
                    title: 'HARD - Full stack mentoring - Laravel',
                    start: '2019-02-04',
                    end: '2019-02-07',
                    backgroundColor: '#00CC00',
                    borderColor: '#00CC00',
                    url: 'http://google.com',
                },
            ]
        });
    });
 });