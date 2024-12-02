<?php
session_start();

// Carregar o autoload do Composer (necessário para usar PHPMailer)
require __DIR__ . "/vendor/autoload.php"; // Certifique-se de que o caminho está correto para o autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Verificar se o e-mail do destinatário foi passado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_destinatario']) && !empty($_POST['email_destinatario'])) {
    $emailDestinatario = $_POST['email_destinatario']; // E-mail do destinatário passado pelo formulário

    try {
        // Inicializando a classe PHPMailer
        $mail = new PHPMailer(true);

        // Desabilitar verificação SSL
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Configurações do servidor SMTP
        $mail->isSMTP();                                            // Define que usará o SMTP
        $mail->SMTPAuth = true;                                       // Habilita autenticação SMTP
        $mail->Host = 'smtp.gmail.com';                               // Servidor SMTP do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // Criptografia TLS
        $mail->Port = 587;                                            // Porta para o TLS
        $mail->Username = 'ba891575@gmail.com';                       // Seu e-mail
        $mail->Password = 'ifgo pskk mrrt nxtj';                      // Senha de aplicativo do Gmail

        // Remetente e destinatário
        $mail->setFrom('ba891575@gmail.com', 'Nome Remetente');
        $mail->addAddress($emailDestinatario);                         // Adiciona o destinatário dinâmico
        $mail->addReplyTo('ba891575@gmail.com', 'Informações de Resposta');

        // Conteúdo do e-mail
        $mail->isHTML(true);                                           // Definindo formato como HTML
        $mail->Subject = 'Assunto do E-mail';                          // Assunto
        $mail->Body    = 'Conteúdo do e-mail em <b>HTML</b>';          // Corpo do e-mail (HTML)
        $mail->AltBody = 'Conteúdo alternativo em texto simples';      // Corpo alternativo (texto)

        // Enviar e-mail
        if ($mail->send()) {
            echo 'Mensagem enviada com sucesso!';
        } else {
            echo 'Falha ao enviar a mensagem.';
        }
    } catch (Exception $e) {
        echo "Mensagem não enviada. Erro: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, forneça um e-mail de destinatário.";
}
?>