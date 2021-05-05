document.addEventListener('DOMContentLoaded', function(){
	
	
	// var regEx_1 = /[a-z]{3}/gi;
	// var regEx_2 = new RegExp(/[0-9]{10}/,'gi');
	
	// regEx_1.test(field.value);
	
	var inputs = document.querySelectorAll('input');
	//console.log(inputs);
	
	var pattern = {
		
        company:/^[A-Za-z0-9]{5,30}$/,
		telephone:/^\(([0-9]{3})\)[-\.]([0-9]{3})[-\.]([0-9]{4})$/,
		username:/^[a-z0-9]{5,12}$/,
		password:/^[\w@-]{8,20}$/,
      
		email:/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
        companyUrl:/^(ftp|http|https):\/\/[^ "]+$/
		//(user name)@(domain).(extension)(.something)
		
		
	}
	
	function validate(field, regEx){
		
		//console.log(regEx.test(field));
		if(regEx.test(field.value)){
			field.className = 'valid';
		}else{
			field.className = 'invalid';
		}
	}
	
	
	
	inputs.forEach((input)=>{
		
		input.addEventListener('keyup',(e)=>{
			
			//console.log(e.target.attributes.name.value);
			validate(e.target, pattern[e.target.attributes.name.value])
		})
	})
	
	
	
	    
