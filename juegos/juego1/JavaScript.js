/*PATITAS EN EL LOCALIZADOR*/


const cebra2 = document.getElementById("cebra2");
const mapache2 = document.getElementById("mapache2");
const titi2 = document.getElementById("titi2");

let flag = 0;
let Contador = 0;
let score = 0;
let entregados = 0;
var cogido = false;
var usado = false;


//Movimiento Cigueña
window.onload = () => {
    const imagen = {
        element: document.getElementById("imagenpajaro"),
        topPosition: 0,
        leftPosition: 0,
        step: 25,
        move: function (direction) {
            switch (direction) {
                case "ArrowUp":
                    this.topPosition = this.topPosition - this.step; /*ACTUALIZAMOS LA VARIABLE EN EL OBJETO*/
                    this.element.style.top = this.topPosition + "px";
                    break;

                case "ArrowDown":
                    this.topPosition = this.topPosition + this.step; /*ACTUALIZAMOS LA VARIABLE EN EL OBJETO*/
                    this.element.style.top = this.topPosition + "px";
                    break;

                case "ArrowRight":
                    this.leftPosition = this.leftPosition + this.step; /*ACTUALIZAMOS LA VARIABLE EN EL OBJETO*/
                    this.element.style.left = this.leftPosition + "px";
                    document.getElementById("imagen").className = "giraderecha";
                    break;

                case "ArrowLeft":
                    this.leftPosition = this.leftPosition - this.step; /*ACTUALIZAMOS LA VARIABLE EN EL OBJETO*/
                    this.element.style.left = this.leftPosition + "px";
                    document.getElementById("imagen").className = "giraizquierda";
                    break;

                default:
                    break;
            }
        }
    }
    onkeydown = (key) => {
        imagen.move(key.code);
    }

}
document.addEventListener("keyup", (event) => {
    const teclaPress = event.key;
    if (event.key == 'r') {
        positionCesta();
        console.log("si")
    }
})

function hayColision(imagen, zona) {
    let colision = false;

    for(let left = imagen.offsetLeft; left <= imagen.offsetWidth + imagen.offsetLeft; left++){
        for(let top = imagen.offsetTop; top <= imagen.offsetHeight + imagen.offsetTop; top++){
            if ((left >= zona.offsetLeft && left <= zona.offsetLeft + zona.offsetWidth) &&
                (top >= zona.offsetTop && top <= zona.offsetTop + zona.offsetHeight)){
                    colision = true;
                }
        }
    }

    return colision;
}


