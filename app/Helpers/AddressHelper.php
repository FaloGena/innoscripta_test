<?php


namespace App\Helpers;


use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressHelper
{

    /**
     * Creates new address and attaches it to request data if user is guest
     * Otherwise returns data as it is
     * (if user is logged in he has address passed already)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|array
     */
    public static function addressToRequest(Request $request)
    {
        if (!$user = Auth::user()) {
            $data = $request->only('street', 'house', 'floor', 'apartment', 'comment');
            $address = Address::create($data);
            $data = $request->except('street', 'house', 'floor', 'apartment', 'comment');
            $data['address_id'] = $address->id;
        }
        else {
            $data = $request->all();
            if (!$user->addresses->contains($data['address_id']))
                return response()->json(['errors' => [['Incorrect address, try reload the page!']] ], 422);
        }

        return $data;
    }
}
