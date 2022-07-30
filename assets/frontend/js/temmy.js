function success(title, desc, reload) {
	if (reload == "true") {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'success',
			html: '<span style="color:gray">' + desc + '</span>',
			showConfirmButton: true,
		}).then(function (isConfirm) {
			var url = "";
			if (isConfirm === true) {
				$(location).attr('href', url);
			} else {
				$(location).attr('href', url);
			}
		})
	} else {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'success',
			html: '<span style="color:gray">' + desc + '</span>',
			showConfirmButton: true,
		})
	}
}
function isuccess(title, desc, reload, url) {
	if (reload == "true") {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'success',
			html: '<span style="color:gray">' + desc + '</span>',
			showConfirmButton: true,
		}).then(function (isConfirm) {
			if (isConfirm === true) {
				$(location).attr('href', url);
			} else {
				$(location).attr('href', url);
			}
		})
	} else {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'success',
			html: '<span style="color:gray">' + desc + '</span>',
			showConfirmButton: true,
		})
	}
}

function error(title, desc, reload) {
	if (reload == "true") {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'error',
			html: '<span style="color:gray">' + desc + '</span>',
			confirmButtonText: '<span style="color:black;"><i class="fa fa-times"></i> ปิด</span>',
			confirmButtonColor: '#e54d40',
		}).then(function (isConfirm) {
			var url = "";
			if (isConfirm === true) {
				$(location).attr('href', url);
			} else {
				$(location).attr('href', url);
			}
		})
	} else {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'error',
			html: '<span style="color:gray">' + desc + '</span>',
			confirmButtonText: '<span style="color:black;"><i class="fa fa-times"></i> ปิด</span>',
			confirmButtonColor: '#e54d40',
		})
	}
}
function ierror(title, desc, reload, url) {
	if (reload == "true") {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'error',
			html: '<span style="color:gray">' + desc + '</span>',
			confirmButtonText: '<span style="color:black;"><i class="fa fa-times"></i> ปิด</span>',
			confirmButtonColor: '#e54d40',
		}).then(function (isConfirm) {
			if (isConfirm === true) {
				$(location).attr('href', url);
			} else {
				$(location).attr('href', url);
			}
		})
	} else {
		swal({
			title: '<span style="color:black">' + title + '</span>',
			type: 'error',
			html: '<span style="color:gray">' + desc + '</span>',
			confirmButtonText: '<span style="color:black;"><i class="fa fa-times"></i> ปิด</span>',
			confirmButtonColor: '#e54d40',
		})
	}
}

function warning(title, desc) {
	swal({
		title: '<span style="color:black">' + title + '</span>',
		type: 'warning',
		html: '<span style="color:gray">' + desc + '</span>',
		showConfirmButton: false,
		showCancelButton: false,
		showConfirmButton: false,
		allowOutsideClick: false,
		allowEscapeKey: false,
	})
}

function info(title, desc) {
	swal({
		title: '<span style="color:black">' + title + '</span>',
		type: 'info',
		html: '<span style="color:gray">' + desc + '</span>',
		confirmButtonText: '<span style="color:black;"><i class="fa fa-times"></i> ปิด</span>',
		confirmButtonColor: '#e54d40',
	})
}

function login() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("control_.php?login", { username: $('#username').val(), password: $('#password').val() }, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}


