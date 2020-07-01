/**
 * Created by mstri on 01.07.2020.
 */

"use strict";

import {calculatorData} from "./data.js";

export const store = {
    state: {
        calculatorData
    },
    setCalculatorData(mwst, eurochf, atfaktor) {
        this.state.calculatorData[0].mwst = mwst;
        this.state.calculatorData[0].eurochf = eurochf;
        this.state.calculatorData[0].atfaktor = atfaktor;
    },
    calculate(entry) {
        this.state.calculatorData[0].entry = entry;
        this.state.calculatorData[0].output = entry * this.state.calculatorData[0].eurochf * 1.6;
    },
}
