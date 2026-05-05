<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pokémons</title>

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background: #111;
            color: #222;
            min-height: 100vh;
            margin: 0;
        }

        .gameboy-shell {
            width: min(520px, calc(100% - 32px));
            min-height: 760px;
            padding: 36px 30px 24px;
            background: #b32a2a;
            border: 12px solid #430909;
            border-radius: 32px;
            box-shadow: 0 18px 0 #430909;
            position: relative;
        }

        .gameboy-shell::before,
        .gameboy-shell::after {
            content: '';
            position: absolute;
            border-radius: 999px;
        }

        .gameboy-shell::before {
            width: 50px;
            height: 50px;
            top: 16px;
            left: 24px;
            background: #67c1ff;
            border: 5px solid #fff;
            box-shadow: inset 0 0 0 2px rgba(0,0,0,.2);
        }

        .gameboy-shell::after {
            width: 20px;
            height: 20px;
            top: 22px;
            right: 24px;
            background: #ffdc3f;
            box-shadow: 26px 0 0 #6ce78b, 52px 0 0 #ff6b6b;
        }

        .screen {
            background: radial-gradient(circle at top left, #eef7ff, #bfdcff 45%, #a3c2f0 100%);
            border: 8px solid #2a3f6f;
            border-radius: 24px;
            padding: 16px;
            box-shadow: inset 0 8px 0 rgba(255,255,255,.35);
        }

        .screen h1,
        .screen p,
        .screen span,
        .screen label {
            color: #0f1b3a;
        }

        .pixel-btn {
            display: inline-block;
            width: 100%;
            margin-top: 8px;
            padding: 10px 0;
            border: 4px solid #2a3f6f;
            border-radius: 14px;
            background: #3d2b2b;
            color: #f7f7f7;
            letter-spacing: 1px;
            font-size: 10px;
            box-shadow: 0 6px 0 #1e1a1a;
            transition: transform 0.1s ease, background 0.1s ease;
            text-decoration: none;
        }

        .pixel-btn:hover {
            background: #513535;
        }

        .pixel-btn:active {
            transform: translateY(4px);
            box-shadow: none;
        }

        .barra {
            height: 10px;
            background: #d0d9e8;
            margin-top: 6px;
            border: 2px solid #2a3f6f;
            border-radius: 8px;
        }

        .barra-fill {
            height: 100%;
            background: linear-gradient(90deg, #72c89b, #3a6fce);
            border-radius: 6px;
        }

        .card {
            background: rgba(255,255,255,0.92);
            border: 2px solid #2a3f6f;
            border-radius: 16px;
            padding: 12px;
            margin-bottom: 14px;
        }

        .card .title {
            color: #0f1b3a;
        }

        body,
        input,
        select,
        button {
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>

<body class="bg-[#111] flex items-center justify-center min-h-screen">

<div class="gameboy-shell mx-auto text-center">
    <div class="screen">

    <h1 class="text-sm mb-4">MEUS POKÉMONS</h1>

    @if($cadastrados->count())
        @foreach($cadastrados as $p)
        <div class="card mb-4">

            <!-- NOME + BOTÕES -->
            <div class="flex justify-between items-center mb-2">
                <span class="title">{{ strtoupper($p->nome) }}</span>

                <div class="flex gap-1">
                    <a href="/pokemon/{{ $p->id }}/editar" class="bg-blue-500 px-2 text-xs text-white">E</a>
                    
                    <form method="POST" action="/pokemon/{{ $p->id }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 px-2 text-xs">X</button>
                    </form>
                </div>
            </div>

            <!-- TIPOS -->
            <div class="mb-2">
                <span class="text-xs">TIPO(S): {{ strtoupper(str_replace(',', ' / ', $p->tipo)) }}</span>
            </div>

            <!-- IMAGEM -->
            @if($p->imagem)
                @php
                    $imageUrl = preg_match('/^https?:\\/\\//', $p->imagem) ? $p->imagem : asset($p->imagem);
                @endphp
                <img src="{{ $imageUrl }}" class="w-20 mx-auto mb-3" style="image-rendering: pixelated;">
            @endif

            <!-- STATS BONITO -->
            @php
                $hp = min(500, $p->hp ?? 0);
                $ataque = min(500, $p->ataque ?? 0);
                $defesa = min(500, $p->defesa ?? 0);
                $ataque_especial = min(500, $p->ataque_especial ?? 0);
                $defesa_especial = min(500, $p->defesa_especial ?? 0);
                $velocidade = min(500, $p->velocidade ?? 0);
            @endphp

            <div class="text-xs">
                HP {{ $hp }}/500
                <div class="barra"><div class="barra-fill" style="width: {{ ($hp / 500) * 100 }}%"></div></div>

                ATAQUE {{ $ataque }}/500
                <div class="barra"><div class="barra-fill" style="width: {{ ($ataque / 500) * 100 }}%"></div></div>

                DEFESA {{ $defesa }}/500
                <div class="barra"><div class="barra-fill" style="width: {{ ($defesa / 500) * 100 }}%"></div></div>

                ATAQ.ESP {{ $ataque_especial }}/500
                <div class="barra"><div class="barra-fill" style="width: {{ ($ataque_especial / 500) * 100 }}%"></div></div>

                DEF.ESP {{ $defesa_especial }}/500
                <div class="barra"><div class="barra-fill" style="width: {{ ($defesa_especial / 500) * 100 }}%"></div></div>

                VELOCIDADE {{ $velocidade }}/500
                <div class="barra"><div class="barra-fill" style="width: {{ ($velocidade / 500) * 100 }}%"></div></div>
            </div>

        </div>
        @endforeach
    @else
        <p class="text-center">NENHUM POKÉMON CADASTRADO AINDA</p>
    @endif

    <!-- BOTÕES -->
    <div class="flex flex-col gap-2 mt-4">

        <a href="/pokemon/cadastrar"
           class="pixel-btn bg-black text-[10px] px-3 py-2 w-full text-center">
            + CADASTRAR
        </a>

        <a href="/pokedex"
           class="pixel-btn bg-black text-[10px] px-3 py-2 w-full text-center">
            VOLTAR À POKÉDEX
        </a>

    </div>

    </div>
</div>

</body>
</html>