<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Requests\LinkCreateRequest;

use Helper;

class LinkController extends Controller
{
    public function create(LinkCreateRequest $request)
    {
        $data = $request->input();
        $alias = random_str(6);
        $data["alias"] = $alias;

        $result = (new Link)->create($data);

        $shortenLink = request()->root().'/'.$result->alias;

        if($result){
            return redirect()
                ->back()
                ->with(['shorten_link'=>$shortenLink]);
        }else{
            return back()
                ->withErrors(['msg'=>'The link was not shorten! Please try again!'])
                ->withInput();
        }
    }

    public function redirect($link_alias)
    {
        // Обычно логику получения данных лучше хранить в другом месте,
        // напрмер репозиториях, но для такой простой задачи можно так не заморачиваться

        $link = (new Link())->where('alias', '=', $link_alias)->first();

        if($link){
            return view('redirect', compact('link'));
        }else{
            abort(404);
        }
    }
}
