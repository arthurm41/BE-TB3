<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Pokémon</title>

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
    </style>
</head>

<body class="bg-[#111] flex items-center justify-center min-h-screen">

<div class="gameboy-shell mx-auto text-center">
    <div class="screen">

    <h1 class="text-sm mb-4">CADASTRAR</h1>

    <form method="POST" action="/pokemon/cadastrar" enctype="multipart/form-data">
        @csrf

        <input name="nome" placeholder="nome"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">

        <label class="block text-xs mb-1">TIPO PRINCIPAL:</label>
        <select name="tipo[]" class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">
            <option value="">Selecione</option>
            <option value="normal">Normal</option>
            <option value="fire">Fogo</option>
            <option value="water">Água</option>
            <option value="electric">Elétrico</option>
            <option value="grass">Grama</option>
            <option value="ice">Gelo</option>
            <option value="fighting">Lutador</option>
            <option value="poison">Veneno</option>
            <option value="ground">Terra</option>
            <option value="flying">Voador</option>
            <option value="psychic">Psíquico</option>
            <option value="bug">Inseto</option>
            <option value="rock">Pedra</option>
            <option value="ghost">Fantasma</option>
            <option value="dragon">Dragão</option>
            <option value="dark">Sombrio</option>
            <option value="steel">Aço</option>
            <option value="fairy">Fada</option>
        </select>

        <label class="block text-xs mb-1">TIPO SECUNDÁRIO (opcional):</label>
        <select name="tipo[]" class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">
            <option value="">Nenhum</option>
            <option value="normal">Normal</option>
            <option value="fire">Fogo</option>
            <option value="water">Água</option>
            <option value="electric">Elétrico</option>
            <option value="grass">Grama</option>
            <option value="ice">Gelo</option>
            <option value="fighting">Lutador</option>
            <option value="poison">Veneno</option>
            <option value="ground">Terra</option>
            <option value="flying">Voador</option>
            <option value="psychic">Psíquico</option>
            <option value="bug">Inseto</option>
            <option value="rock">Pedra</option>
            <option value="ghost">Fantasma</option>
            <option value="dragon">Dragão</option>
            <option value="dark">Sombrio</option>
            <option value="steel">Aço</option>
            <option value="fairy">Fada</option>
        </select>

        <input name="hp" type="number" placeholder="HP (0-500)" min="0" max="500"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">

        <input name="ataque" type="number" placeholder="ATAQUE (0-500)" min="0" max="500"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">

        <input name="defesa" type="number" placeholder="DEFESA (0-500)" min="0" max="500"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">

        <input name="ataque_especial" type="number" placeholder="ATAQUE ESPECIAL (0-500)" min="0" max="500"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">

        <input name="defesa_especial" type="number" placeholder="DEFESA ESPECIAL (0-500)" min="0" max="500"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">

        <input name="velocidade" type="number" placeholder="VELOCIDADE (0-500)" min="0" max="500"
            class="w-full mb-2 p-2 border-2 border-black text-[10px] bg-black">

        <input type="file" name="imagem"
            class="w-full mb-3 text-[10px] text-black bg-white border-2 border-black p-2 rounded-lg">

        <button class="pixel-btn bg-black w-full py-2 text-[10px]">
            SALVAR
        </button>
    </form>

    <a href="/pokedex"
       class="pixel-btn bg-black w-full py-2 text-[10px] block mt-3">
        VOLTAR
    </a>

    </div>
</div>

</body>
</html>