$(document).ready(function () {
  $("#marpro").select2({
    placeholder: "Seleccione una opcion",
  });
  $("#catpro").select2();
});

function soloMayusculas(campo_id) {
  var cadena = document.getElementById(campo_id).value;
  var cadena2 = cadena;
  document.getElementById(campo_id).value = cadena2;
}

function SoloNumeros(evt) {
  // solo permite insertar NUMEROS,EL PUNTO, ENTER, ESPACIO
  var nav4 = window.Event ? true : false;
  // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
  var key = nav4 ? evt.which : evt.keyCode;
  return key <= 13 || (key >= 48 && key <= 57);
}

function SoloNumerosFloat(evt, input) {
  // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
  var key = window.Event ? evt.which : evt.keyCode;
  var chark = String.fromCharCode(key);
  var tempValue = input.value + chark;
  if (key >= 48 && key <= 57) {
    if (filter(tempValue) === false) {
      return false;
    } else {
      return true;
    }
  } else {
    if (key == 8 || key == 13 || key == 0) {
      return true;
    } else if (key == 46) {
      if (filter(tempValue) === false) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  }
}
function filter(__val__) {
  var preg = /^([0-9]+\.?[0-9]{0,2})$/;
  if (preg.test(__val__) === true) {
    return true;
  } else {
    return false;
  }
}

function calPreVentPro() {
  //Obtienes el valor
  var cospro = document.getElementById("cospro").value;
  var ganpro = document.getElementById("ganpro").value;
  var impupro = document.getElementById("impupro").value;
  // Valida campos vacios y iguala a 0
  if (ganpro == null || ganpro == undefined || ganpro == "") {
    document.getElementById("ganpro").value = 0;
  }
  if (impupro == null || impupro == undefined || impupro == "") {
    document.getElementById("impupro").value = 0;
  }

  //calculos de porcentajes
  var resul = parseFloat(ganpro) / 100;
  var calcu = parseFloat(cospro) * resul;
  var total = parseFloat(cospro) + calcu;

  var resulimpues = parseFloat(impupro) / 100;
  var calcu2 = parseFloat(total) * resulimpues;
  var totalConImp = parseFloat(total) + calcu2;
  document.getElementById("pventpro").value = totalConImp.toFixed(3);
}

function resetform(nameform) {
  document.getElementById(nameform).reset();
}

// Revisar
function revisa_form(form_id) {
  //Con esta función revisamos los elementos del formulario que se pasa por parámetro
  var formulario = document.getElementById(form_id);
  var valido = true;
  for (var j = 0; j < formulario.elements.length; j++) {
    elemento = formulario.elements[j];
    if (elemento.className != "no_requerido") {
      //Para diferenciar los campos no requeridos en el formulario
      valor = formulario.elements[j].value;
      if (valor == null || valor.length == 0) {
        alert(
          "[ERROR] El campo " +
            formulario.elements[j].name +
            " no debe estar vací­o"
        );
        formulario.elements[j].style.border = "1px solid red";
        formulario.elements[j].focus();
        valido = false;
        break;
      }
    }
  }
  return valido;
}

// Js Usuario

// Funciones para el manejo de las Usuarios
function validaUsuario(param) {
  if (revisa_form("form_usua")) enviaUsuario(param);
  else return false;
}
function enviaUsuario(param) {
  var nomusua = document.getElementById("usunom").value;
  var apeusua = document.getElementById("usuape").value;
  var mailusua = document.getElementById("usumail").value;
  var userusua = document.getElementById("user").value;
  var passusua = document.getElementById("pass").value;
  var nivelusua = document.getElementById("valnivel").value;

  var objAjax = new XMLHttpRequest(); //Creo el objeto Ajax
  if (param == "incluir")
    objAjax.open(
      "POST",
      "../controlador/usuario.php?accion=agregar_usuario&nomusua=" +
        nomusua +
        "&apeusua=" +
        apeusua +
        "&mailusua=" +
        mailusua +
        "&userusua=" +
        userusua +
        "&passusua=" +
        passusua +
        "&nivelusua=" +
        nivelusua
    );
  //Modificar
  else {
    var id = document.getElementById("id").value;
    objAjax.open(
      "POST",
      "../controlador/usuario.php?accion=modificar_usuario&id=" +
        id +
        "&nomusua=" +
        nomusua +
        "&apeusua=" +
        apeusua +
        "&mailusua=" +
        mailusua +
        "&userusua=" +
        userusua +
        "&passusua=" +
        passusua +
        "&nivelusua=" +
        nivelusua
    );
  }
  objAjax.onreadystatechange = function () //Aquí espera la respuesta
  {
    if (objAjax.readyState == 4 && objAjax.status == 200) {
      var respuesta = objAjax.responseText; //Recibo la respuesta del controlador
      var datos = respuesta.split("#"); //Rearmo el array recibido
      if (datos[0] != 0) {
        //Posición del elemento 'exito' en la respuesta
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = alert(
          "Registro Realizado Correctamente"
        );
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          window.location.href = "inicio.php?page=usuario";
        }, 1000);
        /*if (param == "incluir") {

					document.getElementById("ci_paci").value = "";
					document.getElementById("tlf_paci").value = "";
					document.getElementById("fecnac_paci").value = "";
					document.getElementById("nom_paci").value = "";
					document.getElementById("ape_paci").value = "";
					document.getElementById("codpos_paci").value = "";
					document.getElementById("direc_paci").value = "";
					document.getElementById("ciu_paci").value = "";
					document.getElementById("est_paci").value = "";
				}*/
        document.getElementById("descripcion").focus();
      } else {
        document.getElementById("mensaje").classList.remove("mensaje_ok");
        document.getElementById("mensaje").classList.add("mensaje_error");
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          document.getElementById("mensaje").classList.remove("mensaje_error");
          document.getElementById("mensaje").classList.add("mensaje_ok");
        }, 3000);
      }
    }
  };
  objAjax.send(null);
}

