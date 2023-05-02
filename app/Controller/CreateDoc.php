<?php

namespace Controller;

use Model\Discipline;
use Model\Document;
use Src\Request;

use Model\Subdivision;
use Src\View;
use Model\User;
use Src\Validator\Validator;

class CreateDoc
{
    public function createDoc(Request $request): string
    {

        $authors = User::where('role', 'Методист')->get();
        $disciplines = Discipline::all();
        $subdivisions = Subdivision::all();
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'title' => ['required'],
                'discription' => ['required'],
                'text' => ['required'],
                'status' => ['required'],
                'date_of_creation' => ['required'],
                'subdivision' => ['required'],
                'author' => ['required'],
                'discipline' => ['required'],
                'image'
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.createDoc',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'subdivisions' => $subdivisions, 'disciplines' => $disciplines, 'authors' => $authors]);
            }

            if (Document::create($request->all())) {
                app()->route->redirect('/profile');
            }
        }
        return new View('site.createDoc', ['subdivisions' => $subdivisions, 'disciplines' => $disciplines, 'authors' => $authors]);
    }
}
