<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountTypeRequest;
use App\Http\Resources\AccountTypeResource;
use App\Models\AccountType;

class AccountTypeController extends Controller
{
    private ?AccountType $account_type;
    public function __construct(AccountType $account_type)
    {
        $this->account_type = $account_type;
    }

    public function index()
    {
        return AccountTypeResource::collection(
            $this->account_type->all()
        );
    }
}
