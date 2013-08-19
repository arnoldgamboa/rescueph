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
}
 ?>