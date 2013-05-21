<?php

class CategorizationController extends BaseController {

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

	public function create()
	{
		return View::make('categorization.create')					
					->with('rules',$this->rules)
					->with('errors',Session::get('errors'))
					->with('status',Session::get('status'))
					->with('error',Session::get('error'))
					->with('success',Session::get('success'));
	}

	public function store()
	{
		$validation = Validator::make(Input::all(),$this->rules);

		if($validation->passes())
		{
			$category                = new Categories;
			$category->name          = Input::get('name');
			$category->save();

			if($category)
			{
				return Redirect::route('category.create')
								->with('success','successfully saved');
			}
		}
		return Redirect::back()
						->withErrors($validation)
						->withInput();
	}

	public function destroy($cat)
	{
		$category = Categories::find($cat);

		if ($category)
		{
			$category->delete();
            return Redirect::route('category.create')
                            ->with('success',Lang::get('messages.successfullyDeleted'));
        }
        return Redirect::route('category.create')
                                ->with('error','Category not found.');    
	}

}