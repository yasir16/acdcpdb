<?php 
    $link = mysqli_connect('localhost', 'root', '') or die("Koneksi gagal"); 
    mysqli_select_db($link, 'users') or die("Database tidak bisa dibuka");
    $cek = mysqli_query($link,"SELECT count(id) as jml FROM menu WHERE parent_id ='".$_POST['site']."'");
	$query = mysqli_fetch_array($cek);
	$jml = $query[jml];	
	if($jml > 0){

			$result = mysqli_query($link,"SELECT * FROM menu WHERE parent_id ='".$_POST['site']."'");

	        while ($row = mysqli_fetch_object($result)) {
	                                        
	            echo "<option value=$row->id>$row->title</option>";
	                                        
	       }
    }else{
    	echo "<option value=>Kosong</option>";
    }
 ?>