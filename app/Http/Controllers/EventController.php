<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index($id)
    {
        $rows = Event::where('match_id', $id)->get();

        return view('panel.events.index', ['rows' => $rows, 'id' => $id]);
    }

    public function create($id)
    {
        $categoreis = Category::all();
        return view('panel.events.create', ['categories' => $categoreis, 'id' => $id]);
    }

    public function store(EventCreateRequest $request, $id)
    {

        Event::create([
            'match_id' => $id,
            'from_time' => $request->from_time,
            'until_time' => $request->until_time,
            'tag' => json_encode($request->tag),
            'category_id' => $request->category_id,
        ]);
        alert()->success('successful', 'new event create successfully');
        return redirect('/events/' . $id);
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $categoreis = Category::all();

        return view('panel.events.edit', ['categories' => $categoreis, 'row' => $event]);
    }

    public function update($id, EventUpdateRequest $request)
    {
        $event = Event::find($id);

        $event->update([
            'match_id' => $id,
            'from_time' => $request->from_time,
            'until_time' => $request->until_time,
            'tag' => json_encode($request->tag),
            'category_id' => $request->category_id,
        ]);
        return redirect('/events/' . $event->match_id);
    }

    public function delete($id)
    {
        $row = Event::find($id);
        $row->delete();
    }

}
