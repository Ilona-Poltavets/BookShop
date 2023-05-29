<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    //TODO change rules
    public function index()
    {
        $data['sales'] = Sale::all();
        return view('sale.index', $data);
    }

    public function create()
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            return view('sale.create');
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            //
        }
        return redirect()->back();
    }

    public function show(Sale $category)
    {
        $data['category'] = $category;
        $data['books'] = $data['category']->books;
        return view('sale.show', $data);
    }

    public function edit(Sale $sale)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            return view('sale.edit', compact('sale'));
        }
        return redirect()->back();
    }

    public function update(Request $request, Sale $sale)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            //
        }
        return redirect()->back();
    }

    public function destroy(Sale $sale)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            //
        }
        return redirect()->back();
    }
}
