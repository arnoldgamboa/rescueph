<?php 
Class Controller_Ajax extends Controller
{
	public function action_more($offset)
	{
		
		$rescue = Model_Rescue::find();
		
		
		$data['rescues'] = $rescue
							->order_by('id','desc')
							->offset($offset)
							->limit(30)
							->get();

		$view = View::forge('rescue/more', $data);
		return $view;

	}

	public function action_sms()
	{
		$data = array(
			"number" => Input::post('number'),
			"message" => Input::post('message'),
			"message_id" => Input::post('message_id'),
			"date_posted" => time(),
			"processed" => "N",
			);

		$new = new Model_SMS($data);
		$new->save();

		if ($new) {
			return true;
		}else
		{
			return false;
		}
		
		if(function_exists('curl_init')) {
			$payload = vsprintf('number=%s&message=%s&message_id=%s&date_posted=%s', array(
				urlencode(Input::post('number')),
				urlencode(Input::post('message')),
				urlencode(Input::post('message_id')),
				time()
			));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://sandbox.131db.com/safenow/smsreceiver.php');
			curl_setopt($ch, CURLOPT_POST, 4);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			$rslt = curl_exec($ch); // TODO: catch result
			curl_close($ch);
		}
	}

	public function action_sms1()
	{
		$data = array(
			"number" => Input::get('mobile'),
			"message" => Input::get('text'),
			"message_id" => "SMART",
			"date_posted" => time(),
			"processed" => "N",
			);

		$new = new Model_SMS($data);
		$new->save();

		if ($new) {
			return true;
		}else
		{
			return false;
		}

		if(function_exists('curl_init')) {
			$payload = vsprintf('number=%s&message=%s&message_id=%s&date_posted=%s', array(
				urlencode(Input::post('number')),
				urlencode(Input::post('message')),
				'SMART',
				time()
			));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://sandbox.131db.com/safenow/smsreceiver.php');
			curl_setopt($ch, CURLOPT_POST, 4);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			$rslt = curl_exec($ch); // TODO: catch result
			curl_close($ch);
		}
	}

public function action_sms_processed($id)
{
	$new =  Model_SMS::find($id);
	$new->processed = "Y";
		$new->save();
	return true;
}

public function action_sms2()
	{
		$data = array(
			"number" => Input::get('phone'),
			"message" => Input::get('text'),
			"message_id" => Input::get('device'),
			"date_posted" => time(),
			"processed" => "N",
			);

		$new = new Model_SMS($data);
		$new->save();

		if ($new) {
			return true;
		}else
		{
			return false;
		}

	}
}
 ?>
