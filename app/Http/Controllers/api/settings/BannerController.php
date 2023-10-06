<?php

namespace App\Http\Controllers\api\settings;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSection\Banner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
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

        $query = Banner::where('status', $status)->orderBy($orderBy, $orderByType);

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

    public function first()
    {
        $data = Banner::first();
        return response()->json($data);
    }

    public function update_data()
    {
        $data = Banner::first();
        $data->fill(request()->except('background'))->save();

        if(request()->hasFile('background')){
            ini_set('memory_limit', '-1');
            $data->background = upload(request()->file('background'),'uploads/banner',1200);
            $data->save();
        }

        return $data;
    }

    public function show($id)
    {
        $data = Banner::where('id', $id)->first();
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
        $validator = Validator::make(request()->all(), [
            'setting_titles_id' => ['required'],
            'title' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Banner();
        $data->setting_titles_id = request()->setting_titles_id;
        $data->title = request()->title;
        $data->value = request()->value;
        $data->save();

        return response()->json($data, 200);
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'setting_titles_id' => ['required'],
            'title' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Banner();
        $data->setting_titles_id = request()->setting_titles_id;
        $data->title = request()->title;
        $data->value = request()->value;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {

        $data = Banner::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'setting_titles_id' => ['required'],
            'title' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->setting_titles_id = request()->setting_titles_id;
        $data->title = request()->title;
        $data->value = request()->value;
        $data->save();


        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = Banner::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'setting_titles_id' => ['required'],
            'title' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->setting_titles_id = request()->setting_titles_id;
        $data->title = request()->title;
        $data->value = request()->value;
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

        $data = Banner::find(request()->id);
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

        $data = Banner::find(request()->id);
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

        $data = Banner::find(request()->id);
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
            $check = Banner::where('id', $item->id)->first();
            if (!$check) {
                try {
                    Banner::create((array) $item);
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
