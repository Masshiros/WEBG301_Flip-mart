<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    {{-- AJAX --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    {{-- STRIPE UI --}}
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
   @include('frontend.body.header')

    <!-- ============================================== HEADER : END ============================================== -->
   @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{Session::get('message') }}");
            break;
    }
    @endif
    </script>
<!-- ADD TO CART MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pname"><strong><span id="pname"></span></strong></h5>
          <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top"  alt="..." style="height: 200px; width: 200px" id="pimage">
                  </div>
            </div><!-- end col-4 -->
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">Product Price: <strong class="text-danger">
                        $<span id="pprice"></span></strong>
                    <del id="oldprice">$</del> 
                </li>
                    <li class="list-group-item">Product Code: <strong id="pcode"></strong> </li>
                    <li class="list-group-item">Category: <strong id="pcategory"></strong> </li>
                    <li class="list-group-item">Brand: <strong id="pbrand"></strong> </li>
                    <li class="list-group-item">Stock: 
                        <span class="badge badge-pill badge-success" id="available" style="background: green; color:white;"></span>
                        <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color:white;"></span>
                     </li>
                  </ul>
                
            </div><!-- end col-4 -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Choose Color</label>
                    <select class="form-control"  id="color" name="color">
                     
                     
                    </select>
                </div><!-- end form-group -->
                <div class="form-group" id="sizeArea">
                    <label for="exampleFormControlSelect1">Choose Size</label>
                    <select class="form-control"  id="size" name="size">
                      
                    </select>
                </div><!-- end form-group -->
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" value="1" min="1">
                  </div><!-- end form-group -->
                  <input type="hidden" id="product_id">
                  <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to cart</button>
            </div><!-- end col-4 -->
         </div> <!-- end row -->
        </div>
       
      </div>
    </div>
  </div>
  <!-- END ADD TO CART MODAL -->

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
// start product view with modal
function productView(id){
       $.ajax({
        type: 'GET',
        url: `/product/view/modal/${id}`,
        dataType: 'json',
        success:function(data){
            // console.log(data);
            $('#pname').text(data.pname);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.category);
            $('#pbrand').text(data.brand);
            $('#pimage').attr('src','/'+data.product.product_thumbnail);
            $('#product_id').val(id);
            $('#quantity').val(1);
            // Product Price
            if(data.product.discount_price == null){
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            } // end product price

            // stock 
            if(data.product.product_quantity > 0){
                $('#stockout').text('');
                $('#available').text('');
                $('#available').text('Available');
            }else{
                $('#available').text('');
                $('#stockout').text('');
                $('#stockout').text('Out of stock');

            } // end stock

            //color
            $('select[name="color"]').empty();
            $.each(data.color,function(key,value){
                $('select[name="color"]').append(`<option value="${value}">${value} </option>`)
            })
            //size
            $('select[name="size"]').empty();
            $.each(data.size,function(key,value){
                $('select[name="size"]').append(`<option value="${value}">${value} </option>`)
                if(data.size == ""){
                    $('#sizeArea').hide();
                }else{
                    $('#sizeArea').show();
                }
            })
        }
       })
    }
// end product view with modal

// Start Add to Cart Product
function addToCart(){
    var product_name = $('#pname').text();
    var id = $('#product_id').val();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();
    var quantity = $('#quantity').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: `/cart/data/store/${id}`,
        data: {
            color: color, 
            size: size,
            quantity: quantity,
            product_name: product_name,
        },
        success:function(data){
            miniCart();
            $('#closeModal').click();
            // console.log(data);
            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
            // End Message
        }
    })
}

