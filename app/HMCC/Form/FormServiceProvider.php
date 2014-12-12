<?php namespace HMCC\Form;

use Illuminate\Support\ServiceProvider;
use Redirect;

class FormServiceProvider extends ServiceProvider
{
	/**
	 * Registering error handling for FormExceptions
	 * @returns Redirect Returns a laravel redirect back to page with errors.
	 */
	public function register()
	{
		$this->app->error(function (FormException $e) {

			return Redirect::back()
				->with('error', $e->getErrorMessage())
				->withInput()
				->withErrors($e->getMessages());

		});
	}

}
