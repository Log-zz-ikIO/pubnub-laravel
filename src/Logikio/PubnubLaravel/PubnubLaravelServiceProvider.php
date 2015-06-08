<?php 

namespace Logikio\PubnubLaravel;

use Pubnub\Pubnub;
use Illuminate\Support\ServiceProvider;

class PubnubLaravelServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */

	protected $defer = true;

	/**
	 * Boot method.
	 *
	 * @var bool
	 */
	
	public function boot() {

		$this->publishes([
		    __DIR__.'/config/pubnub.php' => config_path('pubnub.php'),
		]);

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('pn', function($app) {
			return new Pubnub(config('pubnub.publish_key'), config('pubnub.subscribe_key'), config('pubnub.secret_key'), config('pubnub.ssl'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['pn'];
	}

}
