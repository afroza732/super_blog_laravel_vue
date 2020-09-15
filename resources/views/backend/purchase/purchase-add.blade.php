@extends('backend.master')
@section('title')
Pos|User
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Manage User</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <div class="card-header">
                        <h4 class="m-0 text-dark">Add User
                            <a href="{{Route('users.view')}}" class="btn btn-sm btn-primary float-right" title="Edit">
                                <i class="fa fa-list">User List</i>
                            </a
                        </h4>
                    </div>
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{Route('users.store')}}" id="myForm">
                                @csrf

                                <div class="col-md-12" style="padding-left: 10px; padding-right: 10px;">
                                    <br>
                                    <p id="salePricee" style="max-height:3px;"></p>
                                    <br>
                                    <table id="productInfoTable" class="table table-bordered responsive">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Product</th>

                                                <th style="text-align:center;">Qty</th>
                                                <th style="text-align:center;">Price</th>
                                                <th style="text-align:center;">Total</th>
                                                <th style="text-align:center;">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select style="width: 100%; padding-top:6px; font-size: 11px;" class="productCode  select2">
                                                        <option>Select product</option>
                                                        <!--  <option hidden name="productId" id="productId" class="productId "></option> -->
                                                        @foreach($productNames as $productName)
                                                        <option value="{{$productName->id}}" class="productCodeId">{{str_pad($productName->code,3,"0",STR_PAD_LEFT )}} - {{$productName->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td hidden><span class="productId" id="productId"/></spsn></spsn></td>
                                                <td hidden><span class="productName"/></spsn></spsn></td>
                                                <td hidden><span class="productCodeIde"/></spsn></spsn></td>
                                                <td><input type="text" name="qty" class="quantityCal" /></td>
                                                <td><span class="productPrice"/></spsn></td>

                                                <td><span ><span class="totalPrice"/></span></td>
                                                <td class="btn btn-primary addToChartBtn">Add to chart</td>

                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12" style="padding-left: 10px; padding-right: 10px;">
                                    <div class="form-group">
                                        <div class="col-sm-6 text-right" style="padding: 20px 20px 0px 0px;">
                                            <span class="btn btn-success" id="submit">Save</span>

                                            <a href="{{url('pos/purchase/')}}" class="btn btn-danger closeBtn">Close</a>
                                            <span id="success" style="color:green; font-size:20px;" class="pull-right"></span>
                                        </div>
                                    </div>
                                </div> 
                        </div>  
                    </div>

                    </form>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>
</div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
//onchange product code

        $('.productCode').change(function () {
            if ($(this).val() != '') {
                var productCode = $(this).val();
                $.ajax({
                    url: './purchaseAddProductNameOnChangeProductCode',
                    type: 'GET',
                    data: {productCode: productCode},
                    dataType: 'json',
                    success: function (data) {
                        // console.log(data);
                        var productName = data['name'];
                        var productPrice = data['costPrice'];
                        var productId = data['id'];
                        var productCode = data['code'];
                        //var product = productCode - productName;
                        // console.log(data['id']);
                        $('.productName').html(productName);
                        $('.productPrice').html(productPrice);
                        $('#productId').html(productId);
                        $('.productCodeIde').html(productCode);
                    }
                });
            }
        })
        //quantity calculation on input

        $('.quantityCal').on('input', function () {
            var qty = $(this).val();
            var price = $('.productPrice').html();
            ;

            var total = price * qty;
            $('.totalPrice').html(total);


        })

        //onchange supplier 
        $('#supplierTypeId').on('change', function () {

            if ($(this).val() != '') {
                var supplierId = $(this).val();

                $.ajax({
                    url: './getBillNoOnChangeSupplierId',
                    type: 'GET',
                    data: {supplierId: supplierId},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $("#billNoId").val(data);
                    }
                });
            }


            //alert(supplierId);

        })

        //Add to chart button 
        var i = 1;
        $('.addToChartBtn').on('click', function () {
            var productname = $('.productName').html();
            var productCode = $('.productCodeIde').html();
            var productId = $('.productId').html();

            var qty = $('.quantityCal').val();
            var price = $('.productPrice').html();
            ;
            var total = price * qty;

            if (productname == "") {
                alert('Please insert product');
            } else if (qty == "") {
                alert('Please insert quantity');
            } else {
                $('.productName').html('');
                $('.productPrice').html('');
                $('.totalPrice').html('');
                $('.quantityCal').val('');
                //add more product field
                i++;
                $('#productInfoTable').append('<tr id="row' + i + '" class="calulationTotal"><td><span class="productId">' + productname + ' - ' + productCode + '</span></td><td hidden><span class="productIdD">' + productId + '</span></td><td><span class="purchaseQuantity">' + qty + '</span></td><td><span class="price">' + price + '</span></td><td><span class="purchasePrice">' + total + '</span></td><td><button class="remove_field"  style="float:right; color:red">X</button</td></tr>'

                        );

            }
            calQuantityPrice();

        })

        $("#productInfoTable")
                .on('input', 'input', calQuantityPrice)
                .on('click', '.remove_field', function () {
                    $(this).closest("tr").remove();
                    calQuantityPrice();
                });


        function calQuantityPrice() {
            var totalQuantity = 0;
            var totalPrice = 0;
            $('#productInfoTable .calulationTotal .purchaseQuantity').each(function () {
                var quantity = $(this).html();
                totalQuantity += parseFloat(quantity);
            })
            $('#productInfoTable .calulationTotal .purchasePrice').each(function () {
                var price = $(this).html();
                totalPrice += parseFloat(price);
            })
            //console.log(totalPrice);
            $('.totalQty').html(totalQuantity);
            $('.totalAmount').html(totalPrice);

            $('#totalQuantity').val(totalQuantity);
            $('#totalAmount').val(totalPrice);
            $('#afterDiscount').val(totalPrice);
            $('#puchaseDue').val(totalPrice);
            $('#grossTotal').val(totalPrice);
        }

        $('#productInfoTable').append('<td colspan="1" style="text-align:center"><strong>Total Quantity</strong></td><td style="text-align:center"><strong class="totalQty">0</strong></td><td style="text-align:center; font-weight:bold;"><strong class=""/>Total price</strong></td><td style="text-align:center; font-weight:bold;"><strong class="totalAmount"/></strong></td>');

//discount balance
        $('#discount, #vatAmount, #payAmount').on('input', function () {
            discountAmount();
        })

        function discountAmount() {
            var discountPercentage = parseFloat($("#discount").val());
            if (Number.isNaN(Number(discountPercentage)))
                discountPercentage = 0;
            var totalAmountData = $('#totalAmount').val();

            var discountAmount = totalAmountData * (discountPercentage / 100);
            $('#discountTotal').val(discountAmount);
            var totalAfterDiscount = totalAmountData - discountAmount;
            $('#afterDiscount').val(totalAfterDiscount);
            $('#puchaseDue').val(totalAfterDiscount);
            $('#grossTotal').val(totalAfterDiscount);

            //vat amount calculation

            var vatAmountPercentage = parseFloat($('#vatAmount').val());
            if (Number.isNaN(Number(vatAmountPercentage)))
                vatAmountPercentage = 0;
            var afterDiscount = $('#afterDiscount').val();

            var vatAmount = afterDiscount * (vatAmountPercentage / 100);
            $('#vatAmountTotal').val(vatAmount);

            var totalAfterVat = parseFloat(afterDiscount) + parseFloat(vatAmount);
            $('#grossTotal').val(totalAfterVat);
            $('#puchaseDue').val(totalAfterVat);
            $('#grossTotal').val(totalAfterVat);

            //pay amount calculation

            var grossTotalAmount = $('#grossTotal').val();
            var payAmount = $('#payAmount').val();
            var purchaseDueAmount = grossTotalAmount - payAmount;
            $('#puchaseDue').val(purchaseDueAmount);
        }

        function inputAmount() {
            var discountAmount = parseFloat($("#discountTotal").val());
            if (Number.isNaN(Number(discountAmount)))
                discountAmount = 0;
            var totalAmountData = $('#totalAmount').val();


            var totalAfterDiscount = parseFloat(totalAmountData) - parseFloat(discountAmount);
            $('#afterDiscount').val(totalAfterDiscount);
            $('#puchaseDue').val(totalAfterDiscount);
            $('#grossTotal').val(totalAfterDiscount);

            //vat amount calculation

            var vatAmount = parseFloat($('#vatAmountTotal').val());
            if (Number.isNaN(Number(vatAmountTotal)))
                vatAmountTotal = 0;
            var afterDiscount = $('#afterDiscount').val();

            var totalAfterVat = parseFloat(afterDiscount) + parseFloat(vatAmount);
            $('#grossTotal').val(totalAfterVat);
            $('#puchaseDue').val(totalAfterVat);
            $('#grossTotal').val(totalAfterVat);

            //pay amount calculation

            var grossTotalAmount = $('#grossTotal').val();
            var payAmount = $('#payAmount').val();
            var purchaseDueAmount = grossTotalAmount - payAmount;
            $('#puchaseDue').val(purchaseDueAmount);
        }

        $('#discountTotal, #vatAmountTotal').on('input', function () {
            inputAmount();
        })

//add pur
        $("#submit").click(function (event) {

            var productID = [];
            var quantity = [];
            var price = [];
            var total = [];
            var productInfo = $('#productInfoTable .calulationTotal');
            var productId = $('.productCode').val();
            console.log(productId);
            productInfo.each(function () {
                var inputProductId = $(this).find('.productIdD').text();
                var inputQuantity = $(this).find('.purchaseQuantity').text();
                var purchasePrice = $(this).find('.price').text();
                var totalPrice = $(this).find('.purchasePrice').text();
                productID.push(inputProductId);
                quantity.push(inputQuantity);
                price.push(purchasePrice);
                total.push(totalPrice);

            })

            //console.log(quantity);
//alert(productDetails);
            var productId = $(".productCodeId").val();



            var csrf = "<?php echo csrf_token(); ?>";


            var formData = new FormData();
            formData.append('quantity', JSON.stringify(quantity));
            formData.append('price', JSON.stringify(price));
            formData.append('total', JSON.stringify(total));
            formData.append('productID', JSON.stringify(productID));
            formData.append('_token', csrf);


            $.ajax({
                processData: false,
                contentType: false,
                type: 'post',
                url: './posSavePurchaseItem',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    window.location.href = "{{ url('pos/purchase/')}}";
                }
            });

        });


    });
</script>
{{-- End Filtering --}}
{{-- Get Product Information --}}

<script type="text/javascript">
    $(document).ready(function () {

        $("#purchaseDate").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1998:c",
            maxDate: "dateToday",
            dateFormat: 'dd-mm-yy',
            onSelect: function () {
                $('#purchaseDatee').hide();
            }
        });
    });

    $('.select2').select2();

</script>

@endsection



