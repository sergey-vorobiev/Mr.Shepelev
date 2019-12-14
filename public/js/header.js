var menu_btn = document.getElementsByClassName('menu-btn');
var menu = document.getElementsByClassName('menu');

menu_btn[0].addEventListener('click', function(e){

	if(menu_btn[0].classList.contains("menu-btn_active") == true){
		menu_btn[0].classList.toggle("menu-btn_active");
		menu[0].style.display = "none";
	}
	else{
		menu_btn[0].classList.toggle("menu-btn_active");
		menu[0].style.display = "inline-block";
	}
});

window.onresize = function(e)
{
	if(document.documentElement.clientWidth > 437){
		menu[0].style.display = "inline-block";
	}
	else{
		menu_btn[0].classList.remove("menu-btn_active");
		menu[0].style.display = "none";
	}
}
