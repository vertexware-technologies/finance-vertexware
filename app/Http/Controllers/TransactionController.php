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
}
