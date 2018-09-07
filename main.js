window.onload = () => {
	// Abrir ventana
	let btnSecundario = document.getElementById("secundario");
	let btnOriginal = document.getElementById("original");
	const cambio = () => {
		btnOriginal.onchange = () => {
			btnSecundario.innerHTML = btnOriginal.value
			if(btnOriginal.value == ""){
				btnSecundario.innerHTML = "Selecciona una imagen"
				}
			}
		}
	btnSecundario.addEventListener("click", () => {
		btnOriginal.click()
		cambio()
		});
		
// Enviar dato

$("#ajaxform").bind("submit", function(e){
e.preventDefault()
$.ajax({

url: $(this).attr('action'),

type: $(this).attr('method'),

data: new FormData(this),

contentType: false,

cache: false,

processData: false,

beforeSend: function (){
	 $('input[type="submit"]').val("Guardando...")
	},

success: function (dataUp){
$('input[type="submit"]').val("Agregar producto")
$(".shower").html(dataUp);
}

})
})

	}