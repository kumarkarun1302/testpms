<?php 
class Test extends CI_Controller
{

	public function send_mail()
    {
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <pms.test@anjwebtech.com>' . "\r\n";
		$headers .= 'Cc: manish@anjwebtech.com' . "\r\n";
		mail('pms.test@anjwebtech.com','mf','abcd',$headers);

		$config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.anjwebtech.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    		= "pms.test@anjwebtech.com";
		$config['smtp_pass']    		= 'dT*}E&awppG@';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text';
        $config['validation'] = TRUE;      
        $this->email->initialize($config);
        $this->email->from('feedback.anjwebtech@gmail.com', 'myname');
        $this->email->to('pms.test@anjwebtech.com'); 
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  
        $this->email->send();
        echo $this->email->print_debugger();
    }

	public function empty_table(){
		$this->db->truncate('ci_sessions');
		$this->db->truncate('tbl_chat');
		$this->db->truncate('tbl_comment');
		$this->db->truncate('tbl_groupchat');
		$this->db->truncate('tbl_main_chat');
		$this->db->truncate('tbl_main_group_chat');
		$this->db->truncate('tbl_merge_users');
		$this->db->truncate('tbl_multiple_image');
		$this->db->truncate('tbl_my_activity');
		$this->db->truncate('tbl_notifications');
		$this->db->truncate('tbl_page_refresh');
		/*$this->db->truncate('tbl_project');
		$this->db->truncate('tbl_roles');
		$this->db->truncate('tbl_status');
		$this->db->truncate('tbl_task');*/
		$this->db->truncate('typing');
	}

	public function database_backup()
	{
		$this->load->dbutil();
		$prefs = array('format' => 'zip', 'filename' => 'Database-backup_' . date('Y-m-d_H-i'));
		$backup = $this->dbutil->backup($prefs);
		if (!write_file('./uploads/database_backup_' . date('Y-m-d') . '.zip', $backup)) {
			echo "Error while creating auto database backup!";
		}
		else {
			echo "Database backup has been successfully Created";
		}
	}

	public function email_expr()
	{
		$query=$this->db->query("SELECT email,user_type,username FROM `tbl_users` WHERE DATE(`created_at`) >= curdate() - interval '28' day");
    	$result_array = $query->result_array();
    	$this->load->helper('email_helper');
    	foreach ($result_array as $key => $value) {
    	$username = $value['username'];
    	$usertype=get_by_id('tbl_user_type', 'user_type', 'user_type_id', $value['user_type']);
    	$user_type = ucfirst($usertype['user_type']);
    	$body = "<div class='rcmBody' style='padding: 0; margin: 0; border: 0; width: 100%; font: 12px Helvetica, Arial, sans-serif' width='100%'>
<div style='padding: 0; width: 100%; min-width: 598px'>
   <center>
      <table cellpadding='8' cellspacing='0' border='0' style='background-color: #ffffff; background: #ffffff; width: 100% !important; margin: 0; padding: 0'>
         <tbody>
            <tr>
               <td valign='top'>
                  <table cellpadding='0' cellspacing='0' border='0' align='center'>
                     <tbody>
                        <tr>
                           <td>
                              <table cellpadding='0' cellspacing='0' border='0' align='center' style='border: 1px #16a4fa solid; -webkit-border-radius: 6px; border-radius: 6px; -moz-border-radius: 6px; -webkit-box-shadow: 0px 1px 4px 0px rgba(0,0,0,0.25); box-shadow: 0px'>
                                 <tbody>
                                    <tr>
                                       <td height='36' colspan='3'></td>
                                    </tr>
                                    <tr>
                                       <td width='36'></td>
                                       <td width='454' valign='top' align='left' style='font-size: 14px; color: #444444; font-family: 'Open Sans', 'Lucida Grande', 'Segoe UI', Arial, Verdana, 'Lucida Sans Unicode', Tahoma, 'Sans Serif'; border-collapse: collapse'>
                                          <div style='text-align: left'>
                                             <table width='100%' style='width: 100%' cellpadding='0' cellspacing='0'>
                                                <tbody>
                                                   <tr>
                                                      <td style='border-bottom: 1px solid #DEDEDE; padding: 0px'>
                                                         <table width='100%' cellpadding='0' cellspacing='0'>
                                                            <tbody>
                                                               <tr>
                                                                  <td style='font: 20px Helvetica, Arial, sans-serif; font-weight: normal; line-height: 20px'>
                                                                     <a href='https://anjwebtech.com/anjwebtech_pms' style='text-decoration: none' target='_blank' rel='noreferrer'><span style='color: #fe424d; letter-spacing: 1px; text-decoration: none'>ANJ PMS</span></a>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <br><br>
                                          <p>
                                             Hello <b>".$username."</b>,<br>
                                          </p>
                                          <p>
                                             Your ANJ PMS <b>".$user_type."</b> account trial ended. We hope you liked it and see how ANJ PMS can help you achieve better results in less time.
                                          </p>
                                          <br>
                                          <center>
                                             <a href='http://anjwebtech.com/anjwebtech_pms' style='text-align: center; text-decoration: none; font-size: 16px; color: white; background-color: #16a4fa; width: 200px; max-width: 90%; margin: 0px auto 0px auto; padding: 14px 7px 14px 7px; display: block; border-radius: 6px; box-shadow: 0 1px 1px #cccccc, inset 0 1px 0 #16a4fa; text-shadow: #355782 0 1px 2px; -moz-border-radius: 6px; -moz-text-shadow: #355782 0 1px 2px; -webkit-border-radius: 6px' target='_blank' rel='noreferrer'>Subscribe Now</a>
                                          </center>
                                          <br><br><br>
                                          <p>&nbsp; - ANJ webtech Team</p>
                                       </td>
                                       <td width='36'></td>
                                    </tr>
                                    <tr>
                                       <td height='36' colspan='3'></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  
               </td>
            </tr>
         </tbody>
      </table>
   </center>
</div>";

    		$email = sendEmail($value['email'], 'Your PMS account trial is almost over', $body, $file = '' , $cc = 'manish@anjwebtech.com');
    	}
	}

