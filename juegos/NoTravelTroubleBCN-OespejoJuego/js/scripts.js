// Constantes
const jugador = document.getElementById("jugador");
const enemigo = document.getElementById("enemigo");
const fondo = document.getElementById("fondo");
const buttonPlayStop = document.getElementById("buttonPlayStop");
const reiniciar = document.getElementById("Reiniciar");
const board = document.getElementById("board");
const imgEnemigo = document.getElementById("imgEnemigo")
const imgJugador = document.getElementById("player")

// Variables
let resetearEnemigo = 880;
var TopPosition = 0;
var LeftPosition = 0;
var Funcionando = false;
let puntos = 0;
let intervalID; 
var si = false;
let gameLoop;
let intervalID2;
let intervalEnemigo;
let intervalDificultad;
var tiempo = 0;
var MovimientoLateral = 30;
var PosicionEnemigo = 880;
let StepIncremental = 4;
// Para que se active la funcion que compruebe las coalisiones al iniciar
window.addEventListener("load", () => {
    ReiniciarJuego();
    pararJuego();
})

// Parametros board
board.addEventListener("click", function () {
    SaltoJugador();
});

//Parametros Jugador
jugador.addEventListener('animationend', () => {
    CancelarSaltoJugador();
    CancelarMovimientoDerecha();
});

function SaltoJugador() {
        jugador.classList.add("SaltoJugador");

}

function CancelarSaltoJugador() {
    jugador.classList.remove("SaltoJugador");
    
}

// Estado del juego
function pararJuego() {
    pararAnimaciones();
    pararPuntuacion();
    pararTiempo();
    clearInterval(intervalDificultad);
    clearInterval(intervalEnemigo);
    console.log(PosicionEnemigo)
    Funcionando = false;
    return Funcionando;
}

function seguirJuego(){
    reanudarAnimaciones();
    continuarPuntuacion();
    continuarTiempo();
    cambiarEnemigo();
    Funcionando = true;
    MovimientoEnemigo();
    intervalEnemigo = setInterval(MovimientoEnemigo, 20);
    return Funcionando;
}

function ReiniciarJuego() {
    ReiniciarPuntuacion();
    ReiniciarTiempo();
    CancelarSaltoJugador();
    StepIncremental = 15;
    void enemigo.offsetWidth;
    enemigo.style.left = 880 + "px";
    PosicionEnemigo = 880;
    jugador.style.left = 50 + "px";
    si == false;
    gameLoop = requestAnimationFrame(checkCondition);
    
    return StepIncremental;
}

function JuegoPerdido() {
    cancelAnimationFrame(gameLoop)
    pararJuego();
    reiniciar.classList.add("reset")
    MensajeDerrota(false);
    var elscorebest = puntos;
    window.location.href = window.location.href + "?puntosfinales=" + elscorebest;

}
function MensajeDerrota(){
    if(si === false){
    alert("Puntos: " + puntos +
    "\n"+"Tiempo: " + tiempo)
    si = true;
    }
    return si;
}


//Animaciones


function reanudarAnimaciones() {
    enemigo.style.animationPlayState = "running";
    jugador.style.animationPlayState = "running";
    fondo.style.animationPlayState = "running";
}
function pararAnimaciones() {
    enemigo.style.animationPlayState = "paused";
    jugador.style.animationPlayState = "paused";
    fondo.style.animationPlayState = "paused";
}

// Control del boto per pausar o continuar

buttonPlayStop.addEventListener('click', () => {
    if(buttonPlayStop.classList.contains("play")){
        seguirJuego()
    }
    else{    
        pararJuego();
    }
    buttonPlayStop.classList.toggle("play");
});

// Reiniciar el joc

reiniciar.addEventListener('click', ReiniciarJuego);

// Puntuació

function continuarPuntuacion() {
        intervalID = setInterval(() =>{
            puntos++;
            document.getElementById("puntos").innerText = puntos;
        }, 50);
 }

function pararPuntuacion() {
    clearInterval(intervalID);

}
function ReiniciarPuntuacion(){ 
    puntos = 0;
    document.getElementById('puntos').innerText = puntos;
}

// Temps
function continuarTiempo() {
    intervalID2 = setInterval(() =>{
        tiempo++;
        document.getElementById('tiempo').innerText = tiempo;
    }, 1000);
    return tiempo;
}

