<?php
class Controller_Volunteers extends Controller_Template 
{

	public function action_index()
	{
		Response::redirect('volunteers/create');
		$data['volunteers'] = Model_Volunteer::find('all');
		$this->template->title = "Volunteers";
		$this->template->content = View::forge('volunteers/index', $data);

	}

	public function action_view($id = null)
	{
		$data['volunteer'] = Model_Volunteer::find($id);

		is_null($id) and Response::redirect('Volunteers');

		$this->template->title = "Volunteer";
		$this->template->content = View::forge('volunteers/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Volunteer::validate('create');
			
			if ($val->run())
			{
				$volunteer = Model_Volunteer::forge(array(
					'username' => Input::post('username'),
					'password' => Input::post('password'),
					'name' => Input::post('name'),
					'email' => Input::post('email'),
					'approved' => Input::post('approved'),
				));

				if ($volunteer and $volunteer->save())
				{
					Session::set_flash('success', 'Thank you! You will hear from us very soon.');

					Response::redirect('volunteers/create');
				}

				else
				{
					Session::set_flash('error', 'Could not save volunteer.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Volunteers";
		$this->template->content = View::forge('volunteers/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Volunteers');

		$volunteer = Model_Volunteer::find($id);

		$val = Model_Volunteer::validate('edit');

		if ($val->run())
		{
			$volunteer->username = Input::post('username');
			$volunteer->password = Input::post('password');
			$volunteer->name = Input::post('name');
			$volunteer->email = Input::post('email');
			$volunteer->approved = Input::post('approved');

			if ($volunteer->save())
			{
				Session::set_flash('success', 'Updated volunteer #' . $id);

				Response::redirect('volunteers');
			}

			else
			{
				Session::set_flash('error', 'Could not update volunteer #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$volunteer->username = $val->validated('username');
				$volunteer->password = $val->validated('password');
				$volunteer->name = $val->validated('name');
				$volunteer->email = $val->validated('email');
				$volunteer->approved = $val->validated('approved');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('volunteer', $volunteer, false);
		}

		$this->template->title = "Volunteers";
		$this->template->content = View::forge('volunteers/edit');

	}

	public function action_delete($id = null)
	{
		if ($volunteer = Model_Volunteer::find($id))
		{
			$volunteer->delete();

			Session::set_flash('success', 'Deleted volunteer #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete volunteer #'.$id);
		}

		Response::redirect('volunteers');

	}


}