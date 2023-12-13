<?php

namespace App\Http\Controllers\api\navbar;

use App\Http\Controllers\Controller;
use App\Models\Navbar\NavbarMenu;
use App\Models\Navbar\NavbarMenuDetail;
use App\Models\Navbar\NavbarMenuItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NavbarMenuDetailsController extends Controller
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

        $query = NavbarMenuDetail::where('status', $status)->orderBy($orderBy, $orderByType);

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

        if(request()->has('sub_menu_slug')){
            $sub_menu = NavbarMenuItem::where('slug',request()->get('sub_menu_slug'))->first();
            if($sub_menu){
                $query->where('navbar_menu_items_id',$sub_menu->id);
            }
        }

        $data = $query->paginate($paginate);
        $data->setPath(url()->full());
        return response()->json($data);
    }

    public function show($id)
    {
        $query = NavbarMenuDetail::where('id', $id)->orWhere('slug', $id);
        $data = $query->first();
        if (!$data) {
            return response()->json([
                'err_message' => 'not found',
                'errors' => ['data' => ['data not found']],
            ], 422);
        }
        return response()->json($data, 200);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'navbar_menus_id' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $navbar_menu = NavbarMenuItem::find(request()->navbar_menu_items_id);
        $data = new NavbarMenuDetail();
        $data->navbar_menu_id = $navbar_menu->navbar_menus_id;
        $data->navbar_menu_items_id = request()->navbar_menu_items_id;
        $data->title = request()->title;
        $data->description = request()->description;
        $data->source_title = request()->source_title;
        $data->source_url = request()->source_url;
        if($_FILES["source_file"]["size"]){
            $data->source_file = upload(request()->source_file,"uploads/notices");
        }
        $data->save();

        return response()->json($data, 200);
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'navbar_menus_id' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $navbar_menu = NavbarMenuItem::find(request()->navbar_menu_items_id);
        $data = new NavbarMenuDetail();
        $data->navbar_menus_id = request()->navbar_menus_id;
        $data->title = request()->title;
        $data->serial = request()->serial;
        $data->is_visible = request()->is_visible;
        $data->goto_external_link = request()->goto_external_link;
        $data->external_link = request()->external_link;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {

        $data = NavbarMenuDetail::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['title' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            // 'navbar_menus_id' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $navbar_menu = NavbarMenuItem::find(request()->id);
        $data->navbar_menu_id = $navbar_menu->navbar_menu_id;
        $data->navbar_menu_items_id = request()->navbar_menu_items_id;
        $data->title = request()->title;
        $data->description = request()->description;
        $data->source_title = request()->source_title;
        $data->source_url = request()->source_url;
        if($_FILES["source_file"]["size"]){
            $data->source_file = upload(request()->source_file,"uploads/notices");
        }
        $data->save();

        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = NavbarMenuDetail::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'title' => ['required'],
            'navbar_menus_id' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->navbar_menus_id = request()->navbar_menus_id;
        $data->title = request()->title;
        $data->serial = request()->serial;
        $data->is_visible = request()->is_visible;
        $data->goto_external_link = request()->goto_external_link;
        $data->external_link = request()->external_link;
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

        $data = NavbarMenuDetail::find(request()->id);
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

        $data = NavbarMenuDetail::find(request()->id);
        if($data->source_file && file_exists(public_path($data->source_file))){
            unlink(public_path($data->source_file));
        }
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

        $data = NavbarMenuDetail::find(request()->id);
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
            $check = NavbarMenuDetail::where('id', $item->id)->first();
            if (!$check) {
                try {
                    NavbarMenuDetail::create((array) $item);
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
