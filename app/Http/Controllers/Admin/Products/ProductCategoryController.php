<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\ProductCategoryUpdateRequest;
use App\Models\Products\ProductCategory;
use Illuminate\Http\Request;
use App\Repositories\Products\ProductCategoryRepository;
//use App\Filters\Products\ProductCategoryFilters;

class ProductCategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(){
        $this->categoryRepository = new ProductCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->GetAllWithPagination($request);
        $parentCategories = $this->categoryRepository->GetParentForSelect();

        return view('admin.products.categories.index', compact('categories', 'parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->GetEdit($id);
        $categoryList = $this->categoryRepository->GetForSelect();

        return view('admin.products.categories.edit', compact('category', 'categoryList'));
    }

    /**
     * @param ProductCategoryUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductCategoryUpdateRequest $request, $id)
    {
        $item = $this->categoryRepository->GetEdit($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg'=>"The raw with id={$id} not found!"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item
            ->fill($data)
            ->save();

        if($result){
            return back()
                ->with(['success'=>"Категория была успешно изменена!"]);
        }else{
            return back()
                ->withErrors(['msg'=>"Ошибка! Повторите попытку позже"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->categoryRepository->GetEdit($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg'=>"Категория не найдена!"]);
        }

        $result = ProductCategory::destroy($id);

        if($result){
            echo "Категория была успешно удалена!";
//            return redirect()
//                ->route('admin.products.categories.index')
//                ->with([
//                    'success'=>"Категория была успешно удалена!"
//                ]);
        }else{
            echo "Ошибка! Попробуйте позже!";
//            return back()
//                ->withErrors(['msg'=>"Ошибка! Попробуйте позже!"]);
        }
    }

}
