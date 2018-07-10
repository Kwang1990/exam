@extends('admin')

@section('content')

    

        <div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                          <input class="form-control" id="productname" type="text" placeholder="Product Name..">
                    </div>
                    <div class="col-4">
                          <input class="form-control" id="productsku" type="text" placeholder="SKU..">
                    </div>
                    <div class="col-4">
                          <input class="form-control" id="categoryid" type="number" placeholder="Category ID..">
                    </div>
                    <br>
                </div><br>
                <div class="row">   
                    <div class="col-4">
                          <input class="form-control" id="productprice1" type="number" placeholder="Price From..">
                    </div>
                    <div class="col-4">
                          <input class="form-control" id="productprice2" type="number" placeholder="Price to..">
                    </div>
                </div>
            </div>
            <br>
             <div class="col-4">
            <button id="search" type="button" class="btn btn-outline-primary">Search</button>
        </div>
            <br>
            <table class="table table-hover">

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>CatID</th>
                    <th>Action</th>
                </tr>
                @foreach($product as $pros)
                    <tr>
                        <td>{{$pros->id_product}}</td>
                        <td>{{$pros->product_name}} </td>
                        <td>{{$pros->product_sku}}</td>
                        <td>{{$pros->product_price}}</td>
                        <td>{{$pros->Product_image}}</td>
                        <td>{{$pros->category_id}}</td>
                        <td>
                            <a href="{{url('/admin/product/'.$pros->id_product.'/edit')}}" class="btn btn-info" role="button">Edit</a>
                            <a href="{{url('/admin/product/'.$pros->id_product.'/delete')}}" class="btn btn-danger" role="button" onclick="return confirm('Are you sure?')">Del</a>
                        </td>

                       

                    </tr>
                @endforeach
            </table>
                        
        </div>
        
                            <div id="pagination">
                                  {{$product->links()}}
                                </div>
                                <div>
                                     <a style="color: #FFF" href="{{ route('product.create')}}" class="btn btn-dark" >Add Product</a>
                            </div>
            <!-- ajax -->
            <script type="text/javascript">
//data:{'productname':$productname,'productsku':$productsku,'categoryid':$categoryid,'pricefrom':$pricefrom,'priceto':$priceto},
$('#search').on('click',function(){
$productname=$("#productname").val();
$productsku=$("#productsku").val();
$categoryid=$("#categoryid").val();
$pricefrom=$("#productprice1").val();
$priceto=$("#productprice2").val();
$.ajax({
 
type : 'get',
 
url : '/admin/product',
 
data:{'productname':$productname,'productsku':$productsku,'categoryid':$categoryid,'pricefrom':$pricefrom,'priceto':$priceto},

 success:function(data){
 console.log()
$('tbody').html(data.output);
$('#pagination').html(data.pagination);
$('#pagination .page-link').on('click',function(e){
  var _this = $(this);
  // console.log(_this.html());
  $('#pagination .page-item').removeClass('active');
  _this.parent().addClass('active');
  e.preventDefault();
  $.ajax({
    type : 'get',
    url : '/admin/product',
     
    data:{'productname':$productname,'productsku':$productsku,'categoryid':$categoryid,'pricefrom':$pricefrom,'priceto':$priceto,'page':_this.html()},
    success:function(data){
      $('tbody').html(data.output);
    }
  });
 });
}
});
})
</script>
 
<script type="text/javascript">
 
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
</script>

@endsection