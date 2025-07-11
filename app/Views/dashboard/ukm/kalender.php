<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender UKM</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Main Layout */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            margin-left: 300px;
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            margin-left: 30px;
        }

        .page-title {
            font-size: 24px;
            color: #2d3748;
            margin: 0;
        }

        .calendar-container {
            /* margin-left: 290px; */
            /* padding: 20px; */
            margin-top: 40px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-title {
            font-size: 24px;
            color: #2d3748;
        }

        .fc {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 25px;
            border-radius: 8px;
            width: 50%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #4299e1;
            color: white;
        }

        .btn-secondary {
            background-color: #e2e8f0;
            color: #4a5568;
        }

        .event-tag {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-right: 5px;
        }

        .tag-meeting {
            background-color: #4299e1;
            color: white;
        }

        .tag-practice {
            background-color: #48bb78;
            color: white;
        }

        .tag-event {
            background-color: #9f7aea;
            color: white;
        }

        .tag-other {
            background-color: #ed8936;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Include your sidebar -->
    <?= $this->include('templates/sidebar-admin') ?>

    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Kalender Agenda</h1>
        </div>

        <div class="calendar-container">
            <div id="calendar"></div>
        </div>

        <!-- Event Modal -->
        <div id="eventModal" class="modal">
            <div class="modal-content">
                <h2 id="modalTitle">Tambah Event Baru</h2>
                <form id="eventForm">
                    <div class="form-group">
                        <label for="eventTitle">Judul Event</label>
                        <input type="text" class="form-control" id="eventTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="eventStart">Waktu Mulai</label>
                        <input type="datetime-local" class="form-control" id="eventStart" required>
                    </div>
                    <div class="form-group">
                        <label for="eventEnd">Waktu Selesai</label>
                        <input type="datetime-local" class="form-control" id="eventEnd">
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Deskripsi</label>
                        <textarea class="form-control" id="eventDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="eventType">Jenis Event</label>
                        <select class="form-control" id="eventType">
                            <option value="meeting">Meeting</option>
                            <option value="practice">Latihan</option>
                            <option value="event">Acara</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eventParticipants">Peserta (pisahkan dengan koma)</label>
                        <input type="text" class="form-control" id="eventParticipants">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" id="cancelBtn">Batal</button>
                        <button type="button" class="btn btn-danger" id="deleteBtn" style="display: none;">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/id.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize calendar
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [{
                    title: 'Meeting Rutin',
                    start: new Date(),
                    extendedProps: {
                        description: 'Meeting evaluasi program kerja',
                        type: 'meeting',
                        participants: ['John', 'Jane', 'Mike']
                    }
                }],
                eventClick: function(info) {
                    openModal(info.event);
                },
                dateClick: function(info) {
                    document.getElementById('eventStart').value = info.dateStr + 'T00:00';
                    document.getElementById('modalTitle').textContent = 'Tambah Event Baru';
                    document.getElementById('deleteBtn').style.display = 'none';
                    document.getElementById('eventForm').reset();
                    document.getElementById('eventModal').style.display = 'block';
                }
            });
            calendar.render();

            // Modal functionality
            const modal = document.getElementById('eventModal');
            const newEventBtn = document.getElementById('newEventBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const deleteBtn = document.getElementById('deleteBtn');
            const eventForm = document.getElementById('eventForm');

            newEventBtn.addEventListener('click', function() {
                document.getElementById('modalTitle').textContent = 'Tambah Event Baru';
                document.getElementById('deleteBtn').style.display = 'none';
                document.getElementById('eventForm').reset();
                modal.style.display = 'block';
            });

            cancelBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });

            eventForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const title = document.getElementById('eventTitle').value;
                const start = document.getElementById('eventStart').value;
                const end = document.getElementById('eventEnd').value;
                const description = document.getElementById('eventDescription').value;
                const type = document.getElementById('eventType').value;
                const participants = document.getElementById('eventParticipants').value.split(',').map(p => p.trim());

                const eventData = {
                    title: title,
                    start: start,
                    end: end || start,
                    extendedProps: {
                        description: description,
                        type: type,
                        participants: participants
                    },
                    backgroundColor: getEventColor(type),
                    borderColor: getEventColor(type)
                };

                calendar.addEvent(eventData);
                modal.style.display = 'none';
            });

            function openModal(event) {
                document.getElementById('modalTitle').textContent = 'Edit Event';
                document.getElementById('eventTitle').value = event.title;
                document.getElementById('eventStart').value = formatDateForInput(event.start);
                document.getElementById('eventEnd').value = event.end ? formatDateForInput(event.end) : '';
                document.getElementById('eventDescription').value = event.extendedProps.description || '';
                document.getElementById('eventType').value = event.extendedProps.type || 'meeting';
                document.getElementById('eventParticipants').value = event.extendedProps.participants ? event.extendedProps.participants.join(', ') : '';

                document.getElementById('deleteBtn').style.display = 'inline-block';
                document.getElementById('deleteBtn').onclick = function() {
                    if (confirm('Apakah Anda yakin ingin menghapus event ini?')) {
                        event.remove();
                        modal.style.display = 'none';
                    }
                };

                modal.style.display = 'block';
            }

            function formatDateForInput(date) {
                return date.toISOString().slice(0, 16);
            }

            function getEventColor(type) {
                const colors = {
                    'meeting': '#4299e1',
                    'practice': '#48bb78',
                    'event': '#9f7aea',
                    'other': '#ed8936'
                };
                return colors[type] || '#4299e1';
            }
        });
    </script>
</body>

</html>