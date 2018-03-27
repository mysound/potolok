<?php

namespace App\Http\Controllers;

use App\Block;
use App\Element;
use Image;
use Storage;
use Purifier;
use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function store(Block $block)
	{
		$this->validate(request(), [
			'title' => 'required|min:2',
			'body' => 'required|min:2',
			'image' => 'required|image'
		]);

		if (request()->hasFile('image')) {
			$image_file = request()->file('image');
			$image = time() . '.' . $image_file->getClientOriginalExtension();
			$location = public_path('images/' . $image);
			Image::make($image_file)->save($location);
		}

		$block->addElement(request('title'), Purifier::clean(request('body')), $image);

		return back();
	}

	public function edit(Element $element)
	{
		return view('elements.edit', compact('element'));
	}

	public function update(Request $request, Element $element)
	{
		$this->validate(request(), [
			'title' => 'required|min:2',
			'body' => 'required|min:2',
			'image' => 'image'
		]);

		$element->title = request('title');
		$element->body = Purifier::clean(request('body'));

		if (request()->hasFile('image')) {
			$image_file = request()->file('image');
			$image = time() . '.' . $image_file->getClientOriginalExtension();
			$location = public_path('images/' . $image);
			Image::make($image_file)->save($location);
			$oldFilename = $element->image;
			Storage::disk('images')->delete($element->image);
			$element->image = $image;
		}

		$element->save();

		return redirect('/settings/'.$element->block->id);
	}

	public function destroy(Element $element)
    {

    	Storage::disk('images')->delete($element->image);
        $element->delete();

        return back();
    }
}
