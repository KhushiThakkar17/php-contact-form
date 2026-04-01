<?php
$xml = simplexml_load_file('config.xml');
$fields = $xml->fields->field;

$errors = [];
$data = [];

foreach($fields as $field) {
    $name = (string)$field['name'];
    $required = (string)$field['required'];
    $type = (string)$field['type'];
    $value = htmlspecialchars(trim($_POST[$name] ?? ''), ENT_QUOTES, 'UTF-8');
    if($required === 'true' && empty($value)) {
        $errors[] = $name;
    }
    if($type === 'email' && !empty($value)) {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $errors[] = $name;
        }
    }
    $data[$name] = $value;
}

if(!empty($errors)) {
    header('Location: index.php?error=1');
    exit;
}

$logEntry = date('Y-m-d H:i:s') . " | " .
            "Name: " . $data['name'] . " | " .
            "Email: " . $data['email'] . " | " .
            "Dept: " . $data['department'] . " | " .
            "Subject: " . $data['subject'] . "\n";

file_put_contents('submissions.log', $logEntry, FILE_APPEND);

header('Location: index.php?success=1');
exit;
?>

