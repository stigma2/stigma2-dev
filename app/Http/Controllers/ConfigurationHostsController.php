<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\HostsInterface;
use App\Interfaces\HostDetailsInterface;
use App\Interfaces\ObjectsInterface;

use DB;

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

use Shlee\Utils\NagiosConfiguration;

class ConfigurationHostsController extends Controller
{
    private $hostsRepository;
    private $hostDetailsRepository;
    private $objectsRepository;
    private $nagiosConfiguration;

    /**
     * Set the dependencies.
     *
     * @param HostsInterface $hostsRepository
     * @param HostDetailsInterface $hostDetailsRepository
     * @param ObjectsInterface $objectsRepository
     * @param NagiosConfiguration $nagiosConfiguration
     * @return void
     */
    public function __construct(
        HostsInterface $hostsRepository,
        HostDetailsInterface $hostDetailsRepository,
        ObjectsInterface $objectsRepository,
        NagiosConfiguration $nagiosConfiguration)
    {
        $this->hostsRepository = $hostsRepository;
        $this->hostDetailsRepository = $hostDetailsRepository;
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
        try {
            DB::transaction(function () use ($request) {
                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $input = $request->all();

                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => $request->input("host_name"),
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => $request->input("alias")
                ]);
                foreach ($input as $key => $value) {
                    $this->hostDetailsRepository->save([
                        'host_fk' => $uuid,
                        'key' => $key,
                        'value' => $value
                    ]);
                }
            });
        } catch (UnsatisfiedDependencyException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return Response
     */
    public function show($uuid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $uuid
     * @return Response
     */
    public function edit($uuid)
    {
        return $this->show($uuid);
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
