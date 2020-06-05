


// Obtiene datos de la base de datos
var contenido = document.querySelector('#contenido');





fetch('data.php',{
             method: 'POST',
         })
            .then(res => res.json())
            .then(data => {
              tabla(data)   
            })
    //funcion para llenar tabla
    function tabla(data){
        contenido.innerHTML = ''
        for(let valor of data){
                // regresa registros a la vista en la tabla dinamica
                contenido.innerHTML += `
                <tr>
                    <td>${ valor.empresa }</td>
                    <td>${ valor.insumo }</td>
                    <td>${ valor.caracter }</td>
                    <td>${ valor.cantidad }</td>
                    <td>${ valor.precio }</td>
                    <td> 
                      
                            <button type="submit"  id="${valor.id}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">solicita</button>
                    
                    </td>
                </tr> `
        }
    }



    const empresa = document.querySelector('#contenido');
    const produt = document.querySelector('#descript');
    let info;
    empresa.addEventListener('click', ejecutarBoton);

    function ejecutarBoton(e){

        let idx = e.target.id;
            console.log(idx);
       
        fetch('data.php',{
            method: 'POST',
        })
           .then(res => res.json())
           .then(data => {

                for(valor of data){
                    if( idx === valor.id){
                        info = valor;
                        produt.innerHTML = `
                        <ul>
                            <li>Empresa: ${info.empresa}</li>
                            <li>Insumo: ${info.insumo}</li>
                            <li>Caracteristicas: ${info.caracter}</li>
                            <li>Catidad: ${info.cantidad}</li>
                            <li>Precio: ${info.precio}</li>
                        </ul>
                        <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" placeholder="Correo Electronico">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" placeholder="Telegono">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" placeholder="Empresa">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" placeholder="Sector">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" placeholder="Mensaje">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </div>
                        </form>
                        `
                          
                        console.log(info);
                    }
                }
           })
    }