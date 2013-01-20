var APP = [];

subject = {

    queue: [],
    observers: [],
    needsReloadQueue : true,

    registerObserver: function(observer) {
        this.observers.push(observer);
    },

    removeObserver: function(observer) {
        var i = this.observers.indexOf(observer);
        if (i >= 0) this.observers.splice(i, 1);
    },

    notifyObservers: function() {
        for (var i = 0; i < this.observers.length; i++) {
            this.observers[i].update();
        }
    },

    notifyObserverAtIndex: function(index) {
        this.observers[index].update();
    },

    init: function() {
        //console.log('I have ' + this.observers.length + ' observers');
        //console.log('I go to choose a random observer');
        var selected = getRandomInt(0, subject.observers.length-1);
        console.log('Selected observer index = ' + selected);
        subject.notifyObserverAtIndex(selected);
    },

    reloadQueue: function() {
        for (var i = 0; i < this.observers.length; i++) {
            var selected = getRandomInt(0, this.observers.length-1);

        }
    }
}

// Evento definido para asignar un temporizador aleatorio sobre 
// un ninotID pasado por parametro
jQuery(document).on('app/setMovement', function(evt) {
    var r = getRandomInt(1500, 5500);
    console.log('[app/setMovement] fired with timeout = ' + r);   
    //setTimeout(fireInterval, r, param);
    setTimeout(subject.init, r);
});

// Paso de animacion 1: movimento hacia la izquierda
function fireInterval(param) {
    //console.log('[fireInterval] hit! param=' + param);
    var n = $('#' + param.id);
    var t = "rotate(-1 " + (param.x + param.width/2) + " " + (param.y + param.height/2) + ")";
    //console.log('[fireInterval] transform=' + t);
    n.attr("transform", t);
    setTimeout(fireInterval2, 250, param);
}

// Paso de animacion 2: movimento hacia la derecha
function fireInterval2(param) {
    //console.log('[fireInterval2] hit! param=' + param);
    var n = $('#' + param.id);
    var t = "rotate(1 " + (param.x + param.width/2) + " " + (param.y + param.height/2) + ")";
    //console.log('[fireInterval2] transform=' + t);
    n.attr("transform", t);
    setTimeout(fireInterval3, 250, param);
}

// Paso de animacion 3: movimento hacia la izquierda
function fireInterval3(param) {
    //console.log('[fireInterval3] hit! param=' + param);
    var n = $('#' + param.id);
    var t = "rotate(-2 " + (param.x + param.width/2) + " " + (param.y + param.height/2) + ")";
    //console.log('[fireInterval3] transform=' + t);
    n.attr("transform", t);
    setTimeout(fireInterval4, 250, param);
}

// Paso de animacion 4: movimento hacia la derecha
function fireInterval4(param) {
    //console.log('[fireInterval4] hit! param=' + param);
    var n = $('#' + param.id);
    var t = "rotate(2 " + (param.x + param.width/2) + " " + (param.y + param.height/2) + ")";
    //console.log('[fireInterval4] transform=' + t);
    n.attr("transform", t);
    setTimeout(fireIntervalFinal, 250, param);
}

// Paso de animacion final: movimento hacia el centro y reasignacion del temporizador aleatorio
function fireIntervalFinal(param) {
    //console.log('[fireIntervalFinal] hit! param=' + param);
    var n = $('#' + param.id);
    var t = "rotate(0 " + (param.x + param.width/2) + " " + (param.y + param.height/2) + ")";
    //console.log('[fireIntervalFinal] transform=' + t);
    n.attr("transform", t);
    $(document).trigger('app/setMovement');
    /*if (param.id == 'ninot_balena') {
        $(document).trigger('app/setMovement', APP.balena);
    } else if (param.id == 'ninot_girafa') {
        $(document).trigger('app/setMovement', APP.girafa);
    } else if (param.id == 'ninot_ocell') {
        $(document).trigger('app/setMovement', APP.ocell);
    } else if (param.id == 'ninot_pitet') {
        $(document).trigger('app/setMovement', APP.pitet);
    } else if (param.id == 'ninot_gossalsitxa') {
        $(document).trigger('app/setMovement', APP.gos);
    }*/
}
/**
 * Returns a random integer between min and max
 * Using Math.round() will give you a non-uniform distribution!
 */
function getRandomInt (min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
