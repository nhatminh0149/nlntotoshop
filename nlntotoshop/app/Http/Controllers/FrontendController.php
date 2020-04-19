<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham; 
use App\Sanpham;
use App\KichCoSanPham;
use DB;


class FrontendController extends Controller
{
    /**
     * Action hiển thị view Trang chủ
     * GET /
     */
    public function index(Request $request)
    {
        // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
        $ds_top3_newest_loaisanpham = DB::table('loaisanpham')
            ->join('sanpham', 'loaisanpham.l_ma', '=', 'sanpham.l_ma')
            ->orderBy('l_ten')->take(3)->get();

        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

         // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
         $danhsachhinhanhlienquan = DB::table('hinhanh')
         ->whereIn('sp_ma', $danhsachsanpham->pluck('sp_ma')->toArray())
         ->get();

        // Query danh sách Loại
        $danhsachloai = LoaiSanPham::all();

        // Query danh sách kích cỡ sản phẩm
        $danhsachkichcosanpham = KichCoSanPham::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.index')
            ->with('ds_top3_newest_loaisanpham', $ds_top3_newest_loaisanpham)
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai)
            ->with('danhsachkichcosanpham', $danhsachkichcosanpham);
    }
    /**
     * Hàm query danh sách sản phẩm theo nhiều điều kiện
     */
    private function searchSanPham(Request $request)
    {
        $query = DB::table('sanpham')->select('*');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByLoaiMa = $request->query('searchByLoaiMa');
        $searchByTen = $request->query('search-product');
        if ($searchByLoaiMa != null) {

        }
        if ($searchByTen != null) {
            $query->where('sp_ten','LIKE','%'.$searchByTen.'%');
        }
        

        $data = $query->get();
        return $data;
    }

        /**
     * Action hiển thị view Giới thiệu
     * GET /about
     */
    public function about()
    {
        return view('frontend.pages.about');
    }

    /** * Action hiển thị view Liên hệ * GET /contact */ 
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /** 
     * Action gởi email với các lời nhắn nhận được từ khách hàng 
     * POST /lien-he/goi-loi-nhan 
     */ 
    public function sendMailContactForm(Request $request)
    {
        $input = $request->all();
        Mail::to('queanhst98@gmail.com')->send(new ContactMailer($input));
        return $input;
    }

    /**
     * Action hiển thị danh sách Sản phẩm
     */
    public function product(Request $request)
    {
        

        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->whereIn('sp_ma', $danhsachsanpham->pluck('sp_ma')->toArray())
                                ->get();

        // Query danh sách Loại
        $danhsachloai = LoaiSanPham::all();

        // Query danh sách kích cỡ sản phẩm
        $danhsachkichcosanpham = KichCoSanPham::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.pages.product')
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai)
            ->with('danhsachkichcosanpham', $danhsachkichcosanpham);
    }

    /**
     * Action hiển thị chi tiết Sản phẩm
     */
    public function productDetail(Request $request, $id)
    {
        $sanpham = SanPham::find($id);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->where('sp_ma', $id)
                                ->get();

        // Query danh sách Loại
        $danhsachloai = LoaiSanPham::all();

        // Query danh sách kích cỡ sản phẩm
        $danhsachkichcosanpham = KichCoSanPham::all();

        return view('frontend.pages.product-detail')
            ->with('sp', $sanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai)
            ->with('danhsachkichcosanpham', $danhsachkichcosanpham);
    }

    /**
     * Action hiển thị giỏ hàng
     */
    public function cart(Request $request)
    {
        return view('frontend.pages.shopping-cart');
    }

}