<?php 

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
            $query =  mysqli_query($db,"INSERT INTO tbl_user (nama_user,email_user,username_user,password_user) VALUES ('$nama','$email','$username','$password')");
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

?>