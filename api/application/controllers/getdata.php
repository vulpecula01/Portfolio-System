<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rest_model', 'rest');
	}

	function generalinformation($userID='', $lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			$this->rest->userID = $userID;
			echo json_encode($this->rest->generalInformation());
		}
		else {
			echo json_encode(null);
			return;
		}
		
	}

	function educationbackground($userID='', $lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			$this->rest->userID = $userID;
			echo json_encode($this->rest->educationBackground());
		}
		else {
			echo json_encode(null);
			return;
		}
	}

	function jobsexperience($userID='', $lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			$this->rest->userID = $userID;
			echo json_encode($this->rest->jobsExperience());
		}
		else {
			echo json_encode(null);
			return;
		}
	}

	function interests($userID='', $lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			$this->rest->userID = $userID;
			echo json_encode($this->rest->interests());
		}
		else {
			echo json_encode(null);
			return;
		}
	}

	function researches($userID='', $lang='en')
	{
		$this->rest->userID = $userID;
		echo json_encode($this->rest->researches());
	}

	function awards($userID='', $lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			$this->rest->userID = $userID;
			echo json_encode($this->rest->awards());
		}
		else {
			echo json_encode(null);
			return;
		}
	}

	function taught($userID='', $lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			$this->rest->userID = $userID;
			echo json_encode($this->rest->taught());
		}
		else {
			echo json_encode(null);
			return;
		}
	}

	function getalluser($lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			echo json_encode($this->rest->getAllUser());
		}
		else {
			echo json_encode(null);
			return;
		}
	}

	function searchuser($keyword='', $lang='en')
	{
		$this->rest->lang = $lang;

		if($lang =='en' || $lang == 'th') {
			echo json_encode($this->rest->searchUser($keyword));
		}
		else {
			echo json_encode(null);
			return;
		}
	}

}