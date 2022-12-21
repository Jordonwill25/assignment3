<?php 
    class crud{
        private $db;
       
        function __construct($conn){

            $this->db= $conn;
        }
    

        public function insertUser($fName,$lName,$eAddress,$pNumber,$dob,$matches, $seats,$destination){
            try {

                
                $r=$this->checkemail($eAddress);
                    if($r['num'] > 0){
                        echo "Email Address is already taken, Try Again";
                       return false;
                      
                   }
                    else{
                        $sql=" INSERT INTO registrant (firstName,lastName,emailAddress,phoneNumber,dateOfBirth,matches_Id,seats_Id,avatarPath) 
                        VALUES (:fName,:lName,:eAddress,:pNumber,:dob,:matches, :seats, :destination)";

                        $stmt=  $this->db->prepare($sql);

                        $stmt->bindparam(':fName',$fName);
                        $stmt->bindparam(':lName',$lName);
                        $stmt->bindparam(':eAddress',$eAddress);
                        $stmt->bindparam(':pNumber',$pNumber);
                        $stmt->bindparam(':dob',$dob);
                        $stmt->bindparam(':matches',$matches);
                        $stmt->bindparam(':seats',$seats);
                        $stmt->bindparam(':destination',$destination);
                        $stmt ->execute(); 
                        return true; 
                    }

                

            } catch (PDOException $e) {

            echo $e ->getMessage();
            return false;
                //throw $th;
            }

        }


        public function getRegistrants(){

           
            try{
                $sql = "SELECT * FROM `registrant` a inner join matches b on a.matches_Id = b.matches_Id 
                inner join seats c on a.seats_Id = c.seats_Id ;";
                $results= $this->db->query($sql);
                return $results;

            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
            }

        }


        public function getRegistrantsDetails($id){

            
            try{
                $sql= "select * from registrant a inner join matches b on a.matches_Id = b.matches_Id 
                inner join seats c on a.seats_Id = c.seats_Id 
                 where registrant_Id = :id";
                $stmt=  $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;


            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
            }   
        }



        
        public function editRegistrant($id,$fName, $lName, $email, $pNumber,$dob,$matches,$seats){

            try{
            
                 

                        $sql= " UPDATE `registrant` SET `firstName`=:fNameForm,`lastName`= :lNameForm
                            ,`emailAddress`= :eAddressForm,`phoneNumber`= :pNumberForm,`dateOfBirth`= :dobForm, 
                            `matches_Id`=:matchForm,`seats_Id`=:seatForm WHERE registrant_Id = :id";
                
                            
                                $stmt=  $this->db->prepare($sql);
                
                                $stmt->bindparam(':id',$id);
                                $stmt->bindparam(':fNameForm',$fName);
                                $stmt->bindparam(':lNameForm',$lName);
                                $stmt->bindparam(':eAddressForm',$email);
                                $stmt->bindparam(':pNumberForm',$pNumber);
                                $stmt->bindparam(':dobForm',$dob);
                                $stmt->bindparam(':matchForm',$matches);
                                $stmt->bindparam(':seatForm',$seats);
                            
                
                                $stmt ->execute(); 
                                return true;
                     
                    }catch(PDOException $e){
                        echo $e ->getMessage();
                        return false;
                        //throw $th;
                    }
                    
            }


            public function deleteRegistrant($id){
            

                try{
                    $sql= "delete from registrant where registrant_Id= :id";
                    $stmt=  $this->db->prepare($sql);
                    $stmt->bindparam(':id',$id);
                    $stmt->execute();
                    return true;
    
                }catch(PDOException $e){
                    echo $e ->getMessage();
                    return false;
                    //throw $th;
                }
    
            }



       

       


        //geting the details for drop down

        public function getMatches(){

            

            try{
                $sql = "SELECT * FROM `matches`;";
                $results= $this->db->query($sql);
                return $results;

            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
             }


        }

        public function getMatchesinfo($id){

            

            try{
                $sql = "SELECT * FROM `matches` where matches_Id= :id;";
                $stmt=  $this->db->prepare($sql);
                    $stmt->bindparam(':id',$id);
                    $stmt->execute();
                    return true;

            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
             }

        }

        public function getSeats(){

            

            try{
                $sql = "SELECT * FROM `seats`;";
                $results= $this->db->query($sql);
                return $results;

            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
             }

        }

        public function getSeatsinfo($id){

            

            try{
                $sql = "SELECT * FROM `seats` where seats_Id=:id;";
                $stmt=  $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e ->getMessage();
                return false;
                //throw $th;
             }

        }


       
        //matches section above//





         public function checkemail($eAddress){
            try{
                $sql= "select Count(*) as num from registrant where emailAddress= :eAddress";
                $stmt=  $this->db->prepare($sql);
                $stmt->bindparam(':eAddress',$eAddress);
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