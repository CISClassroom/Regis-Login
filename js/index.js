let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');

btn.onclick = function(){
    sidebar.classList.toggle("active");
}

var modal = document.querySelector('#addpostmodal')
var modalBtn = document.querySelector('#btn-addpost')
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