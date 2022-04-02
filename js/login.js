var modal = document.querySelector('#regismodal')
var modalBtn = document.querySelector('#modalBtn')
var closeBtn = document.querySelector('.closeBtn')

modalBtn.addEventListener('click', openmodal)
closeBtn.addEventListener('click', closemodal)
window.addEventListener('click', clickOutside)

function openmodal(){
    modal.style.display = 'block'
}

function closemodal(){
    modal.style.display = 'none'
}

function clickOutside(e){
    if(e.target == modal){
        modal.style.display = 'none'
    }
}
