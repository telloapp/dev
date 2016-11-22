/*  empty Fields*/

$('#carform').submit(function() 
{
    if ($.trim($("#make").val()) === "" || $.trim($("#model").val()) === ""||
      $.trim($("#name").val()) === "" || $.trim($("#year").val()) === "" 
       ||$.trim($("#varient").val()) === "" || $.trim($("#mileage").val()) === ""||
       $.trim($("#color").val()) === "" || $.trim($("#price").val()) === ""  
       || $.trim($("#extras").val()) === "" || $.trim($("#vin").val()) === "" || $.trim($("#transmision").val()) === ""
       || $.trim($("#fuel_type").val()) === ""  || $.trim($("#tel").val()) === ""
       || $.trim($("#fax").val()) === "" || $.trim($("#address").val()) === "" || $.trim($("#website").val()) === ""
       || $.trim($("#facebook").val()) === "" || $.trim($("#twitter").val()) === "" 
       || $.trim($("#cat_id").val()) === "" || $.trim($("#seller_type").val()) === "" || $.trim($("#leather_seats").val()) === ""
       || $.trim($("#bluetooth").val()) === "" || $.trim($("#airbags").val()) === "" || $.trim($("#cruise_control").val()) === ""
       || $.trim($("#abs").val()) === "" || $.trim($("#aircon").val()) === "" || $.trim($("#nav_system").val()) === ""
       || $.trim($("#electric_windows").val()) === "" || $.trim($("#park_assist").val()) === "" || $.trim($("#sunroof").val()) === "" 
       || $.trim($("#radio").val()) === "" || $.trim($("#mags").val()) === "" || $.trim($("#countries").val()) === ""
       || $.trim($("#provinces").val()) === "" || $.trim($("#cities").val()) === "" || $.trim($("#registration").val()) === "" 
       || $.trim($("#description").val()) === "" || $.trim($("#image").val()) === "") 


    {
        alert('One Or More Field(s) Is Empty!..Please Fill All Car Fields.');
    return false;
    }
});

