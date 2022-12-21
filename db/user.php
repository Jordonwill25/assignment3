<?php 

    class user{

        private $db;
        
        function __construct($conn){

            $this->db= $conn;
        }


        public function insertUser($userName, $pword){
            try {

                $result= $this->getUserByUsername($userName);

                    if($result['num'] > 0){
                        return false;
                    }else{
                        $new_pword= md5($pword.$userName);
                        $sql=" INSERT INTO user (userName,Password) 
                        VALUES (:userName, :pword)";

                        $stmt=  $this->db->prepare($sql);

                        $stmt->bindparam(':userName',$userName);
                        $stmt->bindparam(':pword',$new_pword);
                        $stmt ->execute(); 
                        return true; 
                    }

                

            } catch (PDOException $e) {

            echo $e ->getMessage();
            return false;
                //throw $th;
            }

        }


        public function getUser($userName, $pword){
            try{
                $sql= "select * from user where userName= :userName AND password= :pword ";
                $stmt=  $this->db->prepare($sql);
                $stmt->bindparam(':userName',$userName);
                $stmt->bindparam(':pword',$pword);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;


            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
            }   

        }



        public function getUserByUsername($userName){
            try{
                $sql= "select Count(*) as num from user where userName= :userName";
                $stmt=  $this->db->prepare($sql);
                $stmt->bindparam(':userName',$userName);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;


            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
            }   


         }

    }



?>