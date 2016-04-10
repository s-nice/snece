<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		/*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		 * 
		 */
		
		if (strlen($this->password) > 0)
			$this->password = substr(md5($this->password),0,20);
		$user = User::model()->findByAttributes(array('user_name' => $this->username));
		if ($user == null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		elseif (!($user instanceof User) || ($user->password != $this->password))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		elseif ($user->status==0)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else {
			$this->setState('admin_id', $user->id);
			$this->setState('user_name', $user->user_name);
			
			$this->_id=$user->id;
			$this->username=$user->user_name;
			
			$user->last_login_time = date('Y-m-d H:i:s');
			$user->login_num+=1;
			
			$user->save();
			
			$this->errorCode = self::ERROR_NONE;
		}
		
		return !$this->errorCode;
	}
	
	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
	
}