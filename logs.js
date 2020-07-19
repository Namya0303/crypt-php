
const authRoot = firebase.auth();
var qno = $('.writen h2').text();
const dbRoot = firebase.database();
authRoot.onAuthStateChanged(function(user){
    if(user){
        var userNaam = user.email.replace('@cryptatrix.com' , '');

        const newPostKey = dbRoot.ref(userNaam + "/" + qno).push().key;
        $('#submitb').on('click', function(event){
            event.preventDefault();

            var myNewValue = $('#answer').val();
            dbRoot.ref(userNaam + "/"+ uid + qno).child(newPostKey).set({myNewValue}, function(error){
               if(error){ console.log(error); } else{$('form').submit();}
            });
        })
       
    }
})