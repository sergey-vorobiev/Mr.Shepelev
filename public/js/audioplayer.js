// подключаем кнопку скрытия аудиоплейера и аудиоплейер
var closeButton = document.getElementById('closeButton');
var audioplayer = document.getElementById('audioplayer');

// При загрузке страницы проверяем:
// * видимость audioplayer

audioplayer.style.visibility = "hidden";

if(audioplayer.style.visibility == "hidden"){
    closeButton.className = "open visible-audioplayer";
}else if(audioplayer.style.visibility == "visible"){
    closeButton.className = "close visible-audioplayer";
}

// Функция скрытия audioplayer
function visibleAP(){
    if(audioplayer.style.visibility == "hidden"){
        audioplayer.style.visibility = 'visible';
        closeButton.className = "close visible-audioplayer";
    }else{
        audioplayer.style.visibility = 'hidden';
        closeButton.className = "open visible-audioplayer";
    }
};

var music = document.getElementById('music');
var all_block_music = document.getElementsByClassName('music-block-img');

var now_playing = 1;
var count_music = all_block_music.length;

var title = document.getElementsByClassName('title');
var autor = document.getElementsByClassName('autor');
var duration = document.getElementsByClassName('duration');
var img_album = document.getElementsByClassName('img_album');

// два массива для создания двумерного массива
var trackArray = new Array();
var trackArraySave = new Array();

// цикл для создная массива, с переменными для их дальнейшей замене в HTML
for(i = 0; i < count_music; i++){
    trackArraySave.push('public/music/' + all_block_music[i].id, title[i].textContent, autor[i].textContent, duration[i].id, img_album[i].id, title[i].href);
    trackArray.push(trackArraySave);
    trackArraySave = [];
}


var title = document.getElementById('audioplayer_title');
var autor = document.getElementById('audioplayer_autor');
var current = document.getElementById('audioplayer_current');
var durations = document.getElementById('audioplayer_durations');
var img_album = document.getElementsByClassName('audioplayer_album_img');

// переменные для динамического времени
var minuts, second, all_seconds, now_seconds, now_minutes;

// добавление информации на аудиоплейер
function changeInfoPlaylist(id){
    music.src = trackArray[id][0];
    title.textContent = trackArray[id][1];
    autor.textContent = trackArray[id][2];
    durations.textContent = trackArray[id][3];
    img_album[0].style.backgroundImage = "url(public/img/" + trackArray[id][4] + ")";
    now_playing = id;
    title.href = trackArray[id][5];

    minuts = trackArray[now_playing][3].substring(0, 2);
    second = trackArray[now_playing][3].substring(3, 5);

    if(minuts.indexOf(0) == 0)
        minuts = minuts.substring(1, 2);
    else if(minuts.indexOf(0) == -1)
        minuts = 0;

    if(second.indexOf(0) == 0)
        second = second.substring(1, 2);

    all_seconds = (parseInt(minuts) * 60) + parseInt(second);
    now_minutes = 0;
}

// при наэатии на изображение music-block
function clickImg(id){
    for(var i = 0; i < count_music; i++){
        if(trackArray[i][0].indexOf(id) == 13){
            now_playing = i;
            changeInfoPlaylist(i);
            audioplayer.style.visibility = 'visible';
            closeButton.className = "close visible-audioplayer";
        }
    }
    play();
}

// поумолчанию ставится первый трек в аудиоплейер
changeInfoPlaylist(0);

var nextButton = document.getElementById('nextButton');
var preButton = document.getElementById('preButton');

var bool_playing = false; // играет ли песня

// следующий трек
function NextTrack(){
    var save = now_playing;
    if(save = save + 2 > count_music){
        now_playing = 0;
    } else{
        now_playing++;
    }
    t = false;
    changeInfoPlaylist(now_playing);

    if(bool_playing){
        playhead.style.width = 0;
        playhead.style.width = "0";
        play();
    }
    else {};
}

// предыдущий трек
function PreviousTrack(){
    var save = now_playing;
    if(--save < 0){
        now_playing = 0;
    }
    else{
        now_playing--;
    }
    t = false;
    changeInfoPlaylist(now_playing);

    if(bool_playing){
        playhead.style.width = 0;
        playhead.style.width = "0";
        play();
    }
    else {};
}

