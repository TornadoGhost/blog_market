<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminBanUserNotification;
use App\Notifications\UserApprovedNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('approve');
    }

    public function all(){
        $users = User::withoutBanned()->get();
        return view('users', compact('users'));
    }

    public function ban(Request $request){
        $banComment = $request->comment;
        $user = User::find($request->id);
        $user->ban([
            'comment' => $banComment,
            'expired_at' => Carbon::parse($request->date),
        ]);
        $user->notify(new AdminBanUserNotification($banComment));

        return redirect()->back()->with('success', $user->name . ' is banned');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function showToApprove()
    {
        $usersToApprove = User::query()->where('is_author','=', '0')->get();

        return view('approve', compact('usersToApprove'));
    }
    public function storeApprove(Request $request)
    {
        if($request->is_author == 'on'){
            User::query()->where('id','=', $request->id)->update([
                'is_author' => true,
            ]);
            $user = User::query()->where('id','=', $request->id)->get();

            foreach ($user as $u){
                $u->notify(new UserApprovedNotification());
            }
            return redirect()->back();
        }else if($request->declined == 1){
            User::query()->where('id','=', $request->id)->update([
                'declined' => true,
            ]);
            return redirect()->back();
        }
        return redirect()->route('approve')->with('error', 'Something went wrong');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
