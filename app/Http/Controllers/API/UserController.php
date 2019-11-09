<?php namespace App\Http\Controllers\API;

use App\Http\Filters\UserFilter;
use App\Models\User;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserFilter $filter)
    {
        $data = (new User)->filter($filter)->get();

        return response()->json(compact('data'));
    }
}
