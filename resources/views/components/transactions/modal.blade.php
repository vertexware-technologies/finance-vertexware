<div class="flex items-center space-x-2">
    <!-- Botão "Adicionar Transação" -->
    <button class="bg-[#EB8248] text-white text-sm font-semibold py-2 px-4 rounded-full flex items-center"
        wire:click="$set('modal', true)">
        Adicionar Transação
        <x-grommet-transaction class="w-5 h-5 ml-1" />
    </button>

    <x-ui.modal>
        <form class="flex flex-col gap-6" wire:submit.prevent="save">
            <div>
                <div class="text-[28px]">Adicionar Transação</div>
                <div class="text-[16px] text-[#C3C3D1]">Faça sua oferta em horas mensais que você pode contribuir com o
                    projeto.
                </div>
            </div>
            <!-- Campo de Descrição -->
            <div class="flex flex-col gap-2">
                <label class="text-[14px] text-[#C3C3D1]">Descrição</label>
                <input wire:model="description" type="text"
                    class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                    placeholder="Descrição da transação" />
            </div>

            <!-- Campo de Valor -->
            <div class="flex flex-col gap-2">
                <label class="text-[14px] text-[#C3C3D1]">Valor</label>
                <input wire:model="value" type="number" step="0.01"
                    class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                    placeholder="Valor da transação" />
                @error('value')
                    <div class="text-red-600 mt-1 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Botão de Enviar -->
            <button
                class="bg-[#EB8248] text-white font-bold tracking-wide uppercase px-8 py-3 rounded-[4px]
                    hover:bg-[#7067B0] transition duration-300 ease-in-out w-full">
                Adicionar Transação
            </button>
        </form>
    </x-ui.modal>
</div>
