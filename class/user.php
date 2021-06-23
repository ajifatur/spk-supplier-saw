<?php

class user
{
	public function add($queryCek,$queryAdd,$konek){
        if ($konek->query($queryCek)->num_rows > 0){
            $result="ada data";
        }else{
            if ($konek->query($queryAdd)==TRUE){
                $result="success";
            }else{
                $result='failed'.$konek->error;
            }
        }
        echo json_encode($result);
        $konek->close();
	}
    public function update($queryCek,$queryUpdate,$konek,$url,$session){
        if ($konek->query($queryCek)->num_rows > 0){
            $result="ada data";
        }else{
            if ($konek->query($queryUpdate)==TRUE){
                $result=$url;
            	session_start();
                if($_SESSION['id'] == $session['id']){
	                $_SESSION['nama'] = $session['nama'];
	                $_SESSION['username'] = $session['username'];
	            }
            }else{
                $result='failed'.$konek->error;
            }
        }
        echo json_encode($result);
        $konek->close();
    }
}

?>