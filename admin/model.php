<?php

    class Model{

        private $server="localhost";
        private $username="root";
        private $password="";
        private $db="osrs_db";
        private $conn;

        public function __construct(){
            $this->conn= new mysqli($this-> server,$this-> username,$this-> password,$this-> db);
        }

        public function insert(){
            if(isset($_POST['insert_parent'])){
                
                $chk=0;
                $parent=$_POST['parent_code'];
                $student=$_POST['student_code'];
                $check= $this->conn->query(" SELECT * FROM parents where parent_code ='$parent' and student_code ='$student' ");
                if($check->num_rows > 0){
                    echo"<script>alert('Parent code is exist')</script>";
                    echo"<script>window.location.href='addparent.php'</script>";
  
                }
                

                            $parent_code=$_POST['parent_code'];
                            $fname=$_POST['fname'];
                            $lname=$_POST['lname'];
                            $gender=$_POST['gender'];
                            $address=$_POST['address'];
                            $student_code=$_POST['student_code'];
                            

                            $insert="INSERT INTO parents ( `parent_code`, `firstname`, `lastname`, `gender`, `address`, `student_code`)
                                            VALUES ('$parent_code','$fname','$lname','$gender','$address','$student_code') ";

                                            if($sql=$this->conn->query($insert)){
                                                echo"<script>alert('Parent Record Successfully Inserted')</script>";
                                                echo"<script>window.location.href='parent_list.html'</script>";

                                            }
                                            else{
                                                echo"<script>alert('Failed to Save Record')</script>";
                                                echo"<script>window.location.href='index.html'</script>";

                                            }
                                        
                 }
       }


       public function fetch_parent(){
           $data=null;
           $result= "SELECT * FROM parents";
           $sql=$this->conn->query($result);
           while($row= mysqli_fetch_array($sql)){
               $data[]=$row;
           }

           return $data;
       }

       public function delete_parent($id){
          $sql=" DELETE FROM parents where id='$id'";
          $delete=$this->conn->query($sql);
          if($delete){
              echo"<script>alert('Record deleted')</script>";
              echo"<script>window.location.href='parent_list.php'</script>";
                
            }
            else{
                echo"<script>alert('Failed to be Deleted')</script>";
                echo"<script>window.location.href='parent_list.php'</script>";
            }
       }

       public function fetchForUpdate($id){
           $data=null;
        $check= $this->conn->query(" SELECT * FROM parents where id='$id' ");
        if($check){
            while($row=mysqli_fetch_assoc($check)){
                $data=$row;
            }
        }
        return $data;

       }

       public function update_parent($data){
           $update="UPDATE parents SET firstname='$data[firstname]',lastname='$data[lastname]',gender='$data[gender]',address='$data[address]',student_code='$data[student_code]' where id='$data[id]'";
         if($updated=$this->conn->query($update))
         {
             return true;
         }
         else{
             return false;
         }
       }

       public function insert_updatenews(){
           if(isset($_POST['save_to_publish'])){
               
            $title=$_POST['title'];
            $description=$_POST['description'];
    
            $insert="INSERT INTO notifications ( `title`, `description`)
                            VALUES ('$title','$description') ";

                            if($sql=$this->conn->query($insert)){
                                echo"<script>alert('Message Record Successfully Inserted')</script>";
                                echo"<script>window.location.href='updatenews.php'</script>";

                            }
                            else{
                                echo"<script>alert('Failed to Save Record')</script>";
                                echo"<script>window.location.href='updatenews.php'</script>";

                            }
                        }
                        
 }
           public function fetch_updatenews(){
            $data=null;
            $result= "SELECT * FROM notifications";
            $sql=$this->conn->query($result);
            while($row= mysqli_fetch_array($sql)){
                $data[]=$row;
            }
 
            return $data;

           }

           public function delete_news($id){
            $sql=" DELETE FROM notifications where id='$id'";
            $delete=$this->conn->query($sql);
            if($delete){
                echo"<script>alert('Record deleted')</script>";
                echo"<script>window.location.href='updatenews.php'</script>";
                  
              }
              else{
                  echo"<script>alert('Failed to be Deleted')</script>";
                  echo"<script>window.location.href='updatenews.php'</script>";
              }



           }



           public function update_published($id){
               
               
            $sql="UPDATE notifications SET status=1 where id='$id'";
            $update=$this->conn->query($sql);
            if($update){
                echo"<script>alert('Record Published')</script>";
                echo"<script>window.location.href='updatenews.php'</script>";
                  
              }
              else{
                  echo"<script>alert('Failed to be to Publish')</script>";
                  echo"<script>window.location.href='updatenews.php'</script>";
              }

           }

         public function   remove_published($id){
                  
            $sql="UPDATE notifications SET status=0 where id='$id'";
            $update=$this->conn->query($sql);
            if($update){
                echo"<script>alert('Record Removed to the Published')</script>";
                echo"<script>window.location.href='updatenews.php'</script>";
                  
              }
              else{
                  echo"<script>alert('Failed to be to Remove to the Published')</script>";
                  echo"<script>window.location.href='updatenews.php'</script>";
              }


         }


         public function fetch_message(){
            $data=null;
            $result= "SELECT * FROM notifications Where status=1";
            $sql=$this->conn->query($result);
            while($row= mysqli_fetch_array($sql)){
                $data[]=$row;
            }
 
            return $data;
             
         }
         public function insert_request(){
                    if(isset($_POST['send_request'])){
                        
                    
                            $title=$_POST['title'];
                            $message=$_POST['message'];
                    
                            $insert="INSERT INTO request ( `title`, `message`)
                                            VALUES ('$title','$message') ";
                
                                            if($sql=$this->conn->query($insert)){
                                                echo"<script>alert('request send successfully')</script>";
                                                // echo"<script>window.location.href='request.php'</script>";
                
                                            }
                                            else{
                                                echo"<script>alert('Failed to Save Record')</script>";
                                                echo"<script>window.location.href='request.php'</script>";
                
                                            }
                                        
                                        
                    }

                }

               public function  search_message(){
                $data=null;
                $result= "SELECT * FROM request order by status ASC";
                $sql=$this->conn->query($result);
                while($row= mysqli_fetch_array($sql)){
                    $data[]=$row;
                }
     
                return $data;
                 

               }


               public function approved_message($id){ 
                     $sql="UPDATE request SET status=1 where id='$id'";
                $update=$this->conn->query($sql);
                if($update){
                    echo"<script>alert('Message Approved')</script>";
                    echo"<script>window.location.href='message.php'</script>";
                      
                  }
                  else{
                      echo"<script>alert('Failed to be to Approve')</script>";
                      echo"<script>window.location.href='message.php'</script>";
                  }
    
                   

               }

              public function  reject_message($id){
                $sql="UPDATE request SET status=2 where id='$id'";
                $update=$this->conn->query($sql);
                if($update){
                    echo"<script>alert('Message Rejected')</script>";
                    echo"<script>window.location.href='message.php'</script>";
                      
                  }
                  else{
                      echo"<script>alert('Failed to be to Reject')</script>";
                      echo"<script>window.location.href='message.php'</script>";
                  }
    

              }

              public function delete_parent_message($id){

                $sql=" DELETE FROM request where id='$id'";
                $delete=$this->conn->query($sql);
                if($delete){
                    echo"<script>alert(' Parent message  deleted')</script>";
                    echo"<script>window.location.href='message.php'</script>";
                      
                  }
                  else{
                      echo"<script>alert('Failed to be Deleted')</script>";
                      echo"<script>window.location.href='message.php'</script>";
                  }

              }

              public function login_user_admin(){
                  if(isset($_POST['login_parent'])){
                    $uname=$_POST['studentcode'];
                    $password=$_POST['parentcode'];
                    

                $result= "SELECT * FROM parents where parent_code='$password' and student_code='$uname'";
                $sql=$this->conn->query($result);
                if($row= mysqli_fetch_array($sql)){
                  SESSION_START();
                  $_SESSION['parent']=$row['parent_code'];
                  echo"<script>window.location.href='parent/index.php'</script>";
                   
                }
                elseif(isset($_POST['login_parent'])){
                    $uname=$_POST['studentcode'];
                    $password=$_POST['parentcode'];

                    
                $result= "SELECT * FROM users where username='$uname' and password='$password' and type=2";
                $sql=$this->conn->query($result);
                if($row= mysqli_fetch_array($sql)){
                  SESSION_START();
                  $_SESSION['admin']=$row['username'];
                  
                  echo"<script>window.location.href='index.php'</script>";
                    
                }
            }
                else{
                    echo"no";
                    
                }
     
              }
 
           }

        


        public function insert_user(){
            if(isset($_POST['insert_user'])){
                
                $chk=0;
                $username=$_POST['username'];
                $password=$_POST['password'];
                $check= $this->conn->query(" SELECT * FROM users where username ='$username' and password ='$password' and type=2 ");
                if($check->num_rows > 0){
                    echo"<script>alert('username credential is exist')</script>";
                    echo"<script>window.location.href='adduser.php'</script>";
  
                }
                

                            
                            $fname=$_POST['fname'];
                            $lname=$_POST['lname'];
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            $usertype=$_POST['admin'];
                         
                            

                            $insert="INSERT INTO users ( `firstname`, `lastname`, `username`, `password`, `type`)
                                            VALUES ('$fname','$lname','$username',MD5('".$password."'),'$usertype') ";

                                            if($sql=$this->conn->query($insert)){
                                                echo"<script>alert('user Record Successfully Inserted')</script>";
                                                echo"<script>window.location.href='adduser.php'</script>";

                                            }
                                            else{
                                                echo"<script>alert('Failed to Save Record')</script>";
                                                echo"<script>window.location.href='adduser.php'</script>";

                                            }
                                        
                 }
       }

    }    
        ?>
       

     


    
