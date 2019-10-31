/*var liens = document.querySelectorAll('.navbar-inverse .navbar-nav>li>a')

for( var i=0; i< liens.length; i++){
    liens[i].addEventListener('click', function(){

    var div= liens.parentNode.parentNode.parentNode
    var li = this.parentNode

    div.querySelector('.active').classList.remove('active')
    var  a =li.classList.add('active')

   
})
}*/

var form = document.querySelector('#form')
var button = form.querySelector('button[type=submit]')
var buttonText = button.textContent
form.addEventListener('submit', function(e){
     button.disabled = true
     button.textContent = 'Chargement...'
    var data = new FormData(form)
    httpRequest = new XMLHttpRequest();
    

    httpRequest.onreadystatechange = function(){
        if(httpRequest.readyState === 4){
            if( httpRequest.status != 200){
              /*  var errors = JSON.parse(httpRequest.responseText);
                var errorsKey = Objet.keys(errors)
                for(var i=0; i < errorsKey.length; i++){
                    var key = errorsKey[i]
                    var error = errors[keys]
                    var input = document.querySelector('[name='+ key +']')
                    input.parentNode.classList.add('has-error')
                    var span = document.createElement('span')
                    span.className = 'help-block'
                    span.innerHTML = error
                    input.parentNode.classList.add('has-error')
                    input.parentNode.appendChild(span)*/
                }else {
            
                    button.disabled = false
                   button.textContent = 'Envoyer'
            

        }
        }

    }


    httpRequest.open('POST',form.getAttribute('action'), true)
    httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");   
    httpRequest.send(data)
})

var mod = document.querySelector("#modification")
mod.addEventListener('click', function(event){
    var reponse = window.confirm('Voulez vraiment faire des modification')
     if(reponse === false  ){
         event.preventDefault()
     }
})
