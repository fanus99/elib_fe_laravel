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

function addInputSelect(name, label, isRequired, icon, data){
    var requiredText = "";
    if(isRequired == true){
        requiredText = `required=""`
    }
    var inputField =    `<div class="col-12">
                            <label>`+ label +`<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi `+ icon +`"></i></div>
                                <select name="`+ name +`" class="form-control" `+ requiredText +`>`;
                                alert(data);
    $.each(data, function(index, value) {
        alert(data);
        inputField += `<option value='`+ value.id +`'>`+ value.value +`</option>`;
    });

    inputField += `</select>
                    </div>
                </div>`;

    return inputField;
}

function replaceUndifined(val){
    if(val == undefined){
        return "Buku belum dikembalikan";
    }
}
function addInputImage(name, label, type, isRequired, icon, value){
    var requiredText = "";
    if(isRequired == true){
        requiredText = `required=""`
    }
    var inputField =  `<form name="CoverBuku"  >
    <div class="form-group" >
        <label>`+ label +`<span class="text-danger">*</span></label>
        <input type="`+ type +`" name="`+ name +`" value="`+ value +`" class="form-control" placeholder="Enter `+ label +`" `+ requiredText +` style="height:150px">
    </div>
 </form>`;

                        
                        

    return inputField;
}

