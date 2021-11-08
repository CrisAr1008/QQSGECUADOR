
setTimeout(function() {
    select_id("bienvenida1").innerHTML = "Bienvenido, es tu momento de jugar"
    select_id("bienvenidanombre1").innerHTML = "Nicolas Garzon"
    console.log("hola")
}, 1000 *8)

function select_id(id) {
    return document.getElementById(id)
  }

