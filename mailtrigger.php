<?php

include("connect.php");
   $conDB=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$SiteTitle = "ABCD Enterprise pvt lmt";
$SiteEmail = "info@dw-learnwell.com";
$SiteURL   = "http://www.purnadata.in"; 

///////////////////////

$today = date('Y-m-d');

//Delay BEFORE payment is due
$delay_days = 14;
//Delay AFTER payment is late
$late_days = 4;

$noticedate = date('Y-m-d', strtotime( "$today + $delay_days days" ));
$latedate = date('Y-m-d', strtotime( "$today - $late_days days" ));

/* 
Assuming all fields in the same table    
Note: Payment1Paid etc was added.
Querying for payment due today,
payment due in $delay_days and
payment is late by $late_days
*/ 
try{
     $sql = "SELECT 
           invoice_no 
          ,invoice_date
          ,mode_term_of_payment
           ,balance
           FROM sale_invoice
     WHERE 
    //((invoice_date = :Today1 OR invoice_date = :NoticeDate1) OR (balance < 0 AND invoice_date = :LateDate1))";
    invoice_date :2018-10-24";
	 $sql=mysqli_query($conn,"$sql = "SELECT 
           invoice_no 
          ,invoice_date
          ,mode_term_of_payment
           ,balance
           FROM sale_invoice
           WHERE 
    invoice_date= "2018-10-24" ");
    $query = $conDB->prepare($sql); 
   // for($n=1;$n<=1;$n++):
        $query->bindParam(":Today".$n, $today);
        $query->bindParam(":NoticeDate".$n, $noticedate);
        $query->bindParam(":LateDate".$n, $latedate);
   // endfor; 
    $query->execute();
    
    //Build data array
    $data = array();
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $data[$row['id']]['id'] = $row['id'];
        $data[$row['invoice_no']]['invoice_no'] = $row['invoice_no'];
        $data[$row['id']]['email'] = "swatibawankule1988@gmail.com";
        $data[$row['id']]['invoice_date'] = array($row['invoice_date']    
        , $row['invoice_date']     
        , $row['invoice_date']     
        , $row['invoice_date']     
        , $row['invoice_date']     
        , $row['invoice_date']); 
        $data[$row['id']]['balance'] = array($row['balance']     
        , $row['balance']     
        , $row['balance']     
        , $row['balance']     
        , $row['balance']     
        , $row['balance']);  
        //echo "<pre>";
        //print_r($row);        
        //echo "</pre>";
    }  
    //echo "<pre>";
    //print_r($data);        
    //echo "</pre>";
    if(!empty($data)):
    
        foreach($data as $id => $arr):
            //Get array key of todays date
            $key = (in_array($today,$data[$id]['invoice_date']) ? array_search($today,$data[$id]['invoice_date']):0);
            
            //Payment due Today
            if(in_array($today,$data[$id]['invoice_date']) && $data[$id]['PaymentStatus'][$key] == 0){
                $mail_subject = $SiteTitle . " Payment due Today";
                $noticetype = "Payment due Today";
                $message = "This is a courtesy reminder that your payment is due today.<br />
                Please make your payment as soon as possible.";
                
            //Payment Reminder
            }elseif(in_array($noticedate,$data[$id]['invoice_date'])){
                $mail_subject = $SiteTitle . " Payment Reminder";  
                $noticetype = "Payment Reminder";                 
                $due_date = date('l, F d, Y', strtotime($noticedate));
                $message = "This is a courtesy reminder that your next payment is due " . $due_date;
            
            //Payment Confirmation Notice
            }elseif(in_array($today,$data[$id]['invoice_date']) && $data[$id]['PaymentStatus'][$key] == 1){    
                $mail_subject = $SiteTitle . " Payment Confirmation Notice"; 
                $noticetype = "Payment Confirmation Notice";
                $message = "Thank you for the prompt payment on your account.<br />
                We deeply appreciate your business and the timely manner in which you pay your bill each month.";
            
            //Late Payment Reminder
            }elseif(in_array($latedate,$data[$id]['invoice_date'])){
                $mail_subject = $SiteTitle . " Late Payment Reminder";             
                $noticetype = "Late Payment Reminder";                 
                $due_date = date('l, F d, Y', strtotime($noticedate));
                $message = "This is a courtesy reminder that your payment is Past Due.  It was due to be paid ". $late_days . " days ago.<br />
                Please make your payment as soon as possible.";
            }
            
            $messageBottom = "Thank you<br />" . $SiteTitle;
            
            //Payment Schedule table
            $messagetable = "<table border=0 cellspacing=1 cellpadding=3 bgcolor=#C0C0C0 style='margin-left:auto;margin-right:auto;'>
            <thead>
                <tr>
                    <td bgcolor=#EFEFEF align=center colspan=3><b>Payment Schedule</b></td>
                </tr>
                <tr>
                    <td bgcolor=#F6F6F6 align=center>Date Due</td>
                    <td bgcolor=#F6F6F6 align=center>Amount</td>
                    <td bgcolor=#F6F6F6 align=center>Status</td>
                </tr>
            </thead>\r";
            
            for($r=0;$r<=5;$r++):
                $Status = ($data[$id]['PaymentStatus'][$r] == 0 ? "Due" : "Paid");
                $payment_date = date('l, F d, Y', strtotime($data[$id]['invoice_date'][$r]));
                $PaymentAmount = number_format($data[$id]['balance'][$r], 2, '.', ',');
                $messagetable .= "<tr>
                        <td bgcolor=#FFFFFF align=right>" . $payment_date . "</td>
                        <td bgcolor=#FFFFFF align=right>" . $PaymentAmount . "</td>
                        <td bgcolor=#FFFFFF align=center>" . $Status . "</td>
                    </tr>\r";
            endfor;
            
            $messagetable .= "</table>";
            
            // format message             
            $todays_date = date('l, F d, Y', strtotime($today));
            $mailmsg ="";
            $mailmsg .= "<h2 style='text-align: center'>" . $noticetype . "</h2>";
            $mailmsg .= "<p><span style='float:right;padding-right:30px;'>" . $todays_date . "</span>Hello " . $data[$id]['name'] . ",</p>"; 
            $mailmsg .= "<p>" . $message . "</p>\r";
              
            $mailmsg .= $messagetable; 
             
            $mailmsg .= "<p>" . $messageBottom . "</p>\r"; 
            
            //Double tables are the most reliable centering for emails
            $mail_body = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
            <html>
                <head>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
                </head>
                <body>
                    <center>
                        <table width=98% border=\"0\" align=\"center\" cellpadding=1 cellspacing=\"0\" >
                            <tr>
                                <td align=\"center\" valign=\"top\">
                                    <table width=900px border=\"0\"  cellpadding=\"0\" cellspacing=\"0\" style='border:2px solid; border-color:#969696'>
                                        <tr>                                            
                                            <td bgcolor=\"#FFFFFF\" align=\"left\" style=\"padding:14px;\">" . $mailmsg . "</td>                                            
                                        </tr>
                                        <tr>
                                            <td bgcolor=#606060 align=\"center\" style=\"padding:2px; border-top:2px solid; border-color:#777777\">
                                                <a href=\"" . $SiteURL . "\" style='color:#ffffff; text-decoration:none'>" . $SiteTitle . "</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </center>
                </body>
            </html>"; 
            $mail_to = $data[$id]['email'];
            $headers = "From: \"$SiteTitle\" <$SiteEmail>\r\n";
            $headers .= "Reply-To: $SiteEmail\r\n";
            $headers .= "Organization: $SiteTitle \r\n";
            $headers .= "X-Sender: $SiteEmail \r\n";
            $headers .= "X-Priority: 3 \r\n";
            $headers .= "X-Mailer: php\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            //mail($mail_to, $mail_subject, $mail_body, $headers);
            echo $mail_to, $mail_subject, $mail_body, $headers;
        endforeach;
    
    endif;
    
    
} catch (PDOException $ex) {
    //ONLY echo error message during development to test for problems
    //echo  $ex->getMessage();
} 

?>
