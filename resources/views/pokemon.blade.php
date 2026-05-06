<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex Pixel</title>

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

        .screen input,
        .screen select {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 3px solid #2a3f6f;
            border-radius: 12px;
            background: #f4f9ff !important;
            color: #0f1b3a !important;
            outline: none;
            font-family: 'Press Start 2P', cursive;
            font-size: 10px;
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

    <!-- NOME -->
    <h1 class="text-sm mb-3 uppercase">
        {{ $pokemon['name'] ?? 'NÃO ENCONTRADO' }}
    </h1>

    <!-- BUSCA -->
    <form method="GET" action="/pokedex" class="mb-4">
        <input
            type="text"
            name="pokemon"
            value="{{ request('pokemon') }}"
            placeholder="buscar pokemon"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black outline-none"
        />

        <button class="pixel-btn bg-black text-[10px] px-3 py-2 w-full">
            BUSCAR
        </button>
    </form>

    <!-- API -->
    @if($pokemon)
        <img src="{{ $pokemon['sprites']['front_default'] }}"
             class="mx-auto w-24 mb-4"
             style="image-rendering: pixelated;">

        <div class="text-left text-[10px] mb-4">
            @foreach ($pokemon['stats'] as $stat)
                @php
                    $valor = $stat['base_stat'];
                    $porcentagem = min(100, ($valor / 255) * 100);
                @endphp

                <div class="mb-2">
                    <div class="flex justify-between">
                        <span>{{ strtoupper($stat['stat']['name']) }}</span>
                        <span>{{ $valor }}</span>
                    </div>

                    <div class="barra">
                        <div class="barra-fill" style="width: {{ $porcentagem }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- BOTÕES -->
    <div class="flex flex-col gap-2 mt-4">

        <a href="/pokemon/cadastrar"
           class="pixel-btn bg-black text-[10px] px-3 py-2 w-full text-center">
            + CADASTRAR
        </a>

        <a href="/meus-pokemons"
           class="pixel-btn bg-black text-[10px] px-3 py-2 w-full text-center">
            MEUS POKÉMONS
        </a>

        @if($pokemon)
            <div class="flex gap-2 mt-2">
                <a href="/pokemon/{{ $pokemon['id'] }}/anterior"
                   class="pixel-btn bg-black text-[10px] px-3 py-2 flex-1 text-center">
                    &lt; ANTERIOR
                </a>

                <a href="/pokemon/{{ $pokemon['id'] }}/proximo"
                   class="pixel-btn bg-black text-[10px] px-3 py-2 flex-1 text-center">
                    PRÓXIMO &gt;
                </a>
            </div>
        @endif

    </div>

    </div>
</div>

</body>
</html>