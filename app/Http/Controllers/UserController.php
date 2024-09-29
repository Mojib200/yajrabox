<?php

namespace App\Http\Controllers;

use App\Models\User;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

  public function  view_blade()
  {

    if (request()->ajax()) {
      $data = User::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($event) {
                    return $event->id;
                })
                ->addColumn('name', function ($event) {
                    return $event->name;
                })
                ->addColumn('email', function ($event) {
                    return $event->email;
                })
                ->addColumn('text', function ($event) {
                    $text = $event->text;
                    if (strlen($text) > 60) {
                        return substr($text, 0, 60) . '...';
                    }
                    return $text;
                })
                ->addColumn('image', function ($event) {
                    return "<img src='/image/{$event->image}' class=' mt-2 mb-3 rounded-circle' style='width: 120px; height: 120px; border-radius:circle !important;' />";
                })
                ->addColumn('action', function ($service) {
                    return '<div style="display:flex; justify-content:center; gap:10px;">' .
                           '<a href="'.route('edit.blade',$service->id).'" class="btn btn-secondary btn-sm ms-3">edit</a>' .
                          //  '<a  href="'.route('admin.carrousel.edit',$service->id).'" class="btn btn-info"><i class="fas fa-edit"></i></a>' .
                          //  '<a href="'. route('admin.carrousel.delete', $service->id) .'" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this service?\')"><i class="fas fa-trash-alt"></i></a>' .
                           '</div>';
                })
                ->rawColumns(['id','name', 'email','text', 'image', 'action'])
                ->make(true);

    }
    // $alls=User::all();
    // return view('welcome',['alls'=>$alls]);
    return view('welcome');
  }
  public function  edit_blade($id)
  {
    //   $alls=User::where('id', $request->id)->first();
    $person = User::find($id);
    return view('editinfo', ['person' => $person]);
  }
  public function  insert_information(Request $request)
  {

    if ($request->id == 0) {

      $upload_file = $request->image;
      $extension = $upload_file->getClientOriginalExtension();
      $manager = new ImageManager(new Driver());
      $new_name = $request->name . "." . $extension;
      $img = $manager->read($upload_file);
      $img->tojpeg(200)->save(base_path('public/image/' . $new_name));
      User::insert([
        'name' => $request->name,
        'email' => $request->email,
        'text' => $request->text,
        'image' => $new_name,

        'created_at' => now(),

      ]);

      return redirect('/');
    } else {
      $image_delete = User::where('id', $request->id)->first()->image;
      $delete_for_file = public_path('image/' . $image_delete);
      unlink($delete_for_file);
      $upload_file = $request->image;
      $extension = $upload_file->getClientOriginalExtension();
      $manager = new ImageManager(new Driver());
      $new_name = $request->name . "." . $extension;
      $img = $manager->read($upload_file);
      $img->tojpeg(200)->save(base_path('public/image/' . $new_name));
      User::find($request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'text' => $request->text,
        'image' => $new_name,
        'created_at' => now(),
      ]);
      return redirect('/');
    }
  }
}
