//home page
function redirectToGetStarted() {
    window.location.href = 'career.html'; 
}

function redirectToKnowMore() {
    window.location.href = 'company.html'; 
}


//services page
function redirectToWebApp() {
    window.location.href = 'web-app.html'; 
}

function redirectToCustomBuilt() {
    window.location.href = 'custom.html'; 
}

function redirectToSoftware() {
    window.location.href = 'software.html'; 
}

function redirectToShopify() {
    window.location.href = 'shopify.html'; 
}

function redirectToWordPress() {
    window.location.href = 'wb.html'; 
}

function redirectToMobileApp() {
    window.location.href = 'mob-app.html'; 
}

function redirectToClients(){
    window.location.href = 'company.html'
}

function redirectToContact(){
    window.location.href = 'contact.html'
}


document.getElementById('learnMoreLink').addEventListener('click', function() {
    $('#myModal').modal('show');
});