<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    {{-- <select class="form-control js-example-tags" >
        <option selected="selected">orange</option>
        <option>white</option>
        <option>purple</option>
      </select> --}}
      <form action="" id="myform">
            <table class="order-list">
                    <tr>
                            <td class="col-sm-4"><input type="text" required="required" class="form-control" placeholder="Nama Tahapan" name="nama_tahapan[]' + counter + '"/></td>
                            <td class="col-sm-1"><input type="text" required="required" class="form-control" placeholder="x Hari" name="lama_pengerjaan[]' + counter + '"/></td>
                            <td class="col-sm-2"><select name="team"  class="select form-control js-example-tags"><option >-</option>
                            @foreach ($websites as $website)
                            <option value="{{$website->id}}">{{$website->name}}</option>
                            @endforeach
                            </select></td>
                            <td class="col-sm-3"><input id="tags_1" type="text" class="tags form-control col-sm-3" name="dokumen[]"/></td>
                            <td class="col-sm-1"><select name="pengeluaran[]" class="select form-control"><option value="false">Tidak</option> <option value="true">Ya</option></select></td>
                            <td class="col-sm-1"></td>
        
                    </tr>
                    <tr>
                        <td class="col-sm-4"><input type="text" required="required" class="form-control" placeholder="Nama Tahapan" name="nama_tahapan[]' + counter + '"/></td>
                        <td class="col-sm-1"><input type="text" required="required" class="form-control" placeholder="x Hari" name="lama_pengerjaan[]' + counter + '"/></td>
                        <td class="col-sm-2"><select name="team"  class="select form-control js-example-tags"><option >-</option>
                        @foreach ($websites as $website)
                        <option value="{{$website->id}}">{{$website->name}}</option>
                        @endforeach
                        </select></td>
                        <td class="col-sm-3"><input id="tags_1" type="text" class="tags form-control col-sm-3" name="dokumen[]"/></td>
                        <td class="col-sm-1"><select name="pengeluaran[]" class="select form-control"><option value="false">Tidak</option> <option value="true">Ya</option></select></td>
                        <td class="col-sm-1"></td>
    
                </tr>

                </table>
              <button type="button" id="addrow">Add</button>
              <div class="tes">
                    <button type="button" class="save" id="save">save</button>
        
              </div>
        
      </form>



      <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      {{-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script> --}}
      {{-- <script src="http://bainternet-js-cdn.googlecode.com/svn/trunk/js/jQuery%20BlockUI%20Plugin/2.39/jquery.blockUI.js"></script> --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

      <script>
          $(document).ready(function () {
            $(".js-example-tags").select2({
                // tags: ["value1", "value2", "value3", "value4", "value5"]
            });
          });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var counter = 0;
            var teams = {!! json_encode($websites->toArray()) !!}
            $("#addrow").on("click", function () {
                var x = 1;
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td class="col-sm-4"><input type="text" required="required" class="form-control" placeholder="Nama Tahapan" name="nama_tahapan[]' + counter + '"/></td>';
                cols += '<td class="col-sm-1"><input type="text" required="required" class="form-control" placeholder="x Hari" name="lama_pengerjaan[]' + counter + '"/></td>';
                x = x+1;
                cols += '<td class="col-sm-2"><select name="team" class="select form-control ">';
                cols += '<option >-</option>';
                for (var i = 0; i < (teams.length - 1); i++) {
                    if(teams[i].id == 1){
                    }else{
                    cols += '<option value="' + teams[i].uuid + '" >' + teams[i].name + ' </option>';
                    }
                }
                ;
                cols += '</select></td>';
                cols += '<td class="col-sm-3"><input id="tags_1" type="text" class="tags form-control col-sm-3" name="dokumen[]"/></td>';
                cols += '<td class="col-sm-1"><select name="pengeluaran[]" class="select form-control"><option value="false">Tidak</option> <option value="true">Ya</option></select></td>';
                cols += '<td class="col-sm-1"><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                $('.select').select2();
                // $('.tags').tagsInput();
                counter++;
            });
            $("table.order-list").on("click", ".ibtnDel", function (event) {
                if (counter >= 1) {
                    $(this).closest("tr").remove();
                    counter -= 1
                }
            });
        });
    </script>
    <script type="text/javascript">
            let simpan = $('.tes').on('click', '.save', function () {

// var myForm = document.forms.myform;
// var myControls = myForm.elements['team[]'];
//  alert(myControls.length.value);
// console.log(myControls.value);

// var x = document.getElementById("team"); 
// var optionVal = new Array();
// for (i = 0; i < x.length; i++) { 
//     optionVal.push(x.options[i].text);
//     alert(x.options[i].text);
// }

// var values = $('.select-meal-type').val();
// alert(values);

// var x = document.getElementById("team"); 
// var myControls = myForm.elements['team[]'];

        //     // let team_array = [];
        //     var myForm = document.forms.myform;
        // var myControls = myForm.elements['team[]'];
        // var i = 0;

        //     $('#team ').each(function (i) {
        //     // alert(myControls.value);
        //     // var aControl = myControls[i];
        //     alert(i);
        //     alert(myControls[i].value);
        //     var i = i+1;

        //         // alert(team[1].value);
        //         // team_array[i] = document.getElementsByName('team[]')[0].value;
        //         // alert(team_array[i]);
        //     });

        var usertype=[];
$("select[name=team]").each(function(){
    usertype.push($(this).val());
    // alert($(this).val());
}); 


  var ajaxdata={"UserType":usertype};	
  
  console.log(JSON.stringify(ajaxdata));

// var optionVal = new Array();
//     $('select option').each(function() {
//             optionVal.push($(this).val());
//             alert($(this).val());
//         });


        // var theForm = document.getElementById("myform");
        // alert(theForm.team.length);

            // var p_ids = document.forms[0].elements["team[]"];
            // alert(p_ids.length);
            //     let values2 = $("input[name='team[]']")
            //   .map(function(){return $(this).val();}).get();

            // let values2 = 'sss';

                // alert('tes');
            // let name = $('input[name=name]').val();
            // let symbol = $('input[name=symbol]').val();
            // let type_id =$('#type_id').val();

            // $.ajax({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     type: 'post',
            //     url: '/unit',
            //     data: {
            //         _token: $('input[name=_token]').val(),
            //         name: values2,
            //     },
            //     success: function (data) {
            //         if (data.errors) {
            //             if (data.errors.name) {
            //                 $('#name-error').html(data.errors.name[0]);

            //             }
            //             if (data.errors.symbol) {
            //                 $('#symbol-error').html(data.errors.symbol[0]);

            //             }
            //             if (data.errors.type) {
            //                 $('#type-error').html(data.errors.type[0]);

            //             }

            //         } else {
            //             $('#modal_unit').modal('hide');

            //             toastr.success('Unit has been created.', 'Success', {
            //                 timeOut: 5000
            //             });

            //             let table = $('.unit_datatable').mDatatable();

            //             table.originalDataSet = [];
            //             table.reload();
            //         }
            //     }
            // });
        });
    </script>
</body>
</html>