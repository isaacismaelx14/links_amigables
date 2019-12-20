function sendRequest(){
    var theObject = new XMLHttpRequest();
    theObject.open('GET', '../dashboard/logout.php', true);
    theObject.setRequestHeader('Content-Type','application/x-ww-form-urlencoded');
    theObject.onreadystatechange = function(){
    document.getElementById('logout').innerHTML = theObject.responseText;
    }
    theObject.send();
    refresh();
}

  