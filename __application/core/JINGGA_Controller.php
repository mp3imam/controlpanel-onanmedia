<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class JINGGA_Controller extends CI_Controller
{
	public $user = array();
	protected $_supported_formats = [
		'json' => 'application/json',
	];
	function __construct()
	{
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 22 Jan 2008 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");
		header_remove("X-Powered-By");
		header_remove("Server");

		$this->auth = unserialize(base64_decode($this->session->userdata('bj5d1g1t4l')));
		$this->host	= $this->config->item('base_url');
		$this->host2 = str_replace('index.php/', '', $this->config->item('base_url'));
		$host = $this->host;
		$this->nsmarty->assign('host', $this->host);
		$this->nsmarty->assign('host2', $this->host2);
		$this->nsmarty->assign('auth', $this->auth);
		if ($this->session->flashdata('error')) {
			$this->nsmarty->assign("error", $this->session->flashdata('error'));
		}
		$this->setCors();
	}
	
	protected function response($data, $status = 200)
	{
		http_response_code($status); //set response code
		$this->toJson($data);
		exit();
	}

	/**
	 * Retreive POST INPUT
	 */
	protected function getPost($input)
	{
		$content_type = $this->input->server('CONTENT_TYPE');
		$content_type = (strpos($content_type, ';') !== FALSE ? current(explode(';', $content_type)) : $content_type);
		//cek jika input content type adalah JSON
		if ($content_type == 'application/json') {
			$body = json_decode($this->input->raw_input_stream, true);
			return isset($body[$input]) ? $body[$input] : null;
		} else {
			return $this->input->post($input);
		}
	}

	/**
	 * Retreive POST File
	 */
	protected function getFile($input)
	{
		return isset($_FILES[$input]) ? $_FILES[$input] : null;
	}

	/**
	 * Set Output to JSON
	 */
	protected function toJson($data)
	{
		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))->_display();
	}

	/**
	 * Set CORS
	 */
	private function setCors()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Max-Age: 86400"); //cache 1 day
		header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */