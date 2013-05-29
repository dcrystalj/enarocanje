<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"        => "Izbran atribut :attribute mora biti izbran.",
	"active_url"      => "Izbran atribut :attribute je neveljaven naslov.",
	"after"           => "Izbran atribut :attribute mora biti pred :date.",
	"alpha"           => "Izbran atribut :attribute lahko vsebuje le črke.",
	"alpha_dash"      => "Izbran atribut :attribute lahko vsebuje le črke, številke in pomišljaje.",
	"alpha_num"       => "Izbran atribut :attribute lahko vsebuje le črke in številke.",
	"before"          => "Izbran atribut :attribute mora biti pred :date.",
	"between"         => array(
		"numeric" => "Izbran atribut :attribute mora biti med :min - :max.",
		"file"    => "Izbran atribut :attribute mora biti med :min - :max kilobajtov.",
		"string"  => "Izbran atribut :attribute mora biti med :min - :max znakov.",
	),
	"confirmed"       => "Izbran atribut :attribute je neskladen s potrditvijo.",
	"date"            => "Izbran atribut :attribute ni veljaven datum.",
	"date_format"     => "Izbran atribut :attribute se ne ujema s formatom :format.",
	"different"       => "Izbrana atributa :attribute in :other morata biti različna.",
	"digits"          => "Izbran atribut :attribute mora biti :digits števk dolg.",
	"digits_between"  => "Izbran atribut :attribute mora biti med :min in :max števk.",
	"email"           => "Izbran atribut :attribute email format je neveljaven.",
	"exists"          => "Izbran atribut :attribute je neveljaven.",
	"image"           => "Izbran atribut :attribute mora biti slika.",
	"in"              => "Izbran atribut :attribute je neveljaven.",
	"integer"         => "Izbran atribut :attribute mora biti število.",
	"ip"              => "Izbran atribut :attribute mora biti veljaven naslov IP.",
	"max"             => array(
		"numeric"     => "Izbran atribut :attribute mora biti manj kot :max.",
		"file"        => "Izbran atribut :attribute mora biti manj kot :max kilobajtov.",
		"string"      => "Izbran atribut :attribute mora biti manj kot :max znakov.",
	),
	"mimes"           => "Izbran atribut :attribute mora biti datoteka tipa: :values.",
	"min"             => array(
		"numeric"     => "Izbran atribut :attribute mora biti najmanj :min.",
		"file"        => "Izbran atribut :attribute mora biti najmanj :min kilobajtov.",
		"string"      => "Izbran atribut :attribute mora biti najmanj :min znakov.",
	),
	"min_time"        => "Izbran atribut :attribute mora biti več kot 0",
	"notin"           => "Izbran atribut :attribute je neveljaven.",
	"numeric"         => "Izbran atribut :attribute mora biti število.",
	"regex"           => "Izbran atribut :attribute je neveljaven.",
	"required"        => "Izbran atribut :attribute je obvezen.",
	"required_with"   => "Izbran atribut :attribute je obvezen ko je :values vnešen.",
	"same"            => "Izbrana atributa :attribute in :other se morata skladati.",
	"size"            => array(
		"numeric"    => "Izbran atribut :attribute mora biti :size.",
		"file"       => "Izbran atribut :attribute mora biti :size kilobajtov.",
		"string"     => "Izbran atribut :attribute mora biti :size znakov.",
	),
	"unique"          => "Izbran atribut :attribute je že zaseden.",
	"url"             => "Izbran atribut :attribute je neveljaven.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);