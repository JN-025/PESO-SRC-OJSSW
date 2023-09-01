window.addEventListener("load", ()=>{
    const loader = document.querySelector(".loader");

    loader.classList.add("loader-hidden");

    loader.addEventListener("Transitionend", () =>{
        document.body.removeChild("loader");
    })
})