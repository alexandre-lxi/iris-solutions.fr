<?php
$name = $email = $company = $phone = $subject = $message = "";

function clear_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function emailsent() {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = clear_input($_POST["name"]);
		$email = clear_input($_POST["email"]);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		$phone = clear_input($_POST["phone"]);
		$subject = clear_input($_POST["subject"]);
		$company = clear_input($_POST["company"]);
		$message = clear_input($_POST["message"]);
		$result = false;

		require_once './phpmailer/PHPMailerAutoload.php';

		$results_messages = array();

		$mail = new PHPMailer(true);
		$mail -> CharSet = 'utf-8';

		class phpmailerAppException extends phpmailerException {
		}

		try {
			$to = 'contact@iris-solutions.fr';
			if (!PHPMailer::validateAddress($to)) {
				throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
			}
			$mail -> isSMTP();
			$mail -> SMTPDebug = 0;
			$mail -> Host = "ssl://smtp.iris-solutions.fr:465";
			$mail -> Port = "465";
			$mail -> SMTPSecure = "SSL";
			$mail->SMTPAuth   = true;
			$mail->Username   = "postmaster@iris-solutions.fr";
			$mail->Password   = "3Down22go@";		
			$mail -> From = $email;
			$mail -> FromName = $name;
			$mail -> addAddress("contact@iris-solutions.fr");
			$mail -> addAddress("alexandre.laidin@iris-solutions.fr");
			$mail -> Subject = $subject;
			
			$body = 'email:'.$email.'#name:'.$name.'#company:'.$company.'#phone:'.$phone.'#subject:'.$subject.'#message:'.$message;
			
			$mail -> msgHTML($body, dirname(__FILE__), true);
			
			$domain = explode('@',$email, 2);
			if (checkdnsrr($domain[1] . '.', 'MX')){			
				try {
					$mail -> send();
					$results_messages[] = "Message has been sent using SMTP";
					$result = true;				
				} catch (phpmailerException $e) {
					throw new phpmailerAppException('Unable to send to: ' . $to . ': ' . $e -> getMessage());
				}
			}
		} catch (phpmailerAppException $e) {
			$results_messages[] = $e -> errorMessage();
		}

		if (count($results_messages) > 0) {
			foreach ($results_messages as $result) {
				error_log($result);
			}
						
		}
		
		return $result;

	} else {
		return false;
	}
}
?>