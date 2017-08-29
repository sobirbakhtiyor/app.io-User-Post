<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Role;
use App\Photo;
use App\Subject;

class AdminTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::whereRoleId(2)->get();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name', 'id')->all();

        $subjects = Subject::get();

        //   return $subjects;

        // foreach ($subjects as $subject) {
        //     return $subject;
        // }

        return view('admin.teachers.create', compact('roles', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if(trim($request->paswword == '')) {

            $input = $request->except('password');
        } 

        else {

            $input = $request->all();

        }
  

       if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
       }

       $input['password'] = bcrypt($request->password);

       User::create($input);

       
       return redirect('/admin/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::findOrFail($id);

        $subject = Subject::lists('name', 'id')->all();

        $roles = Role::lists('name', 'id')->all();

        return view('admin.teachers.edit', compact('teacher', 'roles', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->password == '')) {

            $input = $request->except('password');
        } 

        else {

            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        

        $user->update($input);

        Session::flash('updated_user', $input['name'].'\'s profile has been updated');
       
       return redirect('/admin/teachers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $name_of_user = $user->name;

        unlink(public_path() . $user->photo->file);

        $user->delete();

        Session::flash('deleted_user', $name_of_user.'\'s profile has been deleted');

        return redirect('/admin/teachers');
    }
}
