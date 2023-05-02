<?php

namespace Controller;


use Model\Discipline;
use Model\Document;
use Model\Subdivision;
use Model\User;
use Src\Request;
use Src\View;

class Profile
{
    public function profile(Request $request): string
    {
        $disciplines = Discipline::all();
        $subdivisions = Subdivision::all();
        if ($request->method === "POST") {
            $documents = Document::where('status', $request->status)->where('discription', $request->discription)->where('subdivision', $request->subdivision)->where('discipline', $request->discipline)->get();
        } else {
            $documents = Document::all();
        }

        $users = User::all();
        return (new View())->render('site.profile', ['users' => $users, 'documents' => $documents, 'disciplines' => $disciplines, 'subdivisions' => $subdivisions]);
    }
}