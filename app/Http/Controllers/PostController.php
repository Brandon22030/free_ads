<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller



{
    // 
    function filter(Request $result)
    {
        $filt = Post::query();

        if ($result->button) {
            $search = $result->search;
            $categorie = $result->categorie;
            $location = $result->location;
            $check1 = $result->check1;
            $check2 = $result->check2;
            $check3 = $result->check3;
            $min = $result->min;
            $max = $result->max;


            $filt->whereAny(['title', 'description', 'category', 'location', 'price'], 'LIKE', '%' . $search . '%');

            if ($categorie != 'categorie') {

                $filt->where('category', $categorie);
            }


            if ($location != 'location') {

                $filt->where('location', $location);
            }

            if (!is_null($min) && !is_null($max)) {

                $filt->whereBetween('price', [$min, $max]);
            }

            if (!is_null($max)) {

                $filt->where('price', '<=', $max);
            }
            if (!is_null($min)) {

                $filt->where('price', '>=', $min);
            }


            if (!is_null($check1)) {

                $filt->where('ad_state', $check1);
            }

            if (!is_null($check2)) {

                $filt->where('ad_state', $check2);
            }

            if (!is_null($check3)) {

                $filt->where('ad_state', $check3);
            }
        }


        if (!empty($filt)) {

            return view("product", [
                'prod' => $filt->latest()->paginate(5),

            ]);
        } else {
            return view("welcome");
        }
    }





    public function home()
    {

        $posts = Post::where('user_id', Auth::id())->get();


        return view("products.home", [
            "posts" => $posts
        ]);
    }


    public function createFormPost()
    {

        return view('products.create-post');
    }

    public function creat(Request $request)
    {


        // Validation des données
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'location' => 'required|string',
            'ad_state' => 'required|string'
        ]);

        // $file = new Post;

        // if($request -> file()){

        $fileName = time() . '.' . $request->image->getClientOriginalExtension();

        $image = $request->image->storeAs('images', $fileName, 'public');
        //     $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

        //     $file->image = '/storage/' . $filePath;

        // }
        // Insertion des données




        Post::create([

            'title' => $request->title,
            'image' => $image,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'ad_state' => $request->ad_state,
            'user_id' => auth()->id(),

        ]);

        $post = Post::all();


        return redirect()->route('home_product', ['posts' => $post]);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('products.show', compact('post'));
    }

    public function content($id)
    {
        $post = Post::where('id', $id)->first();
        return view('product_content', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'location' => 'required|string',
            'ad_state' => 'required|string'

        ]);

        $fileName = time() . '.' . $request->image->getClientOriginalExtension();

        $image = $request->image->storeAs('images', $fileName, 'public');

        $post = Post::find($id);

        $post->update([
            'title' => $request->title,
            'image' => $image,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'ad_state' => $request->ad_state,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home_product', ['post' => $post]);
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect(route('home_product'));
    }
}
