<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\HostsInterface;
use App\Interfaces\ObjectsInterface;

use Shlee\Utils\NagiosConfiguration;

class ConfigurationHostsController extends Controller
{
    private $hostsRepository;
    private $objectsRepository;
    private $nagiosConfiguration;

    /**
     * Set the dependencies.
     *
     * @param HostsInterface $hostsRepository
     * @param ObjectsInterface $objectsRepository
     * @param NagiosConfiguration $nagiosConfiguration
     * @return void
     */
    public function __construct(
        HostsInterface $hostsRepository, 
        ObjectsInterface $objectsRepository,
        NagiosConfiguration $nagiosConfiguration)
    {
        $this->hostsRepository = $hostsRepository;
        $this->objectsRepository = $objectsRepository;
        $this->nagiosConfiguration = $nagiosConfiguration;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $result = $this->hostsRepository->lists();

        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $nagiosHost = $this->nagiosConfiguration->getHostConfig();
        $use = array();
        $unused = array();

        foreach ($nagiosHost as $nagiosProp) {
            if ($nagiosProp["required"] == "Y") array_push($use, $nagiosProp);
            else array_push($unused, $nagiosProp);
        }

        $result = array(
            "use" => $use,
            "unused" => $unused
        );

        return response()->json($result);
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
