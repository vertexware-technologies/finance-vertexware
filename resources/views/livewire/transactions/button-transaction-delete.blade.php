<div>
    <!-- Botão de exclusão -->
    <button wire:click="confirmDelete({{ $transaction->id }})" class="h-4 w-4 focus:outline-none">
        <svg class="w-64 h-64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red">
            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"></path>
        </svg>

    </button>

    <!-- Modal de confirmação -->
    <div x-show="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-[#111827] rounded-lg p-8 w-96">
            <h2 class="text-xl font-semibold text-white">Confirmar Exclusão</h2>
            <p class="text-sm text-white mt-2">
                Tem certeza que deseja excluir esta transação? Esta ação não pode ser desfeita.
            </p>

            <div class="flex justify-end mt-6">
                <!-- Botão Cancelar -->
                <button wire:click="resetModal" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                    Cancelar
                </button>
                <!-- Botão Confirmar Exclusão -->
                <button wire:click="deleteTransaction"
                    class="px-4 py-2 ml-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Excluir
                </button>
            </div>
        </div>
    </div>
</div>
