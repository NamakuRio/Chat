<?php 

function generate($panjang)
{
	$karakter = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890';
	$string = '';
	for($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}

function get_file_extension( $file )  {
	if( empty( $file ) )
		return;

	// if goes here then good so all clear and good to go
	$ext = end(explode( ".", $file ));

	// return file extension
	return $ext;
}

?>