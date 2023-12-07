<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class OnanmediaAPIController extends Controller
{
    public function roles(Request $request){
        $roles = Role::query()->select('id', 'name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $roles->all()
        ];

        return response()->json($data);
    }
}