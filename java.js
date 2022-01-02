function slide()
{
var counter = 1;
setInterval(function(){
document.getElementById('radio' + counter).checked = true;
counter++;
if (counter >4) {
counter=1;
}
},5000);
}
function lockingSecureDownloadalert()
{
alert('⚠️ Le téléchargement va commencer ! ⚠️');
window.location.href = 'apk/LockingSecure.apk';
}