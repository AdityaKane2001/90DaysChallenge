function addChallenge(){
  var data = new FormData();
  data.append('name',document.getElementById('name').value);
  data.append('days',getElementById('days').value);


    var xmlHttp = new XMLHttpRequest();                                                      //initialize AJAX request
    xmlHttp.onreadystatechange = function(){                                                 //shoot when ready
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
          var mesg= "Challenge "+xmlHttp.responseText+ " created successfully!"

          alertify.set('notifier','position',  'bottom-right');
            alertify.success(mesg);

            }                          //clear the div
            else{
              alertify.set('notifier','position',  'bottom-right');
                alertify.error("Challenge could not be created. Please contact administrator.");


            }


          }

  xmlHttp.open("post", "ops.php");
  xmlHttp.send(data);



}
