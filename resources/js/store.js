/**
 * Created by mstri on 01.07.2020.
 */

"use strict";

import {calculatorData} from "./data.js";
// import $ from 'jquery';

export const store = {
    state: {
        calculatorData
    },
    setCalculatorData(entry, mwst, eurochf, atfaktor, type, currency) {
        this.state.calculatorData[0].mwst = mwst;
        this.state.calculatorData[0].eurochf = eurochf;
        this.state.calculatorData[0].atfaktor = atfaktor;
        this.state.calculatorData[0].entry = parseFloat(entry.replace(",", "."));
        this.state.calculatorData[0].type = type;
        this.state.calculatorData[0].currency = currency;
    },
    calculate() {
        const mwst = this.state.calculatorData[0].mwst;
        const eurochf = this.state.calculatorData[0].eurochf;
        const atfaktor = this.state.calculatorData[0].atfaktor;
        const type = this.state.calculatorData[0].type;
        const currency = this.state.calculatorData[0].currency;
        const entry = this.state.calculatorData[0].entry;

        let chfNt = 0;
        let chfBr = 0;

        if (currency === "euro") {
            chfNt = entry * eurochf;
        } else if (currency === "chf") {
            chfNt = entry;
        }

        if (type === "et") {
            if (chfNt > 0 && chfNt < 1 ) {
                chfBr = 0;
            } else if (chfNt >= 1 && chfNt < 100) {
                chfBr = chfNt * mwst * 1.5;
            } else if (chfNt >= 100) {
                chfBr = chfNt * mwst * 1.25;
            }
        } else if (type === "at") {
            chfBr = chfNt * mwst * atfaktor;
        }

        this.state.calculatorData[0].chfNt = Math.round(chfNt * 100) / 100;
        this.state.calculatorData[0].chfBr = Math.round(chfBr * 100) / 100;
    },
}
