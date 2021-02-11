<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sendEmail($to = '', $subject  = '', $body = '', $attachment = '', $cc = '')
{
	$controller =& get_instance();
	$controller->load->helper('path'); 
	$config = array();
	$config['useragent']            = "CodeIgniter";
	$config['mailpath']             = "/usr/bin/sendmail";
	$config['protocol']             = "smtp";
	$config['smtp_host']            = "smtp.anjwebtech.com";
	$config['smtp_port']            = "465";
	$config['smtp_timeout'] 		= '20';
	$config['smtp_user']    		= "pms.test@anjwebtech.com";
	$config['smtp_pass']    		= "dT*}E&awppG@";
	$config['mailtype'] 			= 'html';
	$config['charset']  			= 'utf-8';
	$config['newline']  			= "\r\n";
	$config['wordwrap'] 			= TRUE;
	$controller->load->library('email');
	$controller->email->initialize($config);   
	$controller->email->from('info@anjwebtech.com' , 'Anjwebtech Team');
	$controller->email->to($to);
	$controller->email->subject($subject);
	$controller->email->message($body);
	if($cc != '') {	
		$controller->email->cc($cc);
	}	
	/*if($attachment != '')
	{
		$controller->email->attach(base_url()."uploads/invoices/" .$attachment);
	}*/
	if($controller->email->send()){
		return "success";
	} else {
		return "error";
	}
}
	
function email_temp_header(){
    return '<body style="margin: 0; padding: 0;">
  <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
    <tr>
      <td style="padding: 10px 0 30px 0;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
          <tr>
            <td align="center" bgcolor="#0984cb" style="padding: 25px 0 25px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
              <img src="https://anjwebtech.com/anjwebtech_pms/assets/images/o-logo.png" alt="ANJWebTech PMS" width="200" height="55" style="display: block;background: #fff;padding: 5px 10px;border-radius: 5px;" />
            </td>
          </tr>';
}

function email_temp_footer(){
        return "<tr>
        <td bgcolor='#1d3d71' style='padding: 30px 30px 30px 30px;'>
              <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                  <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;' width='70%'>
                    © Copyright ".date('Y')." | All Rights Reserved. <br/>
                    by <a href='https://anjwebtech.com' style='color: #ffffff;'><font color='#ffffff'>ANJ Webtech Private Limited.</font></a>
                  </td>
                  <td align='right' width='30%'>
                    <table border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block; margin-right:10px;'>
                          <a href='https://www.facebook.com/ANJWebTech/' style='color: #ffffff; font-size: 38px;'>
                          <img src='https://anjwebtech.com/anjwebtech_pms/assets/images/facebook.png' alt='facebook' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block; margin-right:10px;'>
                          <a href='https://www.linkedin.com/company/anj-web-tech/about/' style='color: #ffffff; font-size: 38px;'>
                            <img src='https://anjwebtech.com/anjwebtech_pms/assets/images/linkedin.png' alt='linkedin' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block; margin-right:10px;'>
                          <a href='https://twitter.com/AnjWebTech' style='color: #ffffff; font-size: 38px'>
                            <img src='https://anjwebtech.com/anjwebtech_pms/assets/images/twitter.png' alt='Twitter' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block;'>
                          <a href='https://twitter.com/AnjWebTech' style='color: #ffffff; font-size: 38px'>
                            <img src='https://anjwebtech.com/anjwebtech_pms/assets/images/instagram.png' alt='Twitter' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
            </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>";
}

?>