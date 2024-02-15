<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Delivery::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        Delivery::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        return $delivery;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return $delivery;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'delivery is deleted successfully'
        ]);
    }
}
