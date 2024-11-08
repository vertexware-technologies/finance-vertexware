<div class=" text-white p-4 rounded-lg flex flex-col space-y-2 items-start border border-[#111827]">
    <!-- Ícone e Título -->
    <div class="flex items-center space-x-2">
        <!-- Ícone (use o ícone apropriado) -->
        <div class="text-xl text-gray-400">
            <x-akar-statistic-up class="w-5 h-5" style="color: green" />
        </div>
        <span class="text-sm text-green-900">Receita</span>
    </div>

    <!-- Valor -->
    <span class="text-3xl font-bold text-[20px]">R$ {{ number_format($income, 2, ',', '.') }}</span>
</div>
