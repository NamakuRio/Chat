<?php 
    $getAuth = $_GET['auth'];
    error_reporting(0);
    //koneksi database
    require_once("config/koneksi.php");
    //mulai session
    session_start();

    if(isset($_SESSION['username'])){
            //jika sudah login
            header("location:../");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <title>Chat - <?php echo strtoupper($getAuth); ?></title>

        <?php include("component/auth/component_style.php"); ?>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading">
                    <h4 class="text-center"><?php echo strtoupper($getAuth); ?></h4>
                </div>


                <div class="p-20">
                    
                    <?php 
                        if($getAuth == "daftar"){
                            include("content/auth/daftar.php");
                        } else if ($getAuth == "login" || $getAuth == null) {
                            include("content/auth/login.php");
                        } else {
                            header("location:./login");
                        }
                    ?>

                </div>
            </div>
        </div>
        
    	<?php include("component/auth/component_script.php"); ?>

	</body>
</html>