function eliminarUsuarios(boton, id) {
  if (
    confirm("¿Realmente desea eliminar El Usuario con el código " + id + "?")
  ) {
    var objAjax = new XMLHttpRequest();
    objAjax.open(
      "POST",
      "../controlador/usuario.php?accion=eliminar_usuario&id=" + id
    );
    objAjax.onreadystatechange = function () {
      if (objAjax.readyState == 4 && objAjax.status == 200) {
        var respuesta = objAjax.responseText;
        var datos = respuesta.split("#");
        if (datos[0] != 0) {
          document.getElementById("mensaje").style.display = "block";
          //document.getElementById("mensaje").innerHTML=alert('Registro Actualizado Correctamente');
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            window.location.href = "inicio.php?page=usuario";
            //var fila = boton.parentNode.parentNode; //Obtiene el nodo padre (table) del nodo padre (tr) del botón
            //fila.parentNode.removeChild(fila); //Borra la fila donde está el botón
            //window.location.href = "inicio.php?page=paciente";
          }, 3000);
        } else {
          document.getElementById("mensaje").classList.remove("mensaje_ok");
          document.getElementById("mensaje").classList.add("mensaje_error");
          document.getElementById("mensaje").style.display = "block";
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            document
              .getElementById("mensaje")
              .classList.remove("mensaje_error");
            document.getElementById("mensaje").classList.add("mensaje_ok");
          }, 3000);
        }
      }
    };
    objAjax.send(null);
  }
}
// Js Usuario

