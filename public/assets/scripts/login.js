
//GET LOGIN USER TIME ZONE
if (document.body.contains(document.getElementById("user_timezone"))){
    var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    document.getElementById("user_timezone").value = timezone;
}