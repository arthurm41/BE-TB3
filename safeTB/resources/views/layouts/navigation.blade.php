<nav x-data="{ open: true }">

    <!-- SIDEBAR -->
    <aside
        :class="open ? 'w-72' : 'w-24'"
        class="fixed top-0 left-0 z-50 h-screen bg-slate-950 border-r border-white/10 shadow-2xl transition-all duration-300">

        <!-- TOPO -->
        <div class="h-24 flex items-center justify-between px-6 border-b border-white/10">

            <!-- LOGO -->
            <a href="{{ route('autorizacoes.index') }}"
               class="text-3xl font-extrabold tracking-wide text-white whitespace-nowrap">

                <span x-show="open">SAFE</span>

                <span x-show="!open">S</span>

            </a>

            <!-- BOTÃO MENU -->
            <button
                @click="open = !open"
                class="bg-white/10 hover:bg-white/20 text-white p-2 rounded-xl transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </button>

        </div>

        <!-- MENU -->
        <div class="p-4 space-y-3">

            <!-- AUTORIZAÇÕES -->
            <a href="{{ route('autorizacoes.index') }}"
               class="flex items-center gap-3 px-4 py-4 rounded-2xl transition
               {{ request()->routeIs('autorizacoes.*')
                    ? 'bg-blue-600 text-white shadow-lg'
                    : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">

                <!-- ICON -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 min-w-[24px]"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>

                </svg>

                <!-- TEXTO -->
                <span x-show="open"
                      class="font-semibold text-lg">
                    Autorizações
                </span>

            </a>

            <!-- NOVA AUTORIZAÇÃO -->
            @if(Auth::user()->role == 'admin')

            <a href="{{ route('autorizacoes.create') }}"
               class="flex items-center gap-3 px-4 py-4 rounded-2xl transition
               text-slate-300 hover:bg-white/10 hover:text-white">

                <!-- ICON -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 min-w-[24px]"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>

                </svg>

                <!-- TEXTO -->
                <span x-show="open"
                      class="font-semibold text-lg">
                    Nova Autorização
                </span>

            </a>

            @endif

        </div>

        <!-- USER -->
        <div class="absolute bottom-0 left-0 w-full p-4 border-t border-white/10 bg-slate-950">

            <!-- USER INFO -->
            <div x-show="open" class="mb-4">

                <h2 class="text-white font-bold text-lg">
                    {{ Auth::user()->name }}
                </h2>

                <p class="text-slate-400 text-sm mt-1 truncate">
                    {{ Auth::user()->email }}
                </p>

            </div>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 transition text-white py-3 rounded-2xl font-bold shadow-lg">

                    <span x-show="open">
                        Sair
                    </span>

                    <span x-show="!open">
                        ↩
                    </span>

                </button>

            </form>

        </div>

    </aside>

    </main>

</nav>