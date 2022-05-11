const form = document.querySelector(".wrapper form"),
      fullUrl = form.querySelector("input"),
      shortenBtn = form.querySelector("button"),
      blurEffect = document.querySelector(".blur-effect"),
      popupBox = document.querySelector(".popup-box"),
      form2 = popupBox.querySelector("form"),
      shortURL = popupBox.querySelector("input"),
      saveBtn = popupBox.querySelector("button"),
      copyBtn = popupBox.querySelector(".copy-icon"),
      infoBox = popupBox.querySelector(".info-box");

form.onsubmit = (e)=>{
  e.preventDefault();
}

shortenBtn.onclick = ()=>{
  // start ajax
//   let xhr = new XMLHttpRequest(); // creating xhr object
//   xhr.open("POST", "php/url_controll.php", true);
//   xhr.onload = ()=> {
//     if(xhr.readyState == 4 && xhr.status == 200) { // if ajax request status is ok/success
//       let data = xhr.response;
//       if(data.length <= 5) {
//         blurEffect.style.display = 'block';
//         popupBox.classList.add("show");

//         // Domain value must change to the new domain name if you upload the project to an online server
//         let domain = 'localhost/url_short/'; // using this (u value at the end of the domain) we'll redirect the user to the original url
//         shortURL.value = domain + data;
//         copyBtn.onclick = () => {
//           shortURL.select();
//           document.execCommand('copy');
//         }
//         form2.onsubmit = (e)=>{
//           e.preventDefault();
//         }
//         // save btn
//         saveBtn.onclick = () => {
//             // start ajax
//             let xhr2 = new XMLHttpRequest(); // creating xhr2 object
//             xhr2.open("POST", "php/save_url.php", true);
//             xhr2.onload = ()=> {
//               if(xhr2.readyState == 4 && xhr2.status == 200) { // if ajax request status is ok/success
//                 let data = xhr2.response;
//                 if(data == 'Success') {
//                   location.reload();
//                 } else {
//                   infoBox.innerText = data;
//                   infoBox.classList.add('error');
//                 }
//               }
//             }
//             // Send two data/value from ajax to php
//             let short_url = shortURL.value;
//             let hidden_url = data;
//             xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//             xhr2.send("short_url="+short_url+"&hidden_url="+hidden_url);
//           // location.reload(); // reload current page
//         }
//       } else {
//         alert(data);
//       }
//     }
//   }
//   let formData = new FormData(form);
//   xhr.send(formData);
}
