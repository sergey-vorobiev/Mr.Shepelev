var closeButton = document.getElementById('closeButton');
var audioplayer = document.getElementById('audioplayer');

// При загрузке страницы проверяем:
// * видимость audioplayer

if(audioplayer.style.display == "none"){
    closeButton.className = "open visible-audioplayer";
}else if(audioplayer.style.display == "flex"){
    closeButton.className = "close visible-audioplayer";
}

// Функция скрытия audioplayer

function visibleAP(){
    if(audioplayer.style.display == "none"){
        audioplayer.style.display = 'flex';
        closeButton.className = "close visible-audioplayer";
    }else{
        audioplayer.style.display = 'none';
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
    trackArraySave.push('public/music/' +  all_block_music[i].id, title[i].textContent, autor[i].textContent, duration[i].id, img_album[i].id);
    trackArray.push(trackArraySave);
    trackArraySave = [];
}

var title = document.getElementById('audioplayer_title');
var autor = document.getElementById('audioplayer_autor');
var durations = document.getElementById('audioplayer_durations');
var img_album = document.getElementsByClassName('audioplayer_album_img');




function changeInfoPlaylist(id){
    music.src = trackArray[id][0];
    title.textContent = trackArray[id][1];
    autor.textContent = trackArray[id][2];
    durations.textContent = trackArray[id][3];
    img_album[0].style.backgroundImage = "url(public/img/" + trackArray[id][4] + ")";
    now_playing = id;
}

function clickImg(id){
    for(var i = 0; i < count_music; i++){
        if(trackArray[i][0].indexOf(id) == 13){
            now_playing = i;
            changeInfoPlaylist(i);
        }
    }
    play();
}

changeInfoPlaylist(0);

var nextButton = document.getElementById('nextButton');
var preButton = document.getElementById('preButton');

var bool_playing = false; // играет ли песня

function NextTrack(){
    var save = now_playing;
    if(--save < 0){
        now_playing = 0;
    }
    else{
        now_playing--;
    }
    changeInfoPlaylist(now_playing);

    if(bool_playing){
        play();
    }
    else {};
}

function PreviousTrack(){
    var save = now_playing;
    if(save = save + 2 > count_music){
        now_playing = 0;
    } else{
        now_playing++;
    }
    changeInfoPlaylist(now_playing);

    if(bool_playing){
        play();
    }
    else {};
}

// var elements_music = document.querySelectorAll('.music-block-img > #music');

// pButton.addEventListener("click", play);




var duration = music.duration; // длительность аудиоклипа, рассчитанная здесь для встраивания
var pButton = document.getElementById('pButton'); // кнопка play
var playhead = document.getElementById('playhead'); // div полосы прокрутки
var timeline = document.getElementById('timeline'); // полоса прокрутки

// Ширина временной шкалы скорректирована для воспроизведения
var timelineWidth = timeline.offsetWidth - playhead.offsetWidth - 1;

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

// timeUpdate
// Синхронизирует положение точки воспроизведения с текущей точкой в аудио
function timeUpdate() {
    var playPercent = timelineWidth * (music.currentTime / duration);
    playhead.style.width = playPercent + "px";
    if (music.currentTime == duration) {
        pButton.className = "";
        pButton.className = "play";
        NextTrack();
    }
}

//Play and Pause
function play() {
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