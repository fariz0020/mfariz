<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class SavingController extends Controller
{
    public function index() {
        $title = "Saving";
        $savings = \App\Saving::where('id_user', Auth::user()->id)->get();
        $nasabahs = \App\Saving::all();
        return view('saving.index', compact(['nasabahs', 'savings', 'title']));
    }

    public function show($id) {
        $saving = \App\Saving::where('id', $id)->first();
        $transactions = \App\Transaction::where('id_saving', $id)->get();

        $title =  "Saving #".$saving->no_saving;
        return view('saving.detail', compact(['saving', 'transactions', 'title', 'id']));
    }

    public function transactions(Request $request, $id) {
        $response = \App\Transaction::where('id_saving', $id)->get();

        return Datatables::of($response)->make();
    }

    public function chart(Request $request, $id) {
        $response = [
            'countSaving' => \App\Transaction::where([
                ['id_saving', $id], ['id_type', \App\TransactionType::where('name', 'Saving')->first()->id]
                ])->get()->count(),
            'countWithdraw' => \App\Transaction::where([
                ['id_saving', $id], ['id_type', \App\TransactionType::where('name', 'Withdraw')->first()->id]
            ])->get()->count(),
            'countTransfer' => \App\Transaction::where([
                ['id_saving', $id], ['id_type', \App\TransactionType::where('name', 'Transfer')->first()->id]
            ])->get()->count(),
        ];

        return response($response, 200);

    }
}
