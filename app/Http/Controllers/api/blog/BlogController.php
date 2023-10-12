<?php

namespace App\Http\Controllers\api\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogTag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';

        $status = 'active';
        if (request()->has('status')) {
            $status = request()->status;
        }

        $query = Blog::with('blog_categories:id,title')->where('status', $status)->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', $key)
                    ->orWhere('title', $key)
                    ->orWhere('title', 'LIKE', '%' . $key . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $key . '%')
                    ->orWhere('updated_at', 'LIKE', '%' . $key . '%')
                    ->orWhere('status', 'LIKE', '%' . $key . '%');
            });
        }

        $query = $query->paginate($paginate);
        return response()->json($query);
    }

    public function show($id)
    {
        $data = Blog::where('id', $id)->first();
        if (!$data) {
            return response()->json([
                'err_message' => 'not found',
                'errors' => ['role' => ['data not found']],
            ], 422);
        }
        return response()->json($data, 200);
    }

    public function store()
    {

        try {
            $validator = Validator::make(request()->all(), [
                'blog_categories_id' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
                'image' => ['required'],
            ], []);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }
            $data = new Blog();
            $data->blog_categories_id = request()->blog_categories_id;
            $data->title = request()->title;
            $data->writer = request()->writer;
            $data->published_date = request()->published_date;
            $data->description = request()->description;
            $data->short_description = request()->short_description;
            $data->image_alt = request()->image_alt;
            if (request()->file('image')) {
                $image = request()->file('image');
                $titleShorten =  '';
                if (strlen(request()->title) > 50) {
                    $titleShorten = substr(request()->title, strlen(request()->title) - 50, strlen(request()->title));
                }
                $imageName = Str::slug($titleShorten)  . '-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/blog/'),  $imageName);
                $data->image = '/uploads/blog/' . $imageName;
            }

            if ($data->save()) {
                $tags = new BlogTag();
                $tags->blog_id = $data->id;
                $tags->tags = request()->tags;
                $tags->save();
            }
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'blog_categories_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Blog();
        $data->blog_categories_id = request()->blog_categories_id;
        $data->title = request()->title;
        $data->writer = request()->writer;
        $data->published_date = request()->published_date;
        $data->description = request()->description;
        $data->short_description = request()->short_description;
        $data->image = request()->image;
        $data->image_alt = request()->image_alt;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {

        $data = Blog::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'blog_categories_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->blog_categories_id = request()->blog_categories_id;
        $data->blog_categories_id = request()->blog_categories_id;
        $data->title = request()->title;
        $data->writer = request()->writer;
        $data->published_date = request()->published_date;
        $data->description = request()->description;
        $data->short_description = request()->short_description;
        $data->image = request()->image;
        $data->image_alt = request()->image_alt;
        $data->save();
        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = Blog::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'blog_categories_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->blog_categories_id = request()->blog_categories_id;
        $data->title = request()->title;
        $data->writer = request()->writer;
        $data->published_date = request()->published_date;
        $data->description = request()->description;
        $data->short_description = request()->short_description;
        $data->image = request()->image;
        $data->image_alt = request()->image_alt;
        $data->save();
        return response()->json($data, 200);

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Blog::find(request()->id);
        $data->status = "inactive";
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Blog::find(request()->id);
        if ($data) {
            $data->delete();
            return response()->json([
                'result' => 'Item deleted successfully',
            ], 200);
        }
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Blog::find(request()->id);
        $data->status = "active";
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }

    public function bulk_import()
    {
        $validator = Validator::make(request()->all(), [
            'data' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        foreach (request()->data as $item) {
            $item['created_at'] = $item['created_at'] ? Carbon::parse($item['created_at']) : Carbon::now()->toDateTimeString();
            $item['updated_at'] = $item['updated_at'] ? Carbon::parse($item['updated_at']) : Carbon::now()->toDateTimeString();
            $item = (object) $item;
            $check = Blog::where('id', $item->id)->first();
            if (!$check) {
                try {
                    Blog::create((array) $item);
                } catch (\Throwable $th) {
                    return response()->json([
                        'err_message' => 'validation error',
                        'errors' => $th->getMessage(),
                    ], 400);
                }
            }
        }

        return response()->json('success', 200);
    }
}
