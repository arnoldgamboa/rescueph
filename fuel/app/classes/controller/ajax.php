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
			"message_id" => Input::post('device'),
			"date_posted" => time(),
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