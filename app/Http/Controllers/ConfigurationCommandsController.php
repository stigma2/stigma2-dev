<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\CommandsInterface;
use App\Interfaces\ObjectsInterface;

use DB;

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class ConfigurationCommandsController extends Controller
{
    private $commandsRepository;
    private $objectsRepository;

    /**
     * Set the dependencies.
     *
     * @param CommandsInterface $commandsRepository
     * @param ObjectsInterface $objectsRepository
     * @return void
     */
    public function __construct(CommandsInterface $commandsRepository, ObjectsInterface $objectsRepository)
    {
        $this->commandsRepository = $commandsRepository;
        $this->objectsRepository = $objectsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $result = $this->commandsRepository->lists();

        return response()->json($result);
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
        try {
            DB::transaction(function ($request) use ($request) {
                $command_name = $request->input("command_name");
                $command_line = $request->input("command_line");
                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '12',
                    'first_name' => $command_name,
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->commandsRepository->save([
                    'object_uuid' => $uuid,
                    'command_line' => $command_line
                ]);
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
