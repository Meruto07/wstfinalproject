<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Systems Final Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .authors {
            font-size: 0.9em;
            margin-bottom: 30px;
        }
        .input-section {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
            margin-right: 10px;
        }
        button {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button.delete {
            background-color: #f44336;
            padding: 3px 8px;
            margin-left: 10px;
        }
        button:hover {
            opacity: 0.8;
        }
        .names-list {
            text-align: left;
            margin-top: 20px;
        }
        .name-item {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <h1>Web Systems Final Project</h1>
    <div class="authors">By: Booc, Alexander Nathanael, B. and Canlas, Arvin Nicolai, DS</div>
    
    <?php
    if (isset($_GET['message'])) {
        $msg_type = isset($_GET['type']) ? $_GET['type'] : 'success';
        echo '<div class="message ' . htmlspecialchars($msg_type) . '">' . htmlspecialchars($_GET['message']) . '</div>';
    }
    ?>
    
    <div class="input-section">
        <h3>Add New Name</h3>
        <form action="process.php" method="POST">
            <input type="text" name="name" placeholder="Enter a name" required>
            <input type="hidden" name="action" value="add">
            <button type="submit">Add Name</button>
        </form>
    </div>
    
    <div class="names-list">
        <h3>Stored Names</h3>
        <div id="names-container">
            <?php include 'list_names.php'; ?>
        </div>
    </div>
</body>
</html>