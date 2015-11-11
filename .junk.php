<script>

    /*
     function editTemplateFormSubmit()
     {

     var arrData = [],
     $form = $( this ),
     url = $form.attr( "action" );

     arrData['id'] = $form.find( "input[id='template-id']" ).val();
     arrData['name'] = $form.find( "input[id='template-name']" ).val();

     // Send the data using post
     var posting = $.post(url,
     {
     params: JSON.stringify(arrData),
     action: 'updateReportTemplate',
     isAjax: true
     });

     // Put the results in a div
     posting.done(function( data ) {
     });
     }

     //Popup for edit template onclick.
     $('td i.edit-template').click(function() {
     var templateId = $(this).parent().attr('template-id');

     $.ajax({
     type: 'POST',
     url: 'reports.php',
     dataType: 'json',
     data: {
     'templateId' : templateId,
     'action' : 'viewReportTemplate',
     'isAjax' : true
     },
     success: function(data){
     var arrData = $.parseJSON(data)[0];

     $('#template-edit').html(
     '<div>' +
     '<form id="template-edit-form" action="reports.php" onsubmit="editTemplateFormSubmit()">' +
     '<input id="template-id" type="hidden" value="' + (isNull(arrData['id']) ? '' : arrData['id']) + '"/>' +
     '<label for="template-name">Template Name</label>' +
     '<input id="template-name" type="text" value="' + (isNull(arrData['template_name']) ? '' : arrData['template_name']) + '"/>' +
     //'<label for="template-group">Group Name</label>' +
     //'<input id="template-group" type="text" value="' + (isNull(arrData['group_name']) ? '' : arrData['group_name']) + '"/>' +
     //'<label for="template-next-run">Next Run</label>' +
     //'<input id="template-next-run" type="text" value="' + (isNull(arrData['next_run']) ? '' : arrData['next_run']) + '"/>' +
     '<input type="submit" value="Edit" />' +
     '</form>' +
     '</div>')
     .dialog({
     modal: true,
     title: 'Edit Template',
     draggable: false,
     resizable: false
     });

     $('#template-edit-form').submit(function(e) {e.preventDefault()});
     },
     error: function(error){
     }
     });
     });
     */
</script>