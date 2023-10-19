<?php

namespace App\Http\Controllers\api\news;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use App\Models\News\News;
use App\Models\News\NewsTag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsController extends Controller
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

        $query = News::with('news_category')->where('status', $status)->orderBy($orderBy, $orderByType);

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
        $data = News::with('news_tags')->where('id', $id)->first();
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
        // dd(request()->all());
        try {
            $validator = Validator::make(request()->all(), [
                'news_category_id' => ['required'],
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
            $data = new News();
            $data->news_category_id = request()->news_category_id;
            $data->title = request()->title;
            $data->writer = request()->writer;
            $data->published_date = request()->published_date;
            $data->description = request()->description;
            $data->short_description = request()->short_description;
            $data->image_alt = request()->image_alt;
            if (request()->file('image')) {
                $image = request()->file('image');
                $data->image = upload($image, "uploads/news");
            }
            if ($data->save()) {
                $tags = json_decode(request()->input('tags'));
                if ($tags && count($tags)) {
                    foreach ($tags as $tag) {
                        $query = Tag::where('title', $tag->title)->first();
                        if ($query) {
                            $data->news_tags()->attach([$query->id]);
                        } else {
                            $tagData = new Tag();
                            $tagData->title = $tag->title;
                            if ($tagData->save()) {
                                $data->news_tags()->attach([$tagData->id]);
                            }
                        }
                    }
                }
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
            'news_category_id' => ['required'],
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

        $data = new News();
        $data->news_category_id = request()->news_category_id;
        $data->title = request()->title;
        $data->description = request()->description;
        $data->image = request()->image;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        try {

            $data = News::find(request()->id);

            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $rules = [
                'id' => ['required'],
                'news_category_id' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
                'image' => ['required'],
            ];

            $validator = Validator::make(request()->all(), $rules, []);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data->news_category_id = request()->news_category_id;
            $data->title = request()->title;
            $data->writer = request()->writer;
            $data->published_date = request()->published_date;
            $data->description = request()->description;
            $data->short_description = request()->short_description;
            $data->image_alt = request()->image_alt;
            if (request()->file('image')) {
                $image = request()->file('image');
                $data->image =  upload($image, "uploads/news");
            }

            if ($data->save()) {
                $tags = json_decode(request()->input('tags'));
                if ($tags && count($tags)) {
                    $dataId = [];
                    foreach ($tags as $tag) {
                        $query = Tag::where('title', $tag->title)->first();
                        if ($query) {
                            $dataId[] = $query->id;
                        } else {
                            $tagData = new Tag();
                            $tagData->title = $tag->title;
                            $tagData->save();
                            $dataId[] = $tagData->id;
                        }
                    }
                    $data->news_tags()->sync($dataId);
                }
            }
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function canvas_update()
    {

        $data = News::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'news_category_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->news_category_id = request()->news_category_id;
        $data->title = request()->title;
        $data->description = request()->description;
        $data->image = request()->image;
        $data->save();

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

        $data = News::find(request()->id);
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

        $data = News::find(request()->id);
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

        $data = News::find(request()->id);
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
            $check = News::where('id', $item->id)->first();
            if (!$check) {
                try {
                    News::create((array) $item);
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
