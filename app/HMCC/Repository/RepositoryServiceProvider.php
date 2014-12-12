<?php namespace HMCC\Repository;

use App;
use	Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
//		$this->app->bind('Fos\Repository\User\AbstractUserRepository',
//						 function(){
//							 return new SQLUserRepository();
//						 });
	}
}
