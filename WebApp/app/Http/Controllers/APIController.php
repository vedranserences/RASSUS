<?php

namespace App\Http\Controllers;
use App\Project;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
    /**
     * Returns all projects
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return response($projects)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request_body = $request->getContent();
      $validation_errors = [];
      $project = new Project;


      //validacija za prazan objekt
      if(empty($request_body)) {
        return response("Empty request", 400);
      }

      $json_decoded = json_decode($request_body);

      //validacija za neispravan JSON format
      if(is_null($json_decoded)) {
        return response("Invalid format", 400);
      }

      if (sizeof($json_decoded) > 1) {
        foreach ($json_decoded as $value) {
          //validacija za nepotpun JSON format
            $validator = Validator::make((array)$value, [
            'title' => 'required',
            'description' => 'required',
            'size' => 'required',
            'taken'  => 'required',
            'mentor'  => 'required'
            ]);

            if ($validator->fails()) {
              array_push($validation_errors, $validator->errors());
             }

          }

        if(!empty($validation_errors)){
          return response([
                'message' => "Invalid format",
                'errors' => $validation_errors
                ],
                400)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                    ]);
        }



        foreach ($json_decoded as $value) {

          $project->title = $value->title;
          $project->description = $value->description;
          $project->size = $value->size;
          $project->taken = $value->taken;
          $project->mentor = $value->mentor;
          if (isset($value->team)) {
            $project->team = $value->team;
          } else {
            $project->team = '';
          }

          $project->save();
        }
      } else {

        $validator = Validator::make((array)$json_decoded, [
        'title' => 'required',
        'description' => 'required',
        'size' => 'required',
        'taken'  => 'required',
        'mentor'  => 'required'
        ]);

        if ($validator->fails()) {
          array_push($validation_errors, $validator->errors());
         }

         if(!empty($validation_errors)){
           return response([
                 'message' => "Invalid format",
                 'errors' => $validation_errors
                 ],
                 400)
                     ->withHeaders([
                         'Content-Type' => 'application/json',
                     ]);
         }

        $project->title = $json_decoded->title;
        $project->description = $json_decoded->description;
        $project->size = $json_decoded->size;
        $project->taken = $json_decoded->taken;
        $project->mentor = $json_decoded->mentor;
        if (isset($json_decoded->team)) {
          $project->team = $json_decoded->team;
        } else {
          $project->team = '';
        }

        $project->save();
      }

      return response("", 200)
          ->withHeaders([
              'Content-Type' => 'application/json',
          ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $project = Project::find($id);

      if(empty($project)){
        return response("", 404);
      } else {
        return response($project)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ]);
      }

    }

    public function update(Request $request, $id)
    {

      $project = Project::find($id);
      $request_body = $request->getContent();

      if(empty($project)){
        return response("", 404);
      }

      //validacija za prazan objekt
      if(empty($request_body)) {
        return response("Empty request_body", 400);
      }

      $json_decoded = json_decode($request_body);

      //validacija za neispravan JSON format
      if(is_null($json_decoded)) {
        return response("Invalid JSON format", 400);
      }

          if(isset($json_decoded->title)){
              $project->title = $json_decoded->title;
          }
          if (isset($json_decoded->description)) {
              $project->description = $json_decoded->description;
          }
          if (isset($json_decoded->size)) {
            $project->size = $json_decoded->size;
          }
          if (isset($json_decoded->taken)) {
            $project->taken = $json_decoded->taken;
          }
          if (isset($json_decoded->mentor)) {
            $project->mentor = $json_decoded->mentor;
          }
          if (isset($json_decoded->team)) {
            $project->team = $json_decoded->team;
          }

        $project->save();

        return response("Updated", 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ]);

    }

    public function authenticate(Request $request) {

      $request_content = $request->getContent();

      $request_body = json_decode($request_content);


      if(is_null($request_body)) {
        return response("Invalid JSON format", 400);
      }

      if (Auth::attempt(['email' => $request_body->email, 'password' => $request_body->password])) {
        $user = DB::table('users')->where('email', $request_body->email)->first();
        if ($user->admin == 1) {
          return response()->json([
              'role' => "admin",
          ]);
        } else {
          return response()->json([
              'role' => "user",
          ]);
        }
      } else {
        if(is_null($user = DB::table('users')->where('email', $request_body->email)->first())) {
          return response()->json([
              'role' => "wrong email",
          ]);
        } else {
          return response()->json([
              'role' => "wrong password",
          ]);
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $project = Project::find($id);

        if(empty($project)){
          return response("", 404);
        } else {
          $project->delete();
          return response("", 200);
        }
    }

    public function checkIfAdmin(Request $request, $email) {
      $user = User::where('email', $email)->first();

      if(isset($user)){
        if($user->admin == 1) {
          return response()->json([
              'admin' => true,
          ]);
        } else {
          return response()->json([
              'admin' => false,
          ]);
        }
      } else {
        return response("", 404);
      }
    }

    public function apply(Request $request, $id)
    {
      $rules = array(
        'team' => 'required',
      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );

      if ($validator->fails())
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        $project = Project::find($id);

        if ($project->taken == 1) {
          return response("", 400);
        } else {
          $project->taken = 1;
          $project->team = $request->team;
        }

        $project->save();

        return response("",200);
      }
    }

    public function register(Request $request) {
      $user = new User();

      $rules = array(
        'email' => 'required',
        'name' => 'required',
        'password' => 'required',
      );

      $validator = Validator::make ( Input::all (), $rules );

      if ($validator->fails())
        return response("", 400);

      $request_body = json_decode($request->getContent());

      if(is_null($request_body)) {
        return response("Invalid JSON format", 400);
      }

      $user->name = $request_body->name;
      $user->email = $request_body->email;
      $user->password = Hash::make($request->password);

      $user->save();

    }
}
