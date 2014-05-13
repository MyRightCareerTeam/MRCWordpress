var transform = ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"];
var transitionDurations = ["transitionDuration", "msTransitionDuration", "webkitTransitionDuration", "mozTransitionDuration", "oTransitionDuration"];
var screenWidth = window.screen.width;
var screenHeight = window.screen.height;

function show_left(){
	moveMenu("#left-menu", screenWidth);
	
	document.getElementById("slide-left").onclick = hide_left;
}

function show_right() {
	moveMenu("#right-menu", -screenWidth);
	
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

function editor_up() {
	var editor = document.getElementById("editor");
	var editorSize = editor.style["height"];
	//var editorSize = editor.clientHeight / screenHeight;
	
	editor.style["height"] = "90%";
	
	if (editorSize == "10%") {
		editor.style["height"] = "50%";
	}
	else if (editorSize == "50%") {
		editor.style["height"] = "90%";
	}
	else {
		console.debug("Wrong height: " + editorSize);
	}
	
	document.getElementById("inner-editor").resize("95%", "100%");
}

function editor_down() {
	var editor = document.getElementById("editor");
	var editorSize = editor.style["height"];
	
	editor.style["height"] = "10%";
	
	if (editorSize == "90%") {
		editor.style["height"] = "50%";
	}
	else if (editorSize == "50%") {
		editor.style["height"] = "10%";
	}
	else {
		console.debug("Wrong height: " + editorSize);
	}
	
	document.getElementById("inner-editor").resize("95%", "100%");
}

function moveMenu(item, x) {
	var menu = document.querySelector(item);
	var transformProperty = getSupportedPropertyName(transform);
	var transitionDurationProperty = getSupportedPropertyName(transitionDurations);
	
	if (transitionDurationProperty) {
		menu.style[transitionDurationProperty] = "1s";
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


$('#left-menu ul ul li:odd').addClass('odd');
$('#left-menu ul ul li:even').addClass('even');
$('#left-menu > ul > li > a').click(function() {
  $('#left-menu li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#left-menu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});