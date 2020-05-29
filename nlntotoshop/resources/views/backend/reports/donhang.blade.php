@extends('backend.layouts.master')

@section('title')
    Thống kê
@endsection

@section('feature-title')
    <!-- Báo cáo Đơn hàng -->
@endsection

@section('feature-description')
    <!-- Báo cáo Đơn hàng -->
@endsection

@section('custom-css')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli|Roboto|Gugi|Roboto+Mono|Roboto+Mono:wght@100;300;40|Quicksand:wght@500");
        .small-box{
            margin-bottom: 10px;
            -webkit-transition: transform 0.9s ease;
            -o-transition: transform 0.9s ease;
            -moz-transition: transform 0.9s ease;
            transition: transform 0.9s ease;
        }
        .small-box:hover{
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }
        .small-box > .inner{
            padding: 10px 10px 3px 10px;
        }
        .small-box .icon {
            -webkit-transition: all .3s linear;
            -o-transition: all .3s linear;
            transition: all .3s linear;
            position: absolute;
            top: -15px;
            right: 10px;
            z-index: 0;
            font-size: 60px;
            color: rgba(0,0,0,0.15);
            padding-right: 10px;
        }
        h3, p{
            color: white;
            font-family: 'Muli', sans-serif;
            font-weight: bold;
            letter-spacing: 1px;

        }
        h4{
            font-family: 'Muli', sans-serif;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
@endsection

@section('content')
<h4 style="background: linear-gradient(rgba(23, 23, 24, 0.98), rgba(30, 30, 31, 0.98)); color: #f6a519; margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">THỐNG KÊ</h4>

    <div class="row mt-5 mb-5">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background: #00c0ef;">
            <div class="inner">
              <h3>{{ $nhacungcap_count }}</h3>

              <p>Nhà cung cấp</p>
            </div>
            <div class="icon">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background: #00a65a;">
            <div class="inner">
              <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
              <h3>{{ $loaisanpham_count }}</h3>

              <p>Loại sản phẩm</p>
            </div>
            <div class="icon">
                <i class="fa fa-th-large" aria-hidden="true"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box"  style="background: #f39c12;">
            <div class="inner">
              <h3>{{ $sanpham_count }}</h3>

              <p>Sản phẩm</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box"  style="background: #dd4b39;">
            <div class="inner">
              <h3>{{ $khachhang_count }}</h3>

              <p>Khách hàng</p>
            </div>
            <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
    
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box"  style="background: #F012BE;">
            <div class="inner">
              <h3>{{ $hinhthucvanchuyen_count }}</h3>

              <p>Vận chuyển</p>
            </div>
            <div class="icon">
                <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box"  style="background: #3c8dbc;">
            <div class="inner">
              <h3>{{ $dondathang_count }}</h3>

              <p>Đơn đặt hàng</p>
            </div>
            <div class="icon">
                <i class="fa fa-wpforms" aria-hidden="true"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
    
        </div>

    </div>

    <!-- <h4 style="text-align: center;">THỐNG KÊ SẢN PHẨM BÁN CHẠY NHẤT</h4>
    <div class="col-md-12 mb-5">
        <canvas id="chartOfobjChartSPBC"></canvas>
        <button class="btn btn-outline-primary" id="refresh">Refresh dữ liệu</button>
    </div> -->

    <h4 style="text-align: center;">THỐNG KÊ SẢN PHẨM BÁN CHẠY NHẤT THEO THỜI GIAN</h4>
    <div class="row mb-5">
        <div class="col-md-12">
            <form method="get" action="#" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tungay">Từ ngày</label>
                    <input type="date" class="form-control" id="tungay" name="tungay">
                </div>
                <div class="form-group">
                    <label for="denngay">Đến ngày</label>
                    <input type="date" class="form-control" id="denngay" name="denngay">
                </div>
                <button type="submit" class="btn btn-primary" id="thongke">Thống kê dữ liệu</button>
            </form>
        </div>
        <div class="col-md-12">
            <canvas id="chartOfobjChartSPBC_TG" style="width: 100%;height: 400px;"></canvas>
        </div>
    </div>


    <h4 style="text-align: center;">TỔNG DOANH THU THEO THÁNG TRONG NĂM</h4>
    <div class="row">
        <div class="col-md-12">
            <form method="get" action="#" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="thang">Chọn năm</label>
                    <input type="number" class="form-control" id="thang" name="thang" min="2020">
                </div>
                <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
            </form>
        </div>
        <div class="col-md-12">
            <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
        </div>
    </div>

@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện Numeraljs -->
<script src="{{ asset('vendor/numeraljs/numeral.min.js') }}"></script>
<script>
    // Đăng ký tiền tệ VNĐ
    numeral.register('locale', 'vi', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'k',
            million: 'm',
            billion: 'b',
            trillion: 't'
        },
        ordinal: function(number) {
            return number === 1 ? 'một' : 'không';
        },
        currency: {
            symbol: 'vnđ'
        }
    });

    // Sử dụng locate vi (Việt nam)
    numeral.locale('vi');
