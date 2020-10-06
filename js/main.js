// navbar scroll
let navbar = document.querySelector(".navbar");
window.onscroll = function(){
	scrollFunction();
}


function scrollFunction(){
	if( document.body.scrollTop>30|| document.documentElement.scrollTop >30){
		navbar.classList.add("navbar-fixed");
	}else{
		navbar.classList.remove("navbar-fixed");
	}
}


//dark mode
let switches = document.querySelector('#switch');



switches.addEventListener('change',function(){
	if(this.checked){
		document.documentElement.setAttribute('data-theme','dark');
	}else{
		document.documentElement.setAttribute('data-theme',null);
	}


	let trans = () =>{
		document.documentElement.classList.add('transition');
		window.setTimeout(() => {
			document.documentElement.classList.remove('transition');
		},1000)
	}
}) 