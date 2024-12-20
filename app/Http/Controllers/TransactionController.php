<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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
    public function index(Request $request)
    {
        if ($request->bearerToken()) {
            $user = auth('sanctum')->user();

            return TransactionResource::collection(
                Transaction::where('user_id', $user->id)->get()
            );
        }
    }
    public function store(TransactionRequest $request): JsonResponse
    {
        if (!$request->bearerToken()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $data = $request->validated();
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'category_id' => $data['category_id'],
            'account_type_id' => $data['account_type_id'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'date' => $data['date'],
            'payment_method' => $data['payment_method'],
        ]);
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

    public function update(TransactionRequest $request, string $id)
    {
        $transaction = Transaction::where('user_id', Auth::id())
            ->findOrFail($id);
        $data = $request->validated();
        $transaction->update($data);
        return response()->json([
            'message' => 'Transação atualizada com sucesso!',
            'transaction' => new TransactionResource($transaction)
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->bearerToken()) {
            Transaction::destroy($id);
            return response()->json(null, 204);
        }
    }
    public function getTransactionsByCategory(Request $request, $category)
    {
        if ($request->bearerToken()) {
            $user = auth('sanctum')->user();

            // Retorna apenas as 3 transações mais recentes da categoria
            $transactions = Transaction::where('user_id', $user->id)
                ->where('category_id', $category)
                ->latest('created_at') // Ordena pelas mais recentes
                ->take(3) // Limita a 3 transações
                ->get();

            return TransactionResource::collection($transactions);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }


    public function getTransactionsByAccountType(Request $request, $accountType)
    {
        if ($request->bearerToken()) {
            $user = auth('sanctum')->user();
            return TransactionResource::collection(
                Transaction::where('user_id', $user->id)
                    ->where('account_type_id', $accountType)
                    ->latest() // Ordena pela transação mais recente
                    ->take(3)  // Limita a 3 transações
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
