<template>
    <div class="col-xl-6">
        <h1 class="h2 text-primary my-3">Tools: Netto-Brutto Rechner</h1>
        <div class="border border-secondary rounded-lg p-4 clearfix">
            <div class="mt-4">
                <div class="row">
                    <span class="col-form-label col-sm-3">Währung</span>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="eurochf" id="euro" value="euro"
                                   v-model="currency"
                            >
                            <label class="form-check-label" for="euro">
                                Euro
                            </label>
                        </div>
                        <div class="form-check form-check-inline ml-5">
                            <input class="form-check-input" type="radio" name="eurochf" id="chf" value="chf"
                                   v-model="currency"
                            >
                            <label class="form-check-label" for="chf">
                                CHF
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
                            <input class="form-check-input" type="radio" name="art" id="et" value="et"
                                   v-model="type"
                            >
                            <label class="form-check-label" for="et">
                                Ersatzteil
                            </label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="art" id="at" value="at"
                                   v-model="type"
                            >
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
                    @click="calculate(entry, calculator.mwst, calculator.eurochf, calculator.atfaktor, type, currency)"
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
                entry: '',
                type: '',
                currency: '',
            }
        },
        components: {
            CalculatorResult
        },
        methods: {
            calculate: function (entry, mwst, eurochf, atfaktor, type, currency) {
                if (entry !== '' && type !== '' && currency !== '') {
                    console.log(type);
                    console.log(currency);
                    console.log(entry);
                    store.setCalculatorData(entry, mwst, eurochf, atfaktor, type, currency);
                    store.calculate();
                } else {
                    alert("Bitte wähle sowohl eine Währung und eine Art aus. Fülle Ebenfall einen Netto-Preis ein.")
                }
            }
        }
    }
</script>


<style scoped>

</style>
