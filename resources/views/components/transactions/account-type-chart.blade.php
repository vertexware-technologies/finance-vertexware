<div class="bg-gray-900 p-6 rounded-lg">
    <h2 class="text-white text-lg font-bold mb-4">Gastos por Tipo de Conta</h2>
    <div class="space-y-4">
        @foreach ($accountTypes as $accountTypeId => $accountTypeName)
            @php
                $percentage = $percentages[$accountTypeId] ?? 0; // Garante que exiba 0% se não houver valor
            @endphp
            <div class="space-y-2">
                <!-- Título e porcentagem -->
                <div class="flex justify-between text-sm text-white">
                    <span>{{ $accountTypeName }}</span>
                    <span>{{ $percentage }}%</span>
                </div>
                <!-- Barra de progresso -->
                <div class="bg-gray-700 rounded-full h-2">
                    <div class="bg-[#EB8248] h-2 rounded-full" style="width: {{ $percentage }}%;"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
