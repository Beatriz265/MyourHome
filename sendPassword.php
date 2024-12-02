<?php
// Importa as classes necessárias do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Gerar token de redefinição de senha
$email = $_POST["email"];
$token = bin2hex(random_bytes(16));  // Gerar token aleatório
$token_hash = hash("sha256", $token);  // Hash do token para segurança
$expire = date("Y-m-d H:i:s", time() + 60 * 30);  // Expiração do token (30 minutos)

// Conectar ao banco de dados
$mysqli = require __DIR__ . "/conection_DB.php";

// Preparar a consulta SQL para armazenar o token de redefinição
$sql = "UPDATE usuarios
        SET reset_token_hash = ?, expire_token_at = ?
        WHERE email = ?";  

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expire, $email);
$stmt->execute();

// Verificar se o usuário foi encontrado e o token foi atualizado
if ($stmt->affected_rows) {
    // Requer o autoload do PHPMailer
    require __DIR__ . "/vendor/autoload.php"; // Carregar as dependências do PHPMailer

    // Instanciar o PHPMailer
    $mail = new PHPMailer(true);

    // Configurações SMTP do PHPMailer
    try {
        // Desabilitar a verificação de SSL para testes (não é recomendado para produção)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ba891575@gmail.com'; // Seu e-mail
        $mail->Password = 'ifgo pskk mrrt nxtj'; // Senha de aplicativo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Definir o remetente e o destinatário
        $mail->setFrom('ba891575@gmail.com', 'Nome Remetente');
        $mail->addAddress($email);  // E-mail do destinatário (do formulário)

        // Definir o conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Redefinir Senha';
        $mail->Body = <<<END
        Clique <a href="http://localhost/myourhome/reset_password.php?token=$token">aqui</a>
        para redefinir a sua senha. O link expira em 30 minutos.
        END;

        // Enviar o e-mail
        $mail->send();

        echo "Mensagem enviada, verifique o seu inbox.";
    } catch (Exception $e) {
        echo "Email não pode ser enviado. Erro Mailer: {$mail->ErrorInfo}";
    }
} else {
    echo "E-mail não encontrado.";
}

$stmt->close();
$mysqli->close();
?>
