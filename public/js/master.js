function AjaxGet(endpoint){
    return $.ajax({
        type: "GET",
        url: endpoint,
        dataType: "json",
        encode: true,
        async:false,
    }).responseJSON;
}
function AjaxGetWithId(endpoint, id){
    return $.ajax({
        type: "GET",
        url: endpoint + id,
        dataType: "json",
        encode: true,
        async:false,
    }).responseJSON;
}
function AjaxPost(endpoint, data){
    return $.ajax({
        type: "POST",
        url: endpoint,
        data: data,
        dataType: "json",
        encode: true,
        async:false,
    }).responseJSON;
}
function AjaxUpdate(endpoint, data){
    return $.ajax({
        type: "POST",
        url: endpoint,
        data: data,
        dataType: "json",
        encode: true,
        async:false,
    }).responseJSON;
}
function AjaxDelete(endpoint, data){
    return $.ajax({
        type: "DELETE",
        url: endpoint,
        dataType: "json",
        data: data,
        encode: true,
        async:false,
    }).responseJSON;
}

function addInputField(name, label, type, isRequired, icon, value){
    var requiredText = "";
    if(isRequired == true){
        requiredText = `required=""`
    }
    var inputField =    `<div class="col-12">
                            <label>`+ label +`<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi `+ icon +`"></i></div>
                                <input type="`+ type +`" name="`+ name +`" value="`+ value +`" class="form-control" placeholder="Enter `+ label +`" `+ requiredText +`>
                            </div>
                        </div>`;

    return inputField;
}
<<<<<<< HEAD
function openModalCreate(model){
    $("#createModalTitle").html(model);
    createForm();
    createModal.show();
}
function openModalUpdate(model, id){
    $("#updateModalTitle").html(model);
    updateFrom(id);
    updateModal.show();
}
=======
>>>>>>> efd906f18949574def4590c2dd402a1b31b30570
