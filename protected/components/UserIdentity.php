<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $usuario;
	public function authenticate()
	{
		    $this->usuario = Usuario::model()->find('usuario=:usuario and password=:password',
		    	array(':usuario'=>$this->username,':password'=>$this->password));
		    	
			if(!isset($this->usuario))
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else
				$this->errorCode=self::ERROR_NONE;
			return !$this->errorCode;
	}
}
