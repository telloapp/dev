		$(document).ready(function(){
			$("#image").change(function(){
		        readImageData(this);
		    });
		});

		function readImageData(imgData){
			if (imgData.files && imgData.files[0]) {
	            var readerObj = new FileReader();
	            
	            readerObj.onload = function (element) {
	                $('#preview_img').attr('src', element.target.result);
	            }
	            
	            readerObj.readAsDataURL(imgData.files[0]);
	        }
		}
\