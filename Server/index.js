var express = require("express");
var app = express();
app.use(express.static("public"));
var server = require("http").Server(app);
var io = require("socket.io")(server);
server.listen(3000);

var mang = []; // mảng dùng để lưu danh sách người dùng thời điểm hiện tại phía client

io.on("connection",function(socket){
	console.log("Co nguoi ket noi: "+socket.id);
	// console.log(socket);
	socket.on("disconnect",function(){
		var i = mang.indexOf(socket.username); // Trả về key của username trong mảng mang.
		if (i != -1) {
			mang.splice(i,1);// cắt phần tử từ vị trí i, độ dài 1. tức là cắt phần tử i ra khỏi mảng
		}
		var manghienthi = []; // mảng hiển thị được dùng để show danh sách người dùng thời điểm hiện tại phía client
		mang.map(function(r){ // Duyệt mảng
			// Đẩy vào mảng hiển thị danh sách tên người dùng mà không kèm theo id
			if(socket.username!=r){
				manghienthi.push(r.substring(0,r.indexOf("(")));
			}
			//sucbstring cắt phần tử vị trí từ 0 đến trước vị trí chứa dấu (
			//đẩy giá trị username vào mảng hiển thị trả về client
		});
		io.sockets.emit("list-user-online", manghienthi);
	});

	socket.on("user-name",function(data){
		mang.push(data+"("+socket.id+")");
		socket.username = data+"("+socket.id+")";// Thêm một thuộc tính username với giá trị được setup, dùng để phân biệt rõ ràng username, tránh trường hợp bị trùng username
		var manghienthi = [];
		mang.map(function(r){
				manghienthi.push(r.substring(0,r.indexOf("(")));
		});
		io.sockets.emit("list-user-online", manghienthi);
	});

	socket.on("end",function(){ // Khi người dùng click nút đăng xuất 
		var i = mang.indexOf(socket.username);
		if (i != -1) {
			mang.splice(i,1);
		}
		var manghienthi = [];
		mang.map(function(r){
			if(socket.username!=r){
				manghienthi.push(r.substring(0,r.indexOf("(")));
			}
		});
		io.sockets.emit("list-user-online", manghienthi);
		socket.disconnect(true);
	}); // Đóng kết nối khi người dùng đăng xuất file delete.php
	var room;
	var socketdata;
	socket.on("chat-user",function(data){
		mang.map(function(r){
			if(r.substring(0,r.indexOf("(")) == data[5]){
				socketdata = r.substring(r.indexOf("(")+1, r.indexOf(")"));
				room = r.substring(r.indexOf("(")+1, r.indexOf(")"))+socket.id;
			}
		});
		socket.phong = room;
		// socket.idd = data[0];
		// socket.idh = data[1];
		// socket.chat = data[2];
		socket.content_chat = data[3];
		data.push(room);
		var saveid = socket.id; // Lưu giữ id hiện tại
		socket.join(room);// join socket hiện tại vào room
		socket.id = socketdata; // đổi id hiện tại về id mà socket muốn tạo room cùng
		socket.join(room); // join socket này vào chung room với socket cũ
		socket.id = saveid; // gán id về id cũ và trở lại socket cũ 
		// console.log(socket.adapter.rooms);
		// io.sockets.in().emit("create-box-chat",data);
		socket.broadcast.to(socketdata).emit('create-box-chat', data);
	});
	socket.on("content-chat",function(data){
		var mang = [];
		mang.push(data);
		mang.push(socket.content_chat);
		io.sockets.in(socket.phong).emit("server-chat", mang);
	});
	socket.on("content-chat2",function(data2){
		io.sockets.in(data2[2]).emit("server-chat2", data2);
	});
});

