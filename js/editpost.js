var modalEditpost = document.querySelector('#editpostmodal')
var modalBtnpost = document.querySelector('#btn-editpost')
var closeBtnpost = document.querySelector('#closeBtnpost')

modalBtnpost.addEventListener('click', openmodal)
closeBtnpost.addEventListener('click', closemodal)
window.addEventListener('click', clickOutside)

function openmodal(){
    modalEditpost.style.display = 'block'
}

function closemodal(){
    modalEditpost.style.display = 'none'
}

function clickOutside(e){
    if(e.target == modalEditpost){
        modalEditpost.style.display = 'none'
    }
}