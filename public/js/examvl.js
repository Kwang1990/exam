
$(document).ready(function () {

$("form").validate({
    // Specify validation rules
    
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      name: {
        required: true,
        string: true,
            },
      first_name: {
        required: true,
        string: true,
            },
      last_name: {
        required: true,
        string: true,
            },
      email: {
        required: true,
        email: true,
            },
      password:{
        required: true,
        string: true,
      },
      date_of_birth:{
        required: true,
        date: true,
      },
      category_name: {
        required: true,
        string: true,
      },
      category_description:{
        required: true,
        string: true,
      },
      product_name:{
        required: true,
        string: true,
      },
      product_sku:{
        required: true,
        integer: true,
      },
      product_price:{
        required: true,
        integer: true,
      },
      category_id:{
        required: true,
        integer: true,
      },
      Product_image:{
        required: true,
        image: true,
      },
    },
    // Specify validation error messages
    messages: {
      name: "nhập name của mày vào ?",
      first_name: "fist_name của mày đâu ?",
      last_name: "last_name của mày đâu ?",
      email:{
          required: 'email đâu thèn qq?',
          email: 'méo biết format của email là gì hả ?',
        },
      date_of_birth:{
        required: 'đẻ ngày nào ?',
        date: 'đúng định dạng ngày',
      },
      category_name: "nhập category name nào anh zai!",
      category_description: "mô tả đi nào anh zai",
      product_name:"nhập tên sản phẩm đi nào ku! ",
      product_sku: "nhập mã sku đi ku !",
      product_price:{
        required: "nhập giá đi ku !",
        integer: "nhập số nha ku !",
      },
      category_id:{
        required: "nhập category id nào !",
        integer: " nhập số nha ku !",
      },
      Product_image:{
        require: "up hình nào !",
        image: "file ảnh nha ku, up cái méo gì vậy !",
      },
    },
    errorPlacement: function (error, element) {
    var frmId = element.parent().attr('id') != undefined ? 'form#' + element.parent().attr('id') : '';
    var name = element.attr("name").replace(/[\W]+/gi, '');
    var errorElement = $(frmId + ' .errormsg[for=' + name + ']');
    errorElement.html();
    errorElement.html(error.html());

    console.log(name);
    console.log(error.html());

    if (error.html() != '') {
        return false;
    }
      
  },
  success: function(label) {
      _success(label);
  },
});

});
