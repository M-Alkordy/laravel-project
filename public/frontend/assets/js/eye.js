let inputPassword = document.querySelector('.password input')
let eye = document.querySelector('.password img')

eye.addEventListener('click' , () => {
    const type = inputPassword.getAttribute("type") === "password" ? "text" : "password" 
    inputPassword.setAttribute("type", type)
})
