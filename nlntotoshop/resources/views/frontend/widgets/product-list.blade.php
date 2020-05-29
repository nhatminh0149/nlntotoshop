<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .flex-container {
            display: flex;
        }
        .search-icon{
            background: black;
            height: 40px;
            border-radius: 50px;
            padding: 10px;
            border: 1px solid #e2e5e9;
        }
        .search-icon .search-btn{
            color: black;
            float: right;
            width: 100px;
            height: 28px;
            border-radius: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            margin-top: -5px;
            background: black;
            color: whitesmoke;
        }
        .search-icon:hover > .search-txt{
            width: 200px;
            padding: 0 5px;
        }
        .search-icon:hover > .search-btn{
            background: white;
            color: black;
        }
        .search-icon .search-txt{
            border: none;
            background: none;
            outline: none;
            float: left;
            color: whitesmoke;
            font-size: 16px;
            transition: 0.4s;
            width: 0px;
            transition: 0.4s;
            margin-top: -3px;
        }
    </style>
</head>
<body>
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
                        Tất cả
                    </button>

                    @foreach($danhsachloai as $loai)
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".loai-{{ $loai->l_ma }}">
                        {{ $loai->l_ten }}
                    </button>
                    @endforeach
                </div>

                <!-- Search product -->
                <!-- <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>                       
                    </div>
                </div> -->

               <form action="{{ route('frontend.product')}}">
                    <div class="flex-container search-icon">
                        <input class="flex-c-m search-txt" type="text" name="search-product" placeholder="Tên sản phẩm">
                        <input class="flex-c-m search-btn" type="submit" value="Tìm kiếm">
                    </div>
                </form>
            </div>

            <div class="row isotope-grid">
                @foreach($data as $index=>$sp)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item loai-{{ $sp->l_ma }}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" alt="IMG-PRODUCT" style="width: 200px; height: 270px;">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal" data-sp-ma="{{ $sp->sp_ma }}">
                                {{ __('totoshop.xemchitiet') }}
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <span class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $sp->sp_ten }} 
                                </span>

                                <span class="stext-105 cl3">
                                    {{ number_format($sp->sp_gia, 0, ',' , ',') }} VNĐ
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Modal quick view -->
                    @include('frontend.widgets.product-quick-view', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>

