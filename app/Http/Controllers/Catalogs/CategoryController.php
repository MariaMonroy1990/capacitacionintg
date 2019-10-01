<?php

namespace App\Http\Controllers\Catalogs;

use App\Core\Eloquent\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Facades\App\Core\Facades\AlertCustom;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Hola";
       //dd(request());

       //AlertCustom::success('inicio');
       $categories=
         Category::where('name','ILIKE',"%".request()->get('filter')."%")
         ->paginate(3);
       return view('categories.index',compact('categories'));
     /*
       $categories=Category::all();
       return view('categories.index',compact(['categories'=>$categories]));

       return view('categories.index')->with(['categories'=>Category::all()]);
    */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //dd(request);

        // el FILLEABLE esta en Category
        // todo lo que venga del formulario va hacer maching en el filleable de mi modelo de base de datos , pero no es recomendable hacer si en el filleable 
        //tengo data sencible
       // Category::create($request->all()); 
       
       
       // de todo lo que venga informacion del formulario solo acepto estos campos
       // Category::create($request->only(['name','description']));

      // solo las reglas que pasaron la validacion
        Category::create($request->validated());
        AlertCustom::success('Ingresado correctamente');

         return redirect()->route('categories.index');// redirecciono a un ruta
        // return view('categorties.index');// redirecciono a un ruta

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->validate());
        $category->save();
        AlertCustom::success('Actualizado correctamente');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        AlertCustom::success('Eliminado correctamente');
        return redirect()->route('categories.index');
    }
}