document.body.onkeyup = function (e) {
    let imagen = document.getElementById("imagenpajaro");

    if (e.key == " " ||
        e.code == "Space" ||
        e.key == 32
    ) {
        //Poner el texto en el ID de la ubicacion que toca con div:

        
        let cebra = document.getElementById("cebra");  //Aunque los cojamos del HTML tenemos que crear otro let con el mismo nombre
        let mapache = document.getElementById("mapache");
        let titi = document.getElementById("titi");
        let vida = document.getElementById("vida");
        let vida1 = document.getElementById("vida1");
        let vida2 = document.getElementById("vida2");

        //esto es para saber la pos de la cebra y de la cigüeña.
        console.log("LeftPosition", cebra.leftPosition);
        console.log("OffsetLeft", cebra.offsetLeft);

        console.log("LeftPosition", imagen.leftPosition);
        console.log("OffsetLeft", imagen.offsetLeft);


//Se podria poner un IF que englobe las 3 entregas y el else que sea el de restar corazones, pero afecte a los 3
    if(Contador <= 3){
        // if ((imagen.offsetLeft >= titi.offsetLeft && imagen.offsetLeft <= titi.offsetLeft + titi.offsetWidth) &&
        //    (imagen.offsetRight >= titi.offsetRight && imagen.offsetRight <= titi.offsetRight + titi.offsetWidth) /*||
        //     (imagen.offsetTop >= titi.offsetTop && imagen.offsetTop <= titi.offsetTop + titi.offsetHeight)*/) {
        //     // let titi2 = document.getElementById("titi2");
            if(hayColision(imagen, titi)){
                if (cogido == true /*&& usado==false*/){
                    if (flag == 1) {
                        flag++;
                        console.log("pruebatiti");
                        document.getElementById("text22").innerText = "Cria entregada";
                        score = score + 50;
                        document.getElementById("punto2").innerText = score;
                        entregados = entregados + 1;
                        console.log(entregados);
                        
                    }else{
                        flag++;
                        Contador++;
                        console.log("titimal");
                        document.getElementById("text22").innerText = "Cria entregada INCORRECTAMENTE";
                        score = score-20;
                        console.log(score);
                        document.getElementById("punto2").innerText = score;
                        entregados = entregados + 1;
                        console.log(entregados);
                    }
                    usado = true;
                    titi2.classList.add("transparencia");
                    titi.disabled = true;
                    //return score;
                    cogido = false;
                }
                
                //return cogido;
            }//return usado;

 //mapache
        // } else if ((imagen.offsetLeft >= mapache.offsetLeft && imagen.offsetLeft <= mapache.offsetLeft + mapache.offsetWidth) &&
        // // (imagen.offsetRight >= mapache.offsetRight && imagen.offsetRight <= mapache.offsetRight + mapache.offsetWidth) ||
        // (imagen.offsetTop >= mapache.offsetTop && imagen.offsetTop <= mapache.offsetTop + mapache.offsetHeight)) {
        //     // let mapache2 = document.getElementById("mapache2");

        if(hayColision(imagen, mapache)){    
            if (cogido == true /*&& usado==false*/){   
                if (flag == 3) {
                    flag++;
                    console.log("pruebamapache");
                    document.getElementById("text3").innerText = "Cria entregada";
                    score = score + 50;
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    console.log(entregados);
                }else{
                    flag++;
                    Contador++;
                    console.log("mapachemal");
                    document.getElementById( "text3" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    console.log(entregados);
                } 
                usado = true;
                mapache2.classList.add("transparencia");
                mapache.disabled = true;
                //return score; 
                cogido = false;
            }
            //return cogido;
        }//return usado;
//Cebra

        // } else if ((imagen.offsetLeft >= cebra.offsetLeft && imagen.offsetLeft <= cebra.offsetLeft + cebra.offsetWidth) &&
        // // (imagen.offsetRight >= cebra.offsetRight && imagen.offsetRight <= cebra.offsetRight + cebra.offsetWidth) ||
        // (imagen.offsetTop >= cebra.offsetTop && imagen.offsetTop <= cebra.offsetTop + cebra.offsetHeight)) {
        //     // let cebra2 = document.getElementById("cebra2");

        if(hayColision(imagen, cebra)){
            if (cogido == true /*&& usado==false*/){
                if (flag == 5) {
                    flag++;
                    console.log("pruebacebra");
                    document.getElementById("text1").innerText = "Cria entregada";
                    score = score + 50;
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    console.log(entregados);
                }else{
                    flag++;
                    Contador++;
                    console.log("cebramal");
                    document.getElementById( "text1" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    console.log(entregados);
                } 
                usado = true;
                cebra2.classList.add("transparencia");
                cebra.disabled = true;
                //return score;
                cogido = false;
            }
            //return cogido;
        }


// for left de la imagen es mas grande igual a width del div +left de la imagen, left++
// for width de la imagen es mas grande igual a left del div +width de la imagen width++;

//Elefante
            //}else if((imagen.offsetLeft >= primero.offsetLeft && imagen.offsetLeft <= primero.offsetLeft + primero.offsetWidth) &&
            // (imagen.offsetRight >= primero.offsetRight && imagen.offsetRight <= primero.offsetRight + primero.offsetWidth) ||
            // (imagen.offsetLeft >= primero.offsetLeft && imagen.offsetLeft <= primero.offsetLeft + primero.offsetHeight)||
            //(imagen.offsetTop >= primero.offsetTop && imagen.offsetTop <= primero.offsetTop + primero.offsetHeight)){
                
            if(hayColision(imagen, primero)){
                 if (cogido == true /*&& usado==false*/){
                        flag++;
                        Contador++;
                        primero.disabled = true;
                        button1.classList.add("transparencia");
                        console.log("pruebaprimero");
                        document.getElementById( "error" ).innerText = "Cria entregada INCORRECTAMENTE";
                        score = score-20;
                        console.log(score);
                        document.getElementById("punto2").innerText = score;
                        entregados = entregados + 1;
                        cogido = false;
                    }usado = true;
                }

//Anaconda
            // }else if((imagen.offsetLeft >= segundo.offsetLeft && imagen.offsetLeft <= segundo.offsetLeft + segundo.offsetWidth) ||
            // (imagen.offsetRight >= segundo.offsetRight && imagen.offsetRight <= segundo.offsetRight + segundo.offsetWidth) ||
            //     (imagen.offsetLeft >= segundo.offsetLeft && imagen.offsetLeft <= segundo.offsetLeft + segundo.offsetHeight)||
            //     (imagen.offsetTop >= segundo.offsetTop && imagen.offsetTop <= segundo.offsetTop + segundo.offsetHeight)){

            if (cogido == true /*&& usado==false*/){
                if(hayColision(imagen, segundo)){
                    flag++;
                    Contador++;
                    segundo.disabled = true;
                    button2.classList.add("transparencia");
                    console.log("pruebasegundo");
                    document.getElementById( "error2" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    cogido = false;
                }usado = true;
            }
//Murcielago
            // }else if((imagen.offsetLeft >= sexto.offsetLeft && imagen.offsetLeft <= sexto.offsetLeft + sexto.offsetWidth) ||
            // (imagen.offsetRight >= sexto.offsetRight && imagen.offsetRight <= sexto.offsetRight + sexto.offsetWidth) ||
            //     (imagen.offsetLeft >= sexto.offsetLeft && imagen.offsetLeft <= sexto.offsetLeft + sexto.offsetHeight)||
            //     (imagen.offsetTop >= sexto.offsetTop && imagen.offsetTop <= sexto.offsetTop + sexto.offsetHeight)){
            
            if (cogido == true /*&& usado==false*/){
                if(hayColision(imagen, sexto)){
                    flag++;
                    Contador++;
                    sexto.disabled = true;
                    button3.classList.add("transparencia");
                    console.log("pruebasexto");
                    document.getElementById( "error3" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    cogido = false;
                }usado = true;
            }

                
//Chavarrí
            // }else if((imagen.offsetLeft >= septimo.offsetLeft && imagen.offsetLeft <= septimo.offsetLeft + septimo.offsetWidth) ||
            // (imagen.offsetRight >= septimo.offsetRight && imagen.offsetRight <= septimo.offsetRight + septimo.offsetWidth) ||
            // (imagen.offsetLeft >= septimo.offsetLeft && imagen.offsetLeft <= septimo.offsetLeft + septimo.offsetHeight)||
            // (imagen.offsetTop >= septimo.offsetTop && imagen.offsetTop <= septimo.offsetTop + septimo.offsetHeight)){

        if (cogido == true /*&& usado==false*/){
            if(hayColision(imagen, septimo)){
                flag++;
                Contador++;
                septimo.disabled = true;
                button4.classList.add("transparencia");
                console.log("pruebaseptimo");
                document.getElementById( "error4" ).innerText = "Cria entregada INCORRECTAMENTE";
                score = score-20;
                console.log(score);
                document.getElementById("punto2").innerText = score;
                entregados = entregados + 1;
                cogido = false;
            }usado = true
       }
        
//mono
                // }else if((imagen.offsetLeft >= octavo.offsetLeft && imagen.offsetLeft <= octavo.offsetLeft + octavo.offsetWidth) ||
                // (imagen.offsetRight >= octavo.offsetRight && imagen.offsetRight <= octavo.offsetRight + octavo.offsetWidth) ||
                // (imagen.offsetLeft >= octavo.offsetLeft && imagen.offsetLeft <= octavo.offsetLeft + octavo.offsetHeight)||
                // (imagen.offsetTop >= octavo.offsetTop && imagen.offsetTop <= octavo.offsetTop + octavo.offsetHeight)){
           if (cogido == true /*&& usado==false*/){
                if(hayColision(imagen, octavo)){
                    flag++;
                    Contador++;
                    octavo.disabled = true;
                    button5.classList.add("transparencia");
                    console.log("pruebaoctavo");
                    document.getElementById( "error5" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    cogido = false;
                }usado = true;
            }

//nutria
                // }else if((imagen.offsetLeft >= noveno.offsetLeft && imagen.offsetLeft <= noveno.offsetLeft + noveno.offsetWidth) ||
                // (imagen.offsetRight >= noveno.offsetRight && imagen.offsetRight <= noveno.offsetRight + noveno.offsetWidth) ||
                // (imagen.offsetLeft >= noveno.offsetLeft && imagen.offsetLeft <= noveno.offsetLeft + noveno.offsetHeight)||
                // (imagen.offsetTop >= noveno.offsetTop && imagen.offsetTop <= noveno.offsetTop + noveno.offsetHeight)){

            if (cogido == true /*&& usado==false*/){
                if(hayColision(imagen, noveno)){
                    flag++;
                    Contador++;
                    noveno.disabled = true;
                    button6.classList.add("transparencia");
                    console.log("pruebanoveno");
                    document.getElementById( "error6" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    cogido = false;
                }usado = true;
            }

//venado
                // }else if((imagen.offsetLeft >= decimo.offsetLeft && imagen.offsetLeft <= decimo.offsetLeft + decimo.offsetWidth) ||
                // (imagen.offsetRight >= decimo.offsetRight && imagen.offsetRight <= decimo.offsetRight + decimo.offsetWidth) ||
                // (imagen.offsetLeft >= decimo.offsetLeft && imagen.offsetLeft <= decimo.offsetLeft + decimo.offsetHeight)||
                // (imagen.offsetTop >= decimo.offsetTop && imagen.offsetTop <= decimo.offsetTop + decimo.offsetHeight)){

            if (cogido == true /*&& usado==false*/){
                if(hayColision(imagen, decimo)){
                    flag++;
                    Contador++;
                    decimo.disabled = true;
                    button7.classList.add("transparencia");
                    console.log("pruebadecimo");
                    document.getElementById( "error7" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    cogido = false;
                }usado = true
            }
//Zaíno
                // }else if((imagen.offsetLeft >= once.offsetLeft && imagen.offsetLeft <= once.offsetLeft + once.offsetWidth) ||
                // (imagen.offsetRight >= once.offsetRight && imagen.offsetRight <= once.offsetRight + once.offsetWidth) ||
                // (imagen.offsetLeft >= once.offsetLeft && imagen.offsetLeft <= once.offsetLeft + once.offsetHeight)||
                // (imagen.offsetTop >= once.offsetTop && imagen.offsetTop <= once.offsetTop + once.offsetHeight)){
            if (cogido == true /*&& usado==false*/){
                if(hayColision(imagen, once)){
                    flag++;
                    Contador++;
                    once.disabled = true;
                    button8.classList.add("transparencia");
                    console.log("pruebaonce");
                    document.getElementById( "error8" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    cogido = false;
                }usado = true;
           }

//Jaguar
                
                // }else if((imagen.offsetLeft >= doce.offsetLeft && imagen.offsetLeft <= doce.offsetLeft + doce.offsetWidth) ||
                // (imagen.offsetRight >= doce.offsetRight && imagen.offsetRight <= doce.offsetRight + doce.offsetWidth) ||
                // (imagen.offsetLeft >= doce.offsetLeft && imagen.offsetLeft <= doce.offsetLeft + doce.offsetHeight)|
                // (imagen.offsetTop >= doce.offsetTop && imagen.offsetTop <= doce.offsetTop + doce.offsetHeight)){
            if (cogido == true /*&& usado==false*/){
                if(hayColision(imagen, doce)){
                    flag++;
                    Contador++;
                    doce.disabled = true;
                    button9.classList.add("transparencia");
                    console.log("pruebadoce");
                    document.getElementById( "error9" ).innerText = "Cria entregada INCORRECTAMENTE";
                    score = score-20;
                    console.log(score);
                    document.getElementById("punto2").innerText = score;
                    entregados = entregados + 1;
                    cogido = false;
                }usado = true;
            }
                
//Lémur
                // }else if((imagen.offsetLeft >= trece.offsetLeft && imagen.offsetLeft <= trece.offsetLeft + trece.offsetWidth) ||
                // (imagen.offsetRight >= trece.offsetRight && imagen.offsetRight <= trece.offsetRight + trece.offsetWidth) ||
                // (imagen.offsetLeft >= trece.offsetLeft && imagen.offsetLeft <= trece.offsetLeft + trece.offsetHeight)||
                // (imagen.offsetTop >= trece.offsetTop && imagen.offsetTop <= trece.offsetTop + trece.offsetHeight)){
               
                if(hayColision(imagen, trece)){
                    if (cogido == true /*&& usado==false*/){
                        flag++;
                        Contador++;
                        trece.disabled = true;
                        button10.classList.add("transparencia");
                        console.log("pruebatrece");
                        document.getElementById( "error13" ).innerText = "Cria entregada INCORRECTAMENTE";
                        score = score-20;
                        console.log(score);
                        document.getElementById("punto2").innerText = score;
                        entregados = entregados + 1;
                        cogido = false;
                    } usado = true;                 
               }
        
        //RESTAMOS CORAZONES, podemos ponerlos en los otros DIV's, asi no resta si se clica fuera de un DIV, por el mapa
            if (Contador == 1) {
                console.log("contador esta a 1");
                vida2.classList.add("transparencia");
                document.getElementById("punto2").innerText = score;
            } else if (Contador == 2) {
                console.log("contador esta a 2");
                vida1.classList.add("transparencia");                
                document.getElementById("punto2").innerText = score;
            } else if (Contador == 3){ //Si añadimos otro else if con el contador, la cigüeña deja de funcionar
                console.log("contador esta a 3");
                vida.classList.add("transparencia");                
                document.getElementById("punto2").innerText = score;
            }return score;
        }else{
            alert('Has Perdido El Juego! :(');
            document.location.reload();
        }
        
    }
    if(entregados == 3){
        alert('Has entregado todas las crias!'); //mostrar usuario y puntuación
        
       /* var elscorebest = score;
                $.ajax({
                        data:  {score:elscorebest},
                        url:   'MapaJuegoProyecto.php',
                        type:  'post'
                });*/


        var elscorebest = score;
        window.location.href = window.location.href + "?puntosfinales=" + elscorebest;
                ;




        //document.location.reload();
    }
    
}


/*Eliminar corazones*/
/*Al no poner un let con el document.getElement no funciona*/
let cebra = document.getElementById("cebra");
let mapache = document.getElementById("mapache");
let titi = document.getElementById("titi");

//COGER LAS CRIAS DE LA CESTA
function positionCesta() {

//PONER EL BOOLEANO EN LOS OTROS PUESTOS PARA QUE NO DEJE ENTREGAR SIN CRIA, PERO NO FUNCIONA

    
    let posicion = imagen.getBoundingClientRect();
    console.log(posicion);
    if ((imagenpajaro.offsetLeft >= imagencesta.offsetLeft && imagenpajaro.offsetLeft <= imagencesta.offsetLeft + imagencesta.offsetWidth) ||
        (imagenpajaro.offsetLeft >= imagencesta.offsetLeft && imagenpajaro.offsetLeft <= imagencesta.offsetLeft + imagencesta.offsetHeight)){
        if (flag == 0) {
            document.getElementById("text2").innerText = "Cria recogida";
            cambiarImagen();
            flag++;
            usado = false;
        } else if (flag == 2) {
            document.getElementById("text2").innerText = "Cria recogida";
            cambiarImagen2();
            flag++;
            usado = false;
        } else if (flag == 4) {
            document.getElementById("text2").innerText = "Cria recogida";
            cambiarImagen3();
            flag++;
            usado = false;
            
        }
       cogido = true;
    } else {
        console.log(Error);
    }
    return cogido;
}




//Para saber la posición de la cigüeña:
function position() {
    let elemento = document.getElementById('imagen');
    //let elemento2 = document.getElementById('decimo');
    let posicion = elemento.getBoundingClientRect();
    //let posicion2 = elemento2.getBoundingClientRect();

    console.log(posicion.top, posicion.right, posicion.bottom, posicion.left);
    //console.log(posicion2.top, posicion2.right, posicion2.bottom, posicion2.left);
}
let intervalID = setInterval(position, 500, 'parámetro 1', 'parámetro 2');

/* Cambiar imagen de la Cesta */
//accediendo directamente a src
function cambiarImagen() {
    document.getElementById("imagencesta").src = "./Cestadoble.png";
}

function cambiarImagen2() {
    document.getElementById("imagencesta").src = "./CestaConCebra.png";
}

function cambiarImagen3() {
    document.getElementById("imagencesta").src = "./CestaPost.png";
}


function vida() {
    document.getElementById("vida").src = "./vida.png";
}
function vida1() {
    document.getElementById("vida1").src = "./vida.png";
}
function vida2() {
    document.getElementById("vida2").src = "./vida.png";
}

let punto2 = document.getElementById("punto2");
punto2 = score;
document.getElementById("punto2").innerHTML = punto2;