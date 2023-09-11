<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SPN_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function _respond($data, $status)
	{
		return $this->output
			->set_status_header($status)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	public function json_success($data, $message = "", $status = 200)
	{
		return $this->_respond(array(
			'success' => true,
			'message' => $message,
			'data' => $data,
		), $status);
	}

	public function json_error($error, $message = "", $status = 200)
	{
		return $this->_respond(array(
			'success' => false,
			'error' => $error,
			'message' => $message,
		), $status);
	}
}
