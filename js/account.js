var modalEditacc = document.querySelector('#editaccountmodal')
var modalBtnacc = document.querySelector('#btn-editaccount')
var closeBtnacc = document.querySelector('#closeBtnacc')

modalBtnacc.addEventListener('click', openmodal)
closeBtnacc.addEventListener('click', closemodal)
window.addEventListener('click', clickOutside)

function openmodal(){
    modalEditacc.style.display = 'block'
}

function closemodal(){
    modalEditacc.style.display = 'none'
}

function clickOutside(e){
    if(e.target == modalEditacc){
        modalEditacc.style.display = 'none'
    }
}