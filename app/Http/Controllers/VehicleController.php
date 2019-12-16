<?php

namespace App\Http\Controllers;

use App\Http\Requests\vehicles\StoreOrUpdate;
use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function currentUserVehicles(Request $request) {
        return Vehicle::where('created_by', auth()->user()->id)->get();
    }

    public function store(StoreOrUpdate $request) {
        return Vehicle::create($request->all());
    }

    public function update(StoreOrUpdate $request, Vehicle $vehicle) {
        $vehicle->update($request->all());
        return $vehicle;
    }

    public function destroy(Vehicle $vehicle) {
        $vehicle->delete();
        return [];
    }
}
