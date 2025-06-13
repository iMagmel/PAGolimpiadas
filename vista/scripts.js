const btnSignIn = document.getElementById('btn-sign-in');
const btnSignUp = document.getElementById('btn-sign-un');
const forms = document.getElementById('forms');
const sidebar = document.getElementById('sidebar');
const signIn =  document.getElementById('sign-in');
const signUp =  document.getElementById('sign-up');
const container =  document.getElementById('container');
const linkSignIn =  document.getElementById('link-sing-in');
const linkSignUp =  document.getElementById('link-sing-up');




linkSignUp.addEventListener('click',()=>{
    changesSignIn();
});


linkSignIn.addEventListener('click',()=>{
    changesSignUp();
});

btnSignIn.addEventListener('click',()=>{
    changesSignIn();
});


btnSignUp.addEventListener('click',()=>{
    changesSignUp();
});



function changesSignIn(){
    forms.classList.remove('active');
    sidebar.classList.remove('active');
    container.style.animation = 'none';
    container.style.animation = 'brounce-up 1s ease'
    transition(signIn);
}


function changesSignUp(){
    forms.classList.add('active');
    sidebar.classList.add('active');
    container.style.animation = 'none';
    container.style.animation = 'brounce-down 1s ease'
    transition(signUp);
}

function transition(parent){
    const children = parent.children;

    Array.from(children).forEach((child)=>{
        child.style.opacity = '0';
        child.style.animation = 'none';
    });
    setTimeout(() => {
        Array.from(children).forEach((child, index)=>{
        child.style.animation = 'slideIn 0.4s ease forwards';
        let delay = (index * 0.05)+'s';
        child.style.animationDelay = delay
        });

    }, 300);
}
