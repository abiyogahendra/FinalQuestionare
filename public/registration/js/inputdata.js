$(document).ready(function(){
    $('.register-form').addClass('hiden-page');
})

function NextRegistration(){
    $('iframe').attr('src', $('iframe').attr('src'));
    $('.register-form').removeClass('hiden-page');
    $('.data-front').addClass('hiden-page');
    window.scrollTo({top: 0, behavior: 'smooth'});
}

function BackFrontPage(){
    $('.data-front').removeClass('hiden-page');
    $('.register-form').addClass('hiden-page');
    window.scrollTo({top: 0, behavior: 'smooth'});
}

function InputDataRegistration(){
    var pekerjaan = document.getElementById("pekerjaan");
    var role = document.getElementById("role");
    $('.alert').addClass('hide-dulu');
    $.ajax({
        url : 'input-registrasi',
        data : {
            _token : dataToken,
            nama    : $("input[name=nama]").val(),
            jenkel    : $("input[name=jenkel]:checked").val(),
            umur    : $("input[name=umur]").val(),
            email    : $("input[name=email]").val(),
            phone_number    : $("input[name=phone_number]").val(),
            pekerjaan    : pekerjaan.value,
            pengalaman    : $('input[name=pengalaman]:checked').val(),
            role : role.value
        },
        type : 'post',
        dataType : 'json',
        success : function(respon){
                $.ajax({
                    url : 'question',
                    type : 'get',
                    dataType : 'html',
                    success : function(html){
                        $('registration-form').addClass('hide-dulu');
                        if (!$(".page-1").length){
                             $('.data-masuk').after(html);
                        }
                        if(respon.code == 200){
                            $('.data-expert').addClass('hiden-page');
                        }else if (respon.code == 300){
                            $('.data-expert').removeClass('hiden-page');
                        }
                        $('.data-masuk').addClass('hiden-page');
                        $('.page-1').removeClass('hiden-page');
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    },
                })
        },
        error : function(data){
            var a = data.responseJSON.errors;
            // console.log(a);
            $.each(a, function(index, value){
                // console.log(index)
                $(' [name=' + index + ']').closest('.inputan').find(".alert").text(value).removeClass('hide-dulu');
            })
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    })
}