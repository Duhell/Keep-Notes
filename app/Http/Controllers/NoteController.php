<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{
    public function viewLoginPage(): View
    {
        return view('pages.login');
    }
    public function viewRegisterPage(): View
    {
        return view('pages.register');
    }

    public function viewNotesPage(): View
    {
        $user = auth()->user();
        $notes = $user->notes;
        $numberOfNotes = $notes->count();
        return view('pages.notes',[
            'datas'=> $notes,
            'totalNotes'=>$numberOfNotes,
            'user'=>auth()->user()
        ]);
    }

    public function viewAddPage(): View
    {

        return view('pages.addNote');
    }

    public function viewEditNotePage($noteid){
        $oldNote = Note::find($noteid);
        return view('pages.editNote',[
            'oldData' => $oldNote
        ]);
    }

    public function editNote(Request $req){
        $updateNote = Note::find($req->noteid);
        $updateNote->title = $req->title;
        $updateNote->notes = $req->note;
        $updateNote->update();

        return redirect('/notes');

    }


    public function register(Request $req){

        $validatedInformation = $req->validate([
            'nickname' => ['required','max:20'],
            'email' => ['required','email','unique:users,email'],
            'password'=> ['required','min:8']
        ]);
        if($req->repassword != $req->password){
            return redirect()->back()->withErrors(['password'=>'Password does not match!']);
        }

        $userFields = new User;
        $userFields->nickname = $req->nickname;
        $userFields->email = $req->email;
        $userFields->password = Hash::make($req->password);
        $userFields->save();

        return redirect()->back()->with('success','Registered Successfully');

    }

    public function login(Request $req):RedirectResponse
    {
        $validatedInformation = $req->validate([
            'nickname' => ['required'],
            'password'=> ['required']
        ]);

        if(auth()->attempt(request()->only(['nickname','password']))){
            return redirect('/notes');
        }

        return redirect()->back()->withErrors(['nickname'=>'Wrong Credentials']);
    }

    public function add(Request $req):RedirectResponse
    {
        $note = new Note;
        $note->user_id = Auth::id();
        $note->title = $req->title;
        $note->notes = $req->note;
        $note->save();

        return redirect('/notes');
    }

    public function deleteNote($noteid):RedirectResponse
    {
        $deleteNote = Note::find($noteid);
        if($deleteNote){
            $deleteNote->delete();
            return redirect('/notes')->with('success','Note Deleted');
        }else{
            return redirect('/notes')->withErrors('failed','Note Not Found');
        }
    }


    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
