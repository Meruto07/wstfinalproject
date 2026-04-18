<?php
$xmlFile = 'data/names.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    
    if ($xml->count() > 0) {
        foreach ($xml->name as $name) {
            echo '<div class="name-item">';
            echo htmlspecialchars((string)$name);
            echo '<form action="process.php" method="POST" style="display: inline;">';
            echo '<input type="hidden" name="name" value="' . htmlspecialchars((string)$name) . '">';
            echo '<input type="hidden" name="action" value="delete">';
            echo '<button type="submit" class="delete" onclick="return confirm(\'Are you sure you want to delete this name?\')">Delete</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>No names stored yet.</p>';
    }
} else {
    echo '<p>No names stored yet.</p>';
}
?>