<?php

namespace App\Http\Controllers;

use App\Models\CaseCategory;
use App\Models\Crime;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = CaseCategory::all();
        $crime = Crime::latest()->take(8)->get();
        $news = News::latest()->take(8)->get();
        return view('welcome', compact('crime','categories', 'news'));
    }

    public function viewcase($id){
        $categories = CaseCategory::all();
        $crime = Crime::find(decrypt($id));
        return view('case', compact('crime', 'categories'));
    }

    public function allcaseses(){
        $categories = CaseCategory::all();
        $crime = Crime::all();
        return view('allcase', compact('categories', 'crime'));
    }


    public function dashboard(){
        return view('admin.dashboard');
    }

    public function categories(){
    $categories = CaseCategory::all();
    return view('admin.case.categories', compact('categories'));
    }

    public function savecategories (Request $request){
        $categories = new CaseCategory();
        $categories->name = $request->input('name');
        $categories->status = 1;
        $categories->save();

        return redirect()->back()
        ->with('success', 'Case Category Successfuly Added');
    }


    public function newcase(){
        $categories = CaseCategory::all();

        return view('admin.case.new', compact('categories'));
    }

    public function allcase(){
        $crime = Crime::all();
        return view('admin.case.allcase', compact('crime'));
    }

    public function savecase(Request $request){
        $passport = "";
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $passport = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/image/", $passport);
        }
        $crime = new Crime();
        $crime->case_id = $request->input('case_id');
        $crime->name = $request->input('name');
        $crime->title = $request->input('title');
        $crime->casecategory = $request->input('casecategory');
        $crime->description = $request->input('instruction');
        $crime->image = $passport;
        $crime->save();
        return redirect()->route('case.all')->with('success', 'case added successfully');
    }

    public function editcase($id){
        $crime = Crime::find($id);
        $categories = CaseCategory::all();
        return view('admin.case.edit', compact('crime', 'categories'));
    }

    public function updatecase(Request$request, $id){
        $crime = Crime::find($id);
        $passport = "";
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $passport = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/image/", $passport);
        }
        $crime->case_id = $request->input('case_id');
        $crime->name = $request->input('name');
        $crime->title = $request->input('title');
        $crime->casecategory = $request->input('casecategory');
        $crime->description = $request->input('instruction');
        $crime->image = $passport;
        $crime->update();
        return redirect()->route('case.all')->with('success', 'case updated successfully');

    }

    public function newnews(){
        return view('admin.news.new');
    }

    public function allnews(){
        $news = News::all();
        return view('admin.news.all', compact('news'));
    }

    public function savenews(Request $request){
        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('instruction');
        $news->save();
        return redirect()->route('news.all')->with('success', 'news successfully added');
    }

    public function editnews($id){
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    public function updatenews(Request $request, $id){
        $news = News::find($id);

        $news->title = $request->input('title');
        $news->content = $request->input('instruction');
        $news->update();
        return redirect()->route('news.all')->with('success', 'News Successfully Updated');
    }

    public function deletenews($id){
        $news = News::find($id);
        $news->delete();
        return redirect()->route('news.all')->with('success', 'News Successfully Deleted');
    }
}

