<template>
    <div class="col-xl-4 offset-xl-1 col-md-6 offset-md-3">
        <h2 class="h2 text-primary my-3">Resultat</h2>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Eingabe: <span class="float-right">{{ state.calculatorData[0].entry }} Euro Netto</span></li>
                <li class="list-group-item">Zwischenergebnis:  <span class="float-right">{{ state.calculatorData[0].chfNt }} CHF Netto</span></li>
                <li class="list-group-item">Ergebnis:  <span class="float-right">{{ state.calculatorData[0].chfBr }} CHF Brutto</span></li>
            </ul>
        </div>
    </div>
</template>


<script>
    import {store} from "../store.js";
    import Calculator from "./Calculator.vue";

    export default {
        name: "CalculatorResult",
        data() {
            return {
                state: store.state
            }
        },
        components: {
            Calculator
        }
    }

</script>


<style scoped>

</style>
