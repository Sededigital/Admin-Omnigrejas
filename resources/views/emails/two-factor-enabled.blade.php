<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2FA Ativado</title>
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
            background: #4F46E5;
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
            background: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .code-list {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .code-item {
            font-family: monospace;
            background: white;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 3px;
            display: inline-block;
            border: 1px solid #d1d5db;
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
        <h1>🔐 Autenticação de Dois Fatores Ativada</h1>
    </div>

    <div class="content">
        <p>Olá <strong>{{ $user->name }}</strong>,</p>

        <p>Sua autenticação de dois fatores foi ativada com sucesso em sua conta.</p>

        <div class="alert">
            <strong>⚠️ Importante:</strong> Guarde os códigos de recuperação abaixo em um local seguro.
            Eles são essenciais para acessar sua conta caso você perca seu dispositivo 2FA.
        </div>

        @if(!empty($recoveryCodes))
        <h3>Códigos de Recuperação:</h3>
        <div class="code-list">
            @foreach($recoveryCodes as $code)
                <span class="code-item">{{ $code }}</span>
            @endforeach
        </div>
        <p><strong>Dica:</strong> Imprima ou salve estes códigos em um local seguro. Cada código só pode ser usado uma vez.</p>
        @endif

        <h3>Próximos Passos:</h3>
        <ul>
            <li>Teste seu 2FA fazendo login em um dispositivo diferente</li>
            <li>Configure um aplicativo autenticador de backup se possível</li>
            <li>Mantenha seus códigos de recuperação em segurança</li>
        </ul>

        <p>Se você não solicitou esta ativação, entre em contato conosco imediatamente.</p>

        <p>Atenciosamente,<br>
        <strong>Equipe de Segurança</strong></p>
    </div>

    <div class="footer">
        <p>Este é um email automático, não responda a esta mensagem.</p>
        <p>© {{ date('Y') }} - Todos os direitos reservados</p>
    </div>
</body>
</html>
