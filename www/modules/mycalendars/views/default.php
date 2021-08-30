
<link rel='stylesheet' href='<?= DIR_WEB . 'modules/mycalendars/libraries/fullcalendar/lib/main.min.css'; ?>'>
<script src='<?= DIR_WEB . 'modules/mycalendars/libraries/fullcalendar/lib/main.min.js'; ?>'></script>
<script src='<?= DIR_WEB . 'modules/mycalendars/libraries/fullcalendar/lib/locales-all.min.js'; ?>'></script>

<script>
    

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var initialLocaleCode = 'en';
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next,today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
      },

      initialDate: '2020-09-12',
      locale: initialLocaleCode,
      navLinks: true,
      editable: true,
      dayMaxEvents: true,
     // weekNumbers: true,
     eventSources: [

    // your event source
    {
     events: [
        {
          title: 'All Day Event',
          start: '2020-09-01'
        },
        {
          title: 'Long Event',
          start: '2020-09-07',
          end: '2020-09-10'
        },
        {
          title: 'Meeting',
          start: '2020-09-12T10:30:00',
          end: '2020-09-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-09-12T12:00:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-09-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-09-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          description: 'HAPPY BIRTHDAY !!',
          start: '2020-09-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-09-28'
        },
        
      ],
      color: 'black',     // an option!
      textColor: 'yellow' // an option!
    },
    {
    // any other event sources...
    events: [
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-09-29'
        }
    ],
    color: 'blue',     // an option!
    textColor: 'red' // an option!
    }
  ],

      eventClick: function(info) {
    //alert('El: ' + info.event.extendedProps.description);
    //alert('El: ' + info.event.extendedProps.location);
    //alert('El: ' + info.event.extendedProps.organizer);
    alert('Titre: '+info.event.title + '\nDescription: ' + info.event.extendedProps.description);
    //alert('View: ' + info.event.url);
      }

    });

    
    calendar.render();
    calendar.setOption('aspectRatio', 1.8);
    calendar.setOption('locale', 'fr');

  });

</script>

<style>
  #calendar {
    max-width: 720px;
    margin: 0 auto;
  }

  .fc-toolbar{
    margin-bottom:0 !important;
  }

  .fc .fc-button {
    font-size: 14px;
  }

  .fc .fc-scrollgrid-section-body:not(.fc-scrollgrid-section-liquid) table {
    display: none;
}
</style>

<div style="text-align:center">
    <h1><?= $mod_lang['title']; ?></h1>



<div id='calendar'></div>


</div>