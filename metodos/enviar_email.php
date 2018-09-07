<?php
function emailNotification ($nombrep,$fechav){
$email_to = "hipersocial08@gmail.com";
$email_subject = $nombrep;
$email_from = "soporte@mianimeonline.net";
$email_message =  "Ya faltan 30 dias para el vencimiento de " . $nombrep;

        // Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
}
?>