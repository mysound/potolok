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
			$imagetitle = time() . '.' . $image_file->getClientOriginalExtension();
			$picture = Image::make($image_file)
				->resize(null, $block->height_image, function ($constraint) { $constraint->aspectRatio(); } )
                ->encode('jpg',100);
			Storage::disk('images')->put($imagetitle, $picture);
            $picture->destroy();
		}

		$block->addElement(request('title'), Purifier::clean(request('body')), $imagetitle);

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
			$imagetitle = time() . '.' . $image_file->getClientOriginalExtension();
			$picture = Image::make($image_file)
				->resize(null, $element->block->height_image, function ($constraint) { $constraint->aspectRatio(); } )
                ->encode('jpg',100);
			Storage::disk('images')->delete($element->image);
            Storage::disk('images')->put($imagetitle, $picture);
            $picture->destroy();
			$element->image = $imagetitle;
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
