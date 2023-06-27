$(document).ready(function() {
    $('#calculateBtn').click(function() {
        let weight = $('#weight').val();
        let slug = $('#carrier').val();

        let requestData = {
            weight: weight,
            slug: slug
        };

        $.ajax({
            url: 'index',
            type: 'POST',
            data: JSON.stringify(requestData),
            contentType: 'application/json',
            dataType: 'json',
            success: function(response) {
                $('#result').text('Shipping Cost: ' + response.result + ' EUR');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
            }
        });
    });
});