// Funciones para el manejo de las Marca
function validaMarca(param) {
  if (revisa_form("form_marca")) enviaMarca(param);
  else return false;
}
function enviaMarca(param) {
  var desmar = document.getElementById("desmar").value;

  var objAjax = new XMLHttpRequest(); //Creo el objeto Ajax
  if (param == "incluir")
    objAjax.open(
      "POST",
      "../controlador/marca.php?accion=agregar_marca&desmar=" + desmar
    );
  //Modificar
  else {
    var id = document.getElementById("id").value;
    objAjax.open(
      "POST",
      "../controlador/marca.php?accion=modificar_marca&id=" +
        id +
        "&desmar=" +
        desmar
    );
  }
  objAjax.onreadystatechange = function () //Aquí espera la respuesta
  {
    if (objAjax.readyState == 4 && objAjax.status == 200) {
      var respuesta = objAjax.responseText; //Recibo la respuesta del controlador
      var datos = respuesta.split("#"); //Rearmo el array recibido
      if (datos[0] != 0) {
        //Posición del elemento 'exito' en la respuesta
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = alert(
          "Registro Realizado Correctamente"
        );
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          window.location.href = "inicio.php?page=marca";
        }, 1000);
        /*if (param == "incluir") {

					document.getElementById("ci_paci").value = "";
					document.getElementById("tlf_paci").value = "";
					document.getElementById("fecnac_paci").value = "";
					document.getElementById("nom_paci").value = "";
					document.getElementById("ape_paci").value = "";
					document.getElementById("codpos_paci").value = "";
					document.getElementById("direc_paci").value = "";
					document.getElementById("ciu_paci").value = "";
					document.getElementById("est_paci").value = "";
				}*/
        document.getElementById("descripcion").focus();
      } else {
        document.getElementById("mensaje").classList.remove("mensaje_ok");
        document.getElementById("mensaje").classList.add("mensaje_error");
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          document.getElementById("mensaje").classList.remove("mensaje_error");
          document.getElementById("mensaje").classList.add("mensaje_ok");
        }, 3000);
      }
    }
  };
  objAjax.send(null);
}

function eliminarMarca(boton, id) {
  if (confirm("¿Realmente desea eliminar Marca con el código " + id + "?")) {
    var objAjax = new XMLHttpRequest();
    objAjax.open(
      "POST",
      "../controlador/marca.php?accion=eliminar_marca&id=" + id
    );
    objAjax.onreadystatechange = function () {
      if (objAjax.readyState == 4 && objAjax.status == 200) {
        var respuesta = objAjax.responseText;
        var datos = respuesta.split("#");
        if (datos[0] != 0) {
          document.getElementById("mensaje").style.display = "block";
          //document.getElementById("mensaje").innerHTML=alert('Registro Actualizado Correctamente');
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            window.location.href = "inicio.php?page=marca";
            //var fila = boton.parentNode.parentNode; //Obtiene el nodo padre (table) del nodo padre (tr) del botón
            //fila.parentNode.removeChild(fila); //Borra la fila donde está el botón
            //window.location.href = "inicio.php?page=paciente";
          }, 2000);
        } else {
          document.getElementById("mensaje").classList.remove("mensaje_ok");
          document.getElementById("mensaje").classList.add("mensaje_error");
          document.getElementById("mensaje").style.display = "block";
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            document
              .getElementById("mensaje")
              .classList.remove("mensaje_error");
            document.getElementById("mensaje").classList.add("mensaje_ok");
          }, 3000);
        }
      }
    };
    objAjax.send(null);
  }
}

// Funciones para el manejo de las categoria
function validaCategoria(param) {
  if (revisa_form("form_categoria")) enviaCategoria(param);
  else return false;
}
function enviaCategoria(param) {
  var descat = document.getElementById("descat").value;

  var objAjax = new XMLHttpRequest(); //Creo el objeto Ajax
  if (param == "incluir")
    objAjax.open(
      "POST",
      "../controlador/categoria.php?accion=agregar_categoria&descat=" + descat
    );
  //Modificar
  else {
    var id = document.getElementById("id").value;
    objAjax.open(
      "POST",
      "../controlador/categoria.php?accion=modificar_categoria&id=" +
        id +
        "&descat=" +
        descat
    );
  }
  objAjax.onreadystatechange = function () //Aquí espera la respuesta
  {
    if (objAjax.readyState == 4 && objAjax.status == 200) {
      var respuesta = objAjax.responseText; //Recibo la respuesta del controlador
      var datos = respuesta.split("#"); //Rearmo el array recibido
      if (datos[0] != 0) {
        //Posición del elemento 'exito' en la respuesta
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = alert(
          "Registro Realizado Correctamente"
        );
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          window.location.href = "inicio.php?page=categoria";
        }, 1000);
        /*if (param == "incluir") {

					document.getElementById("ci_paci").value = "";
					document.getElementById("tlf_paci").value = "";
					document.getElementById("fecnac_paci").value = "";
					document.getElementById("nom_paci").value = "";
					document.getElementById("ape_paci").value = "";
					document.getElementById("codpos_paci").value = "";
					document.getElementById("direc_paci").value = "";
					document.getElementById("ciu_paci").value = "";
					document.getElementById("est_paci").value = "";
				}*/
        document.getElementById("descripcion").focus();
      } else {
        document.getElementById("mensaje").classList.remove("mensaje_ok");
        document.getElementById("mensaje").classList.add("mensaje_error");
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          document.getElementById("mensaje").classList.remove("mensaje_error");
          document.getElementById("mensaje").classList.add("mensaje_ok");
        }, 3000);
      }
    }
  };
  objAjax.send(null);
}

