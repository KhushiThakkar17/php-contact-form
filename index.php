<?php
$xml = simplexml_load_file('config.xml');
$formTitle = $xml->title;
$fields = $xml->fields->field;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $formTitle; ?></title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; background: #f5f5f5; }
    header { background: #c41230; color: white; padding: 20px 40px; }
    header h1 { font-size: 22px; }
    header p { font-size: 13px; opacity: 0.9; }
    .container { max-width: 700px; margin: 40px auto; background: white; padding: 40px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    h2 { color: #1a1a2e; margin-bottom: 24px; border-left: 4px solid #c41230; padding-left: 12px; }
    .field { margin-bottom: 20px; }
    label { display: block; margin-bottom: 6px; font-weight: bold; font-size: 14px; color: #333; }
    input, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; font-family: Arial, sans-serif; }
    input:focus, textarea:focus { outline: none; border-color: #c41230; }
    textarea { height: 120px; resize: vertical; }
    .btn { background: #c41230; color: white; padding: 12px 28px; border: none; border-radius: 4px; font-size: 15px; cursor: pointer; }
    .btn:hover { background: #a00f26; }
    .success { background: #e8f5e9; border: 1px solid #a5d6a7; color: #2e7d32; padding: 16px; border-radius: 4px; margin-bottom: 20px; }
    .error { background: #ffebee; border: 1px solid #ef9a9a; color: #c62828; padding: 16px; border-radius: 4px; margin-bottom: 20px; }
    footer { text-align: center; padding: 20px; color: #888; font-size: 13px; margin-top: 40px; }
  </style>
</head>
<body>
  <header>
    <h1>Office of Research Administration</h1>
    <p>University of Maryland, College Park</p>
  </header>
  <div class="container">
    <h2><?php echo $formTitle; ?></h2>
    <?php if(isset($_GET['success'])): ?>
      <div class="success">✅ Your message has been submitted successfully! We will follow up within 5 business days.</div>
    <?php endif; ?>
    <?php if(isset($_GET['error'])): ?>
      <div class="error">❌ Please fill in all required fields correctly.</div>
    <?php endif; ?>
    <form action="process.php" method="POST">
      <?php foreach($fields as $field): ?>
        <div class="field">
          <label><?php echo $field['label']; ?><?php if($field['required'] == 'true') echo ' *'; ?></label>
          <?php if($field['type'] == 'textarea'): ?>
            <textarea name="<?php echo $field['name']; ?>" required></textarea>
          <?php else: ?>
            <input type="<?php echo $field['type']; ?>" name="<?php echo $field['name']; ?>" required>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
      <button type="submit" class="btn">Submit Request</button>
    </form>
  </div>
  <footer>© 2026 Office of Research Administration | University of Maryland</footer>
</body>
</html>