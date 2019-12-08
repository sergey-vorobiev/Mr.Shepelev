var music_visibility = document.getElementsByClassName('music-visibility');
var myLinks = document.querySelectorAll('#menu li');

music_visibility[1].style.display = 'none';

for(var i = 0; i < myLinks.length; i++){
	myLinks[i].addEventListener('click', function(e) {
		var elem = e.target;

	    for(var i = 0; i < myLinks.length; i++){
	    	if(myLinks[i].textContent == elem.textContent){
	    		myLinks[i].classList.add('active');

	    		music_visibility[i].style.display = 'flex';
	    	}
	    	else{
	    		myLinks[i].classList.remove('active');
	    		music_visibility[i].style.display = 'none';
	    	}
	    }
	});
}

// myLinks.onclick = function(e){
// 	console.log("LF");
// 	var elem = e.target;

//     for(var i = 0; i < myLinks.length; i++){
//     	if(myLinks[i].textContent == elem.textContent){
//     		myLinks[i].classList.add('active');

//     		music_visibility[i].style.display = 'flex';
//     	}
//     	else{
//     		myLinks[i].classList.remove('active');
//     		music_visibility[i].style.display = 'none';
//     	}
//     }
// };