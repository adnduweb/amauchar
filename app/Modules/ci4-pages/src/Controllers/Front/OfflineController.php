<?php

namespace Amauchar\Pages\Controllers\Front;

class OfflineController extends \App\Controllers\BaseController{

	public function index(){

		return view('welcome_message');
	}
}
