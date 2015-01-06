<?php

class AdminController extends BaseController {

  public function home()
  {
      return View::make('admin.home');
  }
}
