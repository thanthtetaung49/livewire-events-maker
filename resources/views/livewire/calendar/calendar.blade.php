<div class='px-10' x-data>
    <h3 class='text-slate-900 py-5 text-2xl font-bold text-center'>Event Lists</h3>

    <div class='flex justify-center mt-5'>
        <div class="w-full">
            <livewire:appointments-calendar before-calendar-view="calendar/before" />
        </div>
    </div>

    {{-- modal area --}}
    <jsuites-modal title="Event Create Modal" closed="true" width="800">
        <form id="createEventForm">
            <div class="flex">
                <div class="w-1/3">
                    <div>
                        <label for="eventTitle"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input id="eventTitle" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Title" required />
                    </div>

                </div>
                <div class="w-1/3 mx-3">
                    <label for="eventTitle"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <jsuites-calendar id="calendar" class="w-full text-sm" value=""></jsuites-calendar>
                </div>
                <div class="w-1/3">
                    <label for="eventDescription"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="eventDescription" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your description..."></textarea>
                </div>
            </div>

            <div class="flex justify-end mt-5">
                <button id="formButton" type="button" class="bg-blue-800 px-4 py-2 rounded-md text-sm text-white">Add
                    Events</button>
            </div>
        </form>
    </jsuites-modal>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {

            document.addEventListener("livewire:load", function() {
                const formButton = document.getElementById("formButton");

                let calendar = document.getElementById("calendar");
                let inputCalendar = calendar.querySelector("input");


                let title = document.getElementById("eventTitle");
                let description = document.getElementById("eventDescription");

                let jsuitesModal = document.querySelector('jsuites-modal');

                inputCalendar.disabled = true;

                document.querySelector('jsuites-calendar').addEventListener('onchange', function(e) {
                    console.log('New value: ' + e.target.value);
                });

                document.querySelector('jsuites-calendar').addEventListener('onclose', function(e) {
                    console.log('Calendar is closed');
                });

                Livewire.on('emitsOpenModal', (date) => {
                    inputCalendar.value = date;
                    jsuitesModal.modal.open();

                })

                @this.on('emitsOpenModal', (date) => {
                    inputCalendar.value = date;
                    jsuitesModal.modal.open();
                })

                function EventFormData(title, description, date) {
                    this.title = title;
                    this.description = description;
                    this.date = date;
                }

                function validateForm(title, description) {
                    let errorMessage = '';

                    if (!title.value && !description.value) {
                        errorMessage = 'You need to fill the title fields and description fields.';
                    } else if (!title.value) {
                        errorMessage = 'You need to fill the title fields.';
                    } else if (!description.value) {
                        errorMessage = 'You need to fill the description fields.';
                    }

                    if (errorMessage) {
                        jSuites.notification({
                            error: 1,
                            name: 'Error message',
                            message: errorMessage,
                        });
                        return false;
                    }

                    return true;
                }


                formButton.addEventListener("click", function(e) {
                    e.preventDefault();

                    const eventFormData = new EventFormData(
                        title.value,
                        description.value,
                        inputCalendar.value
                    );

                    if (title.value != "" && description.value != "") {
                        @this.createEvent(eventFormData);
                        return;
                    }


                    if (!validateForm(title, description)) { // return value is false
                        return;
                    }
                })

                // delete event
                Livewire.on('eventDelete', (eventId) => {
                    let confirmationMessage = window.confirm(
                        'Are you sure want to delete this events.');

                    if (confirmationMessage) {
                        @this.deleteEvent(eventId);
                    }
                })
            });

        })
    </script>
</div>
