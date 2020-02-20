show_review=function (key) {
    var c=document.getElementById('review_div_'+key).style.display;
    if(c=='none')
    {
        document.getElementById('review_title_'+key).className='review_title';
        $("#review_div_"+key).slideDown();
    }
    else
    {
        document.getElementById('review_title_'+key).className='review_title2';
        $("#review_div_"+key).slideUp();
    }
};
show_service=function ()
{
    var c=document.getElementById('service_box').style.display;
    if(c=='block')
    {
        document.getElementById('service_ic').className='service_ic';
        $("#service_box").slideUp();
    }
    else
    {
        document.getElementById('service_ic').className='service_ic2';
        $("#service_box").slideDown();
    }
};
function del_row(id,url,token)
{
    var route=url+"/";
    if (!confirm("آیا از حذف این آدرس اطمینان دارید !"))
        return false;

    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action",route+id);
    var hiddenField1 = document.createElement("input");
    hiddenField1.setAttribute("name", "_method");
    hiddenField1.setAttribute("value",'DELETE');
    form.appendChild(hiddenField1);
    var hiddenField2 = document.createElement("input");
    hiddenField2.setAttribute("name", "_token");
    hiddenField2.setAttribute("value",token);
    form.appendChild(hiddenField2);
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}

