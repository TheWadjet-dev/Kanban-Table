<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $newTask = [
        'id' => uniqid(),
        'title' => $_POST['title'] ?? 'Untitled',
        'description' => $_POST['description'] ?? '',
        'status' => 'To Do'
    ];
    $_SESSION['tasks'][] = $newTask;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'updateStatus') {
    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] == $_POST['id']) {
            $task['status'] = $_POST['status'];
            break;
        }
    }
}

function getTasksByStatus($status) {
    return array_filter($_SESSION['tasks'], fn($task) => $task['status'] == $status);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kanban Board</title>
    <style>
        .column { width: 30%; float: left; padding: 10px; }
        .task { background: #f4f4f4; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Kanban Board</h1>

    <form method="post">
        <input type="hidden" name="action" value="add">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button type="submit">Add Task</button>
    </form>

    <div class="column">
        <h2>To Do</h2>
        <?php foreach (getTasksByStatus('To Do') as $task): ?>
            <div class="task">
                <h3><?= htmlspecialchars($task['title']) ?></h3>
                <p><?= htmlspecialchars($task['description']) ?></p>
                <form method="post">
                    <input type="hidden" name="action" value="updateStatus">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button name="status" value="In Progress">Move to In Progress</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="column">
        <h2>In Progress</h2>
        <?php foreach (getTasksByStatus('In Progress') as $task): ?>
            <div class="task">
                <h3><?= htmlspecialchars($task['title']) ?></h3>
                <p><?= htmlspecialchars($task['description']) ?></p>
                <form method="post">
                    <input type="hidden" name="action" value="updateStatus">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button name="status" value="Done">Move to Done</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="column">
        <h2>Done</h2>
        <?php foreach (getTasksByStatus('Done') as $task): ?>
            <div class="task">
                <h3><?= htmlspecialchars($task['title']) ?></h3>
                <p><?= htmlspecialchars($task['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
