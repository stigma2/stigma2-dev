<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Stigma\ObjectManager\ServiceManager ;

class ServiceController extends Controller {

    protected $serviceManager ;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager ;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    return view('admin.service.index') ;	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $serviceTmpl = config('service_tmpl') ;
        $serviceTmpl = collect($serviceTmpl) ;
        $serviceTmpl->sortBy(function($field){ 
            if($field['required'] && $field['display_name'] == 'SERVICE NAME' ){
                return 0 ;
            }else if($field['required'] ) { 
                return 1 ;
            }

            return 10;
        });

	    return view('admin.service.create',compact('serviceTmpl')) ;	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$param = $this->processFormData($request) ; 

        $this->serviceManager->register($param) ;

        return redirect()->route('admin.services.index') ;
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    private function processFormData(Request $request)
    {
        $serviceTmpl = config('service_tmpl') ;
        $param = [] ;

        $templateIds = $request->get('service_template') ;


        foreach($request->all() as $key => $value)
        {
            if(array_key_exists($key,$serviceTmpl) && ($value != '' )) { 
                $param[$key] = $value ;
            }
        } 

        $param['is_template'] = $request->get('is_template') ;

        if(count($templateIds) > 0){
            $param['template_ids'] = implode(',',$templateIds) ;
        }

        return $param ;
    } 


}
