<?php

namespace App\Http\Controllers;

use App\Calculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CalculatorController extends Controller
{
    /**
     * Display the calculator-tool.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $calculator = Calculator::where('id', 1)->first();

        return view('tools.calculator.index')->with('calculator', $calculator);
    }

    /**
     * Show the form for editing the calculator config data.
     *
     * @param  \App\Calculator  $calculator
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Calculator $calculator)
    {
        $msg_success = Session::get('msg_success');

        return view('tools.calculator.edit')->with(
            [
                'calculator' => $calculator,
                'msg_success' => $msg_success
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calculator  $calculator
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Calculator $calculator)
    {
        $request->validate(
            [
                'mwst' => 'required',
                'eurochf' => 'required',
                'atfaktor' => 'required'
            ]
        );

        $calculator->update(
            [
                'mwst' => $request->mwst,
                'eurochf' => $request->eurochf,
                'atfaktor' => $request->atfaktor
            ]
        );
        $calculator->save();

        return redirect('/calculator/1/edit')->with(
            'msg_success', 'Änderungen der Rechner-Konfiguration erfolgreich gespeichert.'
        );
    }

}
