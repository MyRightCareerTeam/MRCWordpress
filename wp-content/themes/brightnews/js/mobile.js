var transform = ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"];
var transitionDurations = ["transitionDuration", "msTransitionDuration", "webkitTransitionDuration", "mozTransitionDuration", "oTransitionDuration"];
var width = window.screen.width;

function show_left(){
	moveMenu("#left-control-pane", width);
}

function show_right() {
	moveMenu("#right-control-pane", -width);
}

function hide_left(){
	moveMenu("#left-control-pane", -width);
}

function hide_right() {
	moveMenu("#right-control-pane", width);
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