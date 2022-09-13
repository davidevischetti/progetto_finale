require('./bootstrap');

// JAVASCRIPT PER PERMETTERE NEL REGISTER IL CONTROLLO DEL REQUIRED NELLA SELEZIONE DELLE CATEGORIE
let checkBoxRequired = document.querySelectorAll('.remove-required');
// CALCOLA IL NUMERO DI ELEMENTI SELEZIONATI CON QUERYSELCTORALL
let checkFormLength = checkBoxRequired.length;

checkBoxRequired.forEach(checkbox => {

    checkbox.addEventListener("click", function(){

        // RIMUOVE IL REQUIRED DA TUTTI GLI ELEMENTI DEL CICLO
        checkBoxRequired.forEach(checkbox => {
            checkbox.removeAttribute('required');
        });

        // RIMUOVE LA CLASSE REMOVE-REQUIRED DAL SINGOLO CHECKBOX E RICALCOLA IL NUMERO DI ELEMENTI SELEZIONATI CON QUERYSELECTORALL
        checkbox.classList.toggle('remove-required');
        checkBoxRequired = document.querySelectorAll('.remove-required');

        // CONFRONTA LA LUNGHEZZA INIZIALE CON QUELLA MODIFICATA ED EVENTIUALMENTE RIASSEGNA IL REQUIRED A TUTTI GLI ELEMENTI
        if (checkBoxRequired.length == checkFormLength) {
            checkBoxRequired.forEach(checkbox => {
                checkbox.setAttribute('required', '');
            });
        }
    });
});


