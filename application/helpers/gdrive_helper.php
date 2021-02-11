<?php 
error_reporting(E_ALL & ~E_NOTICE);

require_once ('drive/src/Google/Client.php');
require_once ('drive/src/Google/Service/Oauth2.php');
require_once ('drive/src/Google/Service/Drive.php');

header('Content-Type: text/html; charset=utf-8');

function client_id()
{
	return '676532158035-moc46ldk4t21bne2aclgq67aee3ck38c.apps.googleusercontent.com';
}

function client_secret()
{
	return '51PTIwPqc_Ep6U7FY1ZNMTA4';
}

function redirect_url()
{
	return base_url().'Googledrive/fileupload';
}

function getAuthorizationUrl($emailAddress, $state) {
	$ci = & get_instance();
	
$CLIENT_ID = client_id();
$CLIENT_SECRET = client_secret();
$REDIRECT_URI = redirect_url();

$SCOPES = array(
'https://www.googleapis.com/auth/drive.file',
'https://www.googleapis.com/auth/userinfo.email',
'https://www.googleapis.com/auth/userinfo.profile');

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

function storeCredentials($userId, $credentials, $userInfo) {
	$_SESSION["userInfo"] = $userInfo;
	setcookie("userId", $userId, time() + (86400 * 30), "/");
	setcookie("credentials", $credentials, time() + (86400 * 30), "/");
}

function getStoredCredentials($userId) {
	if(isset($_COOKIE["credentials"])) {
		return $_COOKIE["credentials"];
	}else {
		return null;
	}
}

function exchangeCode($authorizationCode) {
	try {
		$CLIENT_ID = client_id();
		$CLIENT_SECRET = client_secret();
		$REDIRECT_URI = redirect_url();
		$client = new Google_Client();
		$client->setClientId($CLIENT_ID);
		$client->setClientSecret($CLIENT_SECRET);
		$client->setRedirectUri($REDIRECT_URI);
		return $client->authenticate($authorizationCode);
	} catch (Exception $e) {
		print 'An error occurred: ' . $e->getMessage();
	}
	
}

function getCredentials($authorizationCode, $state) {
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
		$e->setAuthorizationUrl(getAuthorizationUrl($emailAddress, $state));
		throw $e;
	} catch (NoUserIdException $e) {
		print 'No e-mail address could be retrieved.';
	}
	$authorizationUrl = getAuthorizationUrl($emailAddress, $state);
}

function getUserInfo($credentials) {
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

?>