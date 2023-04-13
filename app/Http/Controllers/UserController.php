<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('isAdmin', '1')->orderBy('id', 'DESC')->simplePaginate(8);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($request->file('img')) {
            $img = $request->file('img');
            $img_name = date('YmdHi') . $img->getClientOriginalName();
            $img->move(public_path('images/users'), $img_name);
        }


        $password = Hash::make($request->input('password'));
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'img' => $img_name,
            'isAdmin' => '1'
        ];

        User::create($data);

        return redirect()->route('users.index')
            ->with('success', 'new user created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::find($user->id);
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $img_name = $user->img;

        if ($request->file('img')) {
            //path to delete the previous image
            $imgPath = public_path('/images/users') . '/' . $img_name;

            $image = $request->file('img');
            $img_name = date('YmdHi') . $image->getClientOriginalName();
            $destinationPath = public_path('images/users');
            $img = Image::make($image->getRealPath());
            $imgResultUpload = $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $img_name);

            if ($imgResultUpload) {
                if (File::exists($imgPath)) {
                    File::delete($imgPath);
                }
            }
        }


        $password = Hash::make($request->input('password'));
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'img' => $img_name,
        ];
        User::where('id', $user->id)
            ->update($data);

        return redirect()->route('users.index')
            ->with('success', 'user updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == '1') {
            return redirect()->route('users.index')
                ->with('unsuccess', "couldn't delete, please try agian");
        } else {
            $imgPath = public_path('/images/users') . '/' . $user->img;
            $result = User::destroy($user->id);
            if ($result) {
                if (File::exists($imgPath)) {
                    File::delete($imgPath);
                }
            }

            return redirect()->route('users.index')
                ->with('success', "user deleted successfully");
        }

    }

    public function profile()
    {
        $branch = User::find(auth()->user()->id);
        return view('resturant.profile', compact('branch'));
    }

}
