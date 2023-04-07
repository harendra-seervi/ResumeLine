const cross=document.querySelector(".crosswala");
cross.addEventListener("click",()=>{
    const navBar=document.querySelector(".social-media-nav");
    navBar.classList.add("hide");
})
const loginOrLogout=document.querySelector(".login-logout");
loginOrLogout.addEventListener('click',()=>{
    if(loginOrLogout.textContent=="logout"){
        window.location.href = "/harendra/logout.php";
    }else{
        window.location.href = "/harendra/login.php";
    }
    // window.location(url);
})

document.querySelector(".logo").addEventListener('click',()=>{
    window.location.href = "/harendra/homepage.php";
})

const kk =document.querySelector('.kk');
kk.addEventListener('click',()=>{
    window.location.href = "/harendra/apply.php";
})