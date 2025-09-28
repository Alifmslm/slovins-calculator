// Memformat angka pada input populasi agar ada koma
let input_population = document.getElementById("inpt-population")
let input_error = document.getElementById("inpt-error")

function formatInput(paramInput) {
    let raw_value = paramInput.value

    let clean_value = raw_value.replace(/[^0-9]/g, '');

    let int_value = parseInt(clean_value, 10)

    if (isNaN(int_value)) {
        paramInput.value = ""
        return
    }

    let formated_value = int_value.toLocaleString("en-US")
    paramInput.value = formated_value
}

// gunakan listener input ketika kita ingin mengubah perilaku element html saat user sedang input sesuatu
// ketika ada parameter, gunakan lambda function agar fungsi tidak langsung dijalankan
input_population.addEventListener("input", function () {
    formatInput(input_population)
})

input_error.addEventListener("input", function () {
    formatInput(input_error)
})