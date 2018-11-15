<?php
     //This script will accept following three commands as GET parameter and will act on as follows:
     //INSERT_NOTIFICATION - Insert the notification in the [notifications] table
     //FETCH_NOTIFICATIONS - Get all notifications for a user from [notifications] table
     //DELETE_NOTIFICATIONS - Deletes all notifications for a user from [notifications] table
     //SET_IS_VIEWED_FLAG - Call this command from front-end when user has viewed the notification
    
     $command = "";
     if (isset($_GET['command'])) { $command = $_GET['command']; }
    
     $user_id = "";
     if (isset($_GET['user_id'])) { $user_id = $_GET['user_id']; }
    
     if (strcmp($user_id,"") == 0) 
        { echo "<br>Error: user_id must be specified as GET parameter."; exit; }
    
     if (strcmp($command,"") == 0) 
       {
        echo "<br>Sorry, no command specified. Exiting...";
        exit;
       }
    
     //Open the MySQL database connection here and select the database in which [notifications] table has been created
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "notifications_db";
    
     //Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     //Check connection
    if ($conn->connect_error) 
        {
           die("Connection failed: " . $conn->connect_error);
        }
    
    if (strcmp($command,"INSERT_NOTIFICATION") == 0) 
    {
        $notification_text = "";
        if (isset($_GET['notification_text'])) { $notification_text = $_GET['notification_text']; }
    
        $is_viewed = "";
        if (isset($_GET['is_viewed'])) { $is_viewed = $_GET['is_viewed']; }
        if (strcmp($notification_text,"") == 0) 
          {
            echo "<br>Error: notification_text must be specified as GET parameter.";
            exit;
         }
        if (strcmp($is_viewed,"") == 0) 
         {
           echo "<br>Error: is_viewed must be specified as GET parameter.";
           exit;
         }

       //Insert notification into the table for given user
       $sql = "select * from notifications";
       $result = $conn->query($sql);
       $id = mysql_num_rows($result);
       $id = $id + 1;
       $creation_date_time = date("Y:m:d H:i:s");
       $view_date_time = date("Y:m:d H:i:s");
       $is_viewed = “NO”;
       $sql = "INSERT INTO `notifications`(`id`, `creation_date_time`, `view_date_time`, 
       `user_id`, `notification_text`, `is_viewed`) VALUES ('".$id."',"'.$creation_date_time."','".$view_date_time."','".$user_id."','".$notification_text."','".$is_viewed."')";
       $result = $conn->query($sql);
       $conn->close();
       exit;
    }


if (strcmp($command,"FETCH_NOTIFICATIONS") == 0) 
    {
       //Select all notifications for a given user_id and return in JSON format
       $sql = "select * from notifications where use_id = '".$user_id."' and is_viewed = ‘NO’ ";
       $res = mysqli_query($con,$sql);
       $result = array();
       while($row = mysqli_fetch_array($res)) 
        {
           array_push($result,array('id'=>$row[0],'creation_date_time'=>$row[1],
           'view_date_time'=>$row[2],'user_id'=>$row[3],'notification_text'=>$row[4],'is_viewed'=>$row[5]));
        }
        $conn->close();
        echo json_encode(array("result"=>$result_array));
        //Here you can format all notifications into well-organized HTML code just like Facebook in order to present in nice way
        //For example purpose , it is being returned in JSON format
        exit;
    }
    
    
if (strcmp($command,"DELETE_NOTIFICATIONS") == 0)
       {
          //Delete all notifications for a given user_id
          $sql = "delete from notifications where use_id = '".$user_id."'";
          $res = mysqli_query($con,$sql);
          $conn->close();
          exit;
       }
       
if (strcmp($command,"SET_IS_VIEWED_FLAG") == 0) 
  {
     //Update here is_viewed flag to YES for notification and user_id
     exit;
  }
?>     
