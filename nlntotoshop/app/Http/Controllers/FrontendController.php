<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham; 
use App\Sanpham;
use App\HinhThucVanChuyen;
use App\KhachHang;
use App\DonDatHang;
use App\ChiTietDonHang;
use Carbon\Carbon;

use Mail;
use App\Mail\ContactMailer;
use App\Mail\OrderMailer;
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
        // $ds_top3_newest_loaisanpham = DB::table('loaisanpham')
        //     ->join('sanpham', 'loaisanpham.l_ma', '=', 'sanpham.l_ma')
        //     ->orderBy('l_ten')->take(3)->get();

        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

         // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
         $danhsachhinhanhlienquan = DB::table('hinhanh')
         ->whereIn('sp_ma', $danhsachsanpham->pluck('sp_ma')->toArray())
         ->get();

        // Query danh sách Loại
        $danhsachloai = LoaiSanPham::all();


        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.index')
            // ->with('ds_top3_newest_loaisanpham', $ds_top3_newest_loaisanpham)
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
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
        Mail::to('tranlenhatminh97@gmail.com')->send(new ContactMailer($input));
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


        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.pages.product')
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
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

        return view('frontend.pages.product-detail')
            ->with('sp', $sanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }

    /**
     * Action hiển thị giỏ hàng
     */
    public function cart(Request $request)
    {
         // Query danh sách hình thức vận chuyển
        $danhsachvanchuyen = HinhThucVanChuyen::all();
        return view('frontend.pages.shopping-cart')
            ->with('danhsachvanchuyen', $danhsachvanchuyen);
    }

        /**
     * Action Đặt hàng
     */
    public function order(Request $request)
    {
        // dd($request);
        // Data gởi mail
        $dataMail = [];
        try {
            // Tạo mới khách hàng
            $khachhang = new Khachhang();
            $khachhang->kh_taiKhoan = $request->khachhang['kh_taiKhoan'];
            $khachhang->kh_matKhau = bcrypt('123456');
            $khachhang->kh_hoTen = $request->khachhang['kh_hoTen'];
            $khachhang->kh_gioiTinh = $request->khachhang['kh_gioiTinh'];
            $khachhang->kh_email = $request->khachhang['kh_email'];
            if(!empty($request->khachhang['kh_diaChi'])) {
                $khachhang->kh_diaChi = $request->khachhang['kh_diaChi'];
            }
            if(!empty($request->khachhang['kh_dienThoai'])) {
                $khachhang->kh_dienThoai = $request->khachhang['kh_dienThoai'];
            }
            $khachhang->kh_trangThai = 0; // Chưa kích hoạt
            $khachhang->save();

            $dataMail['khachhang'] = $khachhang->toArray();

            // Tạo mới đơn hàng
            $dondathang = new DonDatHang();
            $dondathang->kh_ma = $khachhang->kh_ma;
            $dondathang->ddh_thoiGianDatHang = Carbon::now();
            $dondathang->ddh_diaChiGiaoHang = $request->dondathang['ddh_diaChiGiaoHang'];
            $dondathang->ddh_dienThoai = $request->dondathang['ddh_dienThoai'];
            $dondathang->ddh_trangThai = 1; //Chưa xử lý
            $dondathang->htvc_ma = $request->dondathang['htvc_ma'];
            $dondathang->save();
            $dataMail['dondathang'] = $dondathang->toArray();
            
            // Lưu chi tiết đơn hàng
            foreach($request->giohang['items'] as $sp)
            {
                $chitietdonhang = new ChiTietDonHang();
                $chitietdonhang->ddh_ma = $dondathang->ddh_ma;
                $chitietdonhang->sp_ma = $sp['_id'];
                $chitietdonhang->ctdh_soLuong = $sp['_quantity'];
                $chitietdonhang->ctdh_donGia = $sp['_price'];
                $chitietdonhang->save();
                $dataMail['dondathang']['chitiet'][] = $chitietdonhang->toArray();
                $dataMail['dondathang']['giohang'][] = $sp;
            }
            // Gởi mail khách hàng
            // dd($dataMail);
            Mail::to($khachhang->kh_email)
                ->send(new OrderMailer($dataMail));
        }
        catch(ValidationException $e) {
            return response()->json(array(
                'code'  => 500,
                'message' => $e,
                'redirectUrl' => route('frontend.home')
            ));
        } 
        catch(Exception $e) {
            throw $e;
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Tạo đơn hàng thành công!',
            'redirectUrl' => route('frontend.orderFinish')
        ));
    }
    /**
     * Action Hoàn tất Đặt hàng
     */
    public function orderFinish()
    {
        return view('frontend.pages.order-finish');
    }

    public function getLogin()
    {
        return view('frontend.pages.dangnhap');
    }

    public function getRegister()
    {
        return view('frontend.pages.dangky');
    }
}