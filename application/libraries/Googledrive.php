<?php 
require_once 'drive/src/Google/Client.php';
require_once "drive/src/Google/Service/Oauth2.php";

class Googledrivel {

	protected $CI;

	public function __construct(){
		$this->CI =& get_instance();
        $this->CI->load->library('session');
        header('Content-Type: text/html; charset=utf-8');

		$CLIENT_ID = $json['installed']['client_id'];
		$CLIENT_SECRET = $json['installed']['client_secret'];
		$REDIRECT_URI = $json['installed']['redirect_uris'][0];
		$SCOPES = array(
		'https://www.googleapis.com/auth/drive.file',
		'https://www.googleapis.com/auth/userinfo.email',
		'https://www.googleapis.com/auth/userinfo.profile');
  

	}

	public function storeCredentials($userId, $credentials, $userInfo) {
		$_SESSION["userInfo"] = $userInfo;
		setcookie("userId", $userId, time() + (86400 * 30), "/");
		setcookie("credentials", $credentials, time() + (86400 * 30), "/");
	}

	public function getStoredCredentials($userId) {
		if(isset($_COOKIE["credentials"])) {
			return $_COOKIE["credentials"];
		}else {
			return null;
		}
	}

	public function getAuthorizationUrl($emailAddress, $state) {
		global $CLIENT_ID, $REDIRECT_URI, $SCOPES;
		$client = new Google_Client();

		$client->setClientId($CLIENT_ID);
		$client->setRedirectUri($REDIRECT_URI);
		$client->setAccessType('offline');
		$client->setApprovalPrompt('auto');
		$client->setState($state);
		$client->setScopes($SCOPES);
		$tmpUrl = parse_url($client->createAuthUrl());
		$query = explode('&', $tmpUrl['query']);
		$query[] = 'user_id=' . urlencode($emailAddress);
		
		return
		$tmpUrl['scheme'] . '://' . $tmpUrl['host'] .
		$tmpUrl['path'] . '?' . implode('&', $query);
	}

	public function exchangeCode($authorizationCode) {
		try {
			global $CLIENT_ID, $CLIENT_SECRET, $REDIRECT_URI;
			$client = new Google_Client();

			$client->setClientId($CLIENT_ID);
			$client->setClientSecret($CLIENT_SECRET);
			$client->setRedirectUri($REDIRECT_URI);
			return $client->authenticate($authorizationCode);
		} catch (Exception $e) {
			print 'An error occurred: ' . $e->getMessage();
		}
		
	}

	public function getCredentials($authorizationCode, $state) {
		$emailAddress = '';
		try {
			$credentials = exchangeCode($authorizationCode);
			$userInfo = getUserInfo($credentials);
			$emailAddress = $userInfo->getEmail();
			$userId = $userInfo->getId();
			$credentialsArray = json_decode($credentials, true);
			if (isset($credentialsArray['refresh_token'])) {
				storeCredentials($userId, $credentials, $userInfo);
				return $credentials;
			} else {
				$credentials = getStoredCredentials($userId);
				if ($credentials != null && isset($credentials)) {
					storeCredentials($userId, $credentials, $userInfo);
				return $credentials;
			} else {
				echo "Unexpected error.";die;
			}
		}
	} catch (CodeExchangeException $e) {
		print 'An error occurred during code exchange.';
			// Drive apps should try to retrieve the user and credentials for the current
			// session.
			// If none is available, redirect the user to the authorization URL.
		$e->setAuthorizationUrl(getAuthorizationUrl($emailAddress, $state));
		throw $e;
	} catch (NoUserIdException $e) {
		print 'No e-mail address could be retrieved.';
	}
		// No token has been retrieved.
	$authorizationUrl = getAuthorizationUrl($emailAddress, $state);
	}

	public function getUserInfo($credentials) {
		$apiClient = new Google_Client();
		$apiClient->setAccessToken($credentials);
		$userInfoService = new Google_Service_Oauth2($apiClient);
		try {
			$userInfo = $userInfoService->userinfo->get();

			if ($userInfo != null && $userInfo->getId() != null) {
				return $userInfo;
			} else {
				echo "No user ID";
			}
		} catch (Exception $e) {
			print 'An error occurred: ' . $e->getMessage();
		}
		
	}

}