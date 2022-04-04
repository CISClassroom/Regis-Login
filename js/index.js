let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');

btn.onclick = function(){
    sidebar.classList.toggle("active");
}

var modalAdd = document.querySelector('#addpostmodal')
var modalBtnadd = document.querySelector('#btn-addpost')
var closeBtnadd = document.querySelector('#closeBtnaddpost')

modalBtnadd.addEventListener('click', openmodal)
closeBtnadd.addEventListener('click', closemodal)
window.addEventListener('click', clickOutside)

function openmodal(){
    modalAdd.style.display = 'block'
}

function closemodal(){
    modalAdd.style.display = 'none'
}

function clickOutside(e){
    if(e.target == modalAdd){
        modalAdd.style.display = 'none'
    }
}