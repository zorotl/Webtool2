<template>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <h2 class="h2 text-primary mt-5">Resultat</h2>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Netto-Preis:
                        <span class="float-right">{{ state.calculatorData[0].entry }}
                        <span v-if="isEuro">Euro Netto</span>
                        <span v-else>CHF Netto</span>
                    </span>
                    </li>
                    <li v-if="isEuro" class="list-group-item">
                        Zwischenergebnis:
                        <span class="float-right">{{ state.calculatorData[0].chfNt }} CHF Netto</span>
                    </li>
                    <li class="list-group-item">
                        <span v-if="isET">Ersatzteil-Preis</span>
                        <span v-else>Austausch-Preis</span>
                        <span class="float-right">{{ state.calculatorData[0].chfBr }} CHF Brutto</span>
                    </li>
                </ul>
            </div>
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
        },
        computed: {
            isEuro() {
                return this.state.calculatorData[0].currency === 'euro';
            },
            isET() {
                return this.state.calculatorData[0].type === 'et';
            }
        },
    }

</script>


<style scoped>

</style>
