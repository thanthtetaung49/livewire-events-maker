<div class="p-5">
    <div class="text-slate-800 font-semibold text-xl mb-5">
        <h3>Organization Tree</h3>
    </div>

    <div class="w-full flex">
        <div class="w-2/3">
            <div id="svg-tree"></div>
        </div>
        <div class="w-1/3">
            <ul
                class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li class="me-2">
                    <button
                        class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500 tabsButton">Parent
                        Department</button>
                </li>
                <li class="me-2">
                    <button
                        class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300 tabsButton">Child
                        Department</button>
                </li>
            </ul>

            {{-- form 1 --}}
            <form id="0" action="" class="mt-7">
                <div>
                    <label for="parent_department"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parent Department</label>
                    <input type="text" id="parent_department"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Department Name" required />

                    </div>
                    <div class="mt-5 flex justify-end w-full">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                    </div>
            </form>

            {{-- form 2 --}}
            <form id="1" action="" class="mt-7 hidden">
                form2
            </form>
        </div>
    </div>

    <script>
        const tabsButton = document.querySelectorAll(".tabsButton");
        const forms = document.querySelectorAll("form");

        // console.log(forms);

        tabsButton.forEach((button, index) => {
            button.addEventListener('click', (event) => {
                let showFormElement = [...forms].filter((form) => index == form.id);
                let hideFormElement = [...forms].filter((form) => index != form.id);

                let removeActiveClassOnButton = [...tabsButton].filter((filterButton, filterIndex) =>
                    index != filterIndex );

                // active button class
                button.classList.add("text-blue-600");
                button.classList.add("bg-gray-100");
                button.classList.add("dark:bg-gray-800");
                button.classList.add("dark:text-blue-500");
                button.classList.remove("hover:text-gray-600");
                button.classList.remove("hover:bg-gray-50");
                button.classList.remove("dark:hover:bg-gray-800");
                button.classList.remove("dark:hover:text-gray-300");

                // remove button class
                removeActiveClassOnButton[0].classList.remove("text-blue-600");
                removeActiveClassOnButton[0].classList.remove("bg-gray-100");
                removeActiveClassOnButton[0].classList.remove("dark:bg-gray-800");
                removeActiveClassOnButton[0].classList.remove("dark:text-blue-500");
                removeActiveClassOnButton[0].classList.add("hover:text-gray-600");
                removeActiveClassOnButton[0].classList.add("hover:bg-gray-50");
                removeActiveClassOnButton[0].classList.add("dark:hover:bg-gray-800");
                removeActiveClassOnButton[0].classList.add("dark:hover:text-gray-300");

                showFormElement[0].classList.remove('hidden'); // show form
                hideFormElement[0].classList.add('hidden'); // hide form

            });
        });

        const data = {
            "id": "1",
            "name": "IT Department",
            "children": [{
                    "id": "2",
                    "name": "Business Intelligence"
                },
                {
                    "id": "3",
                    "name": "Operation"
                },
                {
                    "id": "4",
                    "name": "Charging and Billing System"
                },
                {
                    "id": "5",
                    "name": "Development and Delivery"
                },
                {
                    "id": "6",
                    "name": "Infrastructure & Security"
                },
                {
                    "id": "7",
                    "name": "Business Security"
                }
            ]
        }

        const options = {
            width: 800,
            height: 500,
            nodeWidth: 120,
            nodeHeight: 80,
            childrenSpacing: 100,
            siblingSpacing: 30,
            direction: 'top',
            canvasStyle: 'border: 1px solid #3e8db5; background: #f6f6f6;',
            nodeBGColor: '#79c6ed',
            nodeBGColorHover: '#3e8db5',
            fontColor: '#ffff',

        };

        const tree = new ApexTree(document.getElementById('svg-tree'), options);
        const graph = tree.render(data);
    </script>
</div>
