$(function() {
    // $("button").on("click", function() {
    //   $("#dynamic-container").append($("<select><option id='tes' value='www' name='s'>test</option><select/>"));
    // });
  
    // select the target node
    var target = document.getElementById('dynamic-container');
  
    if (target) {
      // create an observer instance
      var observer = new MutationObserver(function(mutations) {
        //loop through the detected mutations(added controls)
        mutations.forEach(function(mutation) {
        //addedNodes contains all detected new controls
          if (mutation && mutation.addedNodes) {
            mutation.addedNodes.forEach(function(elm) {
            //only apply select2 to select elements
              if (elm && elm.nodeName === "SELECT") {
                $(elm).select2();
              }
            });
          }
        });
      }); 
      
      // pass in the target node, as well as the observer options
      observer.observe(target, {
        childList: true
      });
  
      // later, you can stop observing
      //observer.disconnect();
    }
  });

  
// $('.repeater').repeater({
//     show: function () {
//       $(this).slideDown();
//       $('.select2-container').remove();
//       $('Replace with your select identifier id,class,etc.').select2({
//         placeholder: "Placeholder text",
//         allowClear: true
//       });
//       $('.select2-container').css('width','100%');
//     },
//     hide: function (remove) {
//       if(confirm('Confirm Question')) {
//         $(this).slideUp(remove);
//       }
//     }
//   });
  

// let Customer = {
//     init: function () { 
//         // let simpan = $('.modal-footer').on('click', '.add', function () {
//         //     $('#name-error').html('');
//         //     $('#simpan').text('Simpan');

//         //     let name = $('input[name=name]').val();
//         //     let registerForm = $('#CustomerForm');
//         //     let formData = registerForm.serialize();

//         //     $.ajax({
//         //         headers: {
//         //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         //         },
//         //         type: 'post',
//         //         url: '/customer',
//         //         data: {
//         //             _token: $('input[name=_token]').val(),
//         //             name: name
//         //         },
//         //         success: function (data) {
//         //             if (data.errors) {
//         //                 if (data.errors.name) {
//         //                     $('#name-error').html(data.errors.name[0]);
//         //                     document.getElementById('name').value = name;
//         //                 }
//         //             } else {
//         //                 $('#modal_customer').modal('hide');

//         //                 toastr.success('Data berhasil disimpan.', 'Sukses', {
//         //                     timeOut: 5000
//         //                 });

//         //                 let table = $('.m_datatable').mDatatable();

//         //                 table.originalDataSet = [];
//         //                 table.reload();
//         //             }
//         //         }
//         //     });
//         // });
//     }
// };

// jQuery(document).ready(function () {
//     Customer.init();
// });
