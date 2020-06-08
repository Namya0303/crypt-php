    
    // LOADER
    
    var myVar;
    function myFunction() {
        myVar = setTimeout(showPage, 1500);
    }
    
    function showPage() {
        document.getElementById("load").style.display = "none";
        document.getElementById("mainBod").style.display = "block";
    } 

    // SMOOTH SCROLL
    
    $(document).ready(function(){
        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    window.location.hash = hash;
                });
            } 
        });
    });    
    
    // DARK MODE
    
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
    }    
}
    
    // SAVE PREFERENCE TO LOCAL STORAGE

toggleSwitch.addEventListener('change', switchTheme, false);
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }    
}
    
    // CHECK LOCAL STORAGE FOR PREFERENCE
    
const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
        document.getElementById("skill-img").style.filter = "invert(100)";
    }
}