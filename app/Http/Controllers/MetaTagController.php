<?php

namespace App\Http\Controllers;
 use App\Models\MetaTag;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
   

public function index()
{
    return MetaTag::all();
}

public function store(Request $request)
{
    return MetaTag::create($request->all());
}

}
