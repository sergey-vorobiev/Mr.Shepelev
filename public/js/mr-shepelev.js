var follow_button = document.getElementById('follow');

follow_button.onclick = function(){
	if(follow_button.textContent == "Подписаться")
	{
		follow_button.textContent = "Отписаться";
	}
	else{
		follow_button.textContent = "Подписаться";
	}
}