<?php namespace LuacapCaptcha\LaravelCaptcha;
use Illuminate\Support\ServiceProvider;

class LaravelCaptchaServiceProvider extends ServiceProvider {


	protected $defer = false;

	public function boot()
	{
		include __DIR__.'/../routes.php';
	}

	
	public function register()
	{
		
	}

	
	public function provides()
	{
		return array();
	}

}
