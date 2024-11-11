<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    private ?Transaction $transaction;

    public function __construct(?Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return TransactionResource::collection(
            Transaction::where('user_id', $user->id)->get()
        );
    }
    public function store(TransactionRequest $request, User $user)
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['user_id'] = $user->id;

        $transaction = $this->transaction->create($data);

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(201);
    }

    public function show(User $user, string $id)
    {
        $transaction = $this->transaction
            ->where('user_id', $user->id)
            ->findOrFail($id);

        return new TransactionResource($transaction);
    }

    public function update(TransactionRequest $request, User $user, string $id)
    {
        $transaction = $this->transaction
            ->where('user_id', $user->id)
            ->findOrFail($id);

        $data = $request->validated();
        $transaction->update($data);

        return new TransactionResource($transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, string $id)
    {
        $transaction = Transaction::where('user_id', $user->id)->findOrFail($id);

        $transaction->delete();

        return response()->json([], 204);
    }

    public function getTransactionsByCategory(Request $request, $category)
    {
        if ($request->bearerToken()) {
            $user = auth('sanctum')->user();
            return TransactionResource::collection(
                Transaction::where('user_id', $user->id)
                    ->where('category_id', $category)
                    ->get()
            );
        }
    }

    public function getTransactionsByAccountType(Request $request, $accountType)
    {
        if ($request->bearerToken()) {
            $user = auth('sanctum')->user();
            return TransactionResource::collection(
                Transaction::where('user_id', $user->id)
                    ->where('account_type_id', $accountType)
                    ->get()
            );
        }
    }
    public function getBalanceByCategory(Request $request)
    {
        if ($request->bearerToken()) {
            $user = auth('sanctum')->user();
            $transactions = Transaction::where('user_id', $user->id)->get();
            $total = 0;
            foreach ($transactions as $transaction) {
                if ($transaction->category_id == 1) { // Receita
                    $total += $transaction->amount;
                } elseif ($transaction->category_id == 2) { // Despesa
                    $total -= $transaction->amount;
                }
            }

            return response()->json(['balance' => $total], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function getTotalBalance(Request $request)
    {
        $user_id = Auth::id();

        $soma = Transaction::where('user_id', $user_id)
            ->where('category_id', 1) // Receita
            ->sum('amount');

        $subtracao = Transaction::where('user_id', $user_id)
            ->whereIn('category_id', [2, 3]) // Despesa e Investimento
            ->sum('amount');

        $saldo = $soma - $subtracao;

        return response()->json(['total_balance' => $saldo], 200);
    }


    public function getTotalInvestments(Request $request)
    {
        $user = Auth::user();
        $totalInvestments = Transaction::where('user_id', $user->id)
            ->where('category_id', 3)
            ->sum('amount');

        return response()->json(['total_investments' => $totalInvestments], 200);
    }

    public function getTotalExpenses(Request $request)
    {
        $user = Auth::user();
        $totalExpenses = Transaction::where('user_id', $user->id)
            ->where('category_id', 2)
            ->sum('amount');

        return response()->json(['total_expenses' => $totalExpenses], 200);
    }

    public function getTotalIncome(Request $request)
    {
        $user = Auth::user();
        $totalIncome = Transaction::where('user_id', $user->id)
            ->where('category_id', 1)
            ->sum('amount');

        return response()->json(['total_income' => $totalIncome], 200);
    }
}
