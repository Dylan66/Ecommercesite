function ajax(backend_url, backend_vars, backend_method, frontend_url, frontend_vars, front_end_method, frontend_dest){
    
    var frontend_vars_array = [];
    frontend_vars_array.push(frontend_url);
    frontend_vars_array.push(frontend_vars);
    frontend_vars_array.push(front_end_method);
    frontend_vars_array.push(frontend_dest);
 
    
    send(backend_url,backend_vars, backend_method, frontend_vars_array);
}

function send(url, vars, method, frontend_vars){
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            
           get(frontend_vars[0],frontend_vars[1], frontend_vars[2], frontend_vars[3]);
        }
    }
    
    if(method == "get"){
        xhttp.open("GET",url+"?"+vars, true);
        xhttp.send();
    }else if(method == "post"){
        xhttp.open("POST",url, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(vars);
    }
}

function get(url, vars, method, dest){
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById(dest).innerHTML = this.responseText;
        }
    }
    
    if(method == "get"){
        xhttp.open("GET",url+"?"+vars, true);
        xhttp.send();
    }else if(method == "post"){
        xhttp.open("POST",url, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(vars);
    }
}