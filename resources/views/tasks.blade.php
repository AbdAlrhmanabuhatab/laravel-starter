<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Task List</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #fff;
      color: #333;
    }

    .navbar {
      height: 50px;
      background: #f8f8f8;
      border-bottom: 1px solid #eee;
    }

    .navbar h2 {
      margin: 0;
      padding: 13px 0 0 110px;
      font-size: 20px;
      font-weight: 400;
      color: #111;
    }

    .navbar span {
      color: #f1c40f;
    }

    .container {
      width: 820px;
      margin: 25px auto;
    }

    .panel {
      border: 1px solid #ddd;
      border-radius: 4px;
      margin-bottom: 22px;
      overflow: hidden;
      background: white;
    }

    .panel-heading {
      background: #f5f5f5;
      border-bottom: 1px solid #ddd;
      padding: 11px 15px;
      font-size: 16px;
    }

    .panel-body {
      padding: 18px 15px 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 9px;
      font-size: 14px;
    }

    input {
      width: 100%;
      height: 34px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 15px;
      padding: 6px 10px;
      margin-bottom: 15px;
    }

    .btn-add {
      background: #0d6efd;
      color: white;
      border: none;
      padding: 10px 14px;
      border-radius: 4px;
      font-size: 15px;
      cursor: pointer;
    }

    .btn-add i {
      margin-right: 7px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 15px;
    }

    th {
      text-align: left;
      padding: 12px 8px;
      border-bottom: 2px solid #eee;
    }

    td {
      padding: 9px 8px;
    }

    tbody tr:nth-child(odd) {
      background: #f4f4f4;
    }

    .btn-delete {
      background: #ef4444;
      color: white;
      border: none;
      padding: 9px 13px;
      border-radius: 4px;
      font-size: 15px;
      cursor: pointer;
    }

    .btn-delete i {
      margin-right: 6px;
    }
  </style>
</head>

<body>

  <div class="navbar">
    <h2>Task <span>List</span></h2>
  </div>

  <div class="container">

    <div class="panel">
      <div class="panel-heading">New Task</div>

      <div class="panel-body">
        <form action="{{ url('create') }}" method="POST">
          @csrf

          <label for="task-name">Task</label>

          <input
            type="text"
            name="name"
            id="task-name"
          />

          <button type="submit" class="btn-add">
            <i class="fa-solid fa-plus"></i>
            Add Task
          </button>
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
            <tr>
              <td>Task 1</td>
              <td>
                <button class="btn-delete">
                  <i class="fa-solid fa-trash"></i>
                  Delete
                </button>
              </td>
            </tr>

            <tr>
              <td>Task 2</td>
              <td>
                <button class="btn-delete">
                  <i class="fa-solid fa-trash"></i>
                  Delete
                </button>
              </td>
            </tr>

            <tr>
              <td>Task 3</td>
              <td>
                <button class="btn-delete">
                  <i class="fa-solid fa-trash"></i>
                  Delete
                </button>
              </td>
            </tr>
          </tbody>

        </table>
      </div>
    </div>

  </div>

</body>
</html>
