// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}

// Accordions
function myAccordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
            x.previousElementSibling.className.replace(" w3-theme", "");
    }
}

function selectBtn(IDS) {
    var sel = document.getElementById('menu').getElementsByTagName('a');
    var x = document.getElementById(IDS);
    for (var i = 0; i < sel.length; i++) {
        if (sel[i].className.indexOf(' active') != -1) {
            sel[i].className = sel[i].className.replace(' active', '');
        }
    }
    if (x.className.indexOf('active') == -1) {
        x.className += ' active';
    }
}

function highlightLink() {
    // lay vi tri cua dau #
    var url = document.URL;
    var start = url.indexOf("#");
    var id = url.substr(start + 1, url.length - start);
    if (id.length != 0) {
        selectBtn(id);
    }
}
