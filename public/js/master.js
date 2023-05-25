function AjaxPostWithoutAuth(endpoint, data){
    return $.ajax({
        type: "POST",
        url: endpoint,
        data: data,
        dataType: "json",
        encode: true,
        async:false,
    }).responseJSON;
}
