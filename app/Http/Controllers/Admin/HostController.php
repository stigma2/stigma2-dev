<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Stigma\ObjectManager\HostManager ;

class HostController extends Controller {

    protected $hostManager ;

    public function __construct(HostManager $hostManager)
    {
        $this->hostManager = $hostManager ;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = $this->hostManager->getAllItems() ;
	    return view('admin.host.index',compact('items')) ;	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $hostTmpl = config('host_tmpl') ;
        $hostTmpl = collect($hostTmpl) ;
        $hostTmpl->sortBy(function($field){ 
            if($field['required'] && $field['display_name'] == 'HOST NAME' ){
                return 0 ;
            }else if($field['required'] ) { 
                return 1 ;
            }

            return 10;
        });

        $hostTemplateCollection = $this->hostManager->getAllTemplates() ;


	    return view('admin.host.create',compact('hostTmpl','hostTemplateCollection')) ;	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{ 
        $param = $this->processFormData($request) ; 

        $this->hostManager->register($param) ;

        return redirect()->route('admin.hosts.index') ;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{ 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $host = $this->hostManager->find($id) ;

		$hostTmpl = config('host_tmpl') ;
        $hostTmpl = collect($hostTmpl) ;
        $hostTmpl->sortBy(function($field){ 
            if($field['required'] && $field['display_name'] == 'HOST NAME' ){
                return 0 ;
            }else if($field['required'] ) { 
                return 1 ;
            }

            return 10;
        });

        $hostJsonData = json_decode($host->data) ;

        $hostTemplateCollection = $this->hostManager->getAllTemplates() ;


	    return view('admin.host.edit',compact('hostTmpl','host','hostJsonData','hostTemplateCollection')) ;	


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
		

        $this->hostManager->update($id,$param) ;

        return redirect()->route('admin.hosts.index') ; 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	}

    private function processFormData(Request $request)
    {
        $hostTmpl = config('host_tmpl') ;
        $param = [] ;

        $templateIds = $request->get('host_template') ;


        foreach($request->all() as $key => $value)
        {
            if(array_key_exists($key,$hostTmpl) && ($value != '' )) { 
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
