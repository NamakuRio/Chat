<?php  
	
	// for ($i=0; $i < 10; $i++) { 
		
	// 	echo( "<embed name='sound_file' src='../../assets/music/pesan_masuk.mp3' loop='true' hidden='true' autostart='true'/>");
	// 	sleep(1); 	
	// }

?>

<script async type="text/javascript">
	// function music(){
	// 	var halo = "<embed name='sound_file' src='../../assets/music/pesan_masuk.mp3' loop='true' hidden='true' autostart='true'/>";
	// 	return halo;
	// }
	// window.onload = music();
	function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '../../assets/music/pesan_masuk.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
    }
    // setInterval(function(){
    // 	play_sound();
    // },2000);
</script>