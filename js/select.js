$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'includes/LoadTeams.php'
    })
    .done(function(teams){
      $('#id_team').html(teams)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los teams')
    })
  
   
  
   
  })

  $(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'includes/LoadTeams.php'
    })
    .done(function(teams){
      $('#id_team_search').html(teams)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los teams')
    })
  
   
  
   
  })