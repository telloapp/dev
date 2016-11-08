function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

	}
	function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	    	alert('Only number are allowed for this field!');
	        return false;
	    }
	    return true;
	}
	<!--
	function alpha(e) {
	     var k;
	     document.all ? k = e.keyCode : k = e.which;
	     return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8);
	}
// -->
