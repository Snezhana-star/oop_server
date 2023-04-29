<?php
namespace Controller;

use Model\Document;
use Src\Request;
use Model\Post;
use Src\View;
use Model\User;
use Src\Auth\Auth;

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
        if ($request->method==='POST' && User::create($request->all())){
            app()->route->redirect('/login');
        }
        return new View('site.signup');
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
        $documents = Document::all();
//        $statusNew = Document::where('status', $request->status)->get();
        $users = User::all();
        return (new View())->render('site.profile', ['users' => $users,'documents'=>$documents]);
    }
    public function createDoc(Request $request): string
        {
            if ($request->method==='POST' && Document::create($request->all())){
                app()->route->redirect('/profile');
            }
            return new View('site.createDoc');
        }
    public function viewDoc(Request $request): string{
        $viewdocs = Document::where('id', $request->id)->get();
        return (new View())->render('site.viewdoc', ['viewdocs' => $viewdocs]);
    }


}
