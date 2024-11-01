document.addEventListener("DOMContentLoaded", function () {
    const supb=document.getElementById('button6');
    const sinb=document.getElementById('button5');
    const supb1=document.getElementById('button61');
    const sinb1=document.getElementById('button51');
    const div1 = document.getElementById('fcontainer');   
    const div2 = document.getElementById('fcontainer1');
    div1.style.display = 'block';
    div2.style.display = 'none';
    supb.addEventListener("click",function() {
        div1.style.display = 'block';
    div2.style.display = 'none';

    });
    sinb.addEventListener("click",function() {
        div1.style.display = 'none';
        div2.style.display = 'block';
    

    });
    supb1.addEventListener("click",function() {
        div1.style.display = 'block';
    div2.style.display = 'none';

    });
    sinb1.addEventListener("click",function() {
        div2.style.display = 'block';
    div1.style.display = 'none';

    });
});






function validateForm(event) {
    const name = document.getElementById('exampleInputname1').value.trim();
    const nameerrElement = document.getElementById('nameError');
    const email = document.getElementById('exampleInputEmail1').value.trim();
    const emailerrElement = document.getElementById('emailError');
    const password = document.getElementById('exampleInputPassword1').value.trim();
    const passworderrElement = document.getElementById('passwordError');
    
   

    
    
    
    nameerrElement.textContent = '';
    emailerrElement.textContent = '';
    passworderrElement.textContent = '';
    namePattern = /^[A-Za-z\s]+$/;
    
    
    if (name === ''  || email === '' || password === '' ) {
        nameerrElement.textContent = 'Name is required.' 
        emailerrElement .textContent = 'Email is required.';
        passworderrElement .textContent = 'Password is required.';
        event.preventDefault(); 
        return false;
    }


    
  
   

    
    else if (!namePattern.test(name)) {
        nameerrElement.textContent = 'Only white spaces and letters are allowed' ;
      
        event.preventDefault(); 
        return false;
    }

    return true;
}