	public function create_users_pdf(){
			$this->load->helper('pdf_helper'); 
			$html = '
			<h3>Users List</h3>
			<table border="1" style="width:100%">
				<thead>
					<tr class="headerrow">
						<th>Username</th>
					</tr>
				</thead>
				<tbody>					
					<tr class="oddrow">
						<td>123</td>
					</tr>';
				$html .=	'</tbody>
				</table>			
			 ';
			//ob_clean();
			//flush();
			$mpdf = new mPDF();
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Codeglamour - Users List");
			$mpdf->SetAuthor("Codeglamour");
			$mpdf->watermark_font = 'Codeglamour';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');		 
			$mpdf->WriteHTML($html);
			$filename = 'in';
			$mpdf->Output($filename . '.pdf', 'D');			
			//exit;
		}

	 public function index()
	 {
		$file = fopen("assets/logo.txt","r");
		while(! feof($file))
		  {
		  echo fgets($file). "<br />";
		  }
		fclose($file);
	 }
	 
	public function manish(){
		error_reporting(0);
		ini_set('display_errors', 0);
		$url = $this->input->post('one_file');
		$url_check=@getimagesize($url);

$curlcheck = $this->checkRemoteFile($url);
echo '<pre>';
echo print_r($curlcheck);

		$file_headers = @get_headers($url);
		if(!is_array($url_check)){
		  echo "Server has not responded. No headers or file to show.";
		} else {
			if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			    echo "File Doesn't Exist, Access Denied, URL Moved etc";
			  } else {
			  	$filename = substr($url, strrpos($url, '/') + 1);
				file_put_contents('uploads/'.$filename, file_get_contents($url));
			  }
		  
		}
		
	}

	public function is_valid_url($url)
	{
	    $url = @parse_url($url);
	    if (!$url)
	    {
	        return false;
	    }
	    $url = array_map('trim', $url);
	    $url['port'] = (!isset($url['port'])) ? 80 : (int)$url['port'];
	    $path = (isset($url['path'])) ? $url['path'] : '';
	    if ($path == '')
	    {
	        $path = '/';
	    }
	    $path .= (isset($url['query'])) ?  "?$url[query] " : '';
	    if (isset($url['host']) AND $url['host'] != gethostbyname($url['host']))
	    {
	        if (PHP_VERSION  >= 5)
	        {
	            $headers = get_headers( "$url[scheme]://$url[host]:$url[port]$path ");
	        }
	        else
	        {
	            $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30);
	            if (!$fp)
	            {
	                return false;
	            }
	            fputs($fp,  "HEAD $path HTTP/1.1\r\nHost: $url[host]\r\n\r\n ");
	            $headers = fread($fp, 4096);
	            fclose($fp);
	        }
	        $headers = (is_array($headers)) ? implode( "\n ", $headers) : $headers;
	        return (bool)preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);
	    }
	    return false;
	}
	public function url_exists1($url) {
		if(@file_get_contents($url,0,NULL,0,1))
		{ return 1; } else { return 0;}
	}

	public function url_exists2($url){
	     if ((strpos($url,  "http ")) === false) $url =  "http:// " . $url;
	     if (is_array(@get_headers($url)))
	          return true;
	     else
	          return false;
	}

	public function url_exists($url){
	    if(strstr($url,  "http:// ")) $url = str_replace( "http:// ",  " ", $url);
	    $fp = @fsockopen($url, 80);
	    if($fp === false) return false;
	    return true;
	}

	public function checkRemoteFile($url)
	{
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,$url);
	    curl_setopt($ch, CURLOPT_NOBODY, 1);
	    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    if(curl_exec($ch)!==FALSE)
	    {
	        return true;
	    }
	    else
	    {
	        return false;
	    }
	}

	public function file_contents_exist($uri)
	{
	    $handle = curl_init();

    curl_setopt($handle, CURLOPT_URL, $uri);
    curl_setopt($handle, CURLOPT_POST, false);
    curl_setopt($handle, CURLOPT_BINARYTRANSFER, false);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);

    $response = curl_exec($handle);
    $hlength  = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    $body     = substr($response, $hlength);

    // If HTTP response is not 200, throw exception
    if ($httpCode != 200) {
        throw new Exception($httpCode);
    }

    return $body;
	}

	/*public function file_contents_exist($url, $response_code = 200)
	{
	    $headers = get_headers($url);
	    if (substr($headers[0], 9, 3) == $response_code)
	    {
	        return 1;
	    }
	    else
	    {
	        return 0;
	    }
	}*/

}