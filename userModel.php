<?php
    class userModel {
        public $email;
        public $password;
        public $repeatPassword;
        
        public $conn;
    
    
        function set_data($email, $password, $repeatPassword ){
            $this->email = $email;
            $this->password = $password;
            $this->repeatPassword = $repeatPassword;
        
        }
    
        function set_connection($conn){
            $this->_conn = $conn;
        }
    
    
        function get_data($primary_key){
    
            $sql = "SELECT * FROM user where email = '".$primary_key."'";
            return $this->_conn->query($sql);
        }
    
    
        
        function search($email){
            $sql = "SELECT * FROM user where email like '%".$email."%'";
            return $this->_conn->query($sql);
        }
    
        function insert(){
            $sql = "INSERT INTO `user`(`email`,`password`,`repeatPassword`,`role` )
            VALUE('".$this->email."','".$this->password."','".$this->repeatPassword."', 'User')";
            return $this->_conn->query($sql);
        }
    
        // function update(){
        //     $sql = "UPDATE `user` SET `email`='".$this->email."',`password`='".$this->password."',`repeatPassword`='".$this->repeatPassword."' ";
        //     return $this->_conn->query($sql);
        // }
    
        // function delete($primary_key){
        //     $sql = "DELETE FROM `user` WHERE `email`='".$primary_key."'";
        //     return $this->_conn->query($sql);
        // }

        function password_verify($password,$repeatPassword){
            $sql = "SELECT * FROM user where password = '".$password."' and repeatPassword = '".$repeatPassword."'";
            return $this->_conn->query($sql);
        }

        function login($email,$password){
            $sql = "SELECT * FROM user where email = '".$email."' and password = '".$password."'" ;
            return $this->_conn->query($sql);
        }

        function verify_role($email){
            $sql = "SELECT * FROM user where email = '".$email."'";
            return $this->_conn->query($sql);
        }
    }

?>