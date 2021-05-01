<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LinkController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $msg_success = Session::get('msg_success');
        $links = Link::orderBy('link_sort')->get();

        return view('links.index')->with(
            [
                'links' => $links,
                'msg_success' => $msg_success
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'link_name' => 'required | min:3',
                'url' => 'required | min:8',
                'reihenfolge' => 'required | integer | min:1 | max:20'
            ]
        );

        $link = new Link(
            [
                'link_name' => $request->link_name,
                'link_url' => $request->url,
                'link_sort' => $request->reihenfolge
            ]
        );
        $link->save();

        return redirect('/link')->with(
            'msg_success', 'Speichern von Link <b>' . $request->link_name . '</b> erfolgreich.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Link $link)
    {
        return view('links.edit')->with('link', $link);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Link $link)
    {
        $request->validate(
            [
                'link_name' => 'required | min:3',
                'url' => 'required | min:8',
                'reihenfolge' => 'required | integer | min:1 | max:20'
            ]
        );

        $link->update(
            [
                'link_name' => $request->link_name,
                'link_url' => $request->url,
                'link_sort' => $request->reihenfolge
            ]
        );
        $link->save();

        return redirect('/link')->with(
            'msg_success', 'Änderung von Link <b>' . $request->link_name . '</b> erfolgreich.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Link $link)
    {
        $oldName = $link->link_name;
        $link->delete();

        return back()->with([
            'msg_success' => 'Der Link <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }
}
