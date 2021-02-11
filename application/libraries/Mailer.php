<?php
class Mailer 
{
	function __construct()
	{
		$this->CI =& get_instance();
	}

	function Anj_newmember($email, $password)
	{
    $login_link = base_url('');  
     $tpl_manish = ''.email_temp_header().'
          <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                  		Your ANJPMS account credentials
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    <a href="'.$login_link.'" target="_blank">Please log in to your account</a>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                  	<b>Email</b> :'.$email.'
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                  	<b>Password</b> :'.$password.'
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    ANJ Webtech Team
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>'.email_temp_footer().'';		
		return $tpl_manish;		
	}


	function Anj_inviteTeam($sender_name, $task_name, $task_link)
	{
    $login_link = base_url('auth/login');  
     $tpl_manish = ''.email_temp_header().'
          <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                    
                  </td>
                </tr>
                <tr>
                  <td style="padding: 30px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                  ' .strtoupper($sender_name).' invited you to join the ' .strtoupper($task_name).' board on ANJ PMS:
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    <a href="'.$task_link.'" target="_blank" style="border-radius: 10px;background: #5aac44;color: #fff;font-weight: 600;font-size: 20px;line-height: 24px;margin: 32px auto 24px;padding: 11px 13px;text-decoration: none; text-decoration: none">click here to join</a>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    ANJ Webtech Team
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>'.email_temp_footer().'';		
		return $tpl_manish;		
	}

	//=============================================================
	function Tpl_Registration($username, $email_verification_link)
	{
    $login_link = base_url('auth/login');  
     $tpl_manish = ''.email_temp_header().'
          <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                    <b>Please verify your email address</b>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 30px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    Dear ' .strtoupper($username).',
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    To confirm your email address, please click this link:
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    <a href="'.$email_verification_link.'" target="_blank" style="color: #1473E6; text-decoration: none">'.$email_verification_link.'</a>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    Please note: If you cannot access this link, copy and paste the entire URL into your browser.
                  </td>
                </tr>
                <tr>
                  <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                    ANJ Webtech Team
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>'.email_temp_footer().'';		
		return $tpl_manish;		
	}

	//=============================================================
	function Tpl_PwdResetLink($username, $reset_link)
	{
		$tpl_manish = "".email_temp_header()."
					<tr>
						<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
										<b>Hello " .strtoupper($username).",</b>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 20px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										We heard you need a password reset. Click the link below and you'll be redirected to a secure site from which you can set a new password.
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 20px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;text-align: center;'>
										<a href='".$reset_link."' class='resetPassword-btn' style='padding: 15px 20px; color: #fff; background: #0984cb; text-decoration: none; border-radius: 5px;'>Reset Password</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 0 0; color: #838C91; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;''>
										For questions about this list, please contact: <a href='mail:info@anjwebtech.com' style='text-decoration: none;color: #1473E6; display: block;'>info@anjwebtech.com</a>

									</td>
								</tr>
							</table>
						</td>
					</tr>".email_temp_footer()."";
		
		return $tpl_manish;		
	}
	
	function changepassword_Email_Template($name,$email,$new_password)
	{
		$manish_html = "".email_temp_header()."
					<tr>
						<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
										<b>Hello ".$name.",</b>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										email ID : <b>".$email."</b>
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										Password : <b>".$new_password."</b>
									</td>
								</tr>
								
								<tr>
									<td style='padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										All the best,<br>
										The ANJ Webtech Team
									</td>
								</tr>
							</table>
						</td>
					</tr>".email_temp_footer()."";
		return $manish_html;
	}

	function invite_Email_Template($username, $reset_link)
	{
		$manish_html = "'".email_temp_header()."'
					<tr>
						<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;text-align: center;'>
										<b>Hey there! manish patel from manish has invited you to their team on Trello.</b>
									</td>
								</tr>
								<tr>
									<td style='margin: 30px 0 20px 0; padding: 30px; border: 1px solid #ccc; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; display: block;'>
										'I'd like to invite you to join manish on Trello. We use Trello to organize tasks, projects, due dates, and much more.'
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 20px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;text-align: center;'>
										<a href='#' class='joinTeam-btn' style='padding: 15px 20px; color: #fff; background: #0984cb; text-decoration: none; border-radius: 5px;'>Join The Team</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 20px 0; color: #838C91; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;text-align: center;'>
										Trello boards help you put your plans into action and achieve your goals. <a href='#' style='text-decoration: none;color: #1473E6;'>Learn more</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center;'>
										<a href='#' style='font-weight: bold;color: #1473E6;text-decoration: none;'>Unsubscribe from these emails</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>";
				$manish_html .= $this->email_temp_footer();
				$manish_html .= "</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>";
		return $manish_html;
	}

	function subscription_Email_Template($username, $reset_link)
	{
		$manish_html = "'".email_temp_header()."'
					<tr>
						<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
										<b>Please Confirm Subscription</b>
									</td>
								</tr>
								<tr>
									<td style='padding: 40px 0 20px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										<a href='#' class='joinTeam-btn' style='padding: 15px 20px; color: #fff; background: #0984cb; text-decoration: none; border-radius: 5px;'>Yes, Subscribe me to this list.</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										If you received this email by mistake, simply delete it. You won't be subscribed if you don't click the confirmation link above.
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 0 0; color: #838C91; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										For questions about this list, please contact: <a href='#' style='text-decoration: none;color: #1473E6; display: block;'>contact@anjwebtech.com</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>";
				$manish_html .= $this->email_temp_footer();
				$manish_html .= "</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>";
		return $manish_html;
	}
	 
	function changeActivity_Email_Template($username, $reset_link)
	{
		$manish_html = "'".email_temp_header()."'
					<tr>
						<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
										<b>Hello ,</b>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										You recently changed your email address in your Trello account. To confirm the change, please check <a href='#' style='font-weight: bold;color: #1473E6;text-decoration: none;'></a> to verify and complete the update.
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										<b>Didn't request this change?</b>
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										If you didn't request to change your email, <a href='#' style='font-weight: bold;color: #1473E6;text-decoration: none;'>let us know immediately.</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										All the best,<br>
										The ANJ Webtech Team
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>";
				$manish_html .= $this->email_temp_footer();
				$manish_html .= "</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>";
		return $manish_html;
	}

	function changeemail_Email_Template($username, $reset_link)
	{
		$manish_html = "'".email_temp_header()."'
					<tr>
						<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;text-align: center;'>
										<b>Hey there! manish patel from manish has invited you to their team on Trello.</b>
									</td>
								</tr>
								<tr>
									<td style='margin: 30px 0 20px 0; padding: 30px; border: 1px solid #ccc; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; display: block;'>
										'I'd like to invite you to join manish on Trello. We use Trello to organize tasks, projects, due dates, and much more.'
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 20px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;text-align: center;'>
										<a href='#' class='joinTeam-btn' style='padding: 15px 20px; color: #fff; background: #0984cb; text-decoration: none; border-radius: 5px;'>Join The Team</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 20px 0; color: #838C91; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;text-align: center;'>
										Trello boards help you put your plans into action and achieve your goals. <a href='#' style='text-decoration: none;color: #1473E6;'>Learn more</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center;'>
										<a href='#' style='font-weight: bold;color: #1473E6;text-decoration: none;'>Unsubscribe from these emails</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>";
				$manish_html .= $this->email_temp_footer();
				$manish_html .= "</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>";
		return $manish_html;
	}

	
}
?>