<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        $grades = Grade::all();
        return view('admin.class_rooms', compact('classrooms', 'grades'));
    }

    public function create()
    {

    }

    public function store(ClassroomRequest $request)
    {
        try {
            $request->validated();
            $classrooms = $request->classrooms;
            foreach ($classrooms as $_classroom) {
                $classroom = new Classroom();
                $classroom->Name_Class = ['en' => $_classroom['Name_class_en'], 'ar' => $_classroom['Name']];
                $classroom->Grade_id = $_classroom['Grade_id'];
                $classroom->save();
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {
        try {
            $classrooms = Classroom::findOrFail($request->id);
            $classrooms->update([
                $classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
                $classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $sections = Section::where('Class_id', $request->id)->pluck('Class_id');
        if ($sections->count() == 0) {
            Classroom::findOrFail($request->id)->delete();
            toastr()->success(trans('My_Classes_trans.Delete'));
        }
        else
        toastr()->error(trans('My_Classes_trans.delete_Class_Error'));
        return redirect()->route('Classrooms.index');
    }

    public function deleteAll(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        $sections = Section::whereIn('Class_id', $delete_all_id)->pluck('Class_id');
      if ($sections->count() == 0) {
          Classroom::whereIn('id', $delete_all_id)->Delete();
          toastr()->success(trans('messages.Delete'));
      }else
          toastr()->error(trans('My_Classes_trans.delete_Class_Error'));
        return redirect()->route('Classrooms.index');

    }

    public function filterClassrooms(Request $request)
    {
        $grades = Grade::all();
        $classrooms = Classroom::select('*')->where('Grade_id', '=', $request->Grade_id)->get();
        return view('admin.class_rooms', compact('grades', 'classrooms'));
    }

}

?>
