<?php

namespace App\Http\Controllers;

use App\Http\Requests\trips\Destroy;
use App\Http\Requests\trips\StoreOrUpdate;
use App\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index(Request $request) {
        return Trip::with('creator')->paginate(15);
    }

    public function show(Request $request, Trip $trip) {
        return $trip;
    }

    public function store(StoreOrUpdate $request) {
        $trip = Trip::create($request->all());
        return $trip->load('creator');
    }

    public function update(StoreOrUpdate $request, Trip $trip) {
        $trip->update($request->all());
        $trip->load('creator');
        return $trip;
    }

    public function destroy(Destroy $request, Trip $trip) {
        $trip->delete();
        return "Trip deleted successfully.";
    }
}
