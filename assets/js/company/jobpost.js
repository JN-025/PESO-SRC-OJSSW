document.addEventListener("DOMContentLoaded", function(){
var modal = document.getElementById("modalBlock");
var deleteBtn = document.getElementById("deleteBtn");
var noBtn = document.getElementById("noBtn");
deleteBtn.onclick = function() {
    modal.style.display = "flex";
};
noBtn.onclick = function(event){
    if (event.target == modal){
        modal.style.display = "none";
    }
};
});