<?php 
class User extends Database{
    private $name;
    private $username;


    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->conn->prepare('SELECT * FROM users WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->conn->prepare('SELECT * FROM users WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->name = $currentUser['name'];
            $this->usename = $currentUser['username'];
        }
    }

    public function getName(){
        return $this->name;
    }
}

?>