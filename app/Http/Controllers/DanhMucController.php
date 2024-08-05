<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = [];
    }

    // Hiển thị danh sách danh mục
    public function index()
    {
        $objDanhmuc = new Danhmuc();
        $this->view['listDanhmuc'] = $objDanhmuc->loadAllDataDanhmucWithPager();
        return view('danhmucs.index', $this->view);
    }

    // Hiển thị form tạo danh mục mới
    public function create()
    {
        return view('danhmucs.create', $this->view);
    }

    // Lưu danh mục mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $data = $request->all();

        $objDanhmuc = new Danhmuc();
        $res = $objDanhmuc->insertDataDanhmuc($data);

        if ($res) {
            return redirect()->back()->with('success', 'Danh mục thêm mới thành công!');
        } else {
            return redirect()->back()->with('error', 'Danh mục thêm mới không thành công!');
        }
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit(int $id)
    {
        $objDanhmuc = new Danhmuc();
        $this->view['danhmuc'] = $objDanhmuc->loadIdDataDanhmuc($id);

        return view('danhmucs.edit', $this->view);
    }

    // Cập nhật danh mục đã chỉnh sửa vào cơ sở dữ liệu
    public function update(Request $request, int $id)
    {
        $objDanhmuc = new Danhmuc();
        $checkId = $objDanhmuc->loadIdDataDanhmuc($id);

        if ($checkId) {
            $data = $request->all();

            $res = $objDanhmuc->updateDataDanhmuc($data, $id);
            if ($res) {
                return redirect()->back()->with('success', 'Danh mục chỉnh sửa thành công!');
            } else {
                return redirect()->back()->with('error', 'Danh mục chỉnh sửa không thành công!');
            }
        } else {
            return redirect()->back()->with('error', 'ID không chính xác!');
        }
    }

    // Xóa danh mục
    public function destroy(int $id)
    {
        $objDanhmuc = new Danhmuc();
        $idCheck = $objDanhmuc->loadIdDataDanhmuc($id);
        if ($idCheck) {
            $res = $objDanhmuc->deleteDataDanhmuc($id);
            if ($res) {
                return redirect()->back()->with('success', 'Danh mục xóa thành công!');
            } else {
                return redirect()->back()->with('error', 'Danh mục xóa không thành công!');
            }
        } else {
            return redirect()->back()->with('error', 'Danh mục không tồn tại!');
        }
    }
}