function pararTiempo() {
clearInterval(intervalID2);
return tiempo;

}

function ReiniciarTiempo(){ 
tiempo = 0;
document.getElementById('tiempo').innerText = tiempo;
return tiempo;
}
  /*
document.addEventListener("keyup", (event) => {
    const teclaPresionada = event.key;
    if (event.key == 'ArrowRight') {
        MovimientoDerecha();
    }

    const otrateclaPresionada = teclaPresionada.toLowerCase();
  if (otrateclaPresionada == "d") {
        MovimientoDerecha();

    }*/

// Probando 
document.addEventListener("keydown", (event) => {
    const teclaPresionada = event.key;
    if (event.key == 'ArrowUp') {
        SaltoJugador();
    }

    const otrateclaPresionada = teclaPresionada.toLowerCase();
    if (otrateclaPresionada == "w") {
        SaltoJugador();

    }

})

document.addEventListener("keydown", (event) => {
    if (Funcionando == true){
        const teclaPresionada = event.key;
        if (event.key == 'ArrowLeft') {
            if(jugador.offsetLeft >= 10){
                LeftPosition = LeftPosition - 30;
                jugador.style.left = LeftPosition + "px";
            }
        }
    // 880
        const otrateclaPresionada = event.key;
        if (otrateclaPresionada == "ArrowRight") {
            if(jugador.offsetLeft <= 880){
                LeftPosition = LeftPosition + 30;
                jugador.style.left = LeftPosition + "px";
            
            }
        }
    }
})

// Comprobar

function checkCondition() {
    if (
        enemigo.offsetLeft < (jugador.offsetLeft + 49)
        && enemigo.offsetLeft > jugador.offsetLeft
        && (jugador.offsetTop >= (enemigo.offsetTop - jugador.offsetHeight))
    ) {
        JuegoPerdido();
    }
    gameLoop = requestAnimationFrame(checkCondition)
}

// Cambiar el jugador

function cambiarJugador(){
    if(puntos <= 0){
        imgEnemigo.src= './media/enemigo1.gif';
    }
  }

function cambiarEnemigo(){
    if(puntos <= 0){
        imgEnemigo.src= './media/enemigo1.gif';
    }
  }




onkeydown = (key) => {
    console.log(key);
}


function MovimientoEnemigo(){
    IncrementoDificultad();
    if(Funcionando == true){
        if(PosicionEnemigo > 10 ){
            console.log("El step vale " + StepIncremental)
            PosicionEnemigo = PosicionEnemigo - StepIncremental;
            enemigo.style.left =  PosicionEnemigo + "px"; 
            console.log(enemigo.style.left);
            console.log(tiempo);
        }
        else if(PosicionEnemigo <= 10){
            DefaultSet();
        }
       
    }
    return PosicionEnemigo;
}

function DefaultSet(){
        enemigo.style.left = resetearEnemigo + "px";
        PosicionEnemigo = 880;
        console.log("No tira2");
        return PosicionEnemigo;
    }

function IncrementoDificultad(){
    if(tiempo >= 0 && tiempo <= 5){
        StepIncremental = 6;
        console.log(StepIncremental);
        imgEnemigo.src= './media/enemigo1.gif';
        imgJugador.src= './media/jugador1.gif';
    }

    if(tiempo >= 5 && tiempo <= 10){
        StepIncremental = 9;
        console.log(StepIncremental)
    }
    else if(tiempo >= 10 && tiempo < 20){
        StepIncremental = 13;
        console.log("2")
        imgEnemigo.src= './media/enemigo2.gif';
        imgJugador.src= './media/jugador2.gif';
    }
    else if(tiempo >= 20 && tiempo < 25){
        StepIncremental = 17;
        console.log("3")
        imgEnemigo.src= './media/enemigo3.gif';
        imgJugador.src= './media/jugador3.gif';
    }
    else if(tiempo >= 25 && tiempo < 35){
        StepIncremental = 20;
        console.log("4")
        imgEnemigo.src= './media/enemigo1.gif';
        imgJugador.src= './media/jugador1.gif';
    }
    else if(tiempo >= 35){
         StepIncremental = 26
    }
return StepIncremental;
}