function eliminarCategoria(boton, id) {
  if (
    confirm("¿Realmente desea eliminar categoria con el código " + id + "?")
  ) {
    var objAjax = new XMLHttpRequest();
    objAjax.open(
      "POST",
      "../controlador/categoria.php?accion=eliminar_categoria&id=" + id
    );
    objAjax.onreadystatechange = function () {
      if (objAjax.readyState == 4 && objAjax.status == 200) {
        var respuesta = objAjax.responseText;
        var datos = respuesta.split("#");
        if (datos[0] != 0) {
          document.getElementById("mensaje").style.display = "block";
          //document.getElementById("mensaje").innerHTML=alert('Registro Actualizado Correctamente');
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            window.location.href = "inicio.php?page=categoria";
            //var fila = boton.parentNode.parentNode; //Obtiene el nodo padre (table) del nodo padre (tr) del botón
            //fila.parentNode.removeChild(fila); //Borra la fila donde está el botón
            //window.location.href = "inicio.php?page=paciente";
          }, 2000);
        } else {
          document.getElementById("mensaje").classList.remove("mensaje_ok");
          document.getElementById("mensaje").classList.add("mensaje_error");
          document.getElementById("mensaje").style.display = "block";
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            document
              .getElementById("mensaje")
              .classList.remove("mensaje_error");
            document.getElementById("mensaje").classList.add("mensaje_ok");
          }, 3000);
        }
      }
    };
    objAjax.send(null);
  }
}

// Funciones para el manejo de las clientes
function validaCliente(param) {
  if (revisa_form("form_clie")) enviaCliente(param);
  else return false;
}
function enviaCliente(param) {
  var cliendi = document.getElementById("cliendi").value;
  var nomclie = document.getElementById("clienom").value;
  var apeclie = document.getElementById("clieape").value;
  var direclie = document.getElementById("cliedirec").value;
  var tlfclie = document.getElementById("clietlf").value;
  var mailclie = document.getElementById("cliemail").value;
  var objAjax = new XMLHttpRequest(); //Creo el objeto Ajax
  if (param == "incluir")
    objAjax.open(
      "POST",
      "../controlador/cliente.php?accion=agregar_cliente&cliendi=" +
        cliendi +
        "&nomclie=" +
        nomclie +
        "&apeclie=" +
        apeclie +
        "&direclie=" +
        direclie +
        "&tlfclie=" +
        tlfclie +
        "&mailclie=" +
        mailclie
    );
  //Modificar
  else {
    var id = document.getElementById("id").value;
    objAjax.open(
      "POST",
      "../controlador/cliente.php?accion=modificar_cliente&id=" +
        id +
        "&cliendi=" +
        cliendi +
        "&nomclie=" +
        nomclie +
        "&apeclie=" +
        apeclie +
        "&direclie=" +
        direclie +
        "&tlfclie=" +
        tlfclie +
        "&mailclie=" +
        mailclie
    );
  }
  objAjax.onreadystatechange = function () //Aquí espera la respuesta
  {
    if (objAjax.readyState == 4 && objAjax.status == 200) {
      var respuesta = objAjax.responseText; //Recibo la respuesta del controlador
      var datos = respuesta.split("#"); //Rearmo el array recibido
      if (datos[0] != 0) {
        //Posición del elemento 'exito' en la respuesta
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = alert(
          "Registro Realizado Correctamente"
        );
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          window.location.href = "inicio.php?page=cliente";
        }, 1000);
        /*if (param == "incluir") {

					document.getElementById("ci_paci").value = "";
					document.getElementById("tlf_paci").value = "";
					document.getElementById("fecnac_paci").value = "";
					document.getElementById("nom_paci").value = "";
					document.getElementById("ape_paci").value = "";
					document.getElementById("codpos_paci").value = "";
					document.getElementById("direc_paci").value = "";
					document.getElementById("ciu_paci").value = "";
					document.getElementById("est_paci").value = "";
				}*/
        document.getElementById("descripcion").focus();
      } else {
        document.getElementById("mensaje").classList.remove("mensaje_ok");
        document.getElementById("mensaje").classList.add("mensaje_error");
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          document.getElementById("mensaje").classList.remove("mensaje_error");
          document.getElementById("mensaje").classList.add("mensaje_ok");
        }, 3000);
      }
    }
  };
  objAjax.send(null);
}

