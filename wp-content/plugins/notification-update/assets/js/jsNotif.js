document.addEventListener("DOMContentLoaded",()=>{
    setTimeout(playSound,5000);
    var audio = new Audio('wp-content/plugins/notification-update/assets/sound/notifSound.mp3');
    function playSound(){
        audio.play();
    }
})