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
        $items = $this->serviceManager->getAllItems() ;
	    return view('admin.service.index',compact('items')) ;	
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

        $serviceTemplateCollection = $this->serviceManager->getAllTemplates() ;

	    return view('admin.service.create',compact('serviceTmpl','serviceTemplateCollection')) ;	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
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
        $service = $this->serviceManager->find($id) ;
        $serviceJsonData = json_decode($service->data) ;

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

        $serviceTemplateCollection = $this->serviceManager->getAllTemplates() ;

	    return view('admin.service.edit',compact('serviceTmpl','service','serviceJsonData','serviceTemplateCollection')) ;	

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */ 
	public function update(Request $request , $id)
	{
		$param = $this->processFormData($request) ; 

        $this->serviceManager->update($id,$param) ;

        return redirect()->route('admin.services.index') ; 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->serviceManager->delete($id) ;
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
        $param['service_name'] = $request->get('service_name') ;

        if(count($templateIds) > 0){
            $param['template_ids'] = implode(',',$templateIds) ;
        }

        return $param ;
    }
}
