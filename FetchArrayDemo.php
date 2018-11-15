<?php


$mysqli  = mysqli_connect('localhost', 'root', '', 'abcd_enterprises');
$SiteTitle = "ABCD Enterprise pvt lmt";
$SiteEmail = "info@dw-learnwell.com";
$SiteURL   = "http://www.purnadata.in";  
$today = date('Y:m:d');
$late_days = 43;
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT `invoice_no`,`invoice_date`,`mode_term_of_payment`,cust_email, bill_to, cust_cont_no,`balance`,`total` FROM `sale_invoice`";
$result = $mysqli->query($query);	 
$row = $result->fetch_array(MYSQLI_BOTH);

//Build data array
    $data = array();
	
while($row= $result->fetch_array(MYSQLI_BOTH)){
 				  
				 // printf("%s  and balance is %d ",$row["invoice_date"],$row["balance"] );
				   printf("\n");
				   $date = Date('Y:m:d', strtotime($row["invoice_date"])); 
				 //ChromePhp::log("invoice date $date ");
				   $NewDate=Date('Y:m:d', strtotime(" $row[invoice_date] + 15 days"));
                   $paymentDate = Date('Y:m:d', strtotime(" $row[invoice_date] + 17 days"));
				   if($today == $NewDate)
				   {
					  // ChromePhp::log("send reminder   $row[balance]");  
				$mail_subject = $SiteTitle . " Late Payment Reminder";             
                $noticetype = "Late Payment Reminder";                 
                $due_date = Date('Y:m:d', strtotime(" $NewDate+ 2 days"));
				//ChromePhp::log("send reminder $due_date "); 
                $message = "This is a courtesy reminder that your payment   $row[balance] is Past Due.  It was due to be paid on ".  $paymentDate  . ".<br />
                Please make your payment as soon as possible.";
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
				<tr>
                    <td bgcolor=#F6F6F6 align=center>Date Due</td>
                    <td bgcolor=#F6F6F6 align=center>Amount</td>
                    <td bgcolor=#F6F6F6 align=center>Status</td>
                </tr>
            </thead>\r";
            
            $messagetable .= "</table>";
            
            // format message             
            $todays_date = Date('l, F d, Y');
            $mailmsg ="";
            $mailmsg .= "<h2 style='text-align: center'>" . $noticetype . "</h2>";
            $mailmsg .= "<p><span style='float:right;padding-right:30px;'>" . $todays_date . "</span>Hello " . $row['bill_to'] . ",</p>"; 
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
          //  $mail_to =  $row['cust_email'];
			 $mail_to = "swatibawankule1988@gmail.com";
            $headers = "From: \"$SiteTitle\" <$SiteEmail>\r\n";
            $headers .= "Reply-To: $SiteEmail\r\n";
            $headers .= "Organization: $SiteTitle \r\n";
            $headers .= "X-Sender: $SiteEmail \r\n";
            $headers .= "X-Priority: 3 \r\n";
            $headers .= "X-Mailer: php\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($mail_to, $mail_subject, $mail_body, $headers);
            echo $mail_to, $mail_subject, $mail_body, $headers;
   }
}

?>