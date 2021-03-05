<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Googledrive extends CI_Controller {

	public function __construct()
	 {
	   parent::__construct();
	   $this->load->helper('gdrive_helper');
	   header('Content-Type: text/html; charset=utf-8');
	 }

	public function index()
	{
		$authUrl = getAuthorizationUrl("", "");
		echo '<a href="'.$authUrl.'">login</a>';
	}
	
	public function fileupload()
	{

		$CLIENT_ID = client_id();
		$CLIENT_SECRET = client_secret();
		$REDIRECT_URI = redirect_url();
		$this->load->helper('gdrive_helper');
		header('Content-Type: text/html; charset=utf-8');


		$client = new Google_Client();
		$client->setClientId($CLIENT_ID);

		$client->setClientSecret($CLIENT_SECRET);
		$client->setRedirectUri($REDIRECT_URI);
		$client->setScopes('email');

		$authUrl = $client->createAuthUrl();	
		$masas= getCredentials($_GET['code'], $authUrl);
		
		$userName = $_SESSION["userInfo"]["name"];
		$userEmail = $_SESSION["userInfo"]["email"];


		echo '<form enctype="multipart/form-data" action="'.base_url('googledrive/formAction').'" method="POST">
				
				<label for="folderName">Folder name</label>
				<br>
				<input type="text" name="folderName" placeholder="My cat Whiskers">
				<br><br>
				<label for="folderName">Select file (zip or .php)</label>
				<br>
				<input type="file" name="file" required>
				<br><br>
				<input type="submit" name="submit" value="Upload to Drive">
			</form>';
	}

	public function formAction()
	{
		header('Content-Type: text/html; charset=utf-8');
		$driveInfo = "";
		$folderName = "";
		$folderDesc = "";
		$file_tmp_name = $_FILES["file"]["tmp_name"];
		$credentials = $_COOKIE["credentials"];
		$CLIENT_ID = client_id();
		$CLIENT_SECRET = client_secret();
		$REDIRECT_URI = redirect_url();
		$client = new Google_Client();
		$client->setClientId($CLIENT_ID);
		$client->setClientSecret($CLIENT_SECRET);
		$client->setRedirectUri($REDIRECT_URI);
		$client->addScope(
			"https://www.googleapis.com/auth/drive", 
			"https://www.googleapis.com/auth/drive.appfolder");
		$client->setAccessToken($credentials);
		$service = new Google_Service_Drive($client);
		$mimeType = $_FILES["file"]["type"];
		$title = $_FILES["file"]["name"];
		$description = "Uploaded from your very first google drive application!";
		if (!empty($_POST["folderName"]))
			$folderName = $_POST["folderName"];
		if (!empty($_POST["folderDesc"]))
			$folderDesc = $_POST["folderDesc"];
		$this->insertFile($service, $title, $description, $mimeType, $file_tmp_name, $folderName, $folderDesc);
		redirect('Googledrive');
	}

	public function getFolderExistsCreate($service, $folderName, $folderDesc) {
		$files = $service->files->listFiles();
		$found = false;
		foreach ($files['items'] as $item) {
			if ($item['title'] == $folderName) {
				$found = true;
				return $item['id'];
				break;
			}
		}
		if ($found == false) {
			$folder = new Google_Service_Drive_DriveFile();
			$folder->setTitle($folderName);
			if(!empty($folderDesc))
				$folder->setDescription($folderDesc);
			$folder->setMimeType('application/vnd.google-apps.folder');
			try {
				$createdFile = $service->files->insert($folder, array(
					'mimeType' => 'application/vnd.google-apps.folder',
					));
				return $createdFile->id;
			} catch (Exception $e) {
				print "An error occurred: " . $e->getMessage();
			}
		}
	}

	public function insertFile($service, $title, $description, $mimeType, $filename, $folderName, $folderDesc) {
		$file = new Google_Service_Drive_DriveFile();
		$file->setTitle($title);
		$file->setDescription($description);
		$file->setMimeType($mimeType);
		if(isset($folderName)) {
			if(!empty($folderName)) {
				$parent = new Google_Service_Drive_ParentReference();
				$parent->setId($this->getFolderExistsCreate($service, $folderName, $folderDesc));
				$file->setParents(array($parent));
			}
		}
		try {
			$data = file_get_contents($filename);
			$createdFile = $service->files->insert($file, array(
				'data' => $data,
				'mimeType' => $mimeType,
				'uploadType'=> 'multipart'
				));
			return $createdFile;
		} catch (Exception $e) {
			print "An error occurred: " . $e->getMessage();
		}
	}

}
