let togglemenu = document.querySelector('.fa-bars');
let list = document.getElementById('list-menu');

togglemenu.addEventListener('click', (event)=>{    
    togglemenu.classList.toggle('fa-times');    
    if(list.style.display == 'block'){              
        list.style.display = 'none';              
    }else{
        list.style.display = 'block';        
    }        
});
