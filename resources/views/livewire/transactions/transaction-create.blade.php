<div class="flex items-center space-x-2">
    <!-- Botão "Adicionar Transação" -->
    <button class="bg-[#EB8248] text-white text-sm font-semibold py-2 px-4 rounded-full flex items-center"
        wire:click="$set('modal', true)">
        Adicionar Transação
        <x-grommet-transaction class="w-5 h-5 ml-1" />
    </button>

    <!-- Modal de Adicionar Transação -->
    @if ($modal)
        <x-ui.modal>
            <form class="flex flex-col gap-6" wire:submit.prevent="store">
                <div>
                    <div class="text-[28px]">Adicionar Transação</div>
                    <div class="text-[16px] text-[#C3C3D1]">Insira as informações abaixo</div>
                </div>

                <!-- Campo de Descrição -->
                <div class="flex flex-col gap-2">
                    <label class="text-[14px] text-[#C3C3D1]">Descrição</label>
                    <input wire:model="description" type="text"
                        class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                        placeholder="Descrição da transação" />
                    @error('description')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo de Valor -->
                <div class="flex flex-col gap-2">
                    <label class="text-[14px] text-[#C3C3D1]">Valor</label>
                    <input wire:model="amount" type="number" step="0.01"
                        class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                        placeholder="Valor da transação" />
                    @error('amount')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo de Categoria -->
                <div class="flex flex-col gap-2">
                    <label class="text-[14px] text-[#C3C3D1]">Categoria</label>
                    <select wire:model="category_id"
                        class="w-full bg-[#1E1E2C] text-white p-2 rounded-lg border border-[#1E1E2C]">
                        <option value="">Selecione a categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo de Tipo de Conta -->
                <div class="flex flex-col gap-2">
                    <label class="text-[14px] text-[#C3C3D1]">Tipo de Conta</label>
                    <select wire:model="account_type_id"
                        class="w-full bg-[#1E1E2C] text-white p-2 rounded-lg border border-[#1E1E2C]">
                        <option value="">Selecione o tipo de conta</option>
                        @foreach ($accountTypes as $accountType)
                            <option value="{{ $accountType->id }}">{{ $accountType->name }}</option>
                        @endforeach
                    </select>
                    @error('account_type_id')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo de Método de Pagamento -->
                <div class="flex flex-col gap-2">
                    <label class="text-[14px] text-[#C3C3D1]">Método de Pagamento</label>
                    <select wire:model="payment_method"
                        class="w-full bg-[#1E1E2C] text-white p-2 rounded-lg border border-[#1E1E2C]">
                        <option value="">Selecione o método de pagamento</option>
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method->value }}">{{ ucfirst(strtolower($method->name)) }}</option>
                        @endforeach
                    </select>
                    @error('payment_method')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo de Data da Transação -->
                <div class="flex flex-col gap-2">
                    <label class="text-[14px] text-[#C3C3D1]">Data da Transação</label>
                    <input wire:model="date" type="date"
                        class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                        placeholder="__/__/____" />
                    @error('date')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
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
    @endif
</div>