<html>
    <div>
        <h3>list Product</h3>

        <div>
            <table>

                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Product SKU</th>
                    <th>Product Price</th>
                    <th>Product Images</th>
                    <th>detail</th>
                   
                </tr>
                @foreach($product as $pros)
                    <tr>
                        <td>{{$pros->id_product}}</td>
                        <td>{{$pros->product_name}} </td>
                        <td>{{$cat->product_sku}}</td>
                        <td>{{$cat->product_price}}</td>
                        <td>{{$cat->product_image}}</td>
                        <td><a href="{{route('product.detail', $pros->id_product)}}">?</a></td>

                       

                    </tr>
                @endforeach
            </table>
           
        </div>
        <div></div>
        <!-- @includeIf('admin.shared.activity_logs._detail_modal',[]) -->
    </div>
</html>