// End Add to Cart Product
</script>
<script type="text/javascript">
    function miniCart(){
        $.ajax({
            type: 'GET',
            url: `/product/mini-cart`,
            dataType: 'json',
            success: function(response){
                // console.log(response);
                $('span[id=cartSubTotal]').text(response.cartTotal);
                $('#cartQuantity').text(response.cartQuantity);
                var miniCart = "";
                $.each(response.carts, function(key,value){
                    miniCart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="/${value.options.image}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">$${value.price}- Qty:${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>`
                             });
                $('#miniCart').html(miniCart);
            }
        })
    }
miniCart();
// remove mini cart Start
function miniCartRemove(id){
    $.ajax({
        type: 'GET',
        url: '/product/mini-cart/remove/'+id,
        dataType: 'json',
        success:function(data){
            miniCart();
            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
            // End Message
        }
    })
}
// remove mini cart End
</script>

{{-- // Start add to wishlist page  --}}

<script type="text/javascript">
    function addToWishList(id){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: `/add-to-wishlist/${id}`,
            success: function(data){
                 // Start Message
            const Toast = Swal.mixin({
                toast: true,
                
                
                showConfirmButton: false,
                timer: 3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        
                        icon: 'success',
                        position: 'top-end',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        
                        icon: 'error',
                        position: 'top-end',
                        title: data.error
                    })
                }
            // End Message
            }
        })
    }
</script>
{{-- // END add to wishlist page --}}

{{-- LOAD WISH LIST DATA START --}}
<script type="text/javascript">
    function wishlist(){
        $.ajax({
            type: 'GET',
            url: `/user/get-wishlist-product`,
            dataType: 'json',
            success: function(response){
                // console.log(response);
                
                var rows = "";
                $.each(response, function(key,value){
                    rows += `<tr>
                            <td class="col-md-2"><img src="/${value.product['product_thumbnail']}" alt="imga"></td>
                            <td class="col-md-7">
                                <div class="product-name"><a href="#">${value.product['product_name_en']}</a></div>
                                <div class="price">
                                    ${value.product.discount_price == null
                                        ? `$${value.product.selling_price}`
                                        : `$${value.product.discount_price} 
                                        <span>$${value.product.selling_price}</span>`
                                    }
                                </div>
                            </td>
                            <td class="col-md-2">
                                <button class="btn btn-primary icon" type="button"
                                    title="Add Cart" data-toggle="modal" data-target="#exampleModal" 
                                    id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
                            </td>
                            <td class="col-md-1 close-btn">
                               <button type="submit" class="" onclick="wishlistRemove(${value.product_id})"><i class="fa fa-times"></i></button> 
                            </td>
                        </tr>`
                             });
                $('#wishlist').html(rows);
            }
        })
    }
wishlist();
// remove wishlist Start
function wishlistRemove(product_id){
    $.ajax({
        type: 'GET',
        url: `/user/wishlist-remove/${product_id}`,
        dataType: 'json',
        success:function(data){
            wishlist();
            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                
                showConfirmButton: false,
                timer: 3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        
                        icon: 'error',
                        title: data.error
                    })
                }
            // End Message
        }
    })
}
// remove wishlist End
</script>
{{-- END WISH LIST DATA START --}}

{{-- Load My Cart --}}
{{-- LOAD MY CART DATA START --}}
<script type="text/javascript">
    function cart(){
        $.ajax({
            type: 'GET',
            url: `/user/get-cart-product`,
            dataType: 'json',
            success: function(response){
                // console.log(response);
                
                var rows = "";
                $.each(response.carts, function(key,value){
                    rows += `<tr>
                            <td class="col-md-2"><img src="/${value.options.image}" alt="image" style="width:60px; height:60px;"></td>
                            <td class="col-md-2">
                                <div class="product-name"><a href="#">${value.name}</a></div>
                                <div class="price">
                                    $${value.price}
                                </div>
                            </td>
                            <td class="col-md-2">
                                <strong>${value.options.color}</strong>
                            </td>
                            <td class="col-md-2">
                                ${value.options.size == null 
                                ? `<span>....</span>` 
                                : `<strong>${value.options.size}</strong>`    
                             }    
                            </td>
                            <td class="col-md-2">
                                ${value.qty > 1
                                ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                : `<button type="submit" class="btn btn-danger btn-sm" disabled>-</button>`
                                
                                } 
                                <input type="text" value="${value.qty}" min="1" max="100" disabled style="width:25px;">
                                <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                            </td>
                            <td class="col-md-1">
                                <strong>$${value.subtotal}</strong>
                            </td>
                            <td class="col-md-1 close-btn">
                               <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button> 
                            </td>
                        </tr>`
                             });
                $('#cartPage').html(rows);
            }
        })
    }
cart();
// cart remove Start
function cartRemove(id){
    $.ajax({
        type: 'GET',
        url: `/user/cart-remove/${id}`,
        dataType: 'json',
        success:function(data){
            couponCalculation();
            cart();
            miniCart();
            $('#couponField').show();
            $('#coupon_name').val('');
            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                
                showConfirmButton: false,
                timer: 3000
                })
                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        
                        icon: 'error',
                        title: data.error
                    })
                }
            // End Message
        }
    })
}
// remove cart End

// CART INCREMENT START

function cartIncrement(id){
    $.ajax({
        type: 'GET',
        url: `/cart-increment/${id}`,
        dataTYpe: 'json',
        success: function(data){
            couponCalculation();
            cart();
            miniCart();
        }
    })
}

// CART INCREMENT END
// CART DECREMENT START

function cartDecrement(id){
    $.ajax({
        type: 'GET',
        url: `/cart-decrement/${id}`,
        dataTYpe: 'json',
        success: function(data){
            couponCalculation();
            cart();
            miniCart();
        }
    })
}

// CART DECREMENT END

</script>
{{-- //////////////////////////// ===================== Coupon Apply Start =================///////////////////////// --}}
<script text="text/javascript">
    function applyCoupon(){
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {coupon_name: coupon_name},
            url: "{{url('/coupon-apply')}}",
            success: function(data){
                couponCalculation();
                if(data.validity == true){
                    $('#couponField').hide();
                }
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    
                    showConfirmButton: false,
                    timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            
                            icon: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({  
                            icon: 'error',
                            title: data.error
                        })
                    }
                // End Message
            }
        })
    }
// calculate total after apply coupon START
function couponCalculation(){
    $.ajax({
        type: 'GET',
        url: "{{url('/coupon-calculation')}}",
        dataType: 'json',
        success: function(data){
            if(data.total){
                $('#couponCalField').html(`
                <tr>
                    <th>
                        <div class="cart-sub-total">
                            Subtotal<span class="inner-left-md">$${data.total}</span>
                        </div>
                        <div class="cart-grand-total">
                            Grand Total<span class="inner-left-md">$${data.total}</span>
                        </div>
                    </th>
                </tr>
                `)
            }else{
                $('#couponCalField').html(`
                <tr>
                    <th>
                        <div class="cart-sub-total">
                            Subtotal<span class="inner-left-md">$${data.subtotal}</span>
                        </div>
                        <div class="cart-sub-total">
                            Coupon<span class="inner-left-md">$${data.coupon_name}</span>
                            <button type="submit" onclick="couponRemove()"> <i class="fa fa-times"></i> </button>
                        </div>
                        <div class="cart-sub-total">
                            Discount Amount<span class="inner-left-md">$${data.discount_amount}</span>
                        </div>
                        <div class="cart-grand-total">
                            Grand Total<span class="inner-left-md">$${data.total_amount}</span>
                        </div>
                    </th>
                </tr>
                `)
            }
        }
    })
}
couponCalculation();
</script>

{{-- //////////////////////////// ===================== Coupon Apply End =================///////////////////////// --}}

{{-- //////////////////////////// ===================== Coupon REMOVE start =================///////////////////////// --}}
<script type="text/javascript">
    function couponRemove(){
        $.ajax({
        type: 'GET',
        url: "{{url('/coupon-remove')}}",
        dataType: 'json',
        success: function(data){
            couponCalculation();
            $('#couponField').show();
            $('#coupon_name').val('');
            // Start Message
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    
                    showConfirmButton: false,
                    timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            
                            icon: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            
                            icon: 'error',
                            title: data.error
                        })
                    }
                // End Message
            }
        })
    }
</script>

{{-- //////////////////////////// ===================== Coupon REMOVE End =================///////////////////////// --}}
</body>

</html>