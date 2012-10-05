<?php

namespace App\Transaction;
use \Zx\Controller\Route;

class Tool {
	public static function remember_current_page()
	{
		$_SESSION['current_page'] = Route::get_url();
	}
	/**
		if has current page in SESSION, return it, otherwise return false
	*/
	public static function get_current_page(){
	if (isset($_SESSION['current_page'])) {
		return $_SESSION['current_page'];
		} else {
		return false;
		}
	}
	//for admin
	public static function remember_current_admin_page()
	{
		$_SESSION['current_admin_page'] = Route::get_url();
	}
	/**
		if has current admin page in SESSION, return it, otherwise return false
	*/
	public static function get_current_admin_page(){
	if (isset($_SESSION['current_admin_page'])) {
		return $_SESSION['current_admin_page'];
		} else {
		return false;
		}
	}
}