<?php

setcookie('VISIT_COUNTER',1,[
	'expires'=> strtotime('+30 days'),
	'secure'=>false,
	'httponly'=>true,
]);