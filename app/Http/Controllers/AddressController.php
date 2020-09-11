<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function create(AddressRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Address::create($data);

        return back();
    }
}
