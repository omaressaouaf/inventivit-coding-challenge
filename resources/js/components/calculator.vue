<template>
    <div class="container mt-5">
        <h1 class="mb-4">Simple Calculator</h1>

        <form @submit.prevent="calculate">
            <div class="mb-3">
                <label for="first-number" class="form-label">
                    First Number:
                </label>
                <input
                    v-model="form.first_number"
                    type="text"
                    class="form-control"
                    id="first-number"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="operator" class="form-label">Operator:</label>
                <select
                    v-model="form.operator"
                    class="form-select"
                    id="operator"
                    required
                >
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="second-number" class="form-label"
                    >Second Number:</label
                >
                <input
                    v-model="form.second_number"
                    type="text"
                    class="form-control"
                    id="second-number"
                    required
                />
            </div>

            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <div v-if="calculation !== null" class="mt-4">
            <p class="lead">Result: {{ calculation.result }}</p>
        </div>

        <div v-for="error in errors" class="mt-4">
            <p class="text-danger">{{ error }}</p>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="mb-4">Calculation History</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First Number</th>
                    <th scope="col">Operator</th>
                    <th scope="col">Second Number</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(calculation, index) in calculationsHistory"
                    :key="index"
                >
                    <td>{{ calculation.first_number }}</td>
                    <td>{{ calculation.operator }}</td>
                    <td>{{ calculation.second_number }}</td>
                    <td>{{ calculation.result }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        calculations: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            form: {
                first_number: "",
                second_number: "",
                operator: "+",
            },
            calculationsHistory: this.calculations,
            calculation: null,
            errors: [],
        };
    },
    methods: {
        calculate() {
            this.calculation = null;
            this.errors = [];

            axios
                .post("/calculator", {
                    first_number: parseFloat(this.form.first_number),
                    second_number: parseFloat(this.form.second_number),
                    operator: this.form.operator,
                })
                .then((response) => {
                    this.calculation = response.data.calculation;
                    this.calculationsHistory.unshift(this.calculation);
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        for (const errorsPerField of Object.values(
                            error.response.data.errors
                        )) {
                            this.errors.push(errorsPerField[0]);
                        }
                    } else {
                        this.errors.push(error.response.data.error);
                    }
                });
        },
    },
};
</script>
