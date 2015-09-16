<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthenticateController extends Controller
{


    public function __construct()
     {
         // Apply the jwt.auth middleware to all methods in this controller
         // except for the authenticate method. We don't want to prevent
         // the user from retrieving their token if they don't already have it
         $this->middleware('jwt.auth', ['except' => ['authenticate']]);
     }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $users = User::all();
      return $users;
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function authenticate(Request $request)
    {
      $credentials = $request->only('name', 'password');

       try {
           // verify the credentials and create a token for the user
           if (! $token = JWTAuth::attempt($credentials)) {
               return response()->json(['error' => 'invalid_credentials'], 401);
           }
       } catch (JWTException $e) {
           // something went wrong
           return response()->json(['error' => 'could_not_create_token'], 500);
       }

       // if no errors are encountered we can return a JWT
       return response()->json(compact('token'));
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
