<?php echo $this->section('frontcss') ?>
<!--- make css here head setup -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js"></script>
<style>
    /* Event Details Panel */
    #event-details-container {
        position: absolute;
        left: -30%;
        width: 22%;
        height: 100%;
        background: #171717;
        color: white;
        padding: 20px;
        box-shadow: 3px 0 10px rgba(0, 0, 0, 0.3);
        transform: translateX(-100%);
        opacity: 0;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        display: none;
    }

    #event-details-container.open {
        left: -1px;
        display: block;
        transform: translateX(0);
        opacity: 1;
    }

    .event-detail {
        margin-bottom: 12px;
        padding: 10px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
    }

    .event-detail i {
        margin-right: 8px;
        color: #9ea4aa;
    }

    .close-btn {
        background: none;
        border: none;
        color: #9ea4aa;
        font-size: 20px;
        cursor: pointer;
        float: right;
    }

    #calendar-container {
        width: calc(100% - 0px);
        /* Full width initially */
        transition: width 0.3s ease-in-out;
        padding-top: 20px;
    }

    #event-details-container.open+#calendar-container {
        width: calc(100% - 25%);
        /* Adjust when event details panel opens */
        margin-left: 22%;
    }

    .fc .fc-daygrid-body {
        width: 100% !important;
    }

    table.fc-scrollgrid-sync-table {
        width: 100% !important;
    }

   .fc .fc-col-header  {
        width: 100% !important;
    }

    .fc-event {
        background: #171717;
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 2px;
        padding: 2px;
    }


    /* Event title styling */
    .fc-event-title {
        font-size: 10px;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* Special styling for past events */
    .fc-event-past {
        background:  #adb0b5;
        color: #555;
    }

    /* Styling for events in the future */
    .fc-event-future {
        background:  #2c3e50;
    }

    @media (min-width: 768px) and (max-width: 991px) {
        #event-details-container {
            left: -30%;
            width: 33%;
        }

        #event-details-container.open+#calendar-container {
            width: calc(100% - 33%);
            margin-left: 33%;
        }

        .fc .fc-button {
            font-size: 10px;
        }
    }

    @media (max-width: 767px) {
        #event-details-container {
            width: 100%;
            height: 100%;
            left: -100%;
        }

        #event-details-container.open {
            left: 0;
            width: 95%;
            z-index: 99;
        }

        #calendar-container {
            width: 100%;
            margin-left: 0;
        }

        #event-details-container.open+#calendar-container {
            width: 100%;
            margin-left: 0;
        }

        .close-btn {
            font-size: 24px;
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .fc .fc-toolbar-title {
            font-size: 16px;
        }

        .fc .fc-button {
            font-size: 10px;
            padding: 2px;
        }

        .fc-view-harness.fc-view-harness-active {
            height: 381px !important;
        }
        .fc-event-title {
            font-size: 8px;
        }
    }
</style>
<?php echo $this->endSection() ?>
<div class="container">
    <!-- Event Details Section -->
    <div id="event-details-container">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5>Event Details</h5>
            <button class="close-btn pb-2" onclick="toggleEventDetails()">×</button>
        </div>
        <div id="eventDetails">
            <p>Select an event to view details.</p>
        </div>
    </div>

    <!-- Calendar Section -->
    <div id="calendar-container">
        <div id="calendars"></div>
    </div>
</div>
<?php echo $this->section('script') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const detailsContainer = document.getElementById('event-details-container');
            const calendarContainer = document.getElementById('calendar-container');
            const eventDetails = document.getElementById('eventDetails');
            const calendarEl = document.getElementById('calendars');

            let lastClickedEventId = null;

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    {
                        event_id: '1',
                        event_name: 'Conference',
                        event_date: '2025-02-01',
                        matches_percentage: '85%',
                        participants: '150'
                    },
                    {
                        event_id: '14',
                        event_name: 'visit',
                        event_date: '2025-02-14',
                        matches_percentage: '8%',
                        participants: '2'
                    },
                    {
                        event_id: '2',
                        event_name: 'Team Meeting',
                        event_date: '2025-02-15',
                        matches_percentage: '92%',
                        participants: '12'
                    }
                ].map(event => ({
                    id: event.event_id,
                    title: event.event_name,
                    start: event.event_date,
                    extendedProps: {
                        matches_percentage: event.matches_percentage,
                        participants: event.participants,
                        event_date: new Date(event.event_date).toLocaleDateString()
                    }
                })),
                eventClick: function (info) {
                    if (detailsContainer.classList.contains('open') && lastClickedEventId === info.event.id) {
                        toggleEventDetails(false);
                        lastClickedEventId = null;
                        return;
                    }

                    lastClickedEventId = info.event.id;

                    eventDetails.innerHTML = `
                    <div class="event-detail"><i class="fas fa-calendar-alt"></i> <strong>Event:</strong> ${info.event.title}</div>
                    <div class="event-detail"><i class="fas fa-users"></i> <strong>Participants:</strong> ${info.event.extendedProps.participants}</div>
                    <div class="event-detail"><i class="fas fa-percentage"></i> <strong>Match Percentage:</strong> ${info.event.extendedProps.matches_percentage}</div>
                    <div class="event-detail"><i class="fas fa-calendar-day"></i> <strong>Date:</strong> ${info.event.extendedProps.event_date}</div>
                `;
                    toggleEventDetails(true);
                }
            });

            calendar.render();

            function toggleEventDetails(open = false) {
                if (open) {
                    detailsContainer.style.display = "block";
                    setTimeout(() => {
                        detailsContainer.classList.add('open');
                        calendarContainer.classList.add('shrink');
                    }, 10);
                } else {
                    detailsContainer.classList.remove('open');
                    calendarContainer.classList.remove('shrink');
                    setTimeout(() => {
                        detailsContainer.style.display = "none";
                    }, 300);
                }
            }

            document.addEventListener('click', function (event) {
                if (
                    detailsContainer.classList.contains('open') &&
                    !detailsContainer.contains(event.target) &&
                    !event.target.closest('.fc-event')
                ) {
                    toggleEventDetails(false);
                    lastClickedEventId = null;
                }
            });

            document.querySelector('.close-btn').addEventListener('click', () => {
                toggleEventDetails(false);
                lastClickedEventId = null;
            });
        });


    </script>

    <!-- FullCalendar and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <?php // _ec( $this->include('Core\Settings\Views\frontjavascript'), false )?>
<?php echo $this->endSection() ?>