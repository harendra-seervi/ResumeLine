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
const lis=document.getElementsByClassName('dekho');
Array.from(lis).forEach((element)=>{
    element.addEventListener('click',()=>{
        // console.log("hello");
        let arr = element.parentNode.parentElement.childNodes;
        // arr.sort();
        let id= arr[2].textContent;
        console.log(id);
        location.href =`/harendra/view.php?id=${id}`;
    })
})
const kis=document.getElementsByClassName('remo');
Array.from(kis).forEach((element)=>{
    element.addEventListener('click',()=>{
        console.log("hello");
        let arr = element.parentNode.parentElement.childNodes;
        // arr.sort();
        let id= arr[2].textContent;
        console.log(id);
        location.href =`/harendra/post.php?id=${id}`;
    })
})