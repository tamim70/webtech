
document.getElementById("regform").addEventListener("submit", validate)



function validate(event) {
event.preventDefault()
const adminName = document.getElementsByName("name")[0].value
const email = document.getElementsByName("email")[0].value
const password = document.getElementsByName("password")[0].value
const confirmpass = document.getElementsByName("confirmpass")[0].value
const errMsg = document.querySelector("#regform p")
if (!email.includes('@')) {
errMsg.textContent = "Invalid email"
return
} else if (password.length < 6) {
errMsg.textContent = "Password too short"
return
} else if (password !== confirmpass) {
errMsg.textContent = "Passwords do not match"
return
}
errMsg.textContent = "Validation Successful"
}
