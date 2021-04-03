<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/api/news",
     *   summary="News List",
     *   operationId="NewsList",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */
    public function index(Request $request){
        $news = News::OrderBy('id','DESC')->get();
        return response()->json($news);
    }
    /**
     * @SWG\Post(
     *   path="/api/store",
     *   summary="Add News",
     *   operationId="AddNews",
     *   consumes={"multipart/form-data"},
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *		@SWG\Parameter(
     *          name="title",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\Parameter(
     *          name="text",
     *          in="formData",
     *          type="string"
     *      ),
     *     @SWG\Parameter(
     *          name="image",
     *          in="formData",
     *          type="string"
     *      ),
     * )
     *
     */
    public function store(Request $request)
    {
        $data = new News();
        $data->title = $request->title;
        $data->text  = $request->text;
        $data->image = $request->image;
        $data->save();
        return response()->json('success', 200);
    }
    /**
     * @SWG\Get(
     *   path="/api/show/{id}",
     *   summary="News Item",
     *   operationId="NewsItem",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *		@SWG\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          type="string"
     *      ),
     * )
     *
     */
    public function show($id)
    {
        $data = News::find($id);
        return response()->json($data);
    }

    /**
     * @SWG\Get(
     *   path="/api/destroy/{id}",
     *   summary="News Item Destroy",
     *   operationId="NewsItemdestroy",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *		@SWG\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          type="string"
     *      ),
     * )
     *
     */
    public function destroy($id)
    {
        $data = News::find($id);
        $data->delete();
        return response()->json('success', 200);
    }
    /**
     * @SWG\Post(
     *   path="/api/update",
     *   summary="News Item Update",
     *   operationId="NewsItemUpdate",
     *   consumes={"multipart/form-data"},
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *		@SWG\Parameter(
     *          name="Item_id",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\Parameter(
     *          name="title",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\Parameter(
     *          name="text",
     *          in="formData",
     *          type="string"
     *      ),
     *     @SWG\Parameter(
     *          name="image",
     *          in="formData",
     *          type="string"
     *      ),
     * )
     *
     */
    public function update(Request $request)
    {
        $data = News::find($request->Item_id);
        $data->title = $request->title;
        $data->text = $request->text;
        $data->image = $request->image;
        $data->update();
        return response()->json('success', 200);
    }


  /*  public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($validator)) {
            return response()->json(['error' => 'Unauthorised'], 401);
        } else {
            $success['token'] = auth()->user()->createToken('authToken')->accessToken;
            $success['user'] = auth()->user();
            return response()->json(['success' => $success])->setStatusCode(Response::HTTP_ACCEPTED);
        }
    }*/
    /**
* @SWG\Post(
*   path="/api/user-registration",
*   summary="user registration",
*   operationId="userRegistration",
*   consumes={"multipart/form-data"},
*   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *		@SWG\Parameter(
     *          name="name",
     *          in="formData",
     *          required=true,
     *          type="string"
    *      ),@SWG\Parameter(
     *          name="email",
     *          in="formData",
     *          required=true,
     *          type="string"
    *      ),
     *     @SWG\Parameter(
     *          name="password",
     *          in="formData",
     *          required=true,
     *          type="string"
    *      ),@SWG\Parameter(
     *          name="password_confirmation",
     *          in="formData",
     *          required=true,
     *          type="string"
    *      ),
     * )
     *
     */
    public function create(Request $request)
{
    return User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'profile_picture' => $request['profile_picture'],
        'date' => $request['date'],
        'password' => bcrypt($request['password']),
    ]);
}

}
