console.log("hello");

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

const apply=document.getElementsByClassName('applyjs');

Array.from(apply).forEach((element)=>{
    element.addEventListener('click',()=>{
        
        let arr = element.parentNode.parentElement.childNodes;
        // arr.sort();
        let id= arr[2].textContent;
        window.location=`/harendra/applyform.php?id=${id}`;
    })
})
const invite=document.getElementsByClassName('invite');

Array.from(invite).forEach((element)=>{
    element.addEventListener('click',()=>{
        console.log("wowoww");
        let arr = element.parentNode.parentNode.childNodes;
        let gmail=arr[4].textContent;
        console.log(gmail);
        // arr.sort();
        // let id= arr[1].textContent;
        window.location=`mailto:${gmail}`;
    })
})

