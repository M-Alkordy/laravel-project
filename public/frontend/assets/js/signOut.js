let desktopMenuUser = document.querySelector('header .user .menu .userName')
let desktopMenu = document.querySelector('header .user .menu ')
let desktopSignOut = document.querySelector('header .user .menu .signOut')
let userInfo = document.querySelector('header .userInfo ')


desktopMenuUser.addEventListener('click',()=>{
    if(window.screen.width > 650){
    desktopMenu.style.visibility='hidden'
    userInfo.style.visibility='visible'
    }
})

userInfo.addEventListener('click',()=>{
    if(window.screen.width >650){
    userInfo.style.visibility='hidden'
    desktopMenu.style.visibility='visible'
    }

})

// mobile Js
let signOut = document.querySelector('header .user .exit img')
let mobileMenu = document.querySelector('.mobileMenu')
let no = document.querySelector('.mobileMenu .no')


signOut.addEventListener('click', ()=>{
    document.querySelector('#body').classList.toggle('mobile-menu-hidden-overFlow')
    mobileMenu.style.display='block'
})  
no.addEventListener('click',()=>{
    document.querySelector('#body').classList.toggle('mobile-menu-hidden-overFlow')
    mobileMenu.style.display='none'
})
