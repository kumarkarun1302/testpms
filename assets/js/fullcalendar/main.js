jQuery(document).ready(function(){
  jQuery('.datetimepicker').datepicker({
      timepicker: true,
      language: 'en',
      range: true,
      multipleDates: true,
          multipleDatesSeparator: " - "
    });
  jQuery("#add-event").submit(function(){
      alert("Submitted");
      var values = {};
      $.each($('#add-event').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });
      console.log(
        values
      );
  });
});

(function () {    
    'use strict';
    // ------------------------------------------------------- //
    // Calendar
    // ------------------------------------------------------ //
    jQuery(function() {
        // page is ready
        jQuery('#calendar').fullCalendar({
            themeSystem: 'bootstrap4',
            // emphasizes business hours
            businessHours: false,
            defaultView: 'month',
            // event dragging & resizing
            editable: true,
            // header
            header: {
                left: 'prev today next',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                {
                    title: 'Barber',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-07-07',
                    end: '2019-07-07',
                    className: 'fc-bg-default',
                    icon : "circle"
                },
                {
                    title: 'Flight Paris',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-08-08T14:00:00',
                    end: '2019-08-08T20:00:00',
                    className: 'fc-bg-deepskyblue',
                    icon : "cog",
                    allDay: false
                },
                {
                    title: 'Team Meeting',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-07-10T13:00:00',
                    end: '2019-07-10T16:00:00',
                    className: 'fc-bg-pinkred',
                    icon : "group",
                    allDay: false
                },
                {
                    title: 'Meeting',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-08-12',
                    className: 'fc-bg-lightgreen',
                    icon : "suitcase"
                },
                {
                    title: 'Conference',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-08-13',
                    end: '2019-08-15',
                    className: 'fc-bg-blue',
                    icon : "calendar"
                },
                {
                    title: 'Baby Shower',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-08-13',
                    end: '2019-08-14',
                    className: 'fc-bg-default',
                    icon : "child"
                },
                {
                    title: 'Birthday',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-09-13',
                    end: '2019-09-14',
                    className: 'fc-bg-default',
                    icon : "birthday-cake"
                },
                {
                    title: 'Restaurant',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-10-15T09:30:00',
                    end: '2019-10-15T11:45:00',
                    className: 'fc-bg-default',
                    icon : "glass",
                    allDay: false
                },
                {
                    title: 'Dinner',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-11-15T20:00:00',
                    end: '2019-11-15T22:30:00',
                    className: 'fc-bg-default',
                    icon : "cutlery",
                    allDay: false
                },
                {
                    title: 'Shooting',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-08-25',
                    end: '2019-08-25',
                    className: 'fc-bg-blue',
                    icon : "camera"
                },
                {
                    title: 'Go Space :)',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-12-27',
                    end: '2019-12-27',
                    className: 'fc-bg-default',
                    icon : "rocket"
                },
                {
                    title: 'Dentist',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2019-12-29T11:30:00',
                    end: '2019-12-29T012:30:00',
                    className: 'fc-bg-blue',
                    icon : "medkit",
                    allDay: false
                },
                {
                    title: 'Company Profile',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
                    start: '2020-10-22T11:30:00',
                    end: '2020-10-25T012:30:00',
                    className: 'fc-bg-blue',
                    icon : "medkit",
                    allDay: false
                }
            ],
            eventRender: function(event, element) {
                if(event.icon){
                    element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+"'></i>");
                }
              },
            dayClick: function() {
                jQuery('#modal-view-event-add').modal();
            },
            eventClick: function(event, jsEvent, view) {
                    jQuery('.event-icon').html("<i class='fa fa-"+event.icon+"'></i>");
                    jQuery('.event-title').html(event.title);
                    jQuery('.event-body').html(event.description);
                    jQuery('.eventUrl').attr('href',event.url);
                    jQuery('#modal-view-event').modal();
            },
        })
    });
  
})(jQuery);