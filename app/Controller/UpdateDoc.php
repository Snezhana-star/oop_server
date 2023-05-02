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
                'file' => ['required'],
                'status' => ['required'],
                'date_of_creation' => ['required'],

            ], [
                'required' => 'Поле :field пусто',
            ]);
            if ($validator->fails()) {
                return new View('site.updateDoc',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            $path = '../public/assets/files/';
            $storage = new \Upload\Storage\FileSystem($path);
            $file = new \Upload\File('file', $storage);

            $new_filename = uniqid();
            $file->setName($docs->file);
            $file_name = $file->getNameWithExtension($file);
            try {
                // Success!
                $file->upload();
            } catch (\Exception $e) {
                // Fail!
                $errors = $file->getErrors();
            }


            $docs = Document::where('id', $request->id)->update([
                'title' => $request->title,
                'discription' => $request->discription,
                'status' => $request->status,
                'date_of_creation' => $request->date_of_creation,
            ]);
            app()->route->redirect('/viewDoc?id='.$request->id);
        }

        return (new View())->render('site.updateDoc', ['docs' => $docs]);
    }
}