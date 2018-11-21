<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard";
        $savings = \App\Saving::where('id_user', Auth::user()->id)->get();
        $nasabahs = \App\Saving::all();
        return view('transaction.index', compact(['nasabahs', 'savings', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Create";
        $types = \App\TransactionType::all();
        $savings = \App\Saving::where('id_user', Auth::user()->id)->get();
        return view('transaction.create', compact(['types', 'savings', 'title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $transaction = new \App\Transaction();
        $transaction->id_saving = $request->get('id_saving');
        $transaction->value = $request->get('value');
        $transaction->id_type = $request->get('id_type');

        $saving = \App\Saving::find($request->get('id_saving'));

        if ($request->get('id_type') == 1) {
            $transaction->description = "Saving money Rp.".$request->get('value');
            $saving->balance = $saving->balance + $request->get('value');
        } else {
            $saving->balance = $saving->balance - $request->get('value');
            if ($request->get('id_type') == 2)
                $transaction->description = "Withdraw money Rp.".$request->get('value');
            else
                $transaction->description = "Transfer money Rp.".$request->get('value').' to '.$request->get('BenefNumb');
        }

        $saving->save();
        $transaction->save();

        return redirect('/saving/'.$request->get('id_saving'))->with('success', 'Information has been added');
    }

    /*
      $date=date_create($request->get('date'));
      $format = date_format($date,"Y-m-d");
      $nasabah->date=1218153600; //($format);
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "Edit";
        $types = \App\TransactionType::all();
        $transaction = \App\Transaction::find($id);
        return view('transaction.edit',compact(['types', 'transaction', 'title'],'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $transaction= \App\Transaction::find($id);
        $transaction->id_saving = $request->get('id_saving');
        $transaction->value = $request->get('value');
        $transaction->id_type = $request->get('id_type');

        $saving = \App\Saving::find($request->get('id_saving'));

        if ($request->get('id_type') == 1) {
            $transaction->description = "Saving money Rp.".$request->get('value');
            $saving->balance = $saving->balance + $request->get('value');
        } else {
            $saving->balance = $saving->balance - $request->get('value');
            if ($request->get('id_type') == 2)
                $transaction->description = "Withdraw money Rp.".$request->get('value');
            else
                $transaction->description = "Transfer money Rp.".$request->get('value').' to '.$request->get('BenefNumb');
        }

        $saving->save();
        $transaction->save();

        return redirect('/saving/'.$request->get('id_saving'))->with('success', 'Information has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $transaction = \App\Transaction::find($id);
        $saving = \App\Saving::find($transaction->savingx()->first()->id);

        $balance = \App\Saving::where('id', $transaction->savingx()->first()->id)->first()->balance;

        $saving->balance = $balance - $transaction->value;
        $saving->save();

        $transaction->delete();
        return redirect('/saving')->with('success', 'Transaction has been deleted');
    }

}
