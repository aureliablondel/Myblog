let pass = document.getElementsByClassName('pass');
let togglepass = document.getElementsByClassName('pass-eye');

for(let i=0; i<togglepass.length; i++){
togglepass[i].addEventListener('click', (event)=>{    
    togglepass[i].classList.toggle('fa-eye-slash');  
    
    if(pass[i].type == 'password'){        
        pass[i].type = 'text'; 
        togglepass[i].title = 'Masquer';        
    }else{       
        pass[i].type = 'password';
        togglepass[i].title = 'Afficher';    
    }
})};


