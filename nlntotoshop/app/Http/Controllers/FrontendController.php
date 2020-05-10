<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use Mail;
use App\User;
use App\LoaiSanPham; 
use App\Sanpham;
use App\HinhThucVanChuyen;
use App\KhachHang;
use App\DonDatHang;
use App\ChiTietDonHang;
use Carbon\Carbon;
use App\Mail\ContactMailer;
use App\Mail\OrderMailer;
use Session;





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
            // $khachhang = new Khachhang();
             // $khachhang->kh_taiKhoan = $request->khachhang['kh_taiKhoan'];
            // $khachhang->kh_matKhau = md5('123456');
            // $khachhang->kh_hoTen = $request->khachhang['kh_hoTen'];
            // $khachhang->kh_gioiTinh = $request->khachhang['kh_gioiTinh'];
            // $khachhang->kh_email = $request->khachhang['kh_email'];
            // if(!empty($request->khachhang['kh_diaChi'])) {
            //     $khachhang->kh_diaChi = $request->khachhang['kh_diaChi'];
            // }
            // if(!empty($request->khachhang['kh_dienThoai'])) {
            //     $khachhang->kh_dienThoai = $request->khachhang['kh_dienThoai'];
            // }
            // $khachhang->kh_trangThai = 0; // Chưa kích hoạt
            //$khachhang->save();
            
            // Lấy lại thông tin từ Khách hàng
            $kh_ma = session()->get('kh_ma');
            $khachhang = Khachhang::find($kh_ma); //SELECT * from khachhang WHERE kh_ma = ?

            $dataMail['khachhang'] = $khachhang->toArray();

            // Tạo mới đơn hàng
            $dondathang = new DonDatHang();
            // $dondathang->kh_ma = $khachhang->kh_ma;
            $dondathang->kh_ma = $kh_ma;
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

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'kh_taiKhoan' => 'required|unique:khachhang,kh_taiKhoan',
            'kh_matKhau' => 'required|min:6',
            're_kh_matKhau' => 'same:kh_matKhau',
            'kh_hoTen' => 'required',
            'kh_email' => 'required|email',
            'kh_gioiTinh' => 'required',
            // 'kh_diaChi' => 'required',
            // 'kh_dienThoai' => 'required|digits:10',
        ],[
            'kh_taiKhoan.required' => "Tên tài khoản của khách hàng không được để trống",
            'kh_taiKhoan.unique' => "Tên tài khoản này đã tồn tại. Quý khách vui lòng sử dụng tên tài khoản khác", 
            'kh_matKhau.required' => "Mật khẩu của khách hàng không được để trống", 
            'kh_matKhau.min' => "Mật khẩu phải ít nhất có 6 kí tự", 
            're_kh_matKhau.same' => "Mật khẩu không giống nhau",
            'kh_hoTen.required' => "Họ tên của khách hàng không được để trống", 
            'kh_email.required' => "Email của khách hàng không được để trống", 
            'kh_email.email' => "Email không đúng định dạng", 
            'kh_gioiTinh.required' => "Giới tính không được để trống", 
            // 'kh_diaChi.required' => "Địa chỉ của khách hàng không được để trống", 
            // 'kh_dienThoai.required' => "SĐT của khách hàng không được để trống", 
            // 'kh_dienThoai.digits' => "SĐT của khách hàng phải là số 10 kí tự", 
        ]);

        $kh = new KhachHang();
        $kh->kh_ma = $request->kh_ma;
        $kh->kh_taiKhoan = $request->kh_taiKhoan;
        $kh->kh_matKhau = md5($request->kh_matKhau);
        $kh->kh_hoTen = $request->kh_hoTen;
        $kh->kh_gioiTinh = $request->kh_gioiTinh;
        $kh->kh_email = $request->kh_email;
        // $kh->kh_diaChi = $request->kh_diaChi;
        // $kh->kh_dienThoai = $request->kh_dienThoai;
        $kh->kh_trangThai = 0; // Chưa kích hoạt

        $kh->save();
        
        return redirect()->back()->with('thanhcong', "Quý khách tạo tài khoản thành công!");
        // Session::flash('alert-warning', 'Thêm mới thành công');
        
        // return redirect()->route('danhsachkhachhang.index');
    }

    // public function __construct(){
    //     $this->middleware('cus');
    // }

    // public function logout(){
    //     Auth::logout();
    //     return redirect()->route('frontend.home');
    // }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'kh_taiKhoan' => 'required',
            'kh_matKhau' => 'required|min:6',
        ],[
            'kh_taiKhoan.required' => "Vui lòng nhập tài khoản",
            'kh_matKhau.required' => "Vui lòng nhập mật khẩu", 
            'kh_matKhau.min' => "Mật khẩu phải ít nhất có 6 kí tự", 
        ]);
        
        // $kh_taiKhoan = $request['kh_taiKhoan'];
        // $kh_matKhau = md5($request['kh_matKhau']);
        
        // print_r($kh_taiKhoan);
        // print_r('<br>');
        // print_r($kh_matKhau);
        
        // if(Auth::attempt(['kh_taiKhoan'=>$kh_taiKhoan, 'kh_matKhau'=>$kh_matKhau])){
        //     // return redirect()->back()->with( ['flag' => 'success', 'message' => "Đăng nhập thành công"] );
        //     echo "Đăng nhập thành công";
        // }
        // else{
        //     // return redirect()->back()->with( ['flag' => 'danger', 'message' => "Đăng nhập không thành công"] );
        //     echo "Đăng nhập không thành công";
            
        // }

        // $result = DB::table('khachhang')->where('kh_taiKhoan', $kh_taiKhoan)->get()->toArray();
        // // echo '<pre>';
        // // print_r($result);
        // foreach($result as $value){

        // }
        // if($value->kh_matKhau == $kh_matKhau){
        //     echo "Đăng nhập thành công";
        // }
        // else{
        //     echo $kh_matKhau;
        //     echo "<br>";
        //     echo $value->kh_matKhau;
        // }

        $khachhang = KhachHang::where("kh_taiKhoan", $request->kh_taiKhoan)
                              ->where("kh_matKhau", md5($request->kh_matKhau))->first();
        if($khachhang){
            $request->session()->put('kh_ma', $khachhang->kh_ma);
            $request->session()->put('kh_taiKhoan', $khachhang->kh_taiKhoan);
            $request->session()->put('kh_matKhau', $khachhang->kh_matKhau);
            $request->session()->put('kh_hoTen', $khachhang->kh_hoTen);
            $request->session()->put('kh_gioiTinh', $khachhang->kh_gioiTinh);
            $request->session()->put('kh_email', $khachhang->kh_email);
            // $request->session()->put('kh_diaChi', $khachhang->kh_diaChi);
            // $request->session()->put('kh_dienThoai', $khachhang->kh_dienThoai);
            return redirect()->route('frontend.home');
        }
        else{
            return redirect()->back()->with( ['flag' => 'danger', 'message' => "Đăng nhập không thành công"] );  
        }
        
    }
    public function postLogout(Request $request){
        try{
            if($request->session()->exists('kh_ma')){
                $request->session()->forget('kh_ma');
            }
            if($request->session()->exists('kh_taiKhoan')){
                $request->session()->forget('kh_taiKhoan');
            }
            if($request->session()->exists('kh_matKhau')){
                $request->session()->forget('kh_matKhau');
            }
            if($request->session()->exists('kh_hoTen')){
                $request->session()->forget('kh_hoTen');
            }
            if($request->session()->exists('kh_gioiTinh')){
                $request->session()->forget('kh_gioiTinh');
            }
            if($request->session()->exists('kh_email')){
                $request->session()->forget('kh_email');
            }
            // if($request->session()->exists('kh_diaChi')){
            //     $request->session()->forget('kh_diaChi');
            // }
            // if($request->session()->exists('kh_dienThoai')){
            //     $request->session()->forget('kh_dienThoai');
            // }
            return redirect()->route('frontend.home');
        }
        catch (Exception $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()], 200);
        }
    }
}