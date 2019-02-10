<?php 



namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

/**
 * 
 */
class EmailAvailableException extends ValidationException
{
	
	public static $defaulTemplates = [

			 self::MODE_DEFAULT => [

			 	self::STANDARD => 'Email is Taken.',
			 ],
	];
}