function truemoney() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("control_.php?truemoney", {
		truemoney_card: $('#truemoneyid').val(),
		topuptype: $('#truemoneytype').val(),
		recaptcha: grecaptcha.getResponse(0),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}

function truemoney_vip() {
	var ck = document.querySelectorAll('input[type="radio"]:checked').length;
	if (ck < 2) {
		alert("กรุณาเลือกตัวละคร และ VIP ที่ต้องการเติม ");
	} else {

		$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
		$.post("control_.php?truemoney-vip", {
			truemoney_card: $('#truemoneyid').val(),
			topuptype: $('#truemoneytype').val(),
			char_id: $("input[name='char_id']").val(), //รหัสตัวละคร
			vip_type: $("input[name='vip_type']").val(), //ประการการเติมเงิน 7วันหรือ30วัน
			recaptcha: grecaptcha.getResponse(0),
		}, function (data) {
			$("#btn").prop("disabled", true);
			$("#return").html(data);
			$("#btn").prop("disabled", false);
		}
		);
	}
}

function razergold() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("control_.php?razergold", {
		truemoney_card: $('#razergoldpin').val(),
		topuptype: $('#razertype').val(),
		recaptcha: grecaptcha.getResponse(1),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}


function register() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("control_.php?register", {
		username: $('#username').val(),
		email: $('#email').val(),
		password: $('#password').val(),
		repassword: $('#repassword').val(),
		sex: $('#sSex').val(),
		sD1: $('#sD1').val(),
		sM1: $('#sM1').val(),
		sY1: $('#sY1').val(),
		recaptcha: grecaptcha.getResponse(),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}

function add_news() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("control_.php?add_news", {
		title: $('#title').val(),
		img_news: $('#img_news').val(),
		color: $('#color').val(),
		info_news: CKEDITOR.instances.info_news.getData(),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}

function del_news(id) {
	swal({
		type: 'warning',
		title: 'ยืนยันการ การลบข้อมูล',
		showConfirmButton: false,
		html: '<br><br>' +
			'<a class="float-left btn btn-danger text-light" onclick="swal.close()"><i class="fa fa-times"></i> ยกเลิก</a>' +
			'<a class="float-right btn btn-success text-light" onclick="del_newss(\'' + id + '\')"><i class="fa fa-check"></i> ยืนยัน</a>',
	});
}
function del_newss(id) {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กำลังทำรายการ รอสักครู่');</script>");
	$.get("control_.php?del_news&id=" + id, function (data) {
		$("#return").html(data);
	}
	);
}

function logout() {

	swal({
		type: 'warning',
		title: 'ยืนยันการ ออกจากระบบ',
		showConfirmButton: false,
		html: '<br><br>' +
			'<a class="float-left btn btn-danger text-light" onclick="swal.close()"><i class="fa fa-times"></i> ยกเลิก</a>' +
			'<a class="float-right btn btn-success" href="?yak=logout&yes"><i class="fa fa-check"></i> ยืนยัน</a>',
	});
}


// function logout() {
// 	swal({
// 		type: 'warning',
// 		title: 'ยืนยันการ ออกจากระบบ',
// 		showConfirmButton: false,
// 		html: '<br><br>' +
// 		'<a class="btn btn-info btn-block" onclick="logoutact()"><i class="fa fa-check"></i> ยืนยัน</a>'+
// 		'<a class="btn btn-danger text-light btn-block" onclick="swal.close()"><i class="fa fa-times"></i> ยกเลิก</a>',
// 	});
// }
// function logoutact() {
// 	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
// 	$.get("?yak=logout",  function( data ) {
// 	$("#btn").prop("disabled", true);
// 	$( "#return" ).html( data );
// 	$("#btn").prop("disabled", false); 
//   }
//  );
// }

function random_key() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("action.php?random_key", {
		title_key: $('#title_key').val(),
		game_type: $('#game_type').val(),
		stime: $('#stime').val(),
		keynum: $('#keynum').val(),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}

function edit_key() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("action.php?edit_key", {
		this_id: $('#this_id').val(),
		this_key: $('#this_key').val(),
		this_hwid: $('#this_hwid').val(),
		this_game: $('#this_game').val(),
		this_hrs: $('#this_hrs').val(),
		this_ip: $('#this_ip').val(),
		this_status: $('#this_status').val(),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}

function add_game() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("action.php?add_game", {
		add_game: $('#add_game').val(),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}


function password() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("act.php?cpassword", {
		password_old: $('#password_old').val(),
		password_new: $('#password_new').val(),
		repassword_new: $('#repassword_new').val(),
		captcha: $('#captcha').val(),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}

function delinfo(id) {
	swal({
		type: 'warning',
		title: 'ยืนยันการ การลบข้อมูล',
		showConfirmButton: false,
		html: '<br><br>' +
			'<a class="float-left btn btn-danger text-light" onclick="swal.close()"><i class="fa fa-times"></i> ยกเลิก</a>' +
			'<a class="float-right btn btn-success text-light" onclick="delsinfo(\'' + id + '\')"><i class="fa fa-check"></i> ยืนยัน</a>',
	});
}
function delsinfo(id) {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กำลังทำรายการ รอสักครู่');</script>");
	$.get("action.php?del_info&id=" + id, function (data) {
		$("#return").html(data);
	}
	);
}

function del_game(id) {
	swal({
		type: 'warning',
		title: 'ยืนยันการ การลบเกม',
		showConfirmButton: false,
		html: '<br><br>' +
			'<a class="float-left btn btn-danger text-light" onclick="swal.close()"><i class="fa fa-times"></i> ยกเลิก</a>' +
			'<a class="float-right btn btn-success text-light" onclick="dels_game(\'' + id + '\')"><i class="fa fa-check"></i> ยืนยัน</a>',
	});
}
function dels_game(id) {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กำลังทำรายการ รอสักครู่');</script>");
	$.get("action.php?del_game&id=" + id, function (data) {
		$("#return").html(data);
	}
	);
}

function idelete(id) {
	swal({
		type: 'warning',
		title: 'ยืนยันการ ลบสินค้า',
		showConfirmButton: false,
		html: '<br><br>' +
			'<a class="float-left btn btn-danger text-light" onclick="swal.close()"><i class="fa fa-times"></i> ยกเลิก</a>' +
			'<a class="float-right btn btn-success" href="?page=backend&items&delete&number=' + id + '"><i class="fa fa-check"></i> ยืนยัน</a>',
	});
}

function add_loader() {
	$("#return").html("<script>warning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กรุณารอสักครู่...');</script>");
	$.post("action.php?add_loader", {
		add_loader: $('#add_loader').val(),
		game_type: $('#game_type').val(),
	}, function (data) {
		$("#btn").prop("disabled", true);
		$("#return").html(data);
		$("#btn").prop("disabled", false);
	}
	);
}

