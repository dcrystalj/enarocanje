<?php

class ServiceCatController extends BaseController {

	public $rules = array(
		'name'        => 'required',
  	);

	public function index()
	{
		//
	}

	public function __construct() {
        $this->beforeFilter('auth',     ['only'=>['create','store','destroy']]);
        $this->beforeFilter('admin',    ['only'=>['create','store','destroy']]);
    }

	public function create($procat)
	{
		return View::make('ServiceCategorization.create')					
					->with('rules',$this->rules)
					->with('procat',$procat)
					->with('errors',Session::get('errors'))
					->with('status',Session::get('status'))
					->with('error',Session::get('error'))
					->with('success',Session::get('success'));
	}

	public function store($procat)
	{
		$validation = Validator::make(Input::all(),$this->rules);

		if($validation->passes())
		{
			$category                 = new ServiceCategories;
			$category->name           = Input::get('name');
			$category->providercat_id = $procat;
			$category->save();

			if($category)
			{
				return Redirect::route('category.servicecat.create',$procat)
								->with('success','successfully saved');
			}
		}
		return Redirect::back()
						->withErrors($validation)
						->withInput();
	}

}