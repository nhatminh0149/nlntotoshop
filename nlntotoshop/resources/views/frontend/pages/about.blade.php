{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
G I Ớ I T H I Ệ U - P A G E
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style=" background: linear-gradient(rgba(23, 23, 24, 0.7), rgba(30, 30, 31, 0.7)),
            url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;">
    <h3 class="ltext-105 cl0 txt-center">
        G I Ớ I &nbsp; T H I Ệ U
    </h3>
</section>
<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        GIỚI THIỆU VỀ TOTOSHOP
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        Góp mặt trên thị trường thời trang Việt Nam từ năm 2009, với 10 năm không ngừng phát triển, đổi mới và tạo dấu ấn,
                        Totoshop tự hào trở thành một trong những thương hiệu thời trang của người Việt được yêu thích nhất của giới trẻ.    
                    </p>
                    <p class="stext-113 cl6 p-b-26">
                        Với điểm mạnh về sự đa dạng mẫu mã, chất lượng trong từng sản phẩm và luôn cập nhật những xu hướng mới nhất,
                        đến với Totoshop, bạn không chỉ tìm kiếm được những thứ mình "cần" mà còn tìm thấy được những thứ mình "nên có".
                    </p>
                    <p class="stext-113 cl6 p-b-26">
                        Nếu bạn có bất kì câu hỏi nào. Hãy liên hệ với chúng tôi qua số điện thoại 1900 633 501 - 2 hoặc email: cskh@totoshop.vn để biết thêm chi tiết.
                    </p>
                </div>
            </div>
            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{ asset('themes/cozastore/images/about-01.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        NHIỆM VỤ CỦA CHÚNG TÔI
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                       Totoshop luôn đặt câu hỏi "Khách hàng cần gì và có được gì khi đến với Totoshop?".
                       Từ đó, những sản phẩm đến tay khách hàng cũng chính là những gì Totoshop muốn gửi gắm.
                       Nếu bạn đang tìm kiếm điểm dừng chân lý tưởng để thỏa sức trải nghiệm mua sắm, hãy nhớ đến với Totoshop nhé!
                        <br>
                       Bằng chứng cho sự nỗ lực của Totoshop suốt 10 năm qua chính là sự phủ rộng khắp các tỉnh phía Nam
                       với 20 cửa hàng bán lẻ. Totoshop đã và đang không ngừng nổ lực trong thời gian sớm nhất sẽ có mặt tại
                       các tỉnh miền Trung và phủ sóng rộng khắp các tỉnh miền Đông/Tây/Nam Bộ để có cơ hội đến gần với khách hàng.
                    </p>
                    <div class="bor16 p-l-29 p-b-9 m-t-5">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                           "Totoshop hiểu rằng, thời trang không phải chỉ là mặc một chiếc áo đẹp
                           mà là mặc một chiếc áo thật sự phù hợp với mình. Vì vậy, dù bạn yêu thích phong cách nào
                           hay đang trong quá trình định hình phong cách của bản thân, hãy đến với Totoshop 
                           để nhận được những gì bạn đang tìm kiếm nhé".
                        </p>
                        <span class="stext-111 cl8">
                            - ToToShop’s
                        </span>
                    </div>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('themes/cozastore/images/about-02.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
@endsection
