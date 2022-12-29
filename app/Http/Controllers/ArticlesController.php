<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\Articles;
use App\Exports\ArticlesExport;
use App\Imports\ArticlesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use TypeError;

class ArticlesController extends Controller
{
    public function index()
    {
        //recuperationn des tableaux sous forme d'un tableau
        try{
           $articles = 'App\Models\Articles'::all(); 
           return view('index', compact('articles'));
        } catch (QueryException $ex){
            return view('errors.error');
        }
    }

    public function create()
    {
        try{
            return view('create');
        } catch (QueryException $ex){
            return view('errors.error');
        }
        //DB::insert('insert into articles(design, categorie, puv, unite, image, quantite) values(?,?,?,?,?,?)', ['Tablette', 'Electronique', 1531, 'U', 'image5.jpeg', 40]);
    }
    public function store(Request $request)
    {
        try{
            $arti = new Articles();
            $arti->design =$request->design;
            $arti->categorie =$request->design;
            $arti->categorie =$request->categorie;
            $arti->puv =$request->puv;
            $arti->unite = $request->unite;
            $arti->image = $request->image;
            $arti->quantite = $request->quantite;
            $arti->description = $request->description;
            $arti->save();
            return redirect()->route('index')->with('success','Les données sont ajoutées avec succces.');
        } catch (QueryException $ex){
            return view('errors.error');
        }
    }

    public function show($id)
    {
        try{
            $article_single = articles::where('id',$id)->first(); // envoyer object que vous voulez voir sans comminiquez avec la base de donne pour dimunier les transactions
            return view('show',compact('article_single'));
        } catch (QueryException $ex){
            return view('errors.error');
        }
    }

    public function edit($id)
    {   
        //dd($id);
        try{
            $article_single = Articles::where("id", $id)->first();
            return view('edit', compact('article_single'));
        } catch (QueryException $ex){
            return view('errors.error');
        }
    }

    public function update(Request $request, $id)
    {
        $article = Articles::where('id', $id)->first();
        $article->design = $request->design;
        $article->categorie = $request->categorie;
        $article->puv = $request->puv;
        $article->unite = $request->unite;
        $article->image = $request->image;
        $article->quantite = $request->quantite;
        $article->description = $request->description;
        $article->update();
        return redirect()->route('index')->with('success', 'Les données sont modifiées avec succès.');
    }

    public function destroy($id)
    {
        try{
            $article = Articles::where('id', $id)->first();
            $article->delete();
            return redirect()->back()->with('success', "Les données sont supprimées avec succès.");
        } catch (QueryException $ex){
            return view('errors.error');
        }
    }
    public function export() 
    {
        return Excel::download(new ArticlesExport, 'Articles.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {   try{
            Excel::import(new ArticlesImport,request()->file('file'));
            // if(!$row){throw new NoTypeDetectedException(message : 'User');}
        } catch (NoTypeDetectedException $ex){
            return redirect()->back()->with('danger', 'No Data in file');
        }
        return redirect()->back()->with('success', 'Les données sont importées avec succès.');
    }
    public function deleteArticle(Request $request){
        try{
        $ids = $request->ids;
        Articles::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Les données sont supprimées avec succès.');
        } catch (TypeError $e) {
            return redirect()->back()->with('danger', "Selectionner les éléments à supprimer");
        }
    }
}
