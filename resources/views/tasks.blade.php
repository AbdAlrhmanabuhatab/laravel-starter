<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #222;
        }

        .navbar {
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        }

        .navbar h2 {
            width: 820px;
            margin: 0 auto;
            padding-top: 18px;
            font-size: 24px;
            font-weight: 700;
            color: #111827;
        }

        .navbar span {
            color: #f59e0b;
        }

        .container {
            width: 820px;
            margin: 35px auto;
        }

        .panel {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            margin-bottom: 24px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
        }

        .panel-heading {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 22px;
            font-size: 18px;
            font-weight: 700;
        }

        .panel-body {
            padding: 22px;
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 9px;
            font-size: 14px;
        }

        input {
            width: 100%;
            height: 44px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 15px;
            padding: 8px 14px;
            margin-bottom: 15px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .btn-add,
        .btn-delete,
        .btn--info,
        .btn-cancel {
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-add {
            background: #2563eb;
        }

        .btn-delete {
            background: #ef4444;
        }

        .btn--info {
            background: #0ea5e9;
        }

        .btn-cancel {
            background: #6b7280;
            margin-left: 8px;
        }

        .btn-add:hover {
            background: #1d4ed8;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        .btn--info:hover {
            background: #0284c7;
        }

        .btn-cancel:hover {
            background: #4b5563;
        }

        .btn-add i,
        .btn-delete i,
        .btn--info i,
        .btn-cancel i {
            margin-right: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        th {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        th:last-child,
        td:last-child {
            text-align: right;
            white-space: nowrap;
        }

        .d-inline,
        .action-form {
            display: inline-block;
        }

        .action-form {
            margin-left: 8px;
        }

        .empty-message {
            text-align: center;
            color: #777;
            padding: 25px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Task <span>List</span></h2>
    </div>

    <div class="container">

        <div class="panel">
            <div class="panel-heading">
                @if (isset($task))
                    Update Task
                @else
                    New Task
                @endif
            </div>

            <div class="panel-body">
                <form
                    action="{{ isset($task) ? url('update') : url('create') }}"
                    method="POST"
                >
                    @csrf

                    @if (isset($task))
                        <input type="hidden" name="id" value="{{ $task->id }}">
                    @endif

                    <label for="task-name">Task</label>

                    <input
                        type="text"
                        name="name"
                        id="task-name"
                        value="{{ isset($task) ? $task->name : old('name') }}"
                        required
                    >

                    <button type="submit" class="btn-add">
                        @if (isset($task))
                            <i class="fa-solid fa-pen-to-square"></i>
                            Update Task
                        @else
                            <i class="fa-solid fa-plus"></i>
                            Add Task
                        @endif
                    </button>

                    @if (isset($task))
                        <a href="{{ url('/') }}" class="btn-cancel">
                            <i class="fa-solid fa-xmark"></i>
                            Cancel
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">Current Tasks</div>

            <div class="panel-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 35%;">Task</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($tasks as $taskItem)
                            <tr>
                                <td>{{ $taskItem->name }}</td>

                                <td>
                                    <form action="/delete/{{ $taskItem->id }}" method="POST" class="d-inline">
                                        @csrf

                                        <button type="submit" class="btn-delete">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>

                                    <form action="/edit/{{ $taskItem->id }}" method="POST" class="action-form">
                                        @csrf

                                        <button type="submit" class="btn btn--info">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="empty-message">
                                    No tasks found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</body>

</html>
