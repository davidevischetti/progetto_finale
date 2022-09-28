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


// pop up overlay delete
const eleOverlay = document.querySelector('.overlay');
if (eleOverlay) {
    const deleteButtons = document.querySelectorAll('.js-delete');
    const formPopup = document.querySelector('.popup');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            eleOverlay.classList.remove('d-none');

            const id = this.closest('[data-id]').dataset.id
            const pattern = formPopup.dataset.action;
            const newAction = pattern.replace('*', id);
            formPopup.action = newAction;
        })
    });

    document.querySelector('.js-no').addEventListener('click', function() {
        eleOverlay.classList.add('d-none');
    })
}


// TODO: controllo password
// let elPws = document.querySelector('.pws');
// let elPwsConfirmed = document.querySelector('.pws-confirmed');
// let elAlert = document.querySelector('.myAlert');
// let elBtn = document.querySelector('.myDisable');

// function checkPws(){
//     if (elPwsConfirmed.value != elPws.value) {
//         elAlert.innerHTML = 'Le password non corrispondono';
//         elBtn.setAttribute('disabled');
//     } else {
//         elBtn.removeAttribute('disabled');
//     }
// }

function validate() {
    let elPws = document.querySelector('.pws').value;
    let elPwsConfirmed = document.querySelector('.pws-confirmed').value;
    let elAlert = document.querySelector('.myAlert');
    if (elPws != elPwsConfirmed) {
        elAlert.classList.remove('d-none');
        elAlert.classList.add('alert-danger');
        elAlert.classList.add('pws-shake');
        elAlert.innerHTML = "Le password non corrispondono";
        return false;
    }
    return true;
}

function fixedPws (){
    let elPws = document.querySelector('.pws').value;
    let elPwsConfirmed = document.querySelector('.pws-confirmed').value;
    let elAlert = document.querySelector('.myAlert');
    if (elPws == elPwsConfirmed) {
        elAlert.classList.remove('alert-danger');
        elAlert.classList.add('alert-success');
        elAlert.innerHTML = "Le password corrispondono";
    } else if (elPws != elPwsConfirmed){
        elAlert.classList.remove('d-none');
        elAlert.classList.add('alert-danger');
        elAlert.innerHTML = "Le password non corrispondono";
    }
}

window.validate = validate;
window.fixedPws = fixedPws;

