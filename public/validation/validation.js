function ValidationPerPage(id){
    $('.alert').addClass('hide-dulu');
    data = "";
    role = $('#role').val();
    if (role == "Expert") {
        data = "role="+ role + " &" + "id_page="+ id + " " + $.map($('#form-'+ id +' :input:radio:checked'), function(elem, idx) {
          return "&"+$(elem).attr("name")+"="+ $(elem).val();
        }).join('') + $.map($('#form-'+ id +' textarea#'+'comments'), function(elem, idx) {
          return "&"+$(elem).attr("name")+"="+ $(elem).val();
        }).join('') + $.map($('#form-'+ id +' textarea#'+'reasons'), function(elem, idx) {
          return "&"+$(elem).attr("name")+"="+ $(elem).val();
        }).join('');
    }else if(role == "Normal"){
        data = "role="+ role + " &" + "id_page="+ id + " " + $.map($('#form-'+ id +' :input:radio:checked'), function(elem, idx) {
          return "&"+$(elem).attr("name")+"="+ $(elem).val();
       }).join('') + $.map($('#form-'+ id +' textarea#'+'reasons'), function(elem, idx) {
          return "&"+$(elem).attr("name")+"="+ $(elem).val();
        }).join('');
    }



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // console.log(data);
    $.ajax({
        url : 'validation-question',
        data : data,
        type : 'post',
        dataType : 'json',
        success : function(d){
            if(d.code == 200){
                // console.log(id);
                // console.log(d.code);
                // console.log(d.next_page);
                $('.page-' + id + '').addClass('hiden-page');
                $('.page-' + d.next_page + '').removeClass('hiden-page');
                window.scrollTo({top: 0, behavior: 'smooth'});
            }else{
                Swal.fire({
                    title: 'Kirim Data ??',
                    text: "Kuisioner Sudah Selesai !!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Send'
                }).then((result) => {
                    if (result.isConfirmed) {


                var final = "";
                role = $('#role').val();
                if (role == "Expert") {
                    // console.log('here');
                        final = "role="+ role + " &"+"data_diri=" + $("input[name=nama]").val() + ";" +
                            $("input[name=jenkel]:checked").val() + ";" +
                            $("input[name=umur]").val() + ";" +
                            $("input[name=email]").val() + ";" +
                            $("input[name=phone_number]").val() + ";" +
                            document.getElementById("pekerjaan").value + ";" +
                            $('input[name=pengalaman]:checked').val() + ";" +
                            $('input[name=role]:checked').val() 
                            + $.map($('#full-question :input:radio:checked'), function(elem, idx) {
                                return "&"+$(elem).attr("name")+"="+ $(elem).val();
                             }).join('')
                            + $.map($('#full-question textarea#comments'), function(elem, idx) {
                                return "&"+$(elem).attr("name")+"="+ $(elem).val();
                            }).join('') 
                            + $.map($('#full-question textarea#reasons'), function(elem, idx) {
                                return "&"+$(elem).attr("name")+"="+ $(elem).val();
                            }).join('');
                }else if(role == "Normal"){
                        final = "role="+ role + " &" +"data_diri=" + $("input[name=nama]").val() + ";" +
                            $("input[name=jenkel]:checked").val() + ";" +
                            $("input[name=umur]").val() + ";" +
                            $("input[name=email]").val() + ";" +
                            $("input[name=phone_number]").val() + ";" +
                            document.getElementById("pekerjaan").value + ";" +
                            $('input[name=pengalaman]:checked').val() + ";" +
                            $('input[name=role]:checked').val() 
                            + $.map($('#full-question :input:radio:checked'), function(elem, idx) {
                                return "&"+$(elem).attr("name")+"="+ $(elem).val();
                            }).join('') + $.map($('#full-question textarea#reasons'), function(elem, idx) {
                               return "&"+$(elem).attr("name")+"="+ $(elem).val();
                            }).join('');
                }


                        

                        // console.log(final);

                        $.ajax({
                            url : 'submit-data',
                            data : final,
                            type : 'post',
                            dataType : 'json',
                            success : function(d){
                                 if(d.code == 200){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Terkirim',
                                        html : 'Terimakasih Sudah Membantu Penelitian Kami',
                                        timerProgressBar: true,
                                        timer: 5000,
                                        didOpen: () => {
                                            Swal.showLoading()
                                            timerInterval = setInterval(() => {
                                            const content = Swal.getContent()
                                            if (content) {
                                                const b = content.querySelector('b')
                                                if (b) {
                                                b.textContent = Swal.getTimerLeft()
                                                }
                                            }
                                            }, 100)
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval);
                                            document.location.href = '/';
                                        }
                                    })
                                   
                                   
                                 }   
                            }
                        })
                    }
                })
            }
        },
        error : function(err){
            var a = err.responseJSON.errors;
            // console.log(a);
            $.each(a, function(index, value){
                // console.log(index)
                $(' [name=' + index + ']').closest('.inputan').find(".alert").removeClass('hide-dulu');
            })
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    });
}
function BackPage(id){
    var back_page = id - 1;

    if(back_page == 0){
        $('.page-' + id + '').addClass('hiden-page');
        $('.data-masuk').removeClass('hiden-page');
        window.scrollTo({top: 0, behavior: 'smooth'});

    }else{
        $('.page-' + id + '').addClass('hiden-page');
        $('.page-' + back_page + '').removeClass('hiden-page');
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
}