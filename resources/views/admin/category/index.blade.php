<html>
    <div>
        <h3>list Category</h3>

        <div>
            <table>

                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Action</th>
                    <th><a href="{{ route('category.create')}}">Add Category</a></th>
                </tr>
                @foreach($category as $cat)
                    <tr>
                        <td>{{$cat->category_id}}</td>
                        <td>{{$cat->category_name}}</td>
                        <td>{{$cat->category_description}}</td>
                        <td>
                            <a href='category/<?php echo $cat['category_id'];?>/edit'>Edit</a>
                            <a href='category/<?php echo $cat['category_id'];?>/delete'>Del</a>
                        </td>

                       

                    </tr>
                @endforeach
            </table>
           
        </div>
        <div></div>
        <!-- @includeIf('admin.shared.activity_logs._detail_modal',[]) -->
    </div>
</html>