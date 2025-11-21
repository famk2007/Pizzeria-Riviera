<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclusion des fichiers PHPMailer
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données reçues du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP (serveur Gmail)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'fadigoel.123@gmail.com'; // ton adresse Gmail
        $mail->Password   = 'sxaq qroz yrxy siie';    // mot de passe d’application Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Expéditeur et destinataire
        $mail->setFrom('fadigoel.123@gmail.com', 'Formulaire Contact'); 
        $mail->addAddress('fadigoel.123@gmail.com'); // destinataire
        $mail->addReplyTo($email, $nom); // permet de répondre directement à l’expéditeur

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message depuis le formulaire";
        $mail->Body    = "
            <h3>Nouveau message reçu</h3>
            <p><strong>Nom :</strong> $nom</p>
            <p><strong>Email :</strong> $email</p>
            <p><strong>Message :</strong><br>$message</p>
        ";
        $mail->AltBody = "Nom: $nom\nEmail: $email\nMessage:\n$message";

        // Envoi
        $mail->send();
        echo "Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
}
?>

