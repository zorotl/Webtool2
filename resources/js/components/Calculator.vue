<template>
    <div class="col-xl-6">
        <h1 class="h2 text-primary my-3">Tools: Preis-Rechner</h1>
        <div class="border border-secondary rounded-lg p-4 clearfix">
            <div class="mt-4">
                <div class="row">
                    <span class="col-form-label col-sm-3">Währung</span>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="eurochf" id="euro"
                                   value="option1" checked>
                            <label class="form-check-label" for="euro">
                                Euro Nt. <i class="fas fa-arrow-right"></i> CHF Br.
                            </label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="eurochf" id="chf"
                                   value="option2">
                            <label class="form-check-label" for="chf">
                                CHF Nt. <i class="fas fa-arrow-right"></i> CHF Br.
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="row">
                    <span class="col-form-label col-sm-3">Art</span>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="art" id="et"
                                   value="option1" checked>
                            <label class="form-check-label" for="et">
                                Ersatzteil
                            </label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="art" id="at"
                                   value="option2">
                            <label class="form-check-label" for="at">
                                Gerät
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-3 col-form-label" for="netto">Betrag Netto</label>
                <input type="text" class="form-control col-sm-9"
                       id="netto" name="netto" value="" autofocus
                       v-model="entry"
                >
            </div>

            <button class="btn btn-outline-primary mt-3 float-right"
                    type="submit"
                    @click="calculate(entry, calculator.mwst, calculator.eurochf, calculator.atfaktor)"
            >
                <i class="fas fa-calculator mr-1"></i> Umrechnen
            </button>
        </div>
    </div>
</template>


<script>
    import {store} from "../store.js";
    import CalculatorResult from "./CalculatorResult.vue";

    export default {
        name: "Calculator",
        props: {
            calculator: {
                type: Object
            }
        },
        data() {
            return {
                state: store.state,
                entry: ''
            }
        },
        components: {
            CalculatorResult
        },
        methods: {
            calculate: function (entry, mwst, eurochf, atfaktor) {
                if (entry !== '') {
                    store.setCalculatorData(mwst, eurochf, atfaktor);
                    store.calculate(entry);
                }
            }
        }
    }
</script>


<style scoped>

</style>
