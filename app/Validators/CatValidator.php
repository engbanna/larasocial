<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CatValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required|min:2'	=>'	title=>required|min:2',
		'sometimes|min:10'	=>'	content=>sometimes|min:10',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required|min:2'	=>'	title=>required|min:2',
		'sometimes|min:10'	=>'	content=>sometimes|min:10',
	],
   ];
}
