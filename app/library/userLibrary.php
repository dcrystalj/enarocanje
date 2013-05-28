<?php

class UserLibrary {
	private static $languageArray = array(
		'english',	
		'slovenian',	
		'italian',	
		'german',	
	);
	private static $languageAbbrsArray = array(
		'en',	
		'si',	
		'it',	
		'ge',	
	);

	private static $timezoneArray = array(
		0 => "UTC-11",
		1 => "UTC-10",
		2  => "UTC-9",
		3  => "UTC-8",
		4  => "UTC-7",
		5  => "UTC-6",
		6  => 	"UTC-5",
		7  => "UTC-4",
		8  => "UTC-3",
		9  => "UTC-2",
		10  => "UTC-1",
		11   => 	"UTC (United Kingdom)",
		12   => 	"UTC+1 (Slovenia, Spain, Germany, Poland)",
		13   =>  "UTC+2 (Ukraine)",
		14   => "UTC+3",
		15   => "UTC+4",
		16   => "UTC+5",
		17   => "UTC+6",
		18   => "UTC+7",
		19   => "UTC+8",
		20   => "UTC+9",
		21  => "UTC+10",
		22  => "UTC+11",
		23  => "UTC+12"
	);


	//returns translated languages array
	public static function languages() {
		return trans('general.languages');
	}
	//returns translated language
	public static function language($i) {
		return trans('general.languages')[$i]; 
	}
	public static function languageAbbrs($i) {
		return self::$languageAbbrsArray[$i];
	}
	public static function getTimezoneIndex($i) {
		return array_search($i,self::$timezoneArray);
	}
	public static function timezones() {
		return self::$timezoneArray	;
	}
	public static function timezone($i) {
		return self::$timezoneArray[$i];
	}


	public static function generateUuid()
    {
        // Generate Uuid
        $uuid = Uuid::v4(false);
        // Check that it is unique
        $currentConfirmationCode = Passreminder::where('token', $uuid)->first();

        if($currentConfirmationCode != NULL) {
           $uuid =  $this->generateUuid($table, $field);
        }

        return $uuid;
    }


    public static function getImageWithSize($path,$imgx,$imgy){
        if($path == '' || !File::exists('public/'.$path)){
            return '';
        }
        $imagetype = exif_imagetype('public/'.$path);
        
        switch($imagetype){
        	case 1: //gif
        	$img = imagecreatefromgif('public/'.$path);
        	break;
        	case 2: //jpeg
        	$img = imagecreatefromjpeg('public/'.$path);
        	break;
        	case 3: //png
        	$img = imagecreatefrompng('public/'.$path);
        	break;
        	default: 
    			return Redirect::back()->with('error','Image type not supported');
        }
        if(2*imagesy($img) > imagesx($img))
        { //višinskega tipa
            $style = 'height:'.$imgy.'; width:auto';
        }
        else
        { //širinskega tipa
            $style = 'width:'.$imgx.'; height:auto';
        }
        $styleBig = '';
        /*if(imagesy($img) > imagesx($img))
        {
            $styleBig = 'width:auto; height:<script>3*screen.height/4</script>';
        }
        else
        {
            $styleBig = 'width:<script>3*screen.height/4</script>; height:auto';
        }
        */
        $htmlImage = Html::image($path,trans('general.logo'),array('src' => $path,'style' => $style));
        return '<a href="'.$path.'" rel="lightbox" '.$styleBig.' title="'.trans('general.logo').'">'.$htmlImage.'</a>';

    }
    public static function getImageExtensionFromMime($mimetype){
    	switch($mimetype){
    		case 'image/png':
    			return '.png';
    		case 'image/jpeg':
    			return '.jpg';
    		case 'image/gif':
    			return '.gif';
    		default: 
    			return Redirect::back()->with('error','Image type not supported');
    			break;
    		}
    }
    public static function getPicturesFromMacservice(){

        $macservice_id = Auth::user()->macroservices()->where('user_id','=',Auth::user()->id)->select('id')->first()->id;
        $pictures = DB::table('provider_pictures')->where('macservice_id','=',$macservice_id)->get();

        $tabela = array();
        foreach ($pictures as $picture)
        {
            array_push($tabela,$picture);
            //echo UserLibrary::getImageLogo($picture->path);
        }
        return $tabela;
    }
}
