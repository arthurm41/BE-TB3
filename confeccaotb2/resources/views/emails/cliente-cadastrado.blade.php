<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Realizado</title>
</head>
<body style="margin:0; padding:0; background:#f4f6f9; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.1);">

                    <tr>
                        <td style="background:#2563eb; padding:25px; text-align:center;">
                            <h1 style="color:#ffffff; margin:0;">
                                Sistema de Confecção
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:40px; color:#333;">

                            <h2 style="margin-top:0;">
                                Olá, {{ $cliente->nome }}! 👋
                            </h2>

                            <p style="font-size:16px; line-height:1.6;">
                                Seu cadastro foi realizado com sucesso em nosso sistema.
                            </p>

                            <p style="font-size:16px; line-height:1.6;">
                                Agora seus dados estão registrados e poderão ser utilizados
                                para pedidos, consultas e acompanhamento de serviços.
                            </p>

                            <div style="margin:30px 0; text-align:center;">
                                <span style="
                                    display:inline-block;
                                    background:#dcfce7;
                                    color:#166534;
                                    padding:12px 25px;
                                    border-radius:8px;
                                    font-weight:bold;">
                                    ✓ Cadastro Confirmado
                                </span>
                            </div>

                            <table width="100%" style="background:#f8fafc; border-radius:8px; padding:15px;">
                                <tr>
                                    <td>
                                        <strong>Nome:</strong> {{ $cliente->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>E-mail:</strong> {{ $cliente->email }}
                                    </td>
                                </tr>
                            </table>

                            <p style="margin-top:30px; font-size:15px;">
                                Obrigado pela confiança.
                            </p>

                            <p style="font-size:15px;">
                                Atenciosamente,<br>
                                <strong>Equipe da Confecção</strong>
                            </p>

                        </td>
                    </tr>

                    <tr>
                        <td style="
                            background:#1f2937;
                            color:#d1d5db;
                            text-align:center;
                            padding:20px;
                            font-size:13px;">
                            © {{ date('Y') }} Sistema de Confecção • Todos os direitos reservados
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>