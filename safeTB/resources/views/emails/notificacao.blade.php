<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>SAFE</title>

</head>

<body style="
    margin:0;
    padding:40px;
    background:#0f172a;
    font-family:Arial, Helvetica, sans-serif;
">

    <div style="
        max-width:600px;
        margin:auto;
        background:white;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,0.2);
    ">

        <!-- TOPO -->
        <div style="
            background:linear-gradient(135deg,#2563eb,#1e3a8a);
            padding:30px;
            text-align:center;
        ">

            <h1 style="
                color:white;
                margin:0;
                font-size:32px;
            ">
                SAFE
            </h1>

            <p style="
                color:#dbeafe;
                margin-top:10px;
                font-size:16px;
            ">
                Sistema de Autorização e Fluxo Escolar
            </p>

        </div>

        <!-- CONTEÚDO -->
        <div style="padding:40px;">

            <h2 style="
                color:#1e293b;
                margin-bottom:20px;
            ">
                Notificação Escolar
            </h2>

            <p style="
                color:#475569;
                font-size:17px;
                line-height:32px;
            ">

                {{ $mensagem }}

            </p>

            <div style="
                margin-top:35px;
                padding:20px;
                background:#eff6ff;
                border-left:5px solid #2563eb;
                border-radius:12px;
            ">

                <strong style="color:#1e3a8a;">
                    SAFE • SENAI
                </strong>

                <p style="
                    color:#334155;
                    margin-top:10px;
                    line-height:28px;
                ">
                    Este é um disparo automático do sistema escolar.
                </p>

            </div>

        </div>

        <!-- FOOTER -->
        <div style="
            background:#f8fafc;
            padding:20px;
            text-align:center;
            color:#64748b;
            font-size:14px;
        ">

            © SAFE - Sistema Escolar

        </div>

    </div>

</body>

</html>