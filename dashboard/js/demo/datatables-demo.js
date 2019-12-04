// Call the dataTables jQuery plugin
$(document).ready(function() {
  /*$('#dataTable').DataTable();*/
  $('#dataTable').DataTable( {
    "order": [[ 6, "desc" ]]
  });
});
