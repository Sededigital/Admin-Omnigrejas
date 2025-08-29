<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Código de Recuperação 2FA</title>
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
        .code-container {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
            border: 2px solid #d1d5db;
        }
        .recovery-code {
            font-family: monospace;
            font-size: 24px;
            font-weight: bold;
            color: #dc2626;
            letter-spacing: 2px;
            background: white;
            padding: 15px;
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #d1d5db;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
            font-size: 14px;
        }
        .warning {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            color: #92400e;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🔑 Código de Recuperação 2FA</h1>
    </div>

    <div class="content">
        <p>Olá <strong>{{ $user->name }}</strong>,</p>

        <p>Você solicitou um código de recuperação para acessar sua conta protegida por autenticação de dois fatores.</p>

        <div class="alert">
            <strong>⚠️ URGENTE:</strong> Este código é válido apenas para este acesso.
            Use-o imediatamente para entrar em sua conta.
        </div>

        <div class="code-container">
            <h3>Seu Código de Recuperação:</h3>
            <div class="recovery-code">{{ $recoveryCode }}</div>
        </div>

        <div class="warning">
            <strong>🔒 Segurança:</strong>
            <ul style="margin: 10px 0; padding-left: 20px;">
                <li>Este código será removido após o uso</li>
                <li>Não compartilhe este código com ninguém</li>
                <li>Se você não solicitou este código, altere sua senha imediatamente</li>
            </ul>
        </div>

        <h3>Como usar:</h3>
        <ol style="margin-left: 1rem; color: #666;">
            <li>Volte para a página de login 2FA</li>
            <li>Clique em "Usar código de recuperação"</li>
            <li>Digite o código acima</li>
            <li>Clique em "Verificar"</li>
        </ol>

        <p><strong>Dica:</strong> Após acessar sua conta, considere gerar novos códigos de recuperação para maior segurança.</p>

        <p>Atenciosamente,<br>
        <strong>Equipe de Segurança</strong></p>
    </div>

    <div class="footer">
        <p>Este é um email automático, não responda a esta mensagem.</p>
        <p>© {{ date('Y') }} - Todos os direitos reservados</p>
    </div>
</body>
</html>
