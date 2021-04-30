<template>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <h2 class="h2 text-primary mt-5">Resultat</h2>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Netto-Preis:
                        <span class="float-right">{{ state.calculatorData[0].entry }}
                        <span v-if="isEuro">Euro</span>
                        <span v-else>CHF</span>
                    </span>
                    </li>
                    <li v-if="isEuro" class="list-group-item">
                        Netto-Preis CHF:
                        <span class="float-right">{{ state.calculatorData[0].chfNt }} CHF</span>
                    </li>
                    <li class="list-group-item">
                        <span v-if="isET">Ersatzteil-Preis Brutto</span>
                        <span v-else>Austausch-Preis Brutto</span>
                        <span class="float-right">{{ state.calculatorData[0].chfBr }} CHF</span>
                    </li>
                </ul>
                <input type="hidden" id="result" :value="state.calculatorData[0].chfBr">
                <button class="btn btn-outline-primary mt-1"
                        type="submit"
                        @click.stop.prevent="copyResult"
                >
                    <i class="fas fa-copy mr-1"></i> Ergebnis kopieren
                </button>
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
        methods: {
            copyResult () {
                let result = document.querySelector('#result');
                result.setAttribute('type', 'text');
                result.select();

                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'successful' : 'unsuccessful';
                    // alert('Testing code was copied ' + msg);
                } catch (err) {
                    alert('Fehler beim Kopieren!');
                }

                /* unselect the range */
                result.setAttribute('type', 'hidden')
                window.getSelection().removeAllRanges()
            },
        },
    }

</script>


<style scoped>

</style>
