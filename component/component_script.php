<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!-- <script src="https://use.typekit.net/hoy3lrg.js"></script> -->
<script>try{Typekit.load({ async: true });}catch(e){}</script>	
<!-- <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script> -->
<!-- <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script> -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125737582-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125737582-1');
</script>
<script>
	var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");

	$("#profile-img").click(function() {
		$("#status-options").toggleClass("active");
	});

	$(".expand-button").click(function() {
		$("#profile").toggleClass("expanded");
		$("#contacts").toggleClass("expanded");
	});

	$("#status-options ul li").click(function() {
		$("#profile-img").removeClass();
		$("#status-online").removeClass("active");
		$("#status-away").removeClass("active");
		$("#status-busy").removeClass("active");
		$("#status-offline").removeClass("active");
		$(this).addClass("active");

		if($("#status-online").hasClass("active")) {
			$("#profile-img").addClass("online");
		} else if ($("#status-away").hasClass("active")) {
			$("#profile-img").addClass("away");
		} else if ($("#status-busy").hasClass("active")) {
			$("#profile-img").addClass("busy");
		} else if ($("#status-offline").hasClass("active")) {
			$("#profile-img").addClass("offline");
		} else {
			$("#profile-img").removeClass();
		};

		$("#status-options").removeClass("active");
	});
	function newMessage() {
		message = $(".message-input input").val();
		message_encode = Base64.encode(message);
		if($.trim(message) == '') {
			return false;
		}
		console.log(message_encode);
		$.ajax({
            type:'POST',
            data: 'message='+message_encode,
            url: 'config/proses.php?action=kirimpesan',
            success: function(result){
                var response = JSON.parse(result);

                if(response.status == 'sukses'){
                    $('<li class="replies"><!-- <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /> --><p>' + message + '</p></li>').appendTo($('.messages ul'));
					$('.message-input input').val(null);
					$('.contact.active .preview').html('<span>You: </span>' + message);

					$(".messages").animate({ scrollTop: $('.messages').prop('scrollHeight') }, "normal");
                } else {
                	console.log("gagal");
                }

            }
        });

		
		
	};

	$('.submit').click(function() {
		newMessage();
	});

	$(window).on('keydown', function(e) {
		// console.log(e);
		if (e.which == 13) {
			newMessage();
			return false;
		}
	});

	function newStatus(status){
		console.log(status);

		$.ajax({
            type:'POST',
            data: 'status='+status+'&id_user='+<?php echo $_SESSION['id']; ?>,
            url: 'config/proses.php?action=kirimstatus',
            success: function(result){
            	console.log(result);
                var response = JSON.parse(result);

                if(response.status == 'sukses'){
                    console.log("sukses");
                } else {
                	console.log("gagal");
                }

            }
        });

	}

	window.onload = ambilkontak();

	function ambilkontak(){

		$.ajax({
            type:'GET',
            url: 'config/proses.php?action=ambilkontak',
            success: function(result){
            	// console.log(result);
                var response = JSON.parse(result);
               
                if(response.status == 'sukses'){
                	 $.each(response.data,function(prop,obj){
	                	// console.log("prop: "+prop+" obj: "+obj+"\n");
	                	$('<li class="contact" id="' + Base64.encode(obj.username_user) + '" onclick="bukachat(' + obj.id_user + ',' + "'" + Base64.encode(obj.username_user) + "'" +');"><div class="wrap"><span class="contact-status ' + obj.status_user.toLowerCase() + '"></span><img src="assets/images/user.jpg" alt="" /><div class="meta"><p class="name">' + obj.nama_user + '</p><p class="preview"><span>Anda:</span> Hai.</p></div></div></li>').appendTo($('#contacts ul'));
	                });
                	 $("#contacts ul").animate({ scrollTop: $('#contacts').prop('scrollHeight') }, "normal");
                	 $('#loader-contacts').fadeOut();
                } else {
                	$('#loader-contacts').fadeOut();
                	console.log("gagal");
                }

            }
        });
	}

	function refreshkontak(){
	   	$('#loader-contacts').fadeIn();
		$.ajax({
            type:'GET',
            url: 'config/proses.php?action=ambilkontak',
            success: function(result){
            	// console.log(result);
                var response = JSON.parse(result);
               	$('#contacts ul li').remove();
                if(response.status == 'sukses'){
                	 $.each(response.data,function(prop,obj){
	                	// console.log("prop: "+prop+" obj: "+obj+"\n");
	                	$('<li class="contact" id="' + Base64.encode(obj.username_user) + '" onclick="bukachat(' + obj.id_user + ',' + "'" + Base64.encode(obj.username_user) + "'" +');"><div class="wrap"><span class="contact-status '+ obj.status_user.toLowerCase() +'"></span><img src="assets/images/user.jpg" alt="" /><div class="meta"><p class="name">' + obj.nama_user + '</p><p class="preview"><span>Anda:</span> Hai.</p></div></div></li>').appendTo($('#contacts ul'));
	                });
                	 $('#loader-contacts').fadeOut();
                } else {
                	$('#loader-contacts').fadeOut();
                	console.log("gagal");
                }

            }
        });
	}

	function carikontak(val){

		$("#profile").removeClass("expanded");
		$("#contacts").removeClass("expanded");

		console.log(val);

		if($.trim(val) == '') {
	   		// $('#loader-contacts').fadeOut();
	   		$('#btn-close-search-contacts').fadeOut();
	   		refreshkontak();
			return false;
		}

		$.ajax({
            type:'POST',
            data: 'key='+val,
            url: 'config/proses.php?action=carikontak',
            success: function(result){
            	// console.log(result);
                var response = JSON.parse(result);
               	$('#contacts ul li').remove();
                if(response.status == 'sukses'){
                	if(response.jumlah == 0){
                		$('<li class="contact"><div class="wrap"><div class="meta"><p class="name">Maaf, data yang Anda cari tidak ada</p></div></div></li>').appendTo($('#contacts ul'));
                	}else {
	                	 $.each(response.data,function(prop,obj){
		                	// console.log("prop: "+prop+" obj: "+obj+"\n");
		                	$('<li class="contact" id="' + Base64.encode(obj.username_user) + '" onclick="bukachat(' + obj.id_user + ',' + "'" + Base64.encode(obj.username_user) + "'" +');"><div class="wrap"><span class="contact-status '+ obj.status_user.toLowerCase() +'"></span><img src="assets/images/user.jpg" alt="" /><div class="meta"><p class="name">' + obj.nama_user + '</p><p class="preview"><span>Anda:</span> Hai.</p></div></div></li>').appendTo($('#contacts ul'));
		                });
	                }
                	 // $('#loader-contacts').fadeOut();
                	 console.log(response.jumlah);
                } else {
                	$('#loader-contacts').fadeOut();
                	console.log("gagal");
                }

            },
            beforeSend: function(){
            	$('#loader-contacts').fadeIn();
	   			$('#btn-close-search-contacts').fadeIn();
            },
            complete: function() {
		        $('#loader-contacts').fadeOut();
		    },
        });
	}

	function clearSearch(){
		carikontak();
		$('#search input').val('');
	}
	var halo = 0;
	function bukachat(id_chat,id_content){
		$('#load-messages').fadeIn();
		// $('#'+id_content).attr('class','contact active');
		$.ajax({
            type:'GET',
            url: 'config/proses.php?action=bukachat',
            success: function(result){
            	// console.log(result);
                var response = JSON.parse(result);

               	$('.messages ul li').remove();
               	if(response.status == 'sukses'){
               		$.each(response.data,function(prop,obj){
               			var a = '';
               			if(obj.dari_pesan == '<?php echo $_SESSION['id']; ?>'){
               				a = 'replies';
               			} else {
               				a = 'sent';
               			}
               			$('<li class="' + a + '"><!-- <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /> --><p>' + Base64.decode(obj.isi_pesan) + '</p></li>').appendTo($('.messages ul'));
               		});
					$('.message-input input').val(null);
					$('.contact.active .preview').html('<span>You: </span>');

					$(".messages").animate({ scrollTop: $('.messages').prop('scrollHeight') }, "normal");
					$('#load-messages').fadeOut();
					window.clearInterval(halo);
               		refChat(response.jumlah);
                } else {
                	console.log("gagal");
					$('#load-messages').fadeOut();
                }

            }
        });
	}
	function cekchat(jml_awal){
		$.ajax({
            type:'POST',
            data: 'jml_awal='+jml_awal,
            url: 'config/proses.php?action=cekchat',
            success: function(result){
            	// console.log(result);
                var response = JSON.parse(result);
                // console.log(response.data);
               	if(response.status == 'sukses'){
               		$.each(response.data,function(prop,obj){
               			// var a = '';
               			if(obj.dari_pesan == '<?php echo $_SESSION['id']; ?>'){
               				return false;
               			} else {
               				$('<li class="sent"><!-- <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /> --><p>' + Base64.decode(obj.isi_pesan) + '</p></li>').appendTo($('.messages ul'));
               			}
               			
               		});
					$('.contact.active .preview').html('<span>You: </span>');

					$(".messages").animate({ scrollTop: $('.messages').prop('scrollHeight') }, "normal");
					// clearInterval(refchat(response.jml_akhir));
					window.clearInterval(halo);
					refChat(response.jml_akhir);
					console.log("sukses");
                } else {
                	console.log("gagal");
                }

            }
        });
	}
	function refChat(jumlah,action){
		// if(action == 'eksekusi'){
			halo = window.setInterval(function(){
				cekchat(jumlah);
			},2000);	
		// }
		// if(action == 'hentikan'){
			// window.clearInterval(halo);
		// }
	}
	
	var page = 1;

	function scrollmsgbox(){

		if($('.messages').scrollTop() + $(window).height() == $(document).height()){
			$('.load-more-msg').fadeIn();

			page++;

			var data = {
                page_num: page
            };

            var actual_count = "<?php echo $actual_row_count_msg; ?>";

            if((page-1)* 4 > actual_count){
                console.log("penuh");
            }else{
                $.ajax({
                    type: "POST",
                    url: "config/proses.php?action=loadmoremsg",
                    data:data,
                    success: function(result) {

                    	var response = JSON.parse(result);
                        
                        $.each(response.data,function(prop,obj){
	               			var a = '';
	               			if(obj.dari_pesan == '<?php echo $_SESSION['id']; ?>'){
	               				a = 'replies';
	               			} else {
	               				a = 'sent';
	               			}

	               			$('<li class="' + a + '"><!-- <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /> --><p>' + Base64.decode(obj.isi_pesan) + '</p></li>').prependTo($('.messages ul'));
	               		});
	               		$(".messages").animate({ scrollTop: 200 }, "normal");
	               		$('.load-more-msg').fadeOut();
                    }
                });
            }

		} else {
			$('.load-more-msg').fadeOut();
		}
		// console.log($('.messages').scrollTop() + $(window).height() == $(document).height());
		// console.log($('.messages').scrollTop() + $(window).height() > $(document).height() - 200);
	}

	window.onscroll = console.log('H');

//# sourceURL=pen.js
</script>