var duration = music.duration; // длительность аудиоклипа, рассчитанная здесь для встраивания
var pButton = document.getElementById('pButton'); // кнопка play
var playhead = document.getElementById('playhead'); // div полосы прокрутки
var timeline = document.getElementById('timeline'); // полоса прокрутки

// Ширина временной шкалы скорректирована для воспроизведения
var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

// Слушатель события кнопки воспроизведения
pButton.addEventListener("click", play);

// Слушатель события timeupdate
music.addEventListener("timeupdate", timeUpdate, false);

// Делает график кликабельным
timeline.addEventListener("click", function(event) {
    moveplayhead(event);
    music.currentTime = duration * clickPercent(event);
}, false);


// Возвращает клик в виде десятичной дроби (.77) от общей шкалы времени
function clickPercent(event) {
    return (event.clientX - getPosition(timeline)) / timelineWidth;
}

// Делает playhead перетаскиваемым
playhead.addEventListener('mousedown', mouseDown, false);
window.addEventListener('mouseup', mouseUp, false);

// Логическое значение, чтобы позиция звука обновлялась только при отпускании точки воспроизведения.
var onplayhead = false;

// mouseDown EventListener
function mouseDown() {
    onplayhead = true;
    window.addEventListener('mousemove', moveplayhead, true);
    music.removeEventListener('timeupdate', timeUpdate, false);
}

// mouseUp EventListener
// получать ввод от всех кликов мыши
function mouseUp(event) {
    if (onplayhead == true) {
        moveplayhead(event);
        window.removeEventListener('mousemove', moveplayhead, true);
        // change current time
        music.currentTime = duration * clickPercent(event);
        music.addEventListener('timeupdate', timeUpdate, false);
    }
    onplayhead = false;
}
// mousemove EventListener
// Перемещает точку воспроизведения, когда пользователь перетаскивает
function moveplayhead(event) {
    var newMargLeft = event.clientX - getPosition(timeline);

    if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
        playhead.style.width = newMargLeft + "px";
    }
    if (newMargLeft < 0) {
        playhead.style.marginLeft = "0px";
    }
    if (newMargLeft > timelineWidth) {
        playhead.style.marginLeft = timelineWidth + "px";
    }
}

var now_seconds_value;
var now_minutes_value;
var t = false;

// timeUpdate
// Синхронизирует положение точки воспроизведения с текущей точкой в аудио
function timeUpdate() {
    duration = music.duration;
    var playPercent = timelineWidth * (music.currentTime / duration);
    playhead.style.width = playPercent + "px";

    // супер формуля для подсчета секунд
    now_seconds = Math.round((((100 * music.currentTime) / duration) * all_seconds) / 100);

    if(now_seconds % 60 < 10)
        now_seconds_value = '0' + now_seconds % 60;
    else if(now_seconds > 60){
        now_seconds_value = now_seconds % 60;
    }
    else
        now_seconds_value = now_seconds;

    if(Math.floor(now_seconds / 60) < 10)
        now_minutes_value = '0' + Math.floor(now_seconds / 60);
    else
        now_minutes_value = now_minutes;

        current.textContent = now_minutes_value + ':' + now_seconds_value;

    if(current.textContent == '0:NaN'){
        current.textContent = '00:00';
        // setTimeout('t = true', 100);
    }

    if (music.currentTime == duration) {
        pButton.className = "";
        pButton.className = "play";
        NextTrack();
    }
}

//Play and Pause
function play() {
    t = false;
    // start music
    if (music.paused) {
        music.play();
        bool_playing = true;
        // remove play, add pause
        pButton.className = "";
        pButton.className = "pause";
    } else { // pause music
        music.pause();
        bool_playing = false;
        // remove pause, add play
        pButton.className = "";
        pButton.className = "play";
    }
}

// Получает продолжительность аудиофайла
music.addEventListener("canplaythrough", function() {
    duration = music.duration;
}, false);

// getPosition
// Возвращает левую позицию элементов относительно левого верхнего угла области просмотра
function getPosition(el) {
    return el.getBoundingClientRect().left;
}