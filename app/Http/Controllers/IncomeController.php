<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Http\Resources\IncomeResource;
use App\Models\Incomes;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return IncomeResource::collection(Incomes::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeRequest $request)
    {
        $income = Incomes::create($request->validated());
        return new IncomeResource($income);
    }

    /**
     * Display the specified resource.
     */
    public function show(Incomes $income)
    {
        return new IncomeResource($income);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeRequest $request, Incomes $income)
    {
        $income->update($request->validated());
        return new IncomeResource($income);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incomes $income)
    {
        $income->delete();
        return response()->json(null, 204);
    }
}
