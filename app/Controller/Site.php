<?php
namespace Controller;

use Model\Discipline;
use Model\Role;
use Model\Document;
use Model\Subdivision;
use Src\Request;
use Model\Post;
use Src\View;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello');
    }
    public function signup(Request $request): string
    {
        $roles=Role::all();
        $subdivisions=Subdivision::all();
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'full_name' => ['required'],
                'sex'=> ['required'],
                'date_of_birth'=> ['required'],
                'address'=> ['required'],
                'role'=> ['required'],
                'subdivision'=> ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE),'roles'=>$roles,'subdivisions'=>$subdivisions]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup',['roles'=>$roles, 'subdivisions'=>$subdivisions]);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/profile');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'НеправильныЙ логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
    public function profile(Request $request): string
    {
        if ($request->method==="POST"){
            $documents = Document::where('status', $request->status)->where('discription', $request->discription)->where('subdivision', $request->subdivision)->where('discipline', $request->discipline)->get();
        }else{ $documents = Document::all();}

//        $statusNew = Document::where('status', $request->status)->get();
        $users = User::all();
        return (new View())->render('site.profile', ['users' => $users,'documents'=>$documents]);
    }
    public function createDoc(Request $request): string
        {

            $authors=User::where('role', 'Методист')->get();
            $disciplines=Discipline::all();
            $subdivisions=Subdivision::all();
            if ($request->method === 'POST') {

                $validator = new Validator($request->all(), [
                    'title' => ['required'],
                    'discription'=> ['required'],
                    'text'=> ['required'],
                    'status'=> ['required'],
                    'date_of_creation'=> ['required'],
                    'subdivision'=> ['required'],
                    'author' => ['required'],
                    'discipline' => ['required'],
                ], [
                    'required' => 'Поле :field пусто',
                    'unique' => 'Поле :field должно быть уникально'
                ]);

                if($validator->fails()){
                    return new View('site.createDoc',
                        ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE),'subdivisions'=>$subdivisions,'disciplines'=>$disciplines, 'authors'=>$authors]);
                }

                if (Document::create($request->all())) {
                    app()->route->redirect('/profile');
                }
            }
            return new View('site.createDoc', ['subdivisions'=>$subdivisions,'disciplines'=>$disciplines,'authors'=>$authors]);
        }
    public function viewDoc(Request $request): string{
        $viewdocs = Document::where('id', $request->id)->get();
        return (new View())->render('site.viewDoc', ['viewdocs' => $viewdocs]);
    }

    public function updateDoc(Request $request): string
    {
        if ($request->method === 'GET') {
            $docs = Document::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required'],
                'discription'=> ['required'],
                'text'=> ['required'],
                'status'=> ['required'],
                'date_of_creation'=> ['required'],
            ], [
                'required' => 'Поле :field пусто',
            ]);
            if ($validator->fails()) {
                return new View('site.updateDoc',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            $payload = $request->all();
            $docs = Document::where('id', $request->id)->update($payload);
            app()->route->redirect('/viewDoc');
        }

        return (new View())->render('site.updateDoc', ['docs' => $docs]);
    }

}
