/*!
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This file should be included in all pages
 !**/

/*
 * Modified By Achmad Sarwat 29/11/2014
 */
var config = {
	validation : {
		onkeyup: false,
		onclick: false,
		onfocusout: false,
		errorPlacement: function(error, element){
			if(element.parent().hasClass('input-group'))
				error.insertAfter(element.parent());
			else if(element.siblings().hasClass('select2-container'))
				error.insertAfter(element.siblings());
			else if(element.prop("type") === 'file' && element.parents(".file-input").length > 0)
				error.insertAfter(element.parents(".file-input"));
			else if(element.prop("type") === 'file' && element.parents(".simple-fileupload").length > 0)
				error.insertAfter(element.parents(".simple-fileupload"));
			else
				error.insertAfter(element);
		},
		highlight: function (element, errorClass, validClass){
			$(element).parents(".form-group").first().addClass("has-error");
		},
		unhighlight: function (element, errorClass, validClass){
			$(element).parents(".form-group").first().removeClass("has-error");
		},
		submitHandler: function(form){
			$("body").addClass("loading");
			form.submit();
		}, 
	},
};

function rupiah(args){
	if(!isNaN(args)){
		var num 	= args.toString();
		var negasi	= "";
		negasi		= (num.substr(0,1)== '-')?'-':'';
		num			= (num.substr(0,1)== '-')?num.substr(1):num;
		var rupiah  = "";
		var rp 		= num.length;
		while (rp > 3){
			var s  	= num.length - 3;
			rupiah 	= "."+ num.substr(s)+ rupiah;
			num  	= num.substr(0,s);
			rp 	   	= num.length;
		}
		rupiah = num + rupiah;
		return negasi+rupiah;
	}
}

function ucwords(str) {
  return (str + '').replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1) {
	  return $1.toUpperCase();
	});
}

function notify_growl(tipe, pesan, delay, kolom){
	var colsize = (typeof(kolom) == "undefined" || kolom == "") ? 'col-xs-11 col-sm-3' : kolom;
	var waktudl = (isNaN(parseInt(delay))) ? 2000 : parseInt(delay);
	$.notify({
		icon:"notify-icon fa fa-info", 
		title: 'INFORMASI',
		message:pesan
	}, {
		type:tipe, 
		delay: waktudl,
		timer: 300,
		showProgressbar: true, 
		placement: {from:"top", align:"center"},
		template:'<div data-notify="container" class="'+colsize+' alert alert-{0}" role="alert">'+
			'<button type="button" aria-hidden="true" class="close pull-right" data-notify="dismiss">&times;</button>'+
			'<p class="notify-header"><span data-notify="icon"></span><span data-notify="title">{1}</span></p>'+
			'<hr class="notify-separator">'+
			'<span data-notify="message">{2}</span>'+
			'<a href="{3}" target="{4}" data-notify="url"></a>'+
			'<div class="progress" data-notify="progressbar">'+
				'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>'+
			'</div>'+
		'</div>'
	});
}

function strip_tags(input, allowed){ 
	allowed 	= (((allowed || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
	var tags 	= /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;
	var comment = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>|[\s\u00A0]|&nbsp;/gi;
	return input.replace(comment, '').replace(tags, function ($0, $1) {
		return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
	});
}

function setErrorFocus(elemnya, formnya, isFocus){
	var scrolnya = formnya.scrollTop() + (elemnya.offset().top - formnya.position().top) + (elemnya.height()/2);
	$("html, body").animate({ scrollTop: scrolnya - ($("header.main-header").height() + $("section.content-header").height())}, 500);
	if(isFocus){
		elemnya.focus();
	}
}

$(function() {
	$(document).on('click','.btn-cek-status-sipede-2023',function(){
		var nilai = $(this).data('idbupak');

		$.ajax({
            type: "GET",
            url: "/dupak/sipede/check_status_sipede",
            data: {
                id: nilai
            },
            dataType: "json",
            beforeSend: function() {
                $.LoadingOverlay("show");
            },
            complete: function() {
                $.LoadingOverlay("hide", true);
            },
            success: function(response) {
                $('#text_csrfnya').val(response.token);
                csrfval = response.token;

                if (response.success == false) {
                    if (response.message == 'File Belum Ditandatangani') {
                        alert('Data masih dalam proses penandatanganan elektronik.');
                    } else if (response.message == 'Data Belum Masuk Pada Sistem Esign') {
                        alert('Maaf, data belum masuk pada sistem penandatanganan elektronik.');
                    } else {
                        alert(response.message);
                    }
                    //location.reload(true);
                } else if(response.success == true)  {
                    if (response.message == 'File Sudah Ditandatangani dan Dapat di Download') {
                        alert('Berkas Sudah Ditandatangani dan Dapat di Unggah');
                    }else{
                        alert(response.message);
                    }
                    
                    //location.reload(true);
                }
                console.log(response);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
	});
});


