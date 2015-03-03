<?php

class GoogleAuth
{
	private $db;
	private $client;
	
	public function __construct(DB $db, Google_Client $googleClient)
	{
		$this->db = $db;
		$this->client = $googleClient;
		$this->client->setClientId('629776387070-gtv66ut16muatfcn6ik5be6kl3lch4vo.apps.googleusercontent.com');
		$this->client->setClientSecret('OknRVvynI-Now4kZ5JVpbRkB');
		$this->client->setRedirectUri('http://localhost/usercake/login_google.php');
		$this->client->setScopes('email');
	}
	
	public function checkToken()
	{
		if(isset($_SESSION['access_token']) && !empty($_SESSION['access_token']))
		{
			$this->client->setAccessToken($_SESSION['access_token']);
		}
		else
		{
			return $this->client->createAuthUrl();
		}
		return '';
	}
	
	public function login()
	{
		if(isset($_GET['code']))
		{
			$this->client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $this->client->getAccessToken();
			return true;
		}
		return false;
	}
	
	public function logout()
	{
		unset($_SESSION['access_token']);
	}
}
?>