 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_teacher_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"http://localhost/Unisole/control-admin-views/fetch-user-teacher.php",
     type:"POST"
   }
 });
 }
 $('#add_teacher').click(function(){
   // var html = '<tr>';
   // html += '<td contenteditable id="data1"></td>';
   // html += '<td contenteditable id="data2"></td>';
   // html += '<td contenteditable id="data3"></td>';
   // html += '<td contenteditable id="data4"></td>';
   // html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   // html += '</tr>';
   // $('#user_data tbody').prepend(html);
   $('#fade2').popup({
    transition: 'all 0.3s',
    autoopen: true,
    closeelement: '.my_popup_close2'
  });
 });

 $(".form-add-user2").on('submit', function(){
  var username = $('#data6').val();
  var email = $('#data7').val();
  var phone = $('#data8').val();
  var fullname = $('#data9').val();
  var password = $('#data10').val();
  var url = $(this).attr("action");
  var method = $(this).attr("method");
  var patt = /^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/;
  if(username == '' || email == '' || fullname == '' || password ==''){
    $('#fadeandscale').html("Vui lòng nhập đầy đủ nội dung!");
    $('#fadeandscale').popup({
      transition: 'all 0.3s',
      autoopen: true
    });
  }
  else if(!patt.test(password)){
    $('#fadeandscale').html("Mật khẩu không đúng định dạng! Mật khẩu bao gồm:  Cả ký tự chữ cái hoa, thường, chữ số, ký tự đặc biệt, dấu chấm. Bắt đầu với ký tự in hoa Có từ 6 đến 32 ký tự .Ví dụ: User@123");
    $('#fadeandscale').popup({
      transition: 'all 0.3s',
      autoopen: true
    });
  }else
  {
    $.ajax({
     url:url,
     method:method,
     data:{username:username, email:email, phone:phone, fullname: fullname, password: password},
     success:function(data)
     {
          // $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');

          $('#fadeandscale').html("");
          $('#fadeandscale').append('<button class="my_popup_close btn btn-info">'+data+'</button>');
          $('#fadeandscale').popup({
            transition: 'all 0.3s',
            autoopen: true,
            closeelement: '.my_popup_close'
          });
          $('#user_teacher_data').DataTable().destroy();
          fetch_data();
        }
      });
    $("#data1").val("");
    $("#data2").val("");
    $("#data3").val("");
    $("#data4").val("");
    $("#data5").val("");
        // setInterval(function(){
        //  $('#alert_message').html('');
        // }, 5000);
        
      }
      return false;
    });
 $(document).on('click', '.delete2', function(){
   var id = $(this).attr("id");
   if(confirm("Bạn chắc chắn muốn xóa user này?"))
   {
    $.ajax({
     url:"http://localhost/Unisole/control-admin-views/delete-user-teacher.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message2').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_teacher_data').DataTable().destroy();
      fetch_data();
    }
  });
    setInterval(function(){
     $('#alert_message2').html('');
   }, 5000);
  }
});
 function update_data(id, column_name, value)
 {
  $.ajax({
    url:"http://localhost/Unisole/control-admin-views/update-user-teacher.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message2').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_teacher_data').DataTable().destroy();
     fetch_data();
   }
 });
  setInterval(function(){
    $('#alert_message2').html('');
  }, 10000);
}

$(document).on('blur', '.update2', function(){
 var id = $(this).data("id");
 var column_name = $(this).data("column");
 var value = $(this).text();
 if(confirm("Bạn đã chắc chắn về những thay đổi của mình?")){
   update_data(id, column_name, value);
 }else{
   $('#user_teacher_data').DataTable().destroy();
   fetch_data();
 }

});
});
