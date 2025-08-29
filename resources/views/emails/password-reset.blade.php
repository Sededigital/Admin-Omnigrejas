<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redefinição de Senha</title>
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
            background: #059669;
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
        .button {
            display: inline-block;
            background: #059669;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 15px 0;
            font-weight: bold;
        }
        .button:hover {
            background: #047857;
        }
        .alert {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            color: #92400e;
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
        <h1>🔑 Redefinição de Senha</h1>
    </div>

    <div class="content">
        <p>Olá <strong>{{ $user->name }}</strong>,</p>

        <p>Recebemos uma solicitação para redefinir a senha da sua conta.</p>

        <div class="alert">
            <strong>⚠️ Importante:</strong> Este link é válido por 60 minutos.
            Se você não solicitou esta redefinição, ignore este email.
        </div>

        <p>Para redefinir sua senha, clique no botão abaixo:</p>

        <div style="text-align: center;">
            <a href="{{ $resetUrl }}" class="button">Redefinir Senha</a>
        </div>

        <p>Ou copie e cole o link abaixo no seu navegador:</p>
        <p style="word-break: break-all; color: #059669;">{{ $resetUrl }}</p>

        <h3>Dicas de Segurança:</h3>
        <ul>
            <li>Use uma senha forte com pelo menos 8 caracteres</li>
            <li>Combine letras maiúsculas, minúsculas, números e símbolos</li>
            <li>Não use a mesma senha em outros sites</li>
            <li>Considere ativar a autenticação de dois fatores</li>
        </ul>

        <p>Se você não solicitou esta redefinição, sua senha permanecerá inalterada.</p>

        <p>Atenciosamente,<br>
        <strong>Equipe de Suporte</strong></p>
    </div>

    <div class="footer">
        <p>Este é um email automático, não responda a esta mensagem.</p>
        <p>© {{ date('Y') }} - Todos os direitos reservados</p>
    </div>
</body>
</html>
