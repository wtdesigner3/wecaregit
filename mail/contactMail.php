<?php

require('../inc/function.php');

$secret   = RECAPTCHA_SECRET_KEY;
$response = $_POST['g-recaptcha-response'] ?? '';

$verify = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $response
);

$result = json_decode($verify);

if ($result && $result->success) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname    = trim($_POST['name']    ?? '');
        $email    = trim($_POST['email']    ?? '');
        $phone    = trim($_POST['phone']    ?? '');
        $message  = trim($_POST['message']  ?? '');
        $patient  = trim($_POST['patient']  ?? '');
        $service  = trim($_POST['service']  ?? '');
        
        $errors = [];

        if (!preg_match("/^[a-zA-Z '-]+$/", $fname)) {
            $errors[] = "Name must contain only letters.";
        }
        
        elseif (strlen($fname) < 3) {
            $errors[] = "Name must be at least 3 characters.";
        }
        
        elseif (strlen($fname) > 50) {
            $errors[] = "Name is too long.";
        }
        
        elseif (str_word_count($fname) > 3) {
            $errors[] = "Name must not exceed 3 words.";
        }
        
        else {
            foreach (explode(' ', $fname) as $word) {
                if (strlen($word) > 20) {
                    $errors[] = "Name contains an unusually long word.";
                    break;
                }
            }
        }
        
    if(!empty($patient)){
        if (!preg_match("/^[a-zA-Z '-]+$/", $patient)) {
            $errors[] = "Patient must contain only letters.";
        }  
    }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (!preg_match("/^[6-9][0-9]{9}$/", $phone)) {
            $errors[] = "Phone must be exactly 10 digits and start with 6, 7, 8, or 9.";
        }

        if (preg_match($urlPattern, $message)) {
            $errors[] = "Message must not contain URLs.";
        }
        
        if (!empty($errors)) {
            $errorText = implode('\n', $errors); 
            $errorText = addslashes($errorText); 
            echo "<script>alert('" . $errorText . "'); window.location='" . BASE_URL . "contact';</script>";
            exit;
        }          

        if (!empty($email) && !empty($fname)) {

            // $to      = 'wtdeveloperpankaj@gmail.com';
            $to      = 'info@wecare.com';
            $subject = 'WeCare Dental Query From ' . $name;

            $body = '<!DOCTYPE html>
<html>
<head><title>Email Template</title></head>
<body style="margin:0;padding:0;font-family:Arial,sans-serif;background-color:#f8f9fa;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0"
        style="background-color:#f8f9fa;padding:20px 0;">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0"
                    style="background-color:#ffffff;border:1px solid #e6e6e6;
                           border-radius:8px;overflow:hidden;">

                    <!-- Logo -->
                    <tr>
                        <td style="padding:20px;">
                            <img src="https://wecaredentist.com/uploads/logo.png"
                                alt="Logo"
                                style="display:block;max-width:150px;width:150px;border-radius:5px;" />
                        </td>
                    </tr>

                    <!-- Subject -->
                    <tr>
                        <td align="center"
                            style="font-size:15px;font-weight:bold;color:#333333;
                                   padding:10px 20px;background-color:#f0f0f0;
                                   border-top:1px solid #e6e6e6;
                                   border-bottom:1px solid #e6e6e6;">
                            ' . htmlspecialchars($subject) . '
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="text-align:left;font-size:16px;color:#555555;
                                   line-height:1.8;padding:25px 20px;">
                            <p style="margin:0 0 10px 0;">
                                <strong>Name:</strong> ' . htmlspecialchars($fname) . '
                            </p>
                            <p style="margin:0 0 10px 0;">
                                <strong>Email:</strong> ' . htmlspecialchars($email) . '
                            </p>';

            if (!empty($phone)) {
                $body .= '<p style="margin:0 0 10px 0;">
                            <strong>Phone:</strong> ' . nl2br(htmlspecialchars($phone)) . '
                          </p>';
            }

            if (!empty($patient)) {
                $body .= '<p style="margin:0 0 10px 0;">
                            <strong>Patient:</strong> ' . nl2br(htmlspecialchars($patient)) . '
                          </p>';
            }

            if (!empty($service)) {
                $body .= '<p style="margin:0 0 10px 0;">
                            <strong>Service:</strong> ' . nl2br(htmlspecialchars($service)) . '
                          </p>';
            }

            if (!empty($message)) {
                $body .= '<p style="margin:0 0 10px 0;">
                            <strong>Message:</strong> ' . nl2br(htmlspecialchars($message)) . '
                          </p>';
            }

            $body .= '
                        </td>
                    </tr>

                    <!-- Brand Footer -->
                    <tr>
                        <td style="background:rgb(240,107,30);text-align:center;padding:15px 0;">
                            <a href="https://wecaredentist.com" target="_blank"
                                style="color:white;text-decoration:none;font-size:14px;">
                                ©2026 WeCare Dental
                            </a>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

            // Send mail
            $headers  = "From: WeCare Dental <support@wecaredentist.com>\r\n";
            $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
            $headers .= "CC: digital@thewebtycoons.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            $sent = mail($to, $subject, $body, $headers);

            // Log result for debugging (remove after confirmed working)
            file_put_contents(
                __DIR__ . '/mail_log.txt',
                date('Y-m-d H:i:s') . ' | ' . ($sent ? 'SUCCESS' : 'FAILED') .
                ' | To: ' . $to . ' | Subject: ' . $subject . "\n",
                FILE_APPEND
            );

            echo '<script>window.location="' . BASE_URL . 'thank-you";</script>';
            exit;

        } else {
            echo '<script>alert("Please fill up all the required fields (Email & First Name)!");</script>';
            echo '<script>window.location="' . BASE_URL . '";</script>';
            exit;
        }
    }

} else {
    echo '<script>alert("reCAPTCHA verification failed. Please try again.");</script>';
    echo '<script>window.location="' . BASE_URL . '";</script>';
    exit;
}
?>