function eliminarCliente(boton, id) {
  if (
    confirm("¿Realmente desea eliminar El Cliente con el código " + id + "?")
  ) {
    var objAjax = new XMLHttpRequest();
    objAjax.open(
      "POST",
      "../controlador/cliente.php?accion=eliminar_cliente&id=" + id
    );
    objAjax.onreadystatechange = function () {
      if (objAjax.readyState == 4 && objAjax.status == 200) {
        var respuesta = objAjax.responseText;
        var datos = respuesta.split("#");
        if (datos[0] != 0) {
          document.getElementById("mensaje").style.display = "block";
          //document.getElementById("mensaje").innerHTML=alert('Registro Actualizado Correctamente');
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            window.location.href = "inicio.php?page=cliente";
            //var fila = boton.parentNode.parentNode; //Obtiene el nodo padre (table) del nodo padre (tr) del botón
            //fila.parentNode.removeChild(fila); //Borra la fila donde está el botón
            //window.location.href = "inicio.php?page=paciente";
          }, 3000);
        } else {
          document.getElementById("mensaje").classList.remove("mensaje_ok");
          document.getElementById("mensaje").classList.add("mensaje_error");
          document.getElementById("mensaje").style.display = "block";
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            document
              .getElementById("mensaje")
              .classList.remove("mensaje_error");
            document.getElementById("mensaje").classList.add("mensaje_ok");
          }, 3000);
        }
      }
    };
    objAjax.send(null);
  }
}

// PRODCTOS INICIOOO
// Funciones para el manejo de las producto
function validaProducto(param) {
  if (revisa_form("form_producto")) enviaProducto(param);
  else return false;
}
function enviaProducto(param) {
  var codpro = document.getElementById("codpro").value;
  var despro = document.getElementById("despro").value;
  var talpro = document.getElementById("talpro").value;
  var marpro = document.getElementById("marpro").value;
  var catpro = document.getElementById("catpro").value;
  var exispro = document.getElementById("exispro").value;
  var cospro = document.getElementById("cospro").value;
  var ganpro = document.getElementById("ganpro").value;
  var impupro = document.getElementById("impupro").value;
  var pventpro = document.getElementById("pventpro").value;
  var obpro = document.getElementById("obpro").value;
  var user = document.getElementById("user").value;
  var objAjax = new XMLHttpRequest(); //Creo el objeto Ajax
  if (param == "incluir")
    objAjax.open(
      "POST",
      "../controlador/producto.php?accion=agregar_producto&codpro=" +
        codpro +
        "&despro=" +
        despro +
        "&talpro=" +
        talpro +
        "&marpro=" +
        marpro +
        "&catpro=" +
        catpro +
        "&exispro=" +
        exispro +
        "&cospro=" +
        cospro +
        "&ganpro=" +
        ganpro +
        "&impupro=" +
        impupro +
        "&pventpro=" +
        pventpro +
        "&obpro=" +
        obpro +
        "&user=" +
        user
    );
  //Modificar
  else {
    var id = document.getElementById("id").value;
    objAjax.open(
      "POST",
      "../controlador/producto.php?accion=modificar_producto&id=" +
        id +
        "&codpro=" +
        codpro +
        "&despro=" +
        despro +
        "&talpro=" +
        talpro +
        "&marpro=" +
        marpro +
        "&catpro=" +
        catpro +
        "&exispro=" +
        exispro +
        "&cospro=" +
        cospro +
        "&ganpro=" +
        ganpro +
        "&impupro=" +
        impupro +
        "&pventpro=" +
        pventpro +
        "&obpro=" +
        obpro
    );
  }
  objAjax.onreadystatechange = function () //Aquí espera la respuesta
  {
    if (objAjax.readyState == 4 && objAjax.status == 200) {
      var respuesta = objAjax.responseText; //Recibo la respuesta del controlador
      var datos = respuesta.split("#"); //Rearmo el array recibido
      if (datos[0] != 0) {
        //Posición del elemento 'exito' en la respuesta
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = alert(
          "Registro Realizado Correctamente"
        );
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          window.location.href = "inicio.php?page=producto";
        }, 1000);
        /*if (param == "incluir") {

					document.getElementById("ci_paci").value = "";
					document.getElementById("tlf_paci").value = "";
					document.getElementById("fecnac_paci").value = "";
					document.getElementById("nom_paci").value = "";
					document.getElementById("ape_paci").value = "";
					document.getElementById("codpos_paci").value = "";
					document.getElementById("direc_paci").value = "";
					document.getElementById("ciu_paci").value = "";
					document.getElementById("est_paci").value = "";
				}*/
        document.getElementById("descripcion").focus();
      } else {
        document.getElementById("mensaje").classList.remove("mensaje_ok");
        document.getElementById("mensaje").classList.add("mensaje_error");
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          document.getElementById("mensaje").classList.remove("mensaje_error");
          document.getElementById("mensaje").classList.add("mensaje_ok");
        }, 3000);
      }
    }
  };
  objAjax.send(null);
}

