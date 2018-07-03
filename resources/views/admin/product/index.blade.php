<html>
    <div>
        <h3>list Product</h3>

        <div>
            <table>

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>Category ID</th>
                    <th>Action</th>
                    <th><a href="{{ route('product.create')}}">Add Product</a></th>
                </tr>
                @foreach($product as $pros)
                    <tr>
                        <td>{{$pros->id_product}}</td>
                        <td>{{$pros->product_name}} </td>
                        <td>{{$pros->product_sku}}</td>
                        <td>{{$pros->product_price}}</td>
                        <td>{{$pros->product_image}}</td>
                        <td>{{$pros->category_id}}</td>
                        <td>
                            <a href='product/<?php echo $pros['id_product'];?>/edit'>Edit</a>
                            <a href='product/<?php echo $pros['id_product'];?>/delete'>Del</a>
                        </td>

                       

                    </tr>
                @endforeach
            </table>
           
        </div>
        <div></div>
        <!-- @includeIf('admin.shared.activity_logs._detail_modal',[]) -->
    </div>
</html>