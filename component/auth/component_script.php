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
	
        <script type="text/javascript">
            
            function login(){

                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    type:'POST',
                    data: 'username='+username+'&password='+password,
                    url: '../config/proses.php?action=login',
                    success: function(result){
                        response = JSON.parse(result);

                        if(response.status == "sukses"){
                            swal("Sukses!", "Anda Berhasil Login", "success");
                            setInterval(function(){
                                window.location="../";
                            })
                        }

                    }
                })
            }

            function daftar(){

                var nama = $('#nama').val();
                var email = $('#email').val();
                var username = $('#username').val();
                var password = $('#password').val();

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
                            })
                        }

                    }
                })
            }

        </script>