<?php
namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengarangController extends Controller
{
    public function index()
    {
        $posts = Pengarang::orderBy('id', 'asc')->paginate(10);

        $response = [
            "total_count" => $posts->total(),
            "limit" => $posts->perPage(),
            "pagination" => [
                "next_page" => $posts->nextPageUrl(),
                "current_page" => $posts->currentPage()
            ],
            "data" => $posts->items(),
        ];

        return response()->json($response,200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validationRules = [
            'nama' => 'required|min:5',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required',
        ];

        $validator = Validator::make($input, $validationRules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $post = Pengarang::create($input);
        return response()->json($post,200);
    }

    public function show($id)
    {
        $post = Pengarang::find($id);

        if(!$post){
            abort(404);
        }

        return response()->json($post,200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = Pengarang::find($id);

        if(!$post){
            abort(404);
        }

        $post->fill($input);
        $post->save();

        return response()->json($post,200);
    }

    public function destroy($id)
    {
        $post = Pengarang::find($id);

        if(!$post){
            abort(404);
        }

        $post->delete();

        $message = [
            "message" => "Pengarangs deleted",
            "pengarang_id" => $id
        ];

        return response()->json($message,200);
    }
}