<?php

namespace App\Http\Controllers\api\User;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentInformation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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

        $query = User::where('status', $status)->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', $key)
                    ->orWhere('full_name', $key)
                    ->orWhere('full_name', 'LIKE', '%' . $key . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $key . '%')
                    ->orWhere('updated_at', 'LIKE', '%' . $key . '%')
                    ->orWhere('status', 'LIKE', '%' . $key . '%');
            });
        }

        $query = $query->paginate($paginate);
        return response()->json($query);
    }

    public function all_students()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';

        $status = 'active';
        if (request()->has('status')) {
            $status = request()->status;
        }

        $query = User::where('status', $status)
            ->where('role_sl', 3)
            ->with('information')
            ->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', $key)
                    ->orWhere('full_name', $key)
                    ->orWhere('full_name', 'LIKE', '%' . $key . '%')
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
        $data = User::where('id', $id)->first();
        if (!$data) {
            return response()->json([
                'err_message' => 'not found',
                'errors' => ['role' => ['data not found']],
            ], 422);
        }
        return response()->json($data, 200);
    }

    public function student_show($id)
    {
        $data = User::where('id', $id)->with('information')->first();
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
            'student_id' => ['required'],
            'class_id' => ['required'],
            'due_title' => ['required'],
            'amount' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new User();
        $data->student_id = request()->student_id;
        $data->class_id = request()->class_id;
        $data->due_title = request()->due_title;
        $data->amount = request()->amount;
        $data->save();

        return response()->json($data, 200);
    }

    public function store_student()
    {
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'parent_phone_number' => ['required'],
            'address' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new User();
        $data->full_name = request()->full_name;
        $data->role_sl = 3;
        $data->image = 'avatar.png';
        $data->phone = request()->personal_phone_number;
        $data->address = request()->address;
        $data->password = Hash::make("@st123456");
        $data->save();

        $student_info = new StudentInformation();
        $student_info->student_id = $data->id;
        $student_info->full_name = $data->full_name;
        $student_info->class = request()->student_class_id;
        $student_info->personal_phone_number = request()->personal_phone_number;
        $student_info->parent_phone_number = request()->parent_phone_number;
        $student_info->parent_details = request()->parent_details;
        $student_info->department = request()->department;
        $student_info->address = request()->address;
        $student_info->save();

        if (request()->file('image')) {
            $image = request()->file('image');
            $data->image = upload($image, 'uploads/students', 200, 200);
            $student_info->image = upload($image, 'uploads/students', 200, 200);
        }

        $data->save();
        $student_info->save();

        return response()->json($data, 200);
    }

    public function update_student()
    {
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'parent_phone_number' => ['required'],
            'address' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->user_id);
        $data->full_name = request()->full_name;
        $data->role_sl = 3;
        $data->phone = request()->personal_phone_number;
        $data->address = request()->address;
        $data->save();

        $student_info = StudentInformation::where('student_id',$data->id)->first();
        if(!$student_info){
            $student_info = new StudentInformation();
        }
        $student_info->student_id = $data->id;
        $student_info->full_name = $data->full_name;
        $student_info->class = request()->student_class_id;
        $student_info->personal_phone_number = request()->personal_phone_number;
        $student_info->parent_phone_number = request()->parent_phone_number;
        $student_info->parent_details = request()->parent_details;
        $student_info->department = request()->department;
        $student_info->address = request()->address;
        $student_info->save();

        if (request()->file('image')) {
            $image = request()->file('image');
            $data->image = upload($image, 'uploads/students', 200, 200);
            $student_info->image = $data->image;
        }

        $data->save();
        $student_info->save();

        return response()->json($data, 200);
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'student_id' => ['required'],
            'class_id' => ['required'],
            'due_title' => ['required'],
            'amount' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new User();
        $data->student_id = request()->student_id;
        $data->class_id = request()->class_id;
        $data->due_title = request()->due_title;
        $data->amount = request()->amount;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {

        $data = User::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'student_id' => ['required'],
            'class_id' => ['required'],
            'due_title' => ['required'],
            'amount' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->student_id = request()->student_id;
        $data->class_id = request()->class_id;
        $data->due_title = request()->due_title;
        $data->amount = request()->amount;
        $data->save();

        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = User::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'student_id' => ['required'],
            'class_id' => ['required'],
            'due_title' => ['required'],
            'amount' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->student_id = request()->student_id;
        $data->class_id = request()->class_id;
        $data->due_title = request()->due_title;
        $data->amount = request()->amount;
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

        $data = User::find(request()->id);
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

        $data = User::find(request()->id);
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

        $data = User::find(request()->id);
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
            $check = User::where('id', $item->id)->first();
            if (!$check) {
                try {
                    User::create((array) $item);
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
