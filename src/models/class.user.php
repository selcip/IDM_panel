<?php
class User{
    public function login(){
        include("connection.php");
        session_start();
        $login = $db->prepare("SELECT * from accounts WHERE name = :user");
        $login->bindParam(":user",$_POST['login']);
        $login->execute();
        if($login->rowCount() == 0){
            echo "Conta não cadastrada";
            return false;
        }else{
            $info = $login->fetch(PDO::FETCH_ASSOC);
            if($info['gm'] < 3){
                echo "Você não é um GM";
            }else{
                if($info['password'] == sha1($_POST['senha'])){
                $_SESSION = $info;
                $_SESSION['check'] = true;
                echo 1;
                }else {
                    echo "Senha Incorreta";
                    return false;
                }
            }
            
        }
    }
    
    public function cash(){
        echo $_SESSION['paypalNX'];
    }
    public function proteger(){
        if($_SESSION['gm'] < 3){
            die("Sai daqui seu merdinha. (Ou faça login xd)");
        }
    }
}

?>