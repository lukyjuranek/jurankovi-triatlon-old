// 124520
// 124518 lj
counter = 0;
const id_lukas = "124518";
const id_heidi = "124520";

fetch('https://api.triathlon.org/v1/athletes/'+id_lukas+'/results?per_page=400', {
        method:"GET",
        headers:{
            "apiKey":"3Y62IHNQFagdTDOaEfg5osztDDKknLUW"
        }})
    .then(response => response.json())
    .then(response => {
        console.log(response);
        response.data.forEach(event => {
            if(event.position < 30){
                if(event.prog_name.includes("Semifinal")){
                    $("#lukas-results").append("<li>" + event.position + ".  - " + event.event_title + " Semifinal</li>")
                } else {
                    $("#lukas-results").append("<li>" + event.position + ".  - " + event.event_title + "</li>")
                }
            };

        });
    });

    fetch('https://api.triathlon.org/v1/athletes/'+id_heidi+'/results?per_page=400', {
        method:"GET",
        headers:{
            "apiKey":"3Y62IHNQFagdTDOaEfg5osztDDKknLUW"
        }})
    .then(response => response.json())
    .then(response => {
        response.data.forEach(event => {
            if(event.position < 32){
                $("#heidi-results").append("<li>" + event.position + ".  - " + event.event_title + "</li>");
            };
        });
    });
