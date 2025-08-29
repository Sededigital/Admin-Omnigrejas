<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2FA Desativado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #DC2626;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 0 0 8px 8px;
        }
        .alert {
            background: #fef2f2;
            border: 1px solid #f87171;
            color: #991b1b;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🔓 Autenticação de Dois Fatores Desativada</h1>
    </div>

    <div class="content">
        <p>Olá <strong>{{ $user->name }}</strong>,</p>

        <p>Sua autenticação de dois fatores foi desativada em sua conta.</p>

        <div class="alert">
            <strong>⚠️ Aviso de Segurança:</strong> Sua conta agora está protegida apenas por senha.
            Recomendamos reativar o 2FA para maior segurança.
        </div>

        <h3>O que isso significa:</h3>
        <ul>
            <li>Sua conta não está mais protegida por autenticação de dois fatores</li>
            <li>Você pode fazer login apenas com email e senha</li>
            <li>Os códigos de recuperação anteriores não são mais válidos</li>
        </ul>

        <h3>Recomendações de Segurança:</h3>
        <ul>
            <li>Use uma senha forte e única</li>
            <li>Considere reativar o 2FA para maior proteção</li>
            <li>Monitore sua conta regularmente</li>
            <li>Ative notificações de login se disponível</li>
        </ul>

        <p>Se você não solicitou esta desativação, entre em contato conosco imediatamente e altere sua senha.</p>

        <p>Atenciosamente,<br>
        <strong>Equipe de Segurança</strong></p>
    </div>

    <div class="footer">
        <p>Este é um email automático, não responda a esta mensagem.</p>
        <p>© {{ date('Y') }} - Todos os direitos reservados</p>
    </div>
</body>
</html>
