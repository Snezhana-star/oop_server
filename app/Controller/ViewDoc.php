<?php

namespace Controller;

use Model\Document;
use Src\Request;
use Src\View;

class ViewDoc
{
    public function viewDoc(Request $request): string
    {
        $viewdocs = Document::where('id', $request->id)->get();
        return (new View())->render('site.viewDoc', ['viewdocs' => $viewdocs]);
    }
}