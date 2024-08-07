<?php

# Database connection parameters


include 'C:\xampp\htdocs\Cities\conf.php';

# Create a PDO object to connect to the database
try {
    $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch(PDOException $e) {
    die('Error connecting to the database: ' . $e->getMessage());
}

# Query the database
$query = "SELECT * FROM `place1`";
$stmt = $db->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

# Create the XML document
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><my_table></my_table>');

foreach ($results as $row) {
    $xml_row = $xml->addChild('row');
    foreach ($row as $field_name => $field_value) {
        $xml_row->addChild($field_name, $field_value);
    }
}

# Output the XML document
header('Content-type: text/xml');
echo $xml->asXML();
