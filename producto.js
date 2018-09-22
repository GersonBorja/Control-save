window.onload = () => {
    // Funcion para ventanas modal
    const funcionParaModal = (btn1, btn2, ventana) => {
        const closeModal = (ventana) => {
            const btnClose = document.querySelector(ventana)
            btnClose.classList.remove("fadeIn")
            btnClose.classList.add("fadeOut")
            setTimeout(() => {
                btnClose.style.display = "none"
            }, 300)
        }
        const modalOpen = (ventana) => {
            btnOpen = document.querySelector(ventana)
            btnOpen.classList.remove("fadeOut")
            btnOpen.classList.add("fadeIn")
            setTimeout(() => {
                btnOpen.style.display = "flex"
            }, 300)
        }
        let close = document.querySelector(btn1)
        let open = document.querySelector(btn2)
        close.addEventListener("click", () => {
            closeModal(ventana)
        })
        open.addEventListener("click", () => {
            modalOpen(ventana)
        })
    }
    funcionParaModal(".modal-close", ".modal-open", ".modal-fade")
    funcionParaModal(".modal-close-edit", ".modal-open-edit", ".modal-fade-edit")
    funcionParaModal(".modal-close-img", ".modal-open-img", ".modal-image")
    // function para reemplazar el input file

    const changeInput = (boxnew, boxreal) => {
        let newbox = document.querySelector(boxnew)
        let boxoriginal = document.querySelector(boxreal)
        newbox.addEventListener("click", () => {
            boxoriginal.click()
        })

        // Detectar algun cambio
        boxoriginal.addEventListener("change", () => {
            if (boxoriginal.value !== "") {
                newbox.textContent = boxoriginal.value
            } else {
                newbox.textContent = "Selecciona una imagen..."
            }
        })
    }
    changeInput("#boxFile", "#file")
}
