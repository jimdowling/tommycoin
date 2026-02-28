<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        return view('buy');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'email'       => 'required|email|max:150',
            'wallet'      => 'required|string|max:200',
            'amount_usd'  => 'required|numeric|min:10|max:100000',
            'how_serious' => 'required|in:very,extremely,moon-or-bust,just-for-laughs',
            'agree_nfa'   => 'required|accepted',
        ]);

        // In a real app: store to DB, send confirmation email, trigger payment flow, etc.
        session()->flash('success', true);
        session()->flash('name', $validated['name']);

        $tommy = round($validated['amount_usd'] / 0.0042, 0);
        session()->flash('tommy_amount', number_format($tommy));

        return redirect()->route('buy.success');
    }

    public function success()
    {
        if (!session('success')) {
            return redirect()->route('home');
        }
        return view('buy-success');
    }
}
