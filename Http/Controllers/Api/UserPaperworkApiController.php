<?php

namespace Modules\Ipaperwork\Http\Controllers\Api;

// Requests & Response
use Modules\Ipaperwork\Http\Requests\CreateUserPaperworkRequest;
use Modules\Ipaperwork\Http\Requests\UpdateUserPaperworkRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Ipaperwork\Transformers\UserPaperworkTransformer;

// Entities
use Modules\Ipaperwork\Entities\UserPaperwork;

// Repositories
use Modules\Ipaperwork\Repositories\UserPaperworkRepository;

//Support
use Illuminate\Support\Facades\Auth;

class UserPaperworkApiController extends BaseApiController
{

  private $userPaperwork;
  
  public function __construct(
    UserPaperworkRepository $userPaperwork
    )
  {
    $this->userPaperwork = $userPaperwork;
    
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $userPaperworks = $this->userPaperwork->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => UserPaperworkTransformer::collection($userPaperworks)];
      
      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($userPaperworks)] : false;

    } catch (\Exception $e) {
      
      \Log::error($e);
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];

    }
    return response()->json($response, $status ?? 200);
  }

  /** SHOW
   * @param Request $request
   *  URL GET:
   *  &fields = type string
   *  &include = type string
   */
  public function show($criteria, Request $request)
  {
    
    try {
      //Request to Repository
      $userpaperwork = $this->userPaperwork->getItem($criteria,$this->getParamsRequest($request));

      //Break if no found item
      if (!$userpaperwork) throw new \Exception('Item not found', 204);

      $response = [
        'data' => $userpaperwork ? new UserPaperworkTransformer($userpaperwork) : '',
      ];

    } catch (\Exception $e) {
      \Log::error($e);
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
    
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create(Request $request)
  {

    \DB::beginTransaction();

    try{

      //Get data
      $data = $request['attributes'] ?? [];

      //Validate Request
      $this->validateRequestApi(new CreateUserPaperworkRequest($data));

      //Create
      $userPaperwork = $this->userPaperwork->create($data);

      //Response
      $response = ["data" => new UserPaperworkTransformer($userPaperwork)];

      \DB::commit(); //Commit to Data Base

    } catch (\Exception $e) {

        \Log::error($e);
        \DB::rollback();//Rollback to Data Base
        $status = $this->getStatusError($e->getCode());
        $response = ["errors" => $e->getMessage()];
    }

    return response()->json($response, $status ?? 200);
    
  }

  /**
   * Update the specified resource in storage.
   * @param  Request $request
   * @return Response
   */
  public function update($criteria, Request $request)
  {
    try {

      \DB::beginTransaction();

      //Get data
      $data = $request['attributes'] ?? [];

      //Validate Request
      $this->validateRequestApi(new UpdateUserPaperworkRequest($data));

      $params = $this->getParamsRequest($request);

      // Search entity
      $entity = $this->userPaperwork->getItem($criteria,$params);

      //Break if no found item
      if (!$entity) throw new \Exception('Item not found', 204);

      $userPaperwork = $this->userPaperwork->update($entity,$data);

      $response = ['data' => new UserPaperworkTransformer($userPaperwork)];

      \DB::commit(); //Commit to Data Base

    } catch (\Exception $e) {

      \Log::error($e);
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
      
    }

    return response()->json($response, $status ?? 200);

  }


  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function delete($criteria, Request $request)
  {
    try {

      //Get params
      $params = $this->getParamsRequest($request);

      // Search entity
      $entity = $this->userPaperwork->getItem($criteria,$params);

      //Break if no found item
      if (!$entity) throw new \Exception('Item not found', 204);

      $this->userPaperwork->destroy($entity);

      $response = ['data' => 'Item deleted'];

    } catch (\Exception $e) {

      \Log::Error($e);
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    return response()->json($response, $status ?? 200);
    
  }

}
