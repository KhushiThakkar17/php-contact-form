# PHP Contact Form with XML Configuration

A server-side PHP contact form driven by an XML config file, built to 
simulate a university research office intake system.

## Features
- XML-driven form configuration — add or modify fields without touching PHP code
- Server-side validation for all 5 field types including email format checking
- XSS protection using htmlspecialchars() and input sanitization
- SQL injection prevention with prepared statements
- Logs all submissions to submissions.log with timestamp
- Success and error feedback messages for users

## Tech Stack
PHP, XML, HTML, CSS, XAMPP (Apache)

## File Structure
- index.php — Main form page, reads fields dynamically from XML
- config.xml — Defines all form fields, labels, types and validation rules
- process.php — Handles form submission, validates input, logs data
- submissions.log — Auto-generated log of all form submissions

## How to Run
1. Install XAMPP and start Apache
2. Copy folder to C:\xampp\htdocs\php-contact-form\
3. Open browser and go to 127.0.0.1/php-contact-form/
4. Fill out the form and submit

## Security
- All inputs sanitized with htmlspecialchars()
- Email validated with PHP filter_var()
- Required field validation on server side
- Zero client-side only validation — all checks happen in PHP
