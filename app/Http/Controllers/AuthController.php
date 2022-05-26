<?php
namespace App\Http\Controllers;
// call response helper
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            // save user
            $user->save();

            //return successful response
           // return response()->json(['message' => 'User has been Created Successfuly' , 'user' => $user], 201);
            // return with the response helper in app/http/Helper/ResponseBuilder
            $code = 201;
            $status = true;
            $message   = "User resp created";
            $data = $user;

            // return response ResponseBuilder
            return ResponseBuilder::result($code,$status,$message,$user);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }

    // Login
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // fields to pick from user
        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'You are not Unauthorized '], 401);
        }

        return $this->respondWithToken($token);
        
    }

    public function test(){
        echo "user can access";
    }


}