<?php 

return array(


	'absences' => 'Odsotnosti',
	'activate' => 'Vključi',
	'addAbsences' => 'Dodaj odsotnosti',
	'addService' => 'Dodaj storitev',
	'back' => 'Back',
	'break' => 'Break',
	'breaks' => 'Pavze',
	'cancel' => 'Prekliči',
	'changePassword' => 'Novo geslo',
	'choose' => 'Izberi',
	'city' => 'Mesto',
	'deactivate' => 'Izključi',
	'delete' => 'Zbriši',
	'description' => 'Opis',
	'duration' => 'Trajanje',
	'edit' => 'Edit',
	'editService' => 'Uredi storitev',
	'editSettings' => 'Uredi nastavitve',
	'edit' => 'Uredi',
	'email' => 'Email',
	'english' => 'angleščina',
	'englishCapital' => 'Angleščina',
	'exportReservations' => 'Izvozi rezervacije',
	'germanCapital' => 'Nemščina',
	'german' => 'nemščina',
	'home' => 'Domov',
	'italianCapital' => 'Italijanščina',
	'italian' => 'italijanščina',
	'language' => 'Jezik',
	'languages' => array('angleščina','slovenščina','italijanščina','nemščina',),
	'length' => 'Dolžina',
	'login' => 'Prijava',
	'logout' => 'Odjava',
	'manageService' => 'Uredi storitev',
	'name' => 'Ime',
	'password' => 'Geslo',
	'price' => 'Price',
	'profile' => 'Profil',
	'providerRegistration' => 'Registracija ponudnika',
	'providerSettings' => 'Nastavitve ponudnika',
	'providers' => 'Ponudniki',
	'refer' => 'Povabi prijatelja',
	'referrals' => 'Povabuila',
	'register' => 'Registracija',
	'registration' => 'Registracija',
	'repeatPassword' => 'Ponovitev gesla',
	'reservation' => 'Rezervacija',
	'reset' => 'Reset',
	'retypePassword' => 'Ponovno vpiši geslo',
	'saveChanges' => 'Shrani spremembe',
	'save' => 'Save',
	'service' => 'Storitev',
	'services' => 'Storitve',
	'slovenianCapital' => 'Slovenščina',
	'slovenian' => 'slovenščina',
	'street' => 'Ulica',
	'submit' => 'Pošlji',
	'surname' => 'Priimek',
	'telephoneNumber' => 'Telefonska številka',
	'timetable' => 'Delovni čas',
	'timezone' => 'Časovni pas',
	'urlToYourSite' => 'URL vaše strani',
	'userProfile' => 'Profil uporabnika',
	'userRegistration' => 'Registracija uporabnika',
	'userSettings' => 'Nastavitve uporabnika',
	'welcome' => 'Dobrodošli',
	'yourChoice' => 'Vaša izbira: \nod :from do :to',
	'zipCode' => 'Poštna številka',
	'gimport' => 'Uvoz iz googla'

);

{{Former::open(URL::route('user.store'))->rules($rules)->onsubmit("check2()")}}
{{Former::text('name',Lang::get('general.name'))->autofocus()}}
{{Former::text('surname',Lang::get('general.surname'))}}
{{Former::text('email',Lang::get('general.email'))}}
{{Former::password('password',Lang::get('general.password'))}}
{{Former::password('repeat',Lang::get('general.repeatPassword'))}}
{{Former::select('timezone',Lang::get('general.timezone'))
		->options(UserLibrary::timezones(),	'12') }}
{{Former::select('language',Lang::get('general.language'))->options(Lang::get('general.languages'))}}
{{Former::actions()->submit(Lang::get('general.submit'))}}
{{Former::close()}}
