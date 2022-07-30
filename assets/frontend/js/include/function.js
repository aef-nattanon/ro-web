//change the opacity for different browsers
function chOp(opacity, obj, mode) {
	if(mode == 0){ // single element
	    var object = document.getElementById(obj).style;
		var objects = document.getElementById(obj);
	    object.opacity = (opacity / 100);
	    object.MozOpacity = (opacity / 100);
	    object.KhtmlOpacity = (opacity / 100);
	    object.filter = "alpha(opacity=" + opacity + ")";
		object.border = "1px solid red";
		
		//objects.focus();
		objects.scrollIntoView();
		display_map(objects);
	}else{	// change opacity of an array of element
		
		var arr = getElementsByClass(obj, null, null); 	// obj is the classname
		
		for(i = 0; i < arr.length; i++){
			var object = arr[i].style;
		    object.opacity = (opacity / 100);
		    object.MozOpacity = (opacity / 100);
		    object.KhtmlOpacity = (opacity / 100);
		    object.filter = "alpha(opacity=" + opacity + ")";
			if(obj != "ver25" && obj != "ver50" && obj != "hor25" && obj != "hor50")
				object.border = "0px";
		}
	}    
}

function display_map(obj){
	var img = document.getElementById("display_map");

	img.src = obj.src.replace("v_small","small");
	img.style.display = "block";

} 

function view_boss(){
	var chk = document.getElementById("boss_img_chk");
	var boss_img = document.getElementsByClassName("boss_img");
	if(chk.checked){
		for (var i = 0; i < boss_img.length; i++) {
		   boss_img[i].style.display = "block";
		   //unfade(boss_img[i]);
		}
		document.getElementById("miniboss_img_chk").checked = false;
		view_miniboss();
	}else{
		for (var i = 0; i < boss_img.length; i++) {
		   boss_img[i].style.display = "none";
		   //fade(boss_img[i]);
		}
	}
}

function view_miniboss(){
	var chk = document.getElementById("miniboss_img_chk");
	var boss_img = document.getElementsByClassName("mini_boss_img");
	if(chk.checked){
		for (var i = 0; i < boss_img.length; i++) {
		   boss_img[i].style.display = "block";
		   //unfade(boss_img[i]);
		}
		document.getElementById("boss_img_chk").checked = false;
		view_boss();
	}else{
		for (var i = 0; i < boss_img.length; i++) {
		   boss_img[i].style.display = "none";
		   //fade(boss_img[i]);
		}
	}
}

function fade(element) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 50);
}
function unfade(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 10);
}

function shiftOpacity(id, millisec) {
    //if an element is invisible, make it visible, else make it ivisible
    if(document.getElementById(id).style.opacity == 50) {
        opacity(id, 50, 100, millisec);
    } else {
        opacity(id, 100, 50, millisec);
    }
}

// taken from http://www.brainerror.net/scripts_js_blendtrans.php
function opacity(id, opacStart, opacEnd, millisec) {
    //speed for each frame
    var speed = Math.round(millisec / 100);
    var timer = 0;

    //determine the direction for the blending, if start and end are the same nothing happens
    if(opacStart > opacEnd) {
        for(i = opacStart; i >= opacEnd; i--) {
            setTimeout("chOp(" + i + ",'" + id + "', 0)",(timer * speed));
            timer++;
        }
    } else if(opacStart < opacEnd) {
        for(i = opacStart; i <= opacEnd; i++)
            {
            setTimeout("chOp(" + i + ",'" + id + "', 0)",(timer * speed));
            timer++;
        }
    }
}

var flashing;

function show_flashing_result(ele){

	//clearInterval(flashing);	// turn off initially flashing map

	box = document.getElementById(ele);
	value = box.options[box.selectedIndex].value;
	
	
	chOp(20, "smap", 1);  // set all smap class to dim
	chOp(20, "ver50", 1);
	chOp(20, "ver25", 1);
	chOp(20, "hor50", 1);
	chOp(20, "hor25", 1);
	
	// color maps that match the selected dungeon entrance map or map name 
	chOp(100,value, 0);
	
	
	//flashing = setInterval("shiftOpacity(value, 500)",1000);
}

function reset_map(){
	//clearInterval(flashing);	// turn off initially flashing map	
	chOp(100,"smap", 1);	// set all map colored
	chOp(100, "ver50", 1);
	chOp(100, "ver25", 1);
	chOp(100, "hor50", 1);
	chOp(100, "hor25", 1);
	var img = document.getElementById("display_map");
	img.style.display = "none";
	
}

function getElementsByClass(searchClass,node,tag) {
	var classElements = new Array();
	if ( node == null )
		node = document;
	if ( tag == null )
		tag = '*';
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\s)"+searchClass+"(\s|$)");
	for (i = 0, j = 0; i < elsLen; i++) {
		if ( pattern.test(els[i].className) ) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}