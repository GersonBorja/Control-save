let borrar
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
            close.addEventListener("click", (e) => {
            	if(document.getElementById("message")){
            	document.getElementById("message").innerHTML = ""
            }
                closeModal(ventana)
                e.preventDefault()
            })
            open.addEventListener("click", (e) => {
                modalOpen(ventana)
                e.preventDefault()
            })
        } // function para reemplazar el input file

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
        let actualizarImg = () => {
        	let base = document.getElementById("imageRefresh").getAttribute("href")
        	let env = document.getElementById("imageRefresh").getAttribute("class")
            let url = 'imagen=' + env
            const datos = new URLSearchParams(url);
        	fetch(base, {
        	method: 'POST',
        	body: datos
        })
        .then(res => res.text())
        .then(data => {
        	let nombre = document.getElementById("imageRefresh").getAttribute("alt")
        let a = "../assets/productos/" + nombre + "/" + data
        	document.getElementById("imgestable").setAttribute("src", a)
})
        } 
  
         const enviarDatos = (theform, notification) => {
        	let formulario = document.getElementById(theform)
        let message = document.getElementById(notification)
        formulario.addEventListener("submit", (e) => {
        	
        	e.preventDefault()
        let datos = new FormData(formulario)
        fetch(formulario.getAttribute('action'),{
        	method: 'POST',
            body: datos
        })
        .then(res => res.text())
        .then(data => {
        	actualizarImg()
			message.innerHTML = data
})
        })
        }
        borrar = () => {
        	let dir = document.getElementById("borrado").getAttribute("href")
        	let ide = document.getElementById("borrado").getAttribute("class")
        let paquete = 'id=' + ide
            const datos = new URLSearchParams(paquete);
        	fetch(dir, {
        	method: 'POST',
        	body: datos
        })
        .then(res => res.text())
        .then(data => {
        	alert(data)
        })
        }
    funcionParaModal(".modal-close-img", ".modal-open-img", ".modal-image")
    funcionParaModal(".modal-close", ".modal-open", ".modal-fade")
    changeInput("#boxFile", "#file")
    funcionParaModal(".modal-close-edit", ".modal-open-edit", ".modal-fade-edit")
    enviarDatos("formulario", "message")
    enviarDatos("addate", "notify")
    return borrar
    }