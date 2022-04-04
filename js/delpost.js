var modalEditdel = document.querySelector('#delpostmodal')
var modalBtndel = document.querySelector('#btn-deletepost')
var closeBtndel = document.querySelector('#closeBtndel')

modalBtndel.addEventListener('click', openmodal)
closeBtndel.addEventListener('click', closemodal)
window.addEventListener('click', clickOutside)

function openmodal(){
    modalEditdel.style.display = 'block'
}

function closemodal(){
    modalEditdel.style.display = 'none'
}

function clickOutside(e){
    if(e.target == modalEditdel){
        modalEditdel.style.display = 'none'
    }
}