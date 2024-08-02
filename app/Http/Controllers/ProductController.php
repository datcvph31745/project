<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadAllDataProductWithPager();
        return view('products.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
//         $objCate = new Category();
//         $this->view['listCate'] = $objCate->loadAllDataCategory();
// //        dd($this->view['listCate']);
//         return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    // pt upload file
    private function uploadFile($file){
    //     $fileName = time()."_".$file->getClientOriginalName();
    //     return $file->storeAs('image_products', $fileName, 'public');
    }
    public function store(StoreProductRequest $request)
    {

        // // loại bỏ trường ảnh
        // $data = $request->except('image');
        // // Kiểm xem anh đã được upload thành công
        // if($request->hasFile('image') && $request->file('image')->isValid()){
        //     $data['image'] = $this->uploadFile($request->file('image'));
        // }
        // $objPro = new Product();
        // $res = $objPro->insertDataProduct($data);
        // if($res){
        //     return redirect()->back()->with('success', 'Sản phẩm thêm mới thành công!');
        // }else{
        //     return redirect()->back()->with('error', 'Sản phẩm thêm mới không thành công!');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        // $objCate = new Category();
        // $this->view['listCate'] = $objCate->loadAllDataCategory();
        // $objPro = new Product();
        // $this->view['listPro'] = $objPro->loadIdDataProduct($id);
        // return view('product.edit', $this->view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
// //        dd($request->all());
//         $objPro = new Product();
//         $checkId = $objPro->loadIdDataProduct($id);
//         $imageOld = $checkId->image;
//         if($checkId){
//             // loại bỏ trường ảnh
//             $data = $request->except('image');
//             // Kiểm xem anh đã được upload thành công
//             if($request->hasFile('image') && $request->file('image')->isValid()){
//                 $data['image'] = $this->uploadFile($request->file('image'));
//                 $flag = true;
//             }else{
//                 $data['image'] = $imageOld;
//             }
//             $res = $objPro->upadateDataProduct($data, $id);
//             if($res){
//                     if(isset($imageOld) && Storage::disk('public')->exists($imageOld)){
//                        Storage::disk('public')->delete($imageOld);
//                     }
//                 return redirect()->back()->with('success', 'Sản phẩm chỉnh sửa thành công!');
//             }else{
//                 return redirect()->back()->with('error', 'Sản phẩm chỉnh sửa không thành công!');
//             }
//         }else{
//             return redirect()->back()->with('error', 'ID không chính xác!');
//         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
//        dd($id);
//         $objPro = new Product();
//         $idCheck = $objPro->loadIdDataProduct($id);
// //        $imgOld = $idCheck->image;
//         if($idCheck){
//             $res = $objPro->deleteDataProduct($id);
//             if($res){
// //                if(isset($imgOld)){
// //                    if(Storage::disk('public')->exists($imgOld)){
// //                        Storage::disk('public')->delete($imgOld);
// //                    }
// //                }
//                 return redirect()->back()->with('success', 'Sản phẩm xóa thành công!');
//             }else{
//                 return redirect()->back()->with('error', 'Sản phẩm xóa không thành công!');
//             }
//         }else{
//             return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
//         }
    }
}
