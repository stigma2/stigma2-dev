<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\NagiosInterface;

class ServerServicesController extends Controller
{
    private $nagiosAPI;

    /**
     * Set the dependencies.
     *
     * @param NagiosInterface $nagiosAPI
     * @return void
     */
    public function __construct(NagiosInterface $nagiosAPI)
    {
        $this->nagiosAPI = $nagiosAPI;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $status = $request->input("status");
        $result = $this->nagiosAPI->listServices($status);

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $name
     * @return Response
     */
    public function show($name)
    {
        $servicedescription = $request->input("servicedescription");
        $result = $this->nagiosAPI->showService($name, $servicedescription);

        return $result;
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
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
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
}
