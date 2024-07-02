// let buh = document.querySelector("#kul");
// buh.onclick = () => {
//    console.log('this is a button');
//    let a = 24;
//    a++;
//    console.log(a);
// }
// let diva = document.querySelector("div");

// diva.onmouseover = () => {
//     console.log("this is a pure div");
// }

let yoi = document.querySelector("div");

// yoi.onclick = (e) => {
//     console.log(e.clientX, e.clientY);
//     console.log(e.type);
//     console.log(e.target);
// }

// let ham = document.querySelector("#kul");

// ham.onmouseover = (e) => {
//     console.log(e.type);
//     console.log(e.target);
//     console.log(e.clientX, e.clientY);
// }

yoi.addEventListener("click", (evt) => {
    console.log("this is a div");
    console.log(evt.type);
    console.log(evt.target);
    console.log(evt.clientX, evt.clientY);
});