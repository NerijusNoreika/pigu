<?php

use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/workers', function(Request $request) {
    return WorkerResource::collection(Worker::paginate(20, ['id', 'name', 'surname', 'department', 'salary']));
});
Route::get('/workers/all', function(Request $request) {
    return WorkerResource::collection(Worker::all(['id', 'name', 'surname', 'department', 'salary']));
});
