<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawanModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $title = 'Data Profile';
    private $li_1 = 'Index';

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = DataKaryawanModel::whereId(auth()->user()->id)->first();
        dd($detail);

        return view('profile.index', $title);
    }
}