<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class captchaHandler extends Front_Controller {

	public function __construct()
	{
		parent::__construct();

		$captchaId = $this->input->get('c');

		if (isset($captchaId) && preg_match("/^(\w+)$/ui", $captchaId)) {
			$captchaConfig = array('CaptchaId' => $captchaId);
			$this->load->library('BotDetect/BotDetectCaptcha', $captchaConfig);
		} else {
			$this->output->set_status_header('400', 'captcha');
		}
	}

	public function index(){
		$commandString = $this->input->get('get');

		if (!StringHelper::HasValue($commandString)) {
			HttpHelper::BadRequest('command');
		}

		$command = CaptchaHttpCommand::FromQuerystring($commandString);
		switch ($command) {
		  case CaptchaHttpCommand::GetImage:
		    $responseBody = $this->GetImage();
		    break;
		  case CaptchaHttpCommand::GetSound:
		  	$responseBody = $this->GetSound();
		    break;
		  case CaptchaHttpCommand::GetValidationResult:
			$responseBody = $this->GetValidationResult();
		    break;
		  default:
		    HttpHelper::BadRequest('command');
		    break;
		}

		$this->output->cache(0);
		$this->output->set_output($responseBody);
	}

	public function GetImage() {

		if (is_null($this->botdetectcaptcha)) {
			HttpHelper::BadRequest('captcha');
		}
	  
		// identifier of the particular Captcha object instance 
		$instanceId = $this->GetInstanceId();
		if (is_null($instanceId)) {
			HttpHelper::BadRequest('instance');
		}
	  
		// response MIME type & headers
		$mimeType = $this->botdetectcaptcha->CaptchaBase->ImageMimeType;
		$this->output->set_content_type($mimeType);
		// image generation
		$rawImage = $this->botdetectcaptcha->CaptchaBase->GetImage($instanceId);
		$this->botdetectcaptcha->CaptchaBase->Save();
		return $rawImage;
	}

	public function GetSound() {

		if (is_null($this->botdetectcaptcha)) {
			HttpHelper::BadRequest('captcha');
		}

		// identifier of the particular Captcha object instance 
		$instanceId = $this->GetInstanceId();
		if (is_null($instanceId)) {
			HttpHelper::BadRequest('instance');
		}
	  
		// response MIME type & headers
		$mimeType = $this->botdetectcaptcha->CaptchaBase->SoundMimeType;
		$this->output->set_content_type($mimeType);
		// sound generation
		$rawSound = $this->botdetectcaptcha->CaptchaBase->GetSound($instanceId);
		return $rawSound;
	}

	public function GetValidationResult() {

		if (is_null($this->Captcha)) {
			HttpHelper::BadRequest('captcha');
		}

		// identifier of the particular Captcha object instance 
		$instanceId = $this->GetInstanceId();
		if (is_null($instanceId)) {
			HttpHelper::BadRequest('instance');
		}

		$mimeType = 'application/json';
		$this->output->set_content_type($mimeType);
		
		// JSON-encoded validation result
		$result = $this->Captcha->AjaxValidate($userInput, $instanceId);
		$this->Captcha->CaptchaBase->Save();

		$resultJson = $this->GetJsonValidationResult($result);

		return $resultJson;
	}

	private function GetInstanceId() {
	  $instanceId = $this->input->get('t');
	  if (!StringHelper::HasValue($instanceId) ||
	      !CaptchaBase::IsValidInstanceId($instanceId)) {
	    return;
	  }
	  return $instanceId;
	}

	// extract the user input Captcha code string from the Ajax validation request
	private function GetUserInput() {
	  // BotDetect built-in Ajax Captcha validation
	  $input = $this->input->get('i');
	  
	  if (!empty($input)) {
	    // jQuery validation support, the input key may be just about anything,
	    // so we have to loop through fields and take the first unrecognized one
	    $recognized = array('get', 'c', 't');
	    foreach($this->input->get(NULL, TRUE) as $key => $value) {
	      if (!in_array($key, $recognized)) {
	        $input = $value;
	        break;
	      }
	    }
	  }
	  
	  return $input;
	}

	// encodes the Captcha validation result in a simple JSON wrapper
	private function GetJsonValidationResult($p_Result) {
	  $resultStr = ($p_Result ? 'true': 'false');
	  return $resultStr;
	}
}