@extends('etudiants.students_page')
@section('title', 'Calendrier')
@php
$id = auth()->user()->id;
@endphp
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js" defer></script>
    <style>
        .fc-header-toolbar button {
            background-color: rgb(59 130 246) !important;
            border-color: rgb(59 130 246) !important;
            height: 48px !important;
            min-width: 48px !important;
        }

        .fc-header-toolbar button:hover,
        .fc-header-toolbar button:focus {
            box-shadow: unset !important;
        }

        .fc-dayGridMonth-view {
            background-color: #ffffff;
            border-radius: 10px !important;
            overflow: hidden !important;
        }

        .fc-button-group,
        .fc-dayGridMonth-view {
            box-shadow: 0 0 #0000, 0 0 #0000, 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1) !important;
        }
    </style>
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Calendrier</h1>
    <div class="overflow-hidden">
        <div id="calendar" class="w-full overflow-x-auto"></div>
    </div>
    <script defer>
        document.addEventListener("DOMContentLoaded", async function() {
            const calendarEl = document.getElementById("calendar");
            const events = await getData();
            const Calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                allDaySlot: false,
                height: window.innerHeight,
                eventColor: "rgb(59 130 246)",
                headerToolbar: {
                    right: "today,prev,next",
                    left: "title",
                },
                events: events,
            });

            Calendar.render();
        });

        async function getData() {
            const req = await fetch("/Subscribed/Modules/id");
            const res = await req.json();
            return res.data.map(d => {
                return {
                    start: d[0].date_limite,
                    title: d[0].nom_tp
                }
            });
        }
    </script>
@endsection
