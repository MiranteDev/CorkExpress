/*document.querySelector('.sweet-wrong').onclick = function(){
    sweetAlert("Oops...", "Something went wrong !!", "error");
};
document.querySelector('.sweet-message').onclick = function(){
    swal("Hey, Here's a message !!")
};
document.querySelector('.sweet-text').onclick = function(){
    swal("Hey, Here's a message !!", "It's pretty, isn't it?")
};
document.querySelector('.sweet-success').onclick = function(){
    swal("Hey, Good job !!", "You clicked the button !!", "success")
};
document.querySelector('.sweet-confirm').onclick = function(){
    swal({
            title: "Are you sure to delete ?",
            text: "You will not be able to recover this imaginary file !!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            closeOnConfirm: false
        },
        function(){
            swal("Deleted !!", "Hey, your imaginary file has been deleted !!", "success");
        });
};*/
$('.sweet-success-cancel').click(function(){
  var id =$(this).val();
    swal({
            title: "Deseja Mesmo Apagar Esse Chavalo"
            text: "Não será possivel reverter esta decisão",
            type: "Aviso",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, Eu Desejo !!",
            cancelButtonText: "Não, sou maricas, não me atrevo !!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //var id = $('#id_funcionario').val();
                $.ajax({ url: '/corkexpress/indexadmin.php?an=4',
                  data: {'id_funcionario': id
                    ,'btapagar': 'click'},
                  type: 'post'
                });

                swal({title:"Deleted !!", text:"Hey, your imaginary file has been deleted !!", type:"success"},
                function(){
                  window.location.href = '/corkexpress/indexadmin.php?an=4';
                }
              );

            }
            else {
                swal("Cancelled !!", "Hey, your imaginary file is safe !!", "error");
            }
        });
});
/*
document.querySelector('.sweet-image-message').onclick = function(){
    swal({
        title: "Sweet !!",
        text: "Hey, Here's a custom image !!",
        imageUrl: "images/hand.jpg"
    });
};
document.querySelector('.sweet-html').onclick = function(){
    swal({
        title: "Sweet !!",
        text: "<span style='color:#ff0000'>Hey, you are using HTML !!<span>",
        html: true
    });
};
document.querySelector('.sweet-auto').onclick = function(){
    swal({
        title: "Sweet auto close alert !!",
        text: "Hey, i will close in 2 seconds !!",
        timer: 2000,
        showConfirmButton: false
    });
};
document.querySelector('.sweet-prompt').onclick = function(){
    swal({
            title: "Enter an input !!",
            text: "Write something interesting !!",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        },
        function(inputValue){
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }
            swal("Hey !!", "You wrote: " + inputValue, "success");
        });
};
document.querySelector('.sweet-ajax').onclick = function(){
    swal({
            title: "Sweet ajax request !!",
            text: "Submit to run ajax request !!",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
        function(){
            setTimeout(function(){
                swal("Hey, your ajax request finished !!");
            }, 2000);
        });
};*/
