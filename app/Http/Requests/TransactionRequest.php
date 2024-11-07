<?php

namespace App\Http\Requests;

use App\Enum\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'account_type_id' => 'required|exists:account_types,id',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'payment_method' => ['required', new Enum(PaymentMethod::class)],
        ];
    }
}
