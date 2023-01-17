$("body").on("submit", ".submit_form", function (e) {
	e.preventDefault();
	var submit_button = $(this).find("button[type=submit]");
	submit_button.attr("disabled", "disabled");

	var modal_parent = $(this).parents(".modal");

	var is_modal = modal_parent.length > 0;

	var this_form = $(this);
	var formData = new FormData(this);
	$.ajax({
		type: "post",
		url: this_form.attr("action"),
		data: formData,
		processData: false,
		contentType: false,
		cache: false,
		dataType: "json",
		success: function (response) {
			if (response["status"] == 1) {
				showNotificationa(response["status"], response["message"]);
				if (response.is_redirect == 1) {
					window.location.href = response.redirect_path;
					return true;
				}
				return true;
			}
			showNotificationa(response["status"], response["errors"]);
		},
		error: function (error) {},
		complete: function () {
			submit_button.removeAttr("disabled");
		},
	});
});

// Import Transfer Item
$("body").on("submit", ".transfer_item", function (e) {
	e.preventDefault();
	var submit_button = $(this).find("button[type=submit]");
	submit_button.attr("disabled", "disabled");

	var modal_parent = $(this).parents(".modal");

	var is_modal = modal_parent.length > 0;

	var this_form = $(this);
	var formData = new FormData(this);
	$.ajax({
		type: "post",
		url: this_form.attr("action"),
		data: formData,
		processData: false,
		contentType: false,
		cache: false,
		dataType: "json",
		success: function (response) {
			if (response["status"] == 1) {
				showNotificationa(response["status"], response["message"]);
				let itemlistHtml = "";
				response["item_list"].forEach((item, i) => {
					itellistHtml = `
					<div class="row" data-row="transfer">
						<div class="col checkbox__row form-group position-relative error-l-50">
					      <input type="checkbox" data-checkbox="row">
					    </div>
						<div class="col-3 form-group position-relative error-l-50">
					      <label>Name</label>
					      <input disabled type="text" name="item_name[]" value="${item["first_name"]}" class="form-control" >
					    </div>
					    <div class="col-3 form-group position-relative error-l-50">
					      <label>Second Name</label>
					      <input disabled type="text" name="item_s_name[]" value="${item["second_name"]}" class="rtl form-control" >
					    </div>
					    <div class="col-3 form-group position-relative error-l-50">
					      <label>Quantity</label>
					      <input disabled type="number" name="quantity[]" value="${item["quantity"]}" class="form-control" >
					    </div>
					    <div class="col form-group position-relative error-l-50">
					      <label>Unit</label>
					      <input disabled type="text" name="unit[]" value="${item["unit"]}" class="form-control" >
					    </div>
					  </div>
					`;
					$("#itemList").append(itellistHtml);
				});
				return true;
			}
			showNotificationa(response["status"], response["errors"]);
		},
		error: function (error) {},
		complete: function () {
			submit_button.removeAttr("disabled");
		},
	});
});

$(document).ready(function (e) {
	$("[data-js=wastage]").on("click", function (event) {
		const parent = $(this).closest("td.wastage__item");
		parent.addClass("active");
		parent.find("input").focus();
	});

	$(".wastage__input").on("blur", function (event) {
		$(this).closest("td.wastage__item").removeClass("active");
	});

	$(".wastage__input").on("change", function (event) {
		const parent = $(this).closest("td.wastage__item");

		parent.find("[data-js=wastage]").text(`${$(this).val()}%`);
	});

	$("#itemList").on("change", "[data-checkbox=row]", function (event) {
		const parent = $(this).closest("[data-row=transfer]");
		if ($(this).is(":checked")) {
			parent.find("input:not([type=checkbox])").removeAttr("disabled");
		} else {
			parent.find("input:not([type=checkbox])").attr("disabled", "disabled");
		}
	});

	$("[data-form=ajax]").on("submit", function (event) {
		const data = [];
		const rows = $("[data-checkbox=row]:checked").closest(
			"[data-row=transfer]"
		);
		$.each(rows, function (index, row) {
			const fields = $(row).find("input:not([type=checkbox]),select");
			let rowData = {};
			$.each(fields, function (i, field) {
				rowData = { ...rowData, [$(field).attr("name")]: $(field).val() };
			});
			data.push(rowData);
		});

		console.log(data);
	});
});

function showNotificationa(status, message) {
	$.notify(
		{
			title: status ? "Info" : "Error",
			message: message,
			target: "_blank",
		},
		{
			element: "body",
			position: null,
			type: status ? "info" : "danger",
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: "top",
				align: "left",
			},
			offset: 20,
			spacing: 10,
			z_index: 1031,
			delay: 4000,
			timer: 2000,
			url_target: "_blank",
			mouse_over: null,
			animate: {
				enter: "animated fadeInDown",
				exit: "animated fadeOutUp",
			},
			onShow: null,
			onShown: null,
			onClose: null,
			onClosed: null,
			icon_type: "class",
			template:
				'<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
				'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
				'<span data-notify="icon"></span> ' +
				'<span data-notify="title">{1}</span> ' +
				'<span data-notify="message">{2}</span>' +
				'<div class="progress" data-notify="progressbar">' +
				'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
				"</div>" +
				'<a href="{3}" target="{4}" data-notify="url"></a>' +
				"</div>",
		}
	);
}
