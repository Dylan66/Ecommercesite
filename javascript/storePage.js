function cancel_change(){
    alert("here");
    var classes = document.getElementsByClassName('store_change');
    
    for(var i = 0; i < classes.length; i++){
        classes[i].style.display = "none";
    }
    
    try{event.preventDefault();}catch(err){}
}

function toggle_div(div){
    cancel_change();
    document.getElementById(div).style.display = "block";
}

cancel_change();