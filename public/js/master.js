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
function AjaxUpdate(endpoint, id, data){
    return $.ajax({
        type: "POST",
        url: endpoint + id,
        data: data,
        dataType: "json",
        encode: true,
        async:false,
    }).responseJSON;
}
function AjaxDelete(endpoint){
    return $.ajax({
        type: "DELETE",
        url: endpoint,
        dataType: "json",
        encode: true,
        async:false,
    }).responseJSON;
}

