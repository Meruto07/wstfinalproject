<?php

$xmlFile = 'data/names.xml';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    if ($action === 'add') {        
        $name = trim($_POST['name']);
       
        if (!empty($name)) {           
            if (!file_exists($xmlFile)) {
                $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><names></names>');
                $xml->asXML($xmlFile);
            }
            
            $xml = simplexml_load_file($xmlFile);
            
            $exists = false;
            foreach ($xml->name as $existingName) {
                if ((string)$existingName === $name) {
                    $exists = true;
                    break;
                }
            }
            
            if (!$exists) {
                $xml->addChild('name', htmlspecialchars($name));
                $xml->asXML($xmlFile);
                header('Location: index.php?message=Name added successfully!&type=success');
            } else {
                header('Location: index.php?message=Name already exists!&type=error');
            }
            exit;
        }
    } elseif ($action === 'delete') {
        $nameToDelete = $_POST['name'];
        
        if (file_exists($xmlFile)) {
            $xml = simplexml_load_file($xmlFile);
            
            $index = 0;
            $found = false;
            foreach ($xml->name as $name) {
                if ((string)$name === $nameToDelete) {
                    $found = true;
                    break;
                }
                $index++;
            }
            
            if ($found) {
                unset($xml->name[$index]);
                $xml->asXML($xmlFile);
                header('Location: index.php?message=Name deleted successfully!&type=success');
            } else {
                header('Location: index.php?message=Name not found!&type=error');
            }
            exit;
        }
    }
}

header('Location: index.php?message=An error occurred!&type=error');
exit;
?>