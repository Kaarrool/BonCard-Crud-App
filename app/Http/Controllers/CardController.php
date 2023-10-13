<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index() {
        $cards = Card::paginate(10);
        return view('cards.index', ['cards' => $cards]);
    }

    public function create() {
        return view('cards.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'card_number' => 'required|unique:cards|size:20|regex:/^[0-9]{20}$/',
            'pin' => 'required|digits:4|max:9999',
            'activation_date' => 'required|date',
            'expiration_date' => 'required|date',
            'balance' => 'required|numeric|max:9999'
        ]);

        //$data['card_number'] = preg_replace('/\D/', '', $data['card_number']);

        // Save data to database
        $newCard = Card::create($data);

        return redirect(route('card.index'))->with('success', 'Card added successfully');
    }

    public function update(Card $card, Request $request) {
        $data = $request->validate([
            'card_number' => 'required|unique:cards|size:20|regex:/^[0-9]{20}$/',
            'pin' => 'required|digits:4|max:9999',
            'activation_date' => 'required|date',
            'expiration_date' => 'required|date',
            'balance' => 'required|numeric|max:9999'
        ]);

        $card->update($data);

        return redirect(route('card.index'))->with('success', 'Card Updated Successfully');
    }

    public function edit(Card $card) {
        return view('cards.edit', ['card' => $card]);
    }

    public function destroy(Card $card, Request $request){
        $page = $request->input('page');
        $card->delete();
        return redirect(route('card.index', ['page' => $page]))->with('success', 'Card deleted successfully');
    }

    public function checkUnique(Request $request) {
        $cardNumber = $request->input('card_number');
        $pin = $request->input('pin');
    
        // Check in database if same card number or PIN exists
        $exists = Card::where('card_number', $cardNumber)->orWhere('pin', $pin)->exists();
    
        // Return answer with JSON
        return response()->json(['unique' => !$exists]);
    }

    public function __construct()
{
    $this->middleware('auth');
}
}