<?php namespace AcidSolutions\ValueObjects;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
class ValueObjectsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        }

        public function boot()
        {
            $this->package('freyskeyd/value-objects');

            AliasLoader::getInstance()->alias(
                'Decimal',
                'AcidSolutions\ValueObjects\Classes\Decimal'
            );

            AliasLoader::getInstance()->alias(
                'String',
                'AcidSolutions\ValueObjects\Classes\String'
            );
        }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['Decimal', 'String'];
	}

}
