<template>
    <div class="col-xl-4 offset-1">
        <h2 class="h2 text-primary my-3">Resultat</h2>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Eingabe: {{ state.calculatorData[0].entry }}</li>
                <li class="list-group-item">MwSt:  {{ state.calculatorData[0].mwst }}</li>
                <li class="list-group-item">Euro Chf:  {{ state.calculatorData[0].eurochf }}</li>
                <li class="list-group-item">AT-Faktor:  {{ state.calculatorData[0].atfaktor }}</li>
                <li class="list-group-item">AT-Faktor:  {{ state.calculatorData[0].output }}</li>
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