function eliminarProducto(boton, id) {
  if (confirm("¿Realmente desea eliminar producto con el código " + id + "?")) {
    var objAjax = new XMLHttpRequest();
    objAjax.open(
      "POST",
      "../controlador/producto.php?accion=eliminar_producto&id=" + id
    );
    objAjax.onreadystatechange = function () {
      if (objAjax.readyState == 4 && objAjax.status == 200) {
        var respuesta = objAjax.responseText;
        var datos = respuesta.split("#");
        if (datos[0] != 0) {
          document.getElementById("mensaje").style.display = "block";
          //document.getElementById("mensaje").innerHTML=alert('Registro Actualizado Correctamente');
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            window.location.href = "inicio.php?page=producto";
            //var fila = boton.parentNode.parentNode; //Obtiene el nodo padre (table) del nodo padre (tr) del botón
            //fila.parentNode.removeChild(fila); //Borra la fila donde está el botón
            //window.location.href = "inicio.php?page=paciente";
          }, 2000);
        } else {
          document.getElementById("mensaje").classList.remove("mensaje_ok");
          document.getElementById("mensaje").classList.add("mensaje_error");
          document.getElementById("mensaje").style.display = "block";
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            document
              .getElementById("mensaje")
              .classList.remove("mensaje_error");
            document.getElementById("mensaje").classList.add("mensaje_ok");
          }, 3000);
        }
      }
    };
    objAjax.send(null);
  }
}

// PRODCTOSSSSS FINN
// INGRESO

