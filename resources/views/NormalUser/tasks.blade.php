<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Freeman&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet"
        />
        <style>
            * {
                font-family: "Roboto", sans-serif;
            }
            .roboto-regular {
                font-weight: 400;
                font-style: normal;
            }
            .center {
                text-align: center;
            }
            .red {
                color: red;
            }
            .green {
                color: green;
            }
            .full {
                width: 100%;
            }
            button.add-btn {
                border: 1px solid black;
            }
            button.add-btn:hover {
                background-color: black;
                color: white;
            }
            .end-col {
                display: flex;
                justify-content: end;
            }
            table th,
            table td {
                text-align: center !important;
            }
            .modal form {
                display: flex;
                flex-direction: column;
            }
            .modal form input,
            .modal form textarea {
                border: 1px solid lightgray;
                outline: none;
                padding: 10px 20px;
                margin: 5px 0;
                border-radius: 5px;
            }
            .modal form label {
                font-size: 12px;
                color: grey;
            }
            table thead, th{
                background: darkgray;
                color: black !important;

            }
            table tr:nth-child(even){
                background: lightgray;
            }
            table{
                margin: 10px auto;
            }
        </style>
    </head>
    <body>
        <x-app-layout>
           
            

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-xl sm:rounded-lg"
                    >
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="container full">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-6"><h3 class="font-semibold text-xl text-gray-800 leading-tight">Tasks</h3></div>
                                    <div class="col-6 end-col">
                                        <button data-bs-toggle="modal"
                                        data-bs-target="#addModal" class="add-btn btn">Add</button>
                                    </div>
                                </div>
                            </div>
                            <table class="full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Title
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Description
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Status
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Edit
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            {{ $task->title }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            {{ $task->description }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            {{ $task->status }}
                                        </td>
                                        <td
                                            class="center px-6 py-4 whitespace-nowrap text-gray-900"
                                        >
                                            <button
                                                type="button"
                                                data-task-id="{{ $task->id }}"
                                                class="green fa-solid fa-pen-to-square edit-btn font-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateModal"
                                            ></button>
                                        </td>

                                        <td
                                            class="center px-6 py-4 whitespace-nowrap text-gray-900"
                                        >
                                            <button
                                                type="button"
                                                class="red fa-solid fa-trash del-btn font-sm"
                                                
                                            ></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
        <div
            class="modal fade"
            id="updateModal"
            tabindex="-1"
            aria-labelledby="updateModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">
                            Update Task
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form id="taskForm">
                            @csrf
                            <input type="hidden" id="taskId" name="taskId" />
                            <!-- Title input -->
                            <div class="mb-3">
                                <label for="title" class="form-label"
                                    >Title</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    id="title"
                                />
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label"
                                    >Description</label
                                >
                                <textarea
                                    class="form-control"
                                    name="description"
                                    id="description"
                                ></textarea>
                            </div>

                            <!-- Status dropdown -->
                            <div class="mb-3">
                                <label for="status" class="form-label"
                                    >Status</label
                                >
                                <select
                                    class="form-select"
                                    name="status"
                                    id="status"
                                ></select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            id="saveChangesBtn"
                        >
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="addModal"
            tabindex="-1"
            aria-labelledby="addModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">
                            Add Task
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form
                            id="addTaskForm"
                            action="{{ route('add-task') }}"
                            method="post"
                        >
                            @csrf
                            <div class="mb-3">
                                <label for="add-title" class="form-label"
                                    >Title</label
                                >
                                <input
                                type="text"
                                class="form-control"
                                name="add-title"
                                id="add-title"
                                placeholder="Add title"
                            />
                            
                            </div>

                            <div class="mb-3">
                                <label for="add-description" class="form-label"
                                    >Description</label
                                >
                                <textarea
                                    class="form-control"
                                    name="add-description"
                                    id="add-description"
                                    placeholder="Add Description"
                                ></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="add-status" class="form-label"
                                    >Status</label
                                >
                                <select class="form-select" name="add-status" id="add-status">
                                    @foreach ($statusOptions as $status)
                                        <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Done
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Edit button click event listener
                const editButtons = document.querySelectorAll(".edit-btn");
                editButtons.forEach((button) => {
                    button.addEventListener("click", async function () {
                        const taskId = this.getAttribute("data-task-id");

                        try {
                            const response = await fetch(`/tasks/${taskId}`);
                            const taskData = await response.json();

                            document.getElementById("taskId").value = taskId;
                            document.getElementById("title").value =
                                taskData.title;
                            document.getElementById("description").value =
                                taskData.description;
                            const statusDropdown =
                                document.getElementById("status");
                            statusDropdown.innerHTML = ""; 
                            const statusOptions = [
                                "pending",
                                "in-progress",
                                "completed",
                            ];
                            statusOptions.forEach((status) => {
                                const option = document.createElement("option");
                                option.value = status;
                                option.text =
                                    status.charAt(0).toUpperCase() +
                                    status.slice(1); 
                                if (taskData.status === status) {
                                    option.selected = true; 
                                }
                                statusDropdown.appendChild(option);
                            });
                        } catch (error) {
                            console.error(
                                "Error fetching task details:",
                                error
                            );
                        }
                    });
                });

                document
                    .getElementById("saveChangesBtn")
                    .addEventListener("click", async function () {
                        
                        const formData = new FormData(
                            document.getElementById("taskForm")
                        );

                        try {
                            const response = await fetch("/updateTask", {
                                method: "POST",
                                body: formData,
                            });
                            if (response.ok) {
                                console.log("Task updated successfully");
                                location.reload();
                            } else {
                                console.error(
                                    "Error updating task:",
                                    response.statusText
                                );
                            }
                        } catch (error) {
                            console.error("Error updating task:", error);
                        }
                    });
            });
        </script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
