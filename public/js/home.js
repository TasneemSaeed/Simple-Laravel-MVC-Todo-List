/** View Add Form */
var btn = document.getElementById('add');
var hid = document.getElementById('hide');
btn.onclick = function(){
    document.getElementById('addForm').style.display="block";
    document.getElementById('hide').style.display="none";

}
/** View Add Form */

/** View edit Form */
var btn1 = document.getElementById('edit');
var hid1 = document.getElementsByClassName('hideInfo');
btn1.onclick = function(){
    document.getElementById('editForm').style.display="block";
    for (let index = 0; index < hid1.length; index++) {
        hid1[index].style.display="none";
    }
}
/** View edit Form */

/** Submit Edit */
$("#done").on("click",function(event){
    event.preventDefault();
    var form = $("#editForm").get(0);
    var data = new FormData(form);

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $("input[name = '_token']").attr('value')
        }
    });

    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/api/tasks/" + $("#id").attr('value'),
        enctype: "multipart/form-data",
        data: data,
        processData: false,
        contentType: false,
        success: function(){
            document.getElementById('editForm').style.display="none";

            hid1[0].style.display="inline";
            $(".showTask").html("<div class='col-md-7'><h3>Edited Successfuly !</h3>");
            $(".showTask").attr("style","display : inline");

        }
    });
});
/** Submit Edit */

/** Submit Delete */
$("#del").on("click",function(){
    document.getElementById('delForm').submit();
});
/** Submit Delete */

/** Submit Done */
    $("#taskDone").on("click",function(){
        //document.getElementById('doneForm').submit();
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/api/done/" + $("#doneID").attr('value'),
            processData: false,
            contentType: false,
            success: function(){
                $("#shwImg").attr("style","display:inline");
            }
        });
    });
/** Submit Done */

