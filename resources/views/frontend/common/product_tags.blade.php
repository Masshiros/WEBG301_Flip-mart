@php
    $tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_cn = App\Models\Product::groupBy('product_tags_cn')->select('product_tags_cn')->get();
    $tags_vn = App\Models\Product::groupBy('product_tags_vn')->select('product_tags_vn')->get();
@endphp
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">
        @if(session()->get('language') == 'chinese') 产品标签
        @elseif(session()->get('language') == 'vietnamese') Thẻ sản phẩm
        @else Product tags
        @endif 
    </h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list"> 
            @if(session()->get('language') == 'chinese')
            @foreach($tags_cn as $tag)
            <a class="item active" title="Phone" href="{{url('product/tag/'.$tag->product_tags_cn)}}">{{ str_replace(',','',$tag->product_tags_cn)}}</a> 
            @endforeach
            @elseif(session()->get('language') == 'vietnamese')
            @foreach($tags_vn as $tag)
            <a class="item active" title="Phone" href="{{url('product/tag/'.$tag->product_tags_vn)}}">{{str_replace(',','',$tag->product_tags_vn)}}</a> 
            @endforeach
            @else
            @foreach($tags_en as $tag)
            <a class="item active" title="Phone" href="{{url('product/tag/'.$tag->product_tags_en)}}">{{str_replace(',','',$tag->product_tags_en)}}</a> 
            @endforeach
            @endif
    </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>