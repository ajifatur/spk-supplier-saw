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
    public function updatePassword($id,$current_password,$new_password,$confirm_password,$konek){
        $query = "SELECT * FROM user WHERE id=".$id;
        $execute = $konek->query($query);
        $user = $execute->fetch_array(MYSQLI_ASSOC);
        
        // Cek password saat ini
        if(password_verify($current_password,$user['password'])){
            // Konfirmasi password
            if($new_password == $confirm_password){
                // Update password
                $hash = password_hash($new_password, PASSWORD_DEFAULT);
                if($konek->query("UPDATE user SET password='$hash' WHERE id=".$id)==TRUE){
                    $result="password changed";
                }else{
                    $result='failed'.$konek->error;
                }
                $konek->query($queryUpdate);
            }
            else{
                $result="not confirmed";
            }
        }
        else{
            $result="not same";
        }
        
        echo json_encode($result);
        $konek->close();
    }
}

?>