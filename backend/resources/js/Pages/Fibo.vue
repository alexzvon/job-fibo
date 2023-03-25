<template>
    <h1>Расчет значения числа Фибоначи</h1>
    <form @submit.prevent="calcFibo()">
        <input v-model="inputFibo" name="fibo" autocomplete="off" />
        <button>Run</button>
    </form>
    <p>{{ outFibo }}</p>
    <p class="error_red">{{ errorFibo }}</p>
</template>

<script>
import { ref } from "vue"

export default {
    name: "Fibo",

    setup() {
        const inputFibo = ref('')
        let outFibo = ref('')
        let errorFibo = ref('')

        function calcFibo() {
            outFibo.value = errorFibo.value = ''

            axios
                .post("http://fibo.loc/api/calck", { fibo: inputFibo.value })
                .then((response) => {
                    outFibo.value = response.data.value
                })
                .catch((error) => {
                    errorFibo.value = error.message + ' -- ' + error.response.data.message
                })
        }

        return {
            inputFibo,
            calcFibo,
            outFibo,
            errorFibo,
        }
    }
}
</script>

<style lang="scss">
$border: 2px solid
rgba(
    $color: white,
    $alpha: 0.35,
);
$size1: 6px;
$size2: 12px;
$size3: 18px;
$size4: 24px;
$size5: 48px;
$backgroundColor: #27292d;
$textColor: white;
$primaryColor: #a0a4d9;
$secondTextColor: #1f2023;
$errorTextColor: red;
body {
    margin: 0;
    padding: 0;
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background-color: $backgroundColor;
    color: $textColor;
    #app {
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px;
        h1 {
            font-weight: bold;
            font-size: 28px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 100%;
            label {
                font-size: 14px;
                font-weight: bold;
            }
            input,
            button {
                height: $size5;
                box-shadow: none;
                outline: none;
                padding-left: $size2;
                padding-right: $size2;
                border-radius: $size1;
                font-size: 18px;
                margin-top: $size1;
                margin-bottom: $size2;
            }
            input {
                background-color: transparent;
                border: $border;
                color: inherit;
            }
        }
        button {
            cursor: pointer;
            background-color: $primaryColor;
            border: 1px solid $primaryColor;
            color: $secondTextColor;
            font-weight: bold;
            outline: none;
            border-radius: $size1;
        }
        p.error_red {
            color: $errorTextColor;
        }
        h2 {
            font-size: 22px;
            border-bottom: $border;
            padding-bottom: $size1;
        }
        h4 {
            text-align: center;
            opacity: 0.5;
            margin: 0;
        }
    }
}
</style>
