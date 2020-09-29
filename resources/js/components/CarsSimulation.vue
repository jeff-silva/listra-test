<template><div style="max-width:500px;">

    <div v-if="loading">
        <i class="fas fa-sync fa-spin"></i> &nbsp; Carregando...
    </div>

    <div v-else>
        <div>Selecione um veículo</div>
        <select class="form-control" v-model="car" @change="fixParams()">
            <option :value="false">Selecionar</option>
            <option :value="c" v-for="c in cars">{{ c.description }} - {{ c.price|money }}</option>
        </select>
    </div>

    <div v-if="car" class="mt-4">
        <div class="">
            <div class="d-flex align-items-center">
                <img :src="car.photo" alt="" style="width:100px;">
                <div class="px-4">{{ car.description }}</div>
                <div class="px-4 text-success font-weight-bold h4">{{ car.price|money }}</div>
            </div>

            <div class="mt-4">Informe o valor da entrada:</div>
            <div class="input-group">
                <money v-model="entrance"
                    class="form-control"
                    :min="0"
                    style="max-width:120px;"
                    @keyup.native.enter="simulate()"
                ></money>

                <div class="form-control border-0 bg-transparent">
                    <input type="range"
                        class="custom-range"
                        step="500" min="1000" :max="car.price"
                        v-model.number="entrance"
                        @focus="fixParams()" >
                </div>
                
                <div class="input-group-append">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary" @click="simulate()" :disabled="parseInt(entrance)>car.price">
                            Calcular
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <transition name="custom-unique-name"
            enter-active-class="animate__animated animate__fadeIn"
            leave-active-class="animate__animated animate__fadeOut"
        >
            <div v-if="entrance>parseInt(car.price)" class="bg-danger text-white p-2">
                O valor da entrada é maior que o valor do carro.
            </div>
        </transition>

        <transition name="custom-unique-name"
            enter-active-class="animate__animated animate__flipInX"
            leave-active-class="animate__animated animate__fadeOut"
        >
            <div v-if="simulation" style="animation-duration:500ms;">
                <div class="mt-4 bg-success p-3 text-white">
                    <div class="py-2" v-for="i in simulation.installments">
                        {{ i.part }} &times; de {{ i.total|money }}
                    </div>
                </div>
            </div>
        </transition>
    </div>
</div></template>

<script>
export default {
    data() {
        return {
            loading: false,
            cars: [],
            car: false,
            entrance: 1000,
            simulation: false,
        };
    },

    methods: {
        getCars() {
            this.loading = true;
            this.axios.get('/api/car/all').then((resp) => {
                this.loading = false;
                this.cars = resp.data;
            });
        },

        fixParams() {
            if (!this.car) return;

            this.simulation = false;
            if (parseFloat(this.entrance)>parseFloat(this.car.price)) {
                this.entrance = this.car.price;
            }
        },

        simulate() {
            if (!this.car) return;

            let simulation = {};
            simulation.installments = [];

            [48, 12, 6].forEach((part) => {
                simulation.installments.push({
                    part: part,
                    total: (parseFloat(this.car.price) - parseFloat(this.entrance)) / part,
                });
            });

            this.simulation = simulation;
        },
    },

    mounted() {
        this.getCars();
    },
}
</script>
