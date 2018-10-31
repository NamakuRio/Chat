<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="../plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <!-- <script src="../assets/pages/jquery.sweet-alert.init.js"></script> -->

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
	    
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125737582-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-125737582-1');
        </script>

        <script type="text/javascript">
            
            function login(){

                var username = $('#username').val();
                var password = $('#password').val();
                $('.loader-auth').fadeIn();

                if($.trim(username) == '' || $.trim(password) == '' ) {
                    swal("Form masih kosong!", "Anda harus mengisi semua form", "warning");
                    $('.loader-auth').fadeOut();
                    return false;
                }


                $.ajax({
                    type:'POST',
                    data: 'username='+username+'&password='+password,
                    url: '../config/proses.php?action=login',
                    success: function(result){

                        response = JSON.parse(result);

                        if(response.status == "sukses"){
                            swal("Sukses!", "Anda Berhasil Login", "success");
                            setInterval(function(){
                                window.location="../chat";
                            },3000)
                        } 
                        else if(response.status == "gagal"){
                            switch(response.kode_v){
                                case "1":
                                    swal("Gagal Login!", "Password yang Anda masukkan salah..", "error");
                                break;
                                case "2":
                                    swal("Gagal Login!", "Akun Anda tidak terdaftar..", "error");
                                break;
                                default:
                                break;
                            }
                        }
                        $('.loader-auth').fadeOut();
                    }
                })
            }

            function daftar(){

                var nama = $('#nama').val();
                var email = $('#email').val();
                var username = $('#username').val();
                var password = $('#password').val();
                $('.loader-auth').fadeIn();

                if($.trim(nama) == '' || $.trim(email) == '' || $.trim(username) == '' || $.trim(password) == '' ) {
                    swal("Form masih kosong!", "Anda harus mengisi semua form", "warning");
                    $('.loader-auth').fadeOut();
                    return false;
                }

                $.ajax({
                    type:'POST',
                    data: 'nama='+nama+'&email='+email+'&username='+username+'&password='+password,
                    url: '../config/proses.php?action=daftar',
                    success: function(result){
                        response = JSON.parse(result);

                        if(response.status == "sukses"){
                            swal("Sukses!", "Anda Berhasil Mendaftar\nSilahkan Login", "success");
                            setInterval(function(){
                                window.location="./login";
                            },3000)
                        }
                        else if(response.status == "gagal"){
                            switch(response.kode_v){
                                case "1":
                                    swal("Gagal Login!", "Silahkan ulangi lagi..", "error");
                                break;
                                case "2":
                                    swal("Gagal Login!", "Username atau Email Anda sudah Terdaftar\nMohon gunakan yang lainnya..", "error");
                                break;
                                default:
                                break;
                            }
                        }
                        $('.loader-auth').fadeOut();
                    }
                })
            }

        </script>