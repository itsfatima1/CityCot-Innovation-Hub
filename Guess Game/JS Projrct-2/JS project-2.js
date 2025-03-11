document.getElementById("btn").onclick = function () {
    
    let number = 3;

     if (document.getElementById("guess").value == number) {
        
        alert("Yeeey! You've Got It");

     } else {

        alert("Try Again!");
     }
}