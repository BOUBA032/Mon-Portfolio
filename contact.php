<?php
// contact.php - envoie le formulaire de contact via SMTP (PHPMailer, sans Composer)

require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

$config = require 'includes/smtp_config.php';

// Récupération et nettoyage des champs
$nom     = trim($_POST['nom'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if ($nom === '' || $email === '' || $message === '') {
    echo json_encode(['success' => false, 'message' => 'Tous les champs sont obligatoires.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Adresse email invalide.']);
    exit;
}

$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host       = $config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['username'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $config['port'];
    $mail->CharSet    = 'UTF-8';

    // Expéditeur / destinataire
    $mail->setFrom($config['from_email'], $config['from_name']);
    $mail->addAddress($config['to_email']);
    $mail->addReplyTo($email, $nom); // pour pouvoir répondre directement à la personne

    // Contenu
    $mail->isHTML(false);
    $mail->Subject = "Nouveau message de $nom via le portfolio";
    $mail->Body    = "Nom : $nom\nEmail : $email\n\nMessage :\n$message";

    $mail->send();
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => "Erreur d'envoi : {$mail->ErrorInfo}"
    ]);
}
