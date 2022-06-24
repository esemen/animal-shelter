<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('page.view');

        $pageTypes = PageType::orderBy('long_name')->get();

        $filterPageType = request('page_type');
        $filterTitle = request('title');

        $pages = Page::orderBy('title')
            ->with('pageType')
            ->when($filterPageType, function ($query, $filterPageType) {
                $query->whereHas('pageType', function($query) use ($filterPageType){
                    $query->where('slug', $filterPageType);
                });
            })
            ->when($filterTitle, function ($query, $filterTitle) {
                $query->where('title','LIKE','%'.$filterTitle.'%');
                $query->orwhere('slug','LIKE','%'.$filterTitle.'%');
            })
            ->paginate(50)->appends(request()->toArray());

        return response()->view('admin.pages.index', [
            'pages' => $pages,
            'pageTypes' => $pageTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('page.edit');

        $pageTypes = PageType::orderBy('long_name')->get();

        return response()->view('admin.pages.create', ['pageTypes' => $pageTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('page.edit');

        $request->validate([
            'title' => 'required',
            'page_type_id' => 'required|exists:page_types,id',
            'page_order' => 'required'
        ], [
            'required' => 'This field is required'
        ]);

        // Generate slug
        $slugBase = Str::slug(request('title'));
        $slug = $slugBase;
        $i = 1;

        $similar = Page::where('slug', 'like', $slug . '%')->get()->pluck('slug');

        while ($similar->contains($slug)) {
            $slug = $slugBase . '-' . $i++;
        }

        $pageType = PageType::find(request('page_type_id'));

        // Create page order id
        $pageOrder = request('page_order');

//        if ($pageType !== 1)
//        {
//            $pageOrder =
//        }

        $page = $pageType->pages()->create([
            'title' => request('title'),
            'slug' => $slug,
            'page_order' => $pageOrder
        ]);
//        dd($pageOrder);


        return response()->redirectToRoute('pages.edit', $page);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $this->authorize('page.view');

        return response()->view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $this->authorize('page.edit');

        $pageTypes = PageType::orderBy('long_name')->get();

        return response()->view('admin.pages.edit', [
            'page' => $page,
            'pageTypes' => $pageTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $this->authorize('page.edit');

        $validated = $request->merge([
            'slug' => Str::slug(request('slug'))
        ])->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,' . $page->id . ',id',
//            'preview' => 'nullable',
            'content' => 'nullable',
            'page_type_id' => 'required|exists:page_types,id'
        ]);

        $page->fill($validated)
            ->pageType()->associate(request('page_type_id'))
            ->save();

        session()->flash('message', 'Page updated');

        return response()->redirectToRoute('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->authorize('page.delete');

        $page->delete();

        session()->flash('message', 'The page has been deleted');

        return response()->redirectToRoute('pages.index');
    }
}
