var APP = [];
APP.sinusCounter = 0;
APP.MAX_NINOTS_TO_ANIMATE = 3;
APP.NINOTS_ARRAY = [];

// Este codigo se ejecuta immediatamente despues de que
// el navegador termine de cargar el DOM
jQuery(document).ready(function($) {

    // Calcula el tiempo que va a tardar disparar el temporizador inicial
    var r = getRandomInt(1500, 5500);
    console.log('[ready] r = ' + r);
    APP.fireInterval = setTimeout("fireInterval()", r);

    // Calcula la matriz de ninos a mover
    fillArrayOfNinotsToAnimate();

/*    $('#hotspot').click(function(evt) {
        $(document).trigger('app/showPanel', 'first');
        $('#hotspot').unbind('mouseout');
    });

    // Asigna la funcion que se va a disparar al situar el puntero sobre #hotsopt
    $('#hotspot').mouseover(function(evt) {
        $('#dark-background-layer').fadeTo(250, 1, 'swing');
        blinkOff();
    });

    // Asigna la funcion que se va a disparar al situar el puntero fuera de #hotsopt
    $('#hotspot').mouseout(function(evt) {
        $('#dark-background-layer').fadeTo(250, 0, 'swing');
        blinkOn();
    });

    // Asigna la funcion que animara la intensidad de la capa de iluminacion continuamente
    blinkOn();
*/
});

function fillArrayOfNinotsToAnimate() {
    console.log('[fillArrayOfNinotsToAnimate] hit!');
    if (APP.NINOTS_ARRAY.length == 0) {
        console.log('[fillArrayOfNinotsToAnimate] len == 0');
        var r = getRandomInt(1, APP.MAX_NINOTS_TO_ANIMATE);
        APP.NINOTS_ARRAY.push(r);
        var r2 = getRandomInt(1, APP.MAX_NINOTS_TO_ANIMATE);
        while (r == r2) {
            r2 = getRandomInt(1, APP.MAX_NINOTS_TO_ANIMATE);
        }
        APP.NINOTS_ARRAY.push(r2);
    }
}

// Evento definido para mostrar el panel inferior
jQuery(document).on('app/showPanel', function(evt, param) {
    //console.log('[app/showPanel] fired param=' + param);
    $('#hidden-bottom-panel').animate({
        'top' : '-1100px'
    }, { duration : 'slow' });
    $('#hidden-bottom-panel').click(function(evt) {
        $(document).trigger('app/hidePanel', 'second');
    });
});

// Evento definido para ocultar el panel inferior
jQuery(document).on('app/hidePanel', function(evt, param) {
    //console.log('[app/hidePanel] fired param=' + param);
    $('#dark-background-layer').fadeTo(250, 0, 'swing');
    $('#hidden-bottom-panel').animate({
        'top' : '-836px'
    }, { duration : 'slow' });
    $('#hotspot').mouseout(function(evt) {
        $('#dark-background-layer').fadeTo(250, 0, 'swing');
        blinkOn();
    });
    $('#hidden-bottom-panel').unbind('click');
    blinkOn();
});

function fireInterval() {
    //console.log('[fireInterval] hit!');
    var r = getRandomInt(1500, 5500);
    //console.log('[fireInterval] new r = ' + r);
    APP.fireInterval = setTimeout("fireInterval()", r);
}

function blinkOff() {
    clearInterval(APP.blinkInterval);
}

function fadeSinusInOut(id) {
    APP.sinusCounter = (APP.sinusCounter + 1) % 40;
    var opv = Math.round(((Math.sin(0.05 * Math.PI * APP.sinusCounter) + 1)) / 2 * 100 ) / 100;
    //console.log('opacity val = ' + opv);
    $(id).css('opacity', opv);
}

/**
 * Returns a random integer between min and max
 * Using Math.round() will give you a non-uniform distribution!
 */
function getRandomInt (min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
