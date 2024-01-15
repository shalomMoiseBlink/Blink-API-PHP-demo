// Create a new footer element
var footer = document.createElement("footer");

// Create anchor elements for each link and set their attributes
var createTokenLink = createLink("../index.php", "Go Create Token");
var createIntentLink = createLink("../Intent/create-intent.html", "Create Intent");
var cardPaymentLink = createLink("../Payment/create-payment.php", "Card Payment");


// Append anchor elements to the footer
footer.appendChild(createTokenLink);
footer.appendChild(createIntentLink);
footer.appendChild(cardPaymentLink);


// Append the footer to the HTML body
document.body.appendChild(footer);

footer.style.marginTop = "30px";
// Function to create styled links
function createLink(href, text) {
  var link = document.createElement("a");
  link.href = href;
  link.textContent = text;
  link.className = "footerLinks";
  link.style.marginRight = "30px"; // Adjust the spacing as needed
  return link;
}

const style = document.createElement("style");
style.innerHTML = ".footerLinks {  margin-right: 15px; text-decoration: none; color: white; background:blue;  border: 2px solid red;  border-radius: 25px; }";
document.head.appendChild(style);
