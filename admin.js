
document.getElementById("form1").style.display="none"
document.getElementById("form2").style.display="none"

document.getElementById("ajout").addEventListener('click' , function(event){
 event.preventDefault()    
    document.getElementById("form1").style.display="block"
    document.getElementById("form2").style.display="none"
})
document.getElementById("suprim").addEventListener('click' , function(event){
 event.preventDefault()    
    document.getElementById("form1").style.display="none"
    document.getElementById("form2").style.display="block"
})

document.getElementById("fermer").addEventListener('click' , function(event){
 event.preventDefault()    
    document.getElementById("form1").style.display="none"
    document.getElementById("form2").style.display="none"
})


