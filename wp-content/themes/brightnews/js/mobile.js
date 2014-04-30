var transform = ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"];
var transitionDurations = ["transitionDuration", "msTransitionDuration", "webkitTransitionDuration", "mozTransitionDuration", "oTransitionDuration"];
var width = window.screen.width;

function show_left(){
	moveMenu("#left-menu", width);
	
	document.getElementById("slide-left").onclick = hide_left;
}

function show_right() {
	moveMenu("#right-menu", -width);
	
	document.getElementById("slide-right").onclick = hide_right;
}

function hide_left(){
	moveMenu("#left-menu", 0);
	
	document.getElementById("slide-left").onclick = show_left;
}

function hide_right() {
	moveMenu("#right-menu", 0);
	
	document.getElementById("slide-right").onclick = show_right;
}

function moveMenu(item, x) {
	var menu = document.querySelector(item);
	var transformProperty = getSupportedPropertyName(transform);
	var transitionDurationProperty = getSupportedPropertyName(transitionDurations);
	
	if (transitionDurationProperty) {
		menu.style[transitionDurationProperty] = "1.5s";
	}
	
	if (transformProperty) {
		menu.style[transformProperty] = "translate3d(" + x + "px, 0px, 0px)";
	}
}

function getSupportedPropertyName(properties) {
    for (var i = 0; i < properties.length; i++) {
        if (typeof document.body.style[properties[i]] != "undefined") {
            return properties[i];
        }
    }
    return null;
}