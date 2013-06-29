<?php
class Opengraph extends Facebook {
	public $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function hasUserToken($facebook_id){
		$where = sprintf("`facebook_id` = '%d'",$facebook_id);
		$fields = '`facebook_token`';
		$result = $this->db->select('facebook_session', $where, "", $fields);
		if(empty($result)){
			return false;
		}else{
			return true;
		}
	}

	public function getConnectedUsers(){
		$sql = 'SELECT facebook_id,facebook_token FROM (SELECT facebook_id,facebook_token FROM facebook_session ORDER BY id DESC) as t1 GROUP BY facebook_id';
		$result = $this->db->run($sql);
		if(empty($result)){
			return false;
		}else{
			return $result;
		}
	}

	public function isNewUser($facebook_id){
		$where = sprintf("`facebook_id` = '%d'",$facebook_id);
		$fields = '`id`';
		$result = $this->db->select('facebook_profile', $where, "", $fields);
		if(empty($result)){
			return true;
		}else{
			return false;
		}
	}

	public function setProfile($profile){
		$profile['facebook_id'] = $profile['id'];
		$profile['birthday'] = date('Y-m-d',strtotime($profile['birthday']));
		unset($profile['id']);

		if($this->db->insert('facebook_profile', $profile)){
			$customer['first_name'] = $profile['first_name'];
			$customer['last_name'] = $profile['last_name'];
			$customer['facebook_id'] = $profile['facebook_id'];

			$this->db->insert('customers', $customer);
			$_SESSION['id'] = $customer['id'] = $this->db->lastInsertedId();
			return $customer;
		}
	}

	public function getProfile($facebook_id){
		$where = sprintf("`facebook_id` = '%d'",$facebook_id);
		$fields = '*';
		$result = $this->db->select('customers', $where, "", $fields);
		return $result['0'];
	}
}	
