window.onload = function(){
	document.querySelector('#password').onchange = validasi;
	document.querySelector('#password1').onchange = validasi;
}

function validasi(){
	const password = document.querySelector('#password').value;
	const password1 = document.querySelector('#password1').value;
	const tidak = document.querySelector('#tidak');
	const sama = document.querySelector('#sama');


	if(password.length <1 && password1.length<1){
		sama.style.display='none';
		tidak.style.display = 'none';
	}else if(password != password1){
		sama.style.display='none';
		tidak.style.display = 'block';
	}else{
		sama.style.display='block';
		tidak.style.display = 'none';
	}
}