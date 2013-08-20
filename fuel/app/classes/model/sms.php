<?php
use Orm\Model;

class Model_SMS extends Model
{
	protected static $_properties = array(
		'id',
		'number',
		'message',
		'message_id',
		'date_posted',
	);

	protected static $_table_name = "sms";


}
