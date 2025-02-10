<?php

namespace App\Http\Controllers\Dashboard\Term;


use Illuminate\Http\Request;
use App\Bases\Trait\ApiResponse;
use App\Services\Term\TermService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Term\TermRequest;
use App\Http\Resource\Term\TermResource;
use App\Http\Resource\Term\ShowTermResource;
use App\Http\Requests\Dashboard\Position\PositionRequest;
use App\Http\Resources\Dashboard\Position\PositionResource;
use App\Http\Resources\Dashboard\Position\ShowPositionResource;

class TermController extends Controller
{
    use ApiResponse;
    public function __construct(private TermService $termService) {}
    public function index()
    {
        try {
            $positions = $this->termService->index();
            $response = TermResource::collection($positions)->response()->getData(true);
            return $this->dataResponse('fetch all positions', $response, 200);
        } catch (\Exception $e) {
            return $this->returnException($e->getMessage(), 500);
        }
    }
    public function show(int $id)
    {
        try {
            $row = $this->termService->show($id);
            $response = new ShowTermResource($row);
            return $this->dataResponse('show position', $response, 200);
        } catch (\Exception $e) {
            return $this->returnException($e->getMessage(), 500);
        }
    }
    public function store(TermRequest $request)
    {
        try {
            $position = $this->termService->store(dataRequest: $request->validated());
            return $this->dataResponse(__('message.success_create'),  new TermResource($position), 200);
        } catch (\Exception $e) {
            return $this->returnException($e->getMessage(), 500);
        }
    }
    public function update(TermRequest $request, int $id)
    {
        try {
            $position = $this->termService->update(dataRequest: $request->validated(), id: $id);
            return $this->dataResponse(__('message.success_update'),  new TermResource($position), 200);
        } catch (\Exception $e) {
            return $this->returnException($e->getMessage(), 500);
        }
    }
    public function delete($id)
    {
        try {
            $this->termService->delete($id);
            $msg = __('message.success_delete');
            return $this->successResponse($msg, 200);
        } catch (\Exception $e) {
            return $this->returnException($e->getMessage(), 500);
        }
    }
}