</script>

<!-- Các script dành cho thư viện ChartJS -->
<script src="{{ asset('vendor/Chart.js/Chart.min.js') }}"></script>

<!-- Biểu đồ cho tổng doanh thu -->
<script>
    $(document).ready(function() {
        var objChart;
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");

        $("#btnLapBaoCao").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('backend.baocao.donhang.data') }}',
                type: "GET",
                data: {
                    // tuNgay: $('#tuNgay').val(),
                    // denNgay: $('#denNgay').val(),
                    thang: $('#thang').val(),
                },
                success: function(response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function() {
                        myLabels.push((this.thoiGian));
                        myData.push(this.tongThanhTien);
                    });
                    myData.push(0); // creates a '0' index on the graph

                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }

                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "bar",

                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#00c0ef",
                                borderWidth: 1
                            }]
                        },

                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                // text: "Báo cáo đơn hàng"
                                text: "Tổng doanh thu"
                            },
                            scales: {
                                xAxes: [{
                                    barPercentage: 0.6,
                                    scaleLabel: {
                                        display: true,
                                        // labelString: 'Ngày nhận đơn hàng'
                                        labelString: 'Tháng'
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            return numeral(value).format('0,0 $')
                                        }
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Tổng thành tiền'
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        return numeral(tooltipItem.value).format('0,0 $')
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });
                }
            });
        });
    });

</script>


<!-- Biểu đồ cho sản phẩm bán chạy trong csdl -->
<!-- <script>
    $(document).ready(function() {
        var objChart;
        var $chartOfobjChartSPBC = document.getElementById("chartOfobjChartSPBC").getContext("2d");

        $("#refresh").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('backend.baocao.donhang.spbanchay') }}',
                type: "GET",
                
                success: function(response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function() {
                        myLabels.push((this.Tensanpham));
                        myData.push(this.SoLuong);
                    });
                    myData.push(0); // creates a '0' index on the graph

                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }

                    $objChart = new Chart($chartOfobjChartSPBC, {
                        // The type of chart we want to create
                        type: "bar",

                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#3c8dbc",
                                borderWidth: 1
                            }]
                        },

                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Thống kê sản phẩm bán chạy"
                            },
                            scales: {
                                xAxes: [{
                                    barPercentage: 0.6,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Sản phẩm'
                                    }
                                }],
                                yAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Số lượng'
                                    }
                                }]
                            },
                            
                            responsive: true,
                        }
                    });
                },
                error:function(res) {
                    alert('Lỗi khi vẽ biểu đồ')
                }
            });
        });
    });

</script> -->


<!-- Biểu đồ cho sp bán chạy theo thời gian -->
<script>
    $(document).ready(function() {
        var objChart;
        var $chartOfobjChartSPBC_TG = document.getElementById("chartOfobjChartSPBC_TG").getContext("2d");

        $("#thongke").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('backend.baocao.donhang.spbanchaytheotg') }}',
                type: "GET",
                data: {
                    tungay: $('#tungay').val(),
                    denngay: $('#denngay').val(),
                },        
                success: function(response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function() {
                        myLabels.push((this.Tensanpham));
                        myData.push(this.SoLuong);
                    });
                    myData.push(0); // creates a '0' index on the graph

                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }

                    $objChart = new Chart($chartOfobjChartSPBC_TG, {
                        // The type of chart we want to create
                        type: "bar",

                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#3c8dbc",
                                borderWidth: 1
                            }]
                        },

                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Thống kê sản phẩm bán chạy"
                            },
                            scales: {
                                xAxes: [{
                                    barPercentage: 0.6,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Sản phẩm'
                                    }
                                }],
                                yAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Số lượng'
                                    }
                                }]
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });
                },
                error:function(res) {
                    alert('Lỗi khi vẽ biểu đồ')
                }
            });
        });
    });

</script>

@endsection