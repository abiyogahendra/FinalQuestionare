
 $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function PostLogin(){
    $.ajax({
        url : '/process-login',
        data : {
            email       : $("input[name = email]").val(),
            password    : $("input[name = password]").val(),
        },
        type : 'post',
        dataType : 'json',
        success : function(resp){
            if(resp.code == 200 ){
                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    html : 'Selamat Datang',
                    timerProgressBar: true,
                    timer: 3000,
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
                        clearInterval(timerInterval)
                        document.location.href = '/admin-dashboard'
                      }
                  })
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Login Gagal',
                    html : 'Pastikan Email Unix dan Password Sesuai',
                    timerProgressBar: true,
                    timer: 3000
                  })
            }

        },
        error : function(err){
            Swal.fire({
              icon: 'warning',
              title: 'Login Gagal',
              html : 'Pastikan Email Unix dan Password Sesuai',
              timerProgressBar: true,
              timer: 3000
            })
        }
    })
}

$(document).on('keypress',function(e) {
    if(e.which == 13) {
        PostLogin();
    }
});