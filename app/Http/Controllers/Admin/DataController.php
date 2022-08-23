<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function datauser()
    {
        $datauser = User::orderBy('name','ASC');

        return datatables()->of($datauser)
        ->addColumn('action', 'admin.setting.user.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }
}
