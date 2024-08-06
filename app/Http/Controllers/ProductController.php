<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Danhmuc;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadAllDataProductWithPager();
        return view('products.index', $this->view);
    }

    public function create()
    {
        $objCate = new Danhmuc();
        $this->view['listCate'] = $objCate->loadAllDataDanhmucWithPager(); 
        return view('products.create', $this->view);
    }

    private function uploadFile($file)
    {
        $fileName = time() . "_" . $file->getClientOriginalName();
        return $file->storeAs('image_products', $fileName, 'public');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->uploadFile($request->file('image'));
        }
        $objPro = new Product();
        $res = $objPro->insertDataProduct($data);
        if ($res) {
            return redirect()->back()->with('success', 'Sản phẩm thêm mới thành công!');
        } else {
            return redirect()->back()->with('error', 'Sản phẩm thêm mới không thành công!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(int $id)
    {
        $objCate = new Danhmuc();
        $this->view['listCate'] = $objCate->loadAllDataDanhmucWithPager(); 
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadIdDataProduct($id);
        return view('products.edit', $this->view);
    }

    public function update(StoreProductRequest $request, int $id)
    {
        $objPro = new Product();
        $checkId = $objPro->loadIdDataProduct($id);
        $imageOld = $checkId->image;
        if ($checkId) {
            $data = $request->except('image');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = $this->uploadFile($request->file('image'));
                if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                    Storage::disk('public')->delete($imageOld);
                }
            } else {
                $data['image'] = $imageOld;
            }
            $res = $objPro->updateDataProduct($data, $id);
            if ($res) {
                return redirect()->back()->with('success', 'Sản phẩm chỉnh sửa thành công!');
            } else {
                return redirect()->back()->with('error', 'Sản phẩm chỉnh sửa không thành công!');
            }
        } else {
            return redirect()->back()->with('error', 'ID không chính xác!');
        }
    }
    public function destroy(int $id)
    {
        $objPro = new Product();
        $idCheck = $objPro->loadIdDataProduct($id);
        if ($idCheck) {
            $res = $objPro->deleteDataProduct($id);
            if ($res) {
                return redirect()->back()->with('success', 'Sản phẩm xóa thành công!');
            } else {
                return redirect()->back()->with('error', 'Sản phẩm xóa không thành công!');
            }
        } else {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }
    }
}

