<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Aurevia creations</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }
    h2 {
      text-align: center;
    }
    form, table {
      max-width: 900px;
      margin: 0 auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    input, select {
      padding: 8px;
      margin: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      padding: 8px 16px;
      margin: 5px;
      background-color: #18d26e;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #13b25e;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    th {
      background-color: #18d26e;
      color: white;
    }
  </style>
</head>
<body>

<h2>Team Task Tracker</h2>

<form method="POST" action="add_task.php">
  <input type="hidden" name="id" id="taskId" />
  <input type="text" name="name" id="name" placeholder="Name" required />
  <input type="text" name="task" id="task" placeholder="Task" required />
  <input type="date" name="date" id="date" required />
  <input type="time" name="timeIn" id="timeIn" required />
  <input type="time" name="timeOut" id="timeOut" required />
  <select name="status" id="status" required>
    <option value="Pending">Pending</option>
    <option value="Day work">Day Work</option>
    <option value="Night Work">Night Work</option>
  </select>
  <button type="submit">Add / Update</button>
</form>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Task</th>
      <th>Date</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $result = $con->query("SELECT * FROM tasks ORDER BY id DESC");
      while ($row = $result->fetch_assoc()):
    ?>
    <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['task'] ?></td>
      <td><?= $row['date'] ?></td>
      <td><?= $row['time_in'] ?></td>
      <td><?= $row['time_out'] ?></td>
      <td><?= $row['status'] ?></td>
      <td>
        <button onclick='editTask(<?= json_encode($row) ?>)'>Edit</button>
        <a href="delete_task.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">
          <button style="background-color: #e74c3c;">Delete</button>
        </a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<script>
  function editTask(task) {
    document.getElementById("taskId").value = task.id;
    document.getElementById("name").value = task.name;
    document.getElementById("task").value = task.task;
    document.getElementById("date").value = task.date;
    document.getElementById("timeIn").value = task.time_in;
    document.getElementById("timeOut").value = task.time_out;
    document.getElementById("status").value = task.status;
  }
</script>

</body>
</html>
