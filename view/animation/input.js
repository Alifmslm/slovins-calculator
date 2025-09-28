// Memformat angka pada input populasi agar ada koma
let input_population = document.getElementById("inpt-population")

function formatNumber() {
    let raw_population_value = input_population.value
    let clean_population_value = raw_population_value.replace(/[^0-9]/g, '');

    let int_population_value = parseInt(clean_population_value, 10)

    if (isNaN(int_population_value)) {
        input_population.value = ""
        return
    }

    let formated_population_value = int_population_value.toLocaleString("en-US")
    input_population.value = formated_population_value
}

// gunakan listener input ketika kita ingin mengubah perilaku saat user sedang input sesuatu
input_population.addEventListener("input", formatNumber)