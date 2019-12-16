<?php

namespace App\Http\Controllers;

use App\Http\Requests\persons\StoreOrUpdate;
use App\Http\Requests\users\StoreUser;
use App\Http\Requests\users\RegisterUser;
use App\Http\Requests\users\UpdateUser;
use App\Person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request) {
        return User::with('person')->paginate(10);
    }

    public function store(StoreUser $request) {
        try {
            DB::beginTransaction();
            $user = User::create(array_merge($request->all(), ['password' => 'abc123']));
            $user->person()->create($request->all());
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function update(UpdateUser $request, User $user) {
        $user->update($request->all());
        return $user;
    }

    public function current(Request $request) {
        return $request->user()->load('person');
    }

    public function updateCurrent(StoreOrUpdate $request) {
        $person = Person::where('user_id', auth()->user()->id)->first();
        $person->update($request->all());
        return $person;
    }

    public function register(RegisterUser $request) {
        try {
            DB::beginTransaction();
            $user = User::create($request->all());
            $user->person()->create([
                'email' => $request->input('email')
            ]);
//            $user->person()->create($request->all());
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}
