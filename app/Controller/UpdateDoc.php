<?php

namespace Controller;

use Model\Document;
use Src\Request;
use Src\View;
use Src\Validator\Validator;

class UpdateDoc
{
    public function updateDoc(Request $request): string
    {
        if ($request->method === 'GET') {
            $docs = Document::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required'],
                'discription' => ['required'],
                'text' => ['required'],
                'status' => ['required'],
                'date_of_creation' => ['required'],
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