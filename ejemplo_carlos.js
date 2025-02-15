// La funcion llama a rellena selects, que devuelve una un json con un campo exito, segun si la consulta ha 
// sido exitosa o no, y en funcion del tipo de consulta que sea genera las options de una u otra manera. 
// Tras ello, si no se necesita actualizar no hace nada en el ultimo then. Si no, acutaliza como le hayamos
// pasado. En ese ultimo then estaremos 100% seguros de que el select ya tendra sus opciones.

function creaOptions(tipo, select, actualizaFormulario=null, funcionBusqueda=null, primeraOpcion = true, valor=null) {

    fetch(`php/rellena_selects.php?tipo=${tipo}`)
        .then((response) => {
            if(response.ok) {
                return(response.json())
            }
            console.log("Vaya, parece que algo salio mal...")
        })
        .then((jsonRespuesta) => {
            let opciones = (primeraOpcion)?("<option value=''></option>"):("")

            if(jsonRespuesta.exito) {
                let eleccion
                switch (tipo) {
                    case "linaje_nobiliario":
                        eleccion = "linaje"
                        break
                    
                    case "linaje_posesiones":
                        eleccion = "linaje"
                        break
                    
                    case "pontificio":
                        eleccion = "titulo"
                        break
                    
                    case "rno":
                        eleccion = "titulo"
                        break
                    
                    case "casa_real":
                        eleccion = "titulo"
                        break
                    
                    case "familia_real":
                        eleccion = "personajes"
                        break
                    
                    default:
                        eleccion = tipo
                        break
                }

                jsonRespuesta.filas.forEach(fila => {
                    switch (eleccion) {
                        case "personajes":
                            opcion = `<option value="${fila.idp}">${fila.idp} - ${fila.nombre} ${fila.apellidos}</option>`
                            break;
                        
                        case "linaje":
                            opcion = `<option value="${fila.nombre_linaje}">Casa ${fila.nombre_linaje}</option>`
                            break
                        
                        case "titulo":
                            opcion = `<option value="${fila.tipo_titulo}&${fila.nombre_titulo}">${fila.tipo_titulo} ${fila.nombre_titulo}</option>`
                            break

                        case "reinante":
                            opcion = `<option value="${fila.idp}&${fila.reino}&${fila.anyo_inicio}">${fila.idp} - ${fila.nombre} ${fila.apellidos} en el Reino de ${fila.reino}, (el reinado comienza en ${fila.anyo_inicio})</option>`
                            break 
                        
                        case "sepulcro":
                            opcion = `<option value="${fila.lugar}">${fila.lugar}</option>`
                            break

                        case "tipo_titulo":
                            opcion = `<option value="${fila.nombre_tipo}">${fila.nombre_tipo}</option>`
                        
                        default:
                            opcion = "<option value=''></option>"
                            break
                    }
                    opciones += opcion
                })

            } else {
                alert(jsonRespuesta.mensaje_cliente)
                console.log(jsonRespuesta.mensaje)
                opciones = "<option value=''></option>"
            }
            
            select.innerHTML = opciones
        })
        .then(() => {            
            if(valor) {
                select.value = valor
            }

            if(actualizaFormulario) {
                actualizaFormulario(select)
            } else if(funcionBusqueda) {
                funcionBusqueda()
            }
        })
}