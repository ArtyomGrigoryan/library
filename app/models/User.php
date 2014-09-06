<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	protected $guarded = array('id', 'password');

	protected $fillable = array('name', 'email');

	public static $rules = array(
		'email' 	=> 'required|email|unique:users,email',
        'password' 	=> 'required|alpha_num|between:6,50|confirmed',
        'password_confirmation' => 'required|alpha_num|between:6,50',
        'name'	=> 'required|alpha_num|between:3,20|unique:users,name',
        'code' 	=> 'required|alpha_num'
  	);

  	public function register()
  	{
  		$this->password = Hash::make(Input::get('password'));
  		$this->activationCode = Str::random();
  		$this->isActive = false;
		$this->role_id = 2;
		$this->save();

		$this->sendActivationMail();

		return $this->id;
  	}

  	public function sendActivationMail()
  	{
  		$activationUrl = action('UserController@getActivate', array('$userId' => $this->id, '$activationCode' => $this->activationCode));

  		Mail::send('emails/activation', array('activationUrl' => $activationUrl), function($message) {
  			$message->to($this->email)->subject('Спасибо за регистрацию!');
  		});
  	}

  	public function activate($activationCode) 
  	{
    	if ($this->isActive) {
        	return false;
    	}
	 
	    if ($activationCode != $this->activationCode) {
	        return false;
	    }
 
	    $this->activationCode = '';
	    $this->isActive = true;
	    $this->save();
 
    	return true;
  	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
}
