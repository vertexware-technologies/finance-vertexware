<div class="flex items-center space-x-2">
    <button wire:click="edit({{ $transaction->id }})" class="h-4 w-4 mr-4 focus:outline-none">
        <x-fas-edit class="text-white" />
    </button>

    <x-ui.modal title="Atualizar Transação" subtitle="Atualize as informações abaixo">
        <form class="flex flex-col gap-6" wire:submit.prevent="update">
            <!-- Linha 1: Descrição -->
            <div class="flex flex-col gap-2 w-full">
                <label class="text-[14px] text-[#C3C3D1]">Descrição</label>
                <input wire:model="description" type="text"
                    class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                    placeholder="Descrição da transação" />
                @error('description')
                    <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Linha 2: Valor, Data e Método de Pagamento -->
            <div class="flex gap-4">
                <div class="flex flex-col gap-2 w-1/3">
                    <label class="text-[14px] text-[#C3C3D1]">Valor</label>
                    <input wire:model="amount" type="number" step="0.01"
                        class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                        placeholder="Valor da transação" />
                    @error('amount')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-1/3">
                    <label class="text-[14px] text-[#C3C3D1]">Data da Transação</label>
                    <input wire:model="date" type="date"
                        class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C] rounded-lg"
                        placeholder="__/__/____" />
                    @error('date')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 w-1/3">
                    <label class="text-[14px] text-[#C3C3D1]">Método de Pagamento</label>
                    <select wire:model="payment_method"
                        class="w-full bg-[#1E1E2C] text-white p-2 rounded-lg border border-[#1E1E2C]">
                        <option value="">Selecione</option>
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method->value }}">{{ ucfirst(strtolower($method->name)) }}</option>
                        @endforeach
                    </select>
                    @error('payment_method')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Linha 3: Categoria e Tipo de Conta -->
            <div class="flex gap-4">
                <div class="flex flex-col gap-2 w-1/2">
                    <label class="text-[14px] text-[#C3C3D1]">Categoria</label>
                    <select wire:model="category_id"
                        class="w-full bg-[#1E1E2C] text-white p-2 rounded-lg border border-[#1E1E2C]">
                        <option value="">Selecione</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option disabled>Nenhuma categoria disponível</option>
                        @endforelse
                    </select>
                    @error('category_id')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-1/2">
                    <label class="text-[14px] text-[#C3C3D1]">Tipo de Conta</label>
                    <select wire:model="account_type_id"
                        class="w-full bg-[#1E1E2C] text-white p-2 rounded-lg border border-[#1E1E2C]">
                        <option value="">Selecione</option>
                        @forelse ($accountTypes as $accountType)
                            <option value="{{ $accountType->id }}">{{ $accountType->name }}</option>
                        @empty
                            <option disabled>Nenhum tipo de conta disponível</option>
                        @endforelse
                    </select>
                    @error('account_type_id')
                        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="bg-[#EB8248] text-white font-bold tracking-wide uppercase px-8 py-3 rounded-[4px]
                    hover:bg-[#7067B0] transition duration-300 ease-in-out w-full">
                Atualizar Transação
            </button>
        </form>
    </x-ui.modal>
</div>