function validaIngreso(param) {
  if (revisa_form("form_ingre")) enviaIngre(param);
  else return false;
}
function enviaIngre(param) {
  var cedpacingre = document.getElementById("cedpac_ingre").value;
  var numhabingre = document.getElementById("numhab_ingre").value;
  var fecingre = document.getElementById("fec_ingre").value;
  var codmedingre = document.getElementById("codmedi_ingre").value;
  var objAjax = new XMLHttpRequest(); //Creo el objeto Ajax
  if (param == "incluir")
    objAjax.open(
      "POST",
      "../controlador/ingreso.php?accion=agregar_ingreso&cedpacingre=" +
        cedpacingre +
        "&numhabingre=" +
        numhabingre +
        "&fecingre=" +
        fecingre +
        "&codmedingre=" +
        codmedingre
    );
  //Modificar
  else {
    var codingre = document.getElementById("cod_ingre").value;
    objAjax.open(
      "POST",
      "../controlador/ingreso.php?accion=modificar_ingreso&codingre=" +
        codingre +
        "&cedpacingre=" +
        cedpacingre +
        "&numhabingre=" +
        numhabingre +
        "&fecingre=" +
        fecingre +
        "&codmedingre=" +
        codmedingre
    );
  }
  objAjax.onreadystatechange = function () //Aquí espera la respuesta
  {
    if (objAjax.readyState == 4 && objAjax.status == 200) {
      var respuesta = objAjax.responseText; //Recibo la respuesta del controlador
      var datos = respuesta.split("#"); //Rearmo el array recibido
      if (datos[0] != 0) {
        //Posición del elemento 'exito' en la respuesta
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = alert(
          "Registro Realizado Correctamente"
        );
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          window.location.href = "inicio.php?page=ingreso";
        }, 2000);
        if (param == "incluir") {
          document.getElementById("ci_paci").value = "";
          document.getElementById("tlf_paci").value = "";
          document.getElementById("fecnac_paci").value = "";
          document.getElementById("nom_paci").value = "";
          document.getElementById("ape_paci").value = "";
          document.getElementById("codpos_paci").value = "";
          document.getElementById("direc_paci").value = "";
          document.getElementById("ciu_paci").value = "";
          document.getElementById("est_paci").value = "";
        }
        document.getElementById("descripcion").focus();
      } else {
        document.getElementById("mensaje").classList.remove("mensaje_ok");
        document.getElementById("mensaje").classList.add("mensaje_error");
        document.getElementById("mensaje").style.display = "block";
        document.getElementById("mensaje").innerHTML = datos[1];
        window.setTimeout(function () {
          document.getElementById("mensaje").style.display = "none";
          document.getElementById("mensaje").innerHTML = "";
          document.getElementById("mensaje").classList.remove("mensaje_error");
          document.getElementById("mensaje").classList.add("mensaje_ok");
        }, 3000);
      }
    }
  };
  objAjax.send(null);
}

function eliminarIngreso(boton, codigo) {
  if (
    confirm(
      "¿Realmente desea eliminar El Usuario con el código " + codigo + "?"
    )
  ) {
    var objAjax = new XMLHttpRequest();
    objAjax.open(
      "POST",
      "../controlador/ingreso.php?accion=eliminar_ingreso&codingre=" + codigo
    );
    objAjax.onreadystatechange = function () {
      if (objAjax.readyState == 4 && objAjax.status == 200) {
        var respuesta = objAjax.responseText;
        var datos = respuesta.split("#");
        if (datos[0] != 0) {
          document.getElementById("mensaje").style.display = "block";
          //document.getElementById("mensaje").innerHTML=alert('Registro Actualizado Correctamente');
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            var fila = boton.parentNode.parentNode; //Obtiene el nodo padre (table) del nodo padre (tr) del botón
            fila.parentNode.removeChild(fila); //Borra la fila donde está el botón
            //window.location.href = "inicio.php?page=paciente";
          }, 300);
        } else {
          document.getElementById("mensaje").classList.remove("mensaje_ok");
          document.getElementById("mensaje").classList.add("mensaje_error");
          document.getElementById("mensaje").style.display = "block";
          document.getElementById("mensaje").innerHTML = datos[1];
          window.setTimeout(function () {
            document.getElementById("mensaje").style.display = "none";
            document.getElementById("mensaje").innerHTML = "";
            document
              .getElementById("mensaje")
              .classList.remove("mensaje_error");
            document.getElementById("mensaje").classList.add("mensaje_ok");
          }, 3000);
        }
      }
    };
    objAjax.send(null);
  }
}

// CSRIP DE FACTURAS

$("#btnConfirmarBorrado").click(function () {
  $("#ModalConfirmarBorrar").modal("hide");
  $.ajax({
    type: "POST",
    url: "../controlador/transaccion.php?accion=eliminardetalle&codigo=" + cod,
    success: function (msg) {
      RecuperarDetalle();
    },
    error: function () {
      alert("Hay un error ..");
    },
  });
});
$("#btnConfirmarBorradoCom").click(function () {
  $("#ModalConfirmarBorrarCom").modal("hide");
  $.ajax({
    type: "POST",
    url:
      "../controlador/transaccion.php?accion=eliminardetallecompra&codigo=" +
      cod,
    success: function (msg) {
      RecuperarDetalle();
    },
    error: function () {
      alert("Hay un error ..");
    },
  });
});

// FIN FACT
