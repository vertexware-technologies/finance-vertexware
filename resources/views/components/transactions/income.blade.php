<div class=" text-white p-4 rounded-lg flex flex-col space-y-2 items-start"
    style="border: 1px solid rgba(255, 255, 255, 0.2);">
    <!-- Ícone e Título -->
    <div class="flex items-center space-x-2">
        <!-- Ícone (use o ícone apropriado) -->
        <div class="text-xl text-gray-400">
            <x-fas-piggy-bank class="w-5 h-5" />
        </div>
        <span class="text-sm text-gray-400">Receita</span>
    </div>

    <!-- Valor -->
    <span class="text-3xl font-bold text-[20px]">R$ {{ number_format($income, 2, ',', '.') }}</span>
</div>
