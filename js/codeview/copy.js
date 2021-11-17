function copy() {
    document.getElementById('codeprevfield').style.display="block";
    document.getElementById('codeprevfield').select();
    
    document.execCommand('copy');
    document.getElementById('codeprevfield').style.display="none";
}

