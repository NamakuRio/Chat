<?php 
    
    //menghilangkan notifikasi error
    error_reporting(0);
    //koneksi
	require_once("koneksi.php");

	function login($username,$password,$db){

		$sql = "SELECT * FROM tbl_user WHERE username_user='$username'";
        $query = mysqli_query($db,$sql);
        if($query){
                //verifikasi password
                $row = mysqli_fetch_array($query);
                if(password_verify($password, $row['password_user'])){
                    session_start();
                    $_SESSION['id'] = $row['id_user'];
                    $_SESSION['nama'] = $row['nama_user'];
                    $_SESSION['email'] = $row['email_user'];
                    $_SESSION['username'] = $row['username_user'];
                    $_SESSION['password'] = $row['password_user'];
                    $_SESSION['status_user'] = $row['status_user'];
                    $result = array('status' => 'sukses');
                } else {
                    $result = array('status' => 'gagal');
                }
        } else {
			$result = array('status' => 'gagal');
        }

        return $result;
	}	

	function daftar($nama,$email,$username,$password,$db){

        $cek_data = mysqli_query($db, "SELECT * FROM tbl_user WHERE email_user='$email' OR username_user='$username'");

        if(mysqli_num_rows($cek_data) == '0'){
            $query =  mysqli_query($db,"INSERT INTO tbl_user (nama_user,email_user,username_user,password_user,status_user) VALUES ('$nama','$email','$username','$password','Online')");
            if($query){
                $result = array('status' => 'sukses');
            } else {
                $result = array('status' => 'gagal');
            }
        } else {
            $result = array('status' => 'gagal');
        }

        return $result;
    }

    function kirimpesan($id_pengirim,$id_penerima,$message,$db){
        
        $created = date("Y-m-d H:i:s");

        $insertMessage = mysqli_query($db,"INSERT INTO tbl_pesan (dari_pesan,untuk_pesan,isi_pesan,created_pesan) VALUES('$id_pengirim','$id_penerima','$message','$created')");

        if($insertMessage){
            $result = array('status' => 'sukses');
        } else {
            $result = array('status' => 'gagal');
        }

        return $result;
    }

    function kirimstatus($id_user,$status,$db){
        
        $updateStatus = mysqli_query($db,"UPDATE tbl_user SET status_user='$status' WHERE id_user='$id_user'");

        if($updateStatus){
            unset($_SESSION['status_user']);
            $result = array('status' => 'sukses');
        } else {
            $result = array('status' => 'gagal');
        }

        return $result;
    }

    function ambilkontak($db){

        $query = mysqli_query($db,"SELECT * FROM tbl_user ORDER BY id_user DESC");
        $response = array();
        while ($f = mysqli_fetch_assoc($query)) {
            $response[] = $f;
        }
        $result = array('status' => 'sukses', 'data' => $response);

        return $result;

    }

    function carikontak($key,$db){

        $query = mysqli_query($db,"SELECT * FROM tbl_user WHERE nama_user LIKE '%$key%' ORDER BY nama_user DESC");
        $nums = mysqli_num_rows($query);
        $response = array();
        while ($f = mysqli_fetch_assoc($query)) {
            $response[] = $f;
        }
        $result = array('status' => 'sukses', 'data' => $response, 'jumlah' => $nums);

        return $result;

    }

    function bukachat($db){

        $query = mysqli_query($db,"SELECT * FROM tbl_pesan ORDER BY created_pesan DESC");
        $nums = mysqli_num_rows($query);

        $ambil_akhir = $nums - 20;

        $querys = mysqli_query($db,"SELECT * FROM tbl_pesan ORDER BY created_pesan ASC LIMIT $ambil_akhir,$nums");
        
        $response = array();
        while ($f = mysqli_fetch_assoc($querys)) {
            $response[] = $f;
        }
        $result = array('status' => 'sukses', 'data' => $response, 'jumlah' => $nums);

        return $result;

    }

    function cekchat($jml_awal,$db){

        $query = mysqli_query($db,"SELECT * FROM tbl_pesan");
        $nums = mysqli_num_rows($query);
        $response = array();
        
        if($nums > $jml_awal){

           $getChat = $nums - $jml_awal;

           $query_new = mysqli_query($db,"SELECT * FROM tbl_pesan ORDER BY created_pesan DESC LIMIT $getChat");

           while ($f = mysqli_fetch_assoc($query_new)) {
                $response[] = $f;
            }

            $result = array('status' => 'sukses', 'data' => $response, 'jml_akhir' => $nums);

        } else {
            $result = array('status' => 'gagal', 'data' => $response);            
        }

        return $result;

    }

    function loadmoremsg($requested_page,$db){

        $set_limit = (($requested_page - 1) * 2) . ",20";

        $query = mysqli_query($db,"SELECT  * FROM tbl_pesan ORDER BY created_pesan ASC LIMIT $set_limit");

        $response = array();

        while ($f = mysqli_fetch_assoc($query)) {
            $response[] = $f;
        }
        $result = array('status' => 'sukses', 'data' => $response, 'jumlah' => $nums);
        
        return $result;

    }

?>