<?php

namespace App\Livewire\Transactions;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ButtonTransactionDelete extends Component
{
    public $transaction;
    public $transactionToDelete;
    public $modal = false;

    // Método para abrir o modal e confirmar a exclusão
    public function confirmDelete($transactionId)
    {
        $this->transactionToDelete = $transactionId;
        $this->modal = true;
    }

    public function deleteTransaction()
    {
        $transaction = Transaction::findOrFail($this->transactionToDelete);
        if ($transaction->user_id === Auth::id()) {
            $transaction->delete();
            session()->flash('message', 'Transação excluída com sucesso!');
        } else {
            session()->flash('error', 'Você não tem permissão para excluir esta transação.');
        }
        redirect(route('transactions'));
    }

    // Método para resetar o modal e a transação
    private function resetModal()
    {
        $this->transactionToDelete = null;
        $this->modal = false;
    }

    // Renders the view
    public function render()
    {
        return view('livewire.transactions.button-transaction-delete');
    }
}
