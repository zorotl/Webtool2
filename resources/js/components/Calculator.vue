<template>
    <div class="col-xl-6">
        <h1 class="h2 text-primary my-3">Tools: Preis-Rechner</h1>
        <form id="calculator">
            <fieldset class="border border-secondary rounded-lg p-4">
                <div>
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
                        <input type="text"
                               class="form-control col-sm-9"
                               id="netto" name="netto" autofocus>
                    </div>

                    <button class="btn btn-outline-primary mt-3 float-right" type="submit">
                        <i class="fas fa-calculator mr-1"></i> Umrechnen
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</template>


<script>
    export default {
        name: "Calculator",
        props: {
            calculator: {
                type: Object
            }
        },
    }
</script>


<style scoped>

</style>
