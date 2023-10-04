<?php

namespace App\Http\Controllers\api\student;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentInformation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class StudentInformationController extends Controller
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

        $query = StudentInformation::where('status', $status)->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', $key)
                    ->orWhere('full_name', $key)
                    ->orWhere('full_name', 'LIKE', '%' . $key . '%')
                    ->orWhere('personal_phone_number', 'LIKE', '%' . $key . '%')
                    ->orWhere('parent_phone_number', 'LIKE', '%' . $key . '%')
                    ->orWhere('department', 'LIKE', '%' . $key . '%')
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
        $data = StudentInformation::where('id', $id)->first();
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
            'full_name' => ['required'],
            'class' => ['required'],
            'personal_phone_number' => ['required'],
            'parent_phone_number' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new StudentInformation();
        $data->student_id = request()->student_id;
        $data->full_name = request()->full_name;
        $data->class = request()->class;
        $data->personal_phone_number = request()->personal_phone_number;
        $data->parent_phone_number = request()->parent_phone_number;
        $data->parent_details = request()->parent_details;
        $data->image = request()->image;
        $data->department = request()->department;
        $data->save();

        return response()->json($data, 200);
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'student_id' => ['required'],
            'full_name' => ['required'],
            'class' => ['required'],
            'personal_phone_number' => ['required'],
            'parent_phone_number' => ['required'],
        ], []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new StudentInformation();
        $data->student_id = request()->student_id;
        $data->full_name = request()->full_name;
        $data->class = request()->class;
        $data->personal_phone_number = request()->personal_phone_number;
        $data->parent_phone_number = request()->parent_phone_number;
        $data->parent_details = request()->parent_details;
        $data->image = request()->image;
        $data->department = request()->department;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {

        $data = StudentInformation::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'student_id' => ['required'],
            'full_name' => ['required'],
            'class' => ['required'],
            'personal_phone_number' => ['required'],
            'parent_phone_number' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->student_id = request()->student_id;
        $data->full_name = request()->full_name;
        $data->class = request()->class;
        $data->personal_phone_number = request()->personal_phone_number;
        $data->parent_phone_number = request()->parent_phone_number;
        $data->parent_details = request()->parent_details;
        $data->image = request()->image;
        $data->department = request()->department;
        $data->save();

        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = StudentInformation::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $rules = [
            'id' => ['required'],
            'student_id' => ['required'],
            'full_name' => ['required'],
            'class' => ['required'],
            'personal_phone_number' => ['required'],
            'parent_phone_number' => ['required'],
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->student_id = request()->student_id;
        $data->full_name = request()->full_name;
        $data->class = request()->class;
        $data->personal_phone_number = request()->personal_phone_number;
        $data->parent_phone_number = request()->parent_phone_number;
        $data->parent_details = request()->parent_details;
        $data->image = request()->image;
        $data->department = request()->department;
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

        $data = StudentInformation::find(request()->id);
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

        $data = StudentInformation::find(request()->id);
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
            'id' => ['required' ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = StudentInformation::find(request()->id);
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
            $check = StudentInformation::where('id', $item->id)->first();
            if (!$check) {
                try {
                    StudentInformation::create((array) $item);
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
