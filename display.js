// this is the base url to which all your requests will be made
var baseURL = window.location.origin + "/laravel";
$(document).ready(function(){
    /*$.get(baseURL+'?get=session', function(data) {
        $('#session').html('session = ' + data);
    }); */
    $('#table').click(function(event) { // generates the table
        // change the url parameters based on your API here
        // Using an JQuery AJAX GET request to get data form the server 
        $.getJSON(baseURL+'/players', function(data) {
            generateTable(data, $('#container'));
        });
    });

    $('#form').click(function(event) { 
        // creating an empty form
        generateForm(null, $('#container'));
    });
    // Handle table click event for delete
    $('#container').on('click', '.delete', function(event) {
        var id = $(this).val();
        // change the url parameters based on your API here
        // remember to create delete functionality on the server side (Model and Controller)
        // Using an JQuery AJAX GET request to get data form the server 
        $.get(baseURL+"/players/"+id+"/delete", function(data) {
            //Generate table again after delete
            //change the url based on your API parameters here
            // Using an JQuery AJAX GET request to get data form the server 
            $.get(baseURL+'/players', function(data) {
                generateTable(data, $('#container'));
            });
        });
    });

    // Handle form submit event for both update & create
    // if the ID_FIELD is present the server would update the database otherwise the server would create a record in the database
    $('#container').on('submit', '#my-form', function(event) {
        var id = $('#id').val();
        console.log(id);
        if (id != "") {
            event.preventDefault();
            submitForm(baseURL+"/players/"+id+"/edit", $(this));
        } else {
            event.preventDefault();
            submitForm(baseURL+"/players/post", $(this));
        }
    });
    
    // Handle table click event for edit
    // generates form with prefilled values
    $('#container').on('click', '.edit', function(event) {
        // getting id to make the AJAX request
        var id = $(this).val();
        // change the url parameters based on your API here
        // Using an JQuery AJAX GET request to get data form the server 
        $.getJSON(baseURL+'/players/'+id, function(data) {
            generateForm(data, $('#container'));
        });
    });

    // function to generate table
    function generateTable(data, target) {
        clearContainer(target);
        //Change the table according to your data
        var tableHtml = '<table><thead><tr><th>Name</th><th>Age</th><th>Position</th><th>Team</th><th>Delete</th><th>Edit</th></tr></thead>';
        $.each(data, function(index, val) {
            tableHtml += '<tr><td>'+val.playername+'</td><td>'+val.age+'</td><td>'+val.position+'</td><td>'+val.team+'</td><td><button class="delete" value="'+val.id+'">Delete</button></td><td><button class="edit" value="'+val.id+'">Edit</button></td></tr>';
        });
        tableHtml += '</table>';
        $(target).append(tableHtml);
    }
    
    // function to generate form
    function generateForm(data, target){
        clearContainer(target);
        //Change form according to your fields
        $(target).append('<form id="my-form"></form>');
        var innerForm = '<fieldset><legend>Player Form</legend><p><label>Player Name: </label>'+'<input type="hidden" name="id" id="id"/>'+'<input type="text" name="playername" id="playername" /></p>' + '<p><label>Age: </label><input type="text" name="age" id="age" /></p>'+ '<p><label>Hometown: </label><input type="text" name="city" id="city" />'+ ' ' + '<input type="text" name="country" id="country" /></p>' + '<p><label>Gender: </label><input type="text" name="gender" id="gender" /></p>'+ '<p><label>Handedness: </label><input type="text" name="handedness" id="handedness" /></p>'+ '<p><label>Broom: </label><input type="text" name="broom" id="broom" /></p>'+ '<p><label>Position: </label><input type="text" name="position" id="position" /></p>'+ '<p><label>Team: </label><input type="text" name="team" id="team" /></p>'+ '<p><label>Favorite Color: </label><input type="text" name="favoritecolor" id="favoritecolor" /></p>'+ '<p><label>Headshot: </label><input type="text" name="headshot" id="Headshot" /></p>'+ '<input type="submit"/>';
        $('#my-form').append(innerForm);
        //Change values according to your data
        if(data != null){
            $.each(data, function(index, val) { 
                $('#id').val(val.id);
                $('#playername').val(val.playername); 
                $('#age').val(val.age); 
                $('#city').val(val.city);
                $('#country').val(val.country);
                $('#gender').val(val.gender); 
                $('#handedness').val(val.handedness); 
                $('#broom').val(val.broom);
                $('#position').val(val.position);
                $('#team').val(val.team); 
                $('#favoritecolor').val(val.favoritecolor); 
                $('#Headshot').val(val.headshot);
            });
        }
    }
    
    function submitForm(url, form){
        $.post(url, form.serialize(), function(data) {
            showNotification(data, $('#notification'));
        });
    }
    
    function showNotification(data, target){
        clearContainer(target);
        target.append('<p>'+data+'</p>');
    }
    
    function clearContainer(container){
        container.html('');
    }
});
