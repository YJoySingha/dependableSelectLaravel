<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="row">
		
				<div class="col-md-4"></div>
				
				<div class="col-md-4" style="margin-top: 90px;">
				<h5 style="text-align:center;">Here is the Dependable Select Option in Laravel</h5>
					<select class="custom-select" onchange="getCountryId();" id="countryIdValue">
					  <option selected>Select Country</option>
					  @foreach($getAllCountry as $getAllCountryVar)
					  <option value="{{ $getAllCountryVar['c_id']}}">{{ $getAllCountryVar['c_name']}}</option>
					  @endforeach
					</select>
					<select class="custom-select" name="city" id="cityNameFromValue">
					  <option selected>Select City</option> 
					 
					</select>
					<select class="custom-select" name="localities">
					  <option selected>Select Locality</option>
					</select>
				</div>
				<div class="col-md-4"></div>
        </div>
    </body>
</html>

<style>
button, input, optgroup, select, textarea {
    margin: 15px;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
</style>

<script>
function getCountryId()
{
	var countryIdGetFromValue = document.getElementById('countryIdValue').value;
	//alert(countryIdGetFromValue);
	//var obj = 
	$.ajax({
		url: "/getCityByCountryId",
		method:"get",
		dataType: 'json',
		data:{c_id:countryIdGetFromValue},
		success: function(response){
			var myData = JSON.stringify(response);
			//alert (myData);
			var obj = jQuery.parseJSON(myData);
			$('select[name="city"]').empty();
			$.each(obj, function(key,value) {
				//debugger;
			  //alert(value.city_name);
			  
			  $('select[name="city"]').append('<option value="'+ value.city_name +'">' + value.city_name + '</option>');
			}); 
		}
	});	
}

</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#cityNameFromValue").change(function(){
		var cityGetFromValue = document.getElementById('cityNameFromValue').value;
       // alert(cityGetFromValue);
		$.ajax({
		url: "/getValueFromCityTheSelectOptionForLocality",
		method:"get",
		dataType: 'json',
		data:{city_name:cityGetFromValue},
			success: function(responseData){ 
				var myLocalitiesData = JSON.stringify(responseData);
				var object = jQuery.parseJSON(myLocalitiesData); 
				$('select[name="localities"]').empty();
				$.each(object, function(key,value) {
					debugger;
				  $('select[name="localities"]').append('<option value="'+ value.localities +'">' + value.localities + '</option>');
				});
			
			}
		});	
			
    });
});
</script>
