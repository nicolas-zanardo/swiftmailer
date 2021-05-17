const btnForm = document.querySelector('button');
const form = document.getElementById('myForm');
const info = document.querySelector('.info');


/**
 * Event
 */
//email
document.querySelectorAll('input[type="email"]').forEach((e) => {
    e.addEventListener('blur', (elt) => {
        const inputEmailValueLength = 255;
        const regexEmail = new RegExp('^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$');
        isValid(elt, inputEmailValueLength, regexEmail)
    })
});
//TextArea
document.querySelector('textarea').addEventListener('keydown', (elt) => {
    const inputTextareaValueLength = 1000;
    const regexString = new RegExp('\\w');
    isValid(elt, inputTextareaValueLength, regexString)
});
//subject
document.querySelector('input[type="text"]').addEventListener('keydown', (elt)=> {
    const inputEmailValueLength = 255;
    const regexString = new RegExp('\\w');
    isValid(elt, inputEmailValueLength, regexString)
})

// ### SUBMIT ###
btnForm.addEventListener('click', ()=> {
    if(
        form['sender'].getAttribute('data-valid') === 'true' &&
        form['recipient'].getAttribute('data-valid') === 'true' &&
        form['message'].getAttribute('data-valid') === 'true' &&
        form['subject'].getAttribute('data-valid') === 'true'
    ) {
        form.submit()
        info.textContent = "Vous devez remplir tout les champs du formulaire.";
        info.style.backgroundColor = "white";
    } else {
        info.textContent = "Vous devez remplir tout les champs du formulaire.";
        info.style.backgroundColor = "#ac4545";
    }
})



/**
 * isValid()
 * ---------
 * @param elt
 * @param textLength
 * @param regex
 */
function isValid(elt, textLength, regex) {
    if (elt.currentTarget.value.length > textLength || !elt.currentTarget.value.match(regex)) {
        elt.currentTarget.classList.add("is-invalid");
        elt.currentTarget.setAttribute('data-valid', 'false')
    }
    if (elt.currentTarget.value.length < textLength && elt.currentTarget.value.match(regex)) {
        elt.currentTarget.classList.remove("is-invalid");
        elt.currentTarget.setAttribute('data-valid', 'true')